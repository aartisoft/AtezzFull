<?php 

class Retorno extends CI_Controller{

    public function __construct() 
    {
        parent::__construct();
        
        $this->data['theme'] = 'user';
        $this->data['module'] = 'pagamento';
        $this->load->model('admin_custom_model');
        $this->load->library('pagseguro_lib');
        $this->load->helper('file');  
        $this->load->helper('favourites');
        $this->smtp_config  = smtp_mail_config();
    }

    public function index()
    {
        if($this->input->post('notificationType') == "transaction")
        {
            $message = $this->pagseguro_lib->NotificacaoPagamento();
            $status = $message->getStatus();
            $email = $message->getSender()->getEmail();
            $user = $this->admin_custom_model->get_user_by_email($email);
            //3 = paga
            //6 = devolviva
            //7 = cancelada            
            if($status == 3 || $status == 6 || $status == 7)
            {
                $data['code'] = $message->getCode();
                $data['reference'] = $message->getReference();
                $data['status'] = $message->getStatus();
                $data['date'] = $message->getDate();            
                $data['discountAmount'] = $message->getDiscountAmount();
                $data['feeAmount'] = $message->getFeeAmount();
                $data['grossAmount'] = $message->getGrossAmount();
                $data['id_user'] = $user["USERID"];
                $data['email_user'] = $message->getSender()->getEmail();
                $data['deletado'] = false;

                $this->user_custom_model->set_user_pagamento($data);

                if($status == 3)
                {
                    $data = $this->user_custom_model->get_user_provider_id($user["USERID"]);
                    $data['end'] = $data['end']->modify('+1 month');
                    $this->user_custom_model->update_user_provider($data['id'],$data);

                    $assunto = "Conta Paga";
                    $mensagem = "Conta Paga com Sucesso! voce tem ate o dia xpto para utilizar o plano";
                    $this->SendEmail($email, $assunto, $mensagem);                
                }

            }
        }

        else if($this->input->post('notificationType') == "preApproval")
        {
            $message = $this->pagseguro_lib->NotificacaoAssinatura();
            $status = $message->getStatus();
            $email = $message->getSender()->getEmail();

            if($status == 'ACTIVE')
            {
                $assunto = "Conta Ativada";
                $mensagem = "Conta Ativada com Sucesso! Espere a notificação de pagamento para utilizar o plano";
                $this->SendEmail($email, $assunto, $mensagem);
            }
            else if($status == 'SUSPENDED' || $status == 'CANCELLED' || $status == 'CANCELLED_BY_RECEIVER' || $status == 'CANCELLED_BY_SENDER')
            {
                $user = $this->admin_custom_model->get_user_by_email($email);
                $data = $this->user_custom_model->get_user_provider_id($user["USERID"]);
                $data['payment_code'] = '';
                $this->user_custom_model->update_user_provider($data['id'],$data);

                $assunto = "Conta Concelada";
                $mensagem = "Conta Cancelada com Sucesso!";
                $this->SendEmail($email, $assunto, $mensagem);
            }
            else if($status == 'EXPIRED')
            {
                $assunto = "Conta Expirada";
                $mensagem = "Conta Expirada com Sucesso!";
                $this->SendEmail($email, $assunto, $mensagem);
            }
        }
    }
    
    function SendEmail($email,$assunto,$mensagem){
        $this->load->library('email');
        $this->email->initialize($this->smtp_config);
        $this->email->set_newline("\r\n");

        //$this->email->from("thv.contato11@gmail.com","VanderMaldito"); 
        //$this->email->to($email); 
        $this->email->to("equipestaff@gmail.com"); 
        $this->email->subject($assunto);
        $this->email->message($mensagem);

        //$this->email->send();
    }
}

?>