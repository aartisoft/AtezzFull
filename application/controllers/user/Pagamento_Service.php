<?php 

class pagamento_service extends CI_Controller{

    public function __construct() 
    {
        parent::__construct();
        
        $this->data['theme'] = 'user';
        $this->data['module'] = 'pagamento';
        $this->load->library('PagSeguro_lib');
        $this->load->model('user_custom_model');
        $this->load->model('user_panel_model');
    }

    public function index($plano)
    {
        $this->data['page'] = 'index';
        $this->data['plano'] = $this->user_custom_model->get_plan($plano);
        $this->data['tokenSecao'] =  $this->pagseguro_lib->PegarSecao();
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');     
    }
   
    public function redirect($status)
    {
        foreach($_GET as $key => $value) {
            echo "POST parameter '$key' has '$value'";
        }

        $this->data['module'] = 'redirect';
        $this->data['page'] = 'index';

        $this->data['slogan']                    = $this->user_panel_model->get_slogan();
        $this->data['list_plans']                = $this->user_panel_model->get_plan();
        $this->data['footer_main_menu']          = $this->user_panel_model->footer_main_menu();
        $this->data['footer_sub_menu']           = $this->user_panel_model->footer_sub_menu();
        $this->data['system_setting']            = $this->user_panel_model->system_setting();    
        $this->data['policy_setting']            = $this->user_panel_model->policy_setting();   
        $this->data['categories_subcategories']  = $this->user_panel_model->categories_subcategories();

        $this->data['status'] = $status;
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');     
    }

    public function pagamento()
    {	

        $id = 0;
        $user_id = $this->session->userdata('SESSION_USER_ID');
        $data = $this->user_custom_model->get_user_provider_id($user_id);
        if($data == null || $data['payment_code'] == '')
        {
            if ($data['id'] != null){
                $id = $data['id'];
            }
            $data['fk_members_service']     = $user_id;
            $data['status']                 = 0;
            $data['status_pay']             = 0;            
            $data['fk_plan_service']        = $this->input->post('plano');
            $data['fk_ong_provider']        = $this->input->post('instituicoes');
            $data['percent_doacao']         = $this->input->post('porcentagem');
            $data['logradouro']             = $this->input->post('endereco');
            $data['numero']                 = $this->input->post('numero');
            $data['complemento']            = $this->input->post('complemento');
            $data['bairro']                 = $this->input->post('bairro');
            $data['cidade']                 = $this->input->post('cidade');
            $data['estado']                 = $this->input->post('estado');
            $data['cep']                    = $this->input->post('cep');

            $this->user_custom_model->set_user_provider($id,$data);

            $data = $this->user_custom_model->get_user_provider_id($user_id);
            if($data != null)
            {
                $userEmail = $this->user_panel_model->profile($user_id);
                $user['planCode'] = $this->input->post('planCode');
                $user['planId'] = $this->input->post('plano');
                $user['nome_cartao'] = $this->input->post('nome_cartao');
                $user['email'] = $userEmail['email'];
                $user['cpf'] = $this->input->post('cpf');
                $user['nascimento'] = $this->input->post('nascimento');
                $user['telefone'] = $this->input->post('telefone');

                $token = $this->input->post('token');
                $code = $this->pagseguro_lib->AdicionandoAssinatura($token, $user, $data);
                if($code != ''){
                    $data['payment_code'] = $code;
                    $data['status']       = 1;
                    $this->user_custom_model->update_user_provider($data['id'],$data);
                    redirect(base_url().'pagamento/redirect');
                }
            } 
        }
        redirect(base_url().'pagamento/redirect/erro');
    }

    public function cupom()
    {	

        $id = 0;
        $user_id = $this->session->userdata('SESSION_USER_ID');
        $data = $this->user_custom_model->get_user_provider_id($user_id);
        $mensagem = 'Cupom Inválido!';
        if($data == null || $data['payment_code'] == '')
        {
            $cupom = $this->user_custom_model->get_cupom_by_code($this->input->post('cupom'));
            if($cupom['codigo'] != null)
            {
                if ($data['id'] != null){
                    $id = $data['id'];
                }
                $data['fk_members_service']     = $user_id;
                $data['status']                 = 2;
                $data['status_pay']             = 0;            
                $data['fk_plan_service']        = 0;
                $data['fk_ong_provider']        = $this->input->post('instituicoes');
                $data['percent_doacao']         = $this->input->post('porcentagem');
                $data['payment_code']           = $this->input->post('cupom');
                $data['logradouro']             = '';
                $data['numero']                 = 0;
                $data['complemento']            = '';
                $data['bairro']                 = '';
                $data['cidade']                 = '';
                $data['estado']                 = '';
                $data['cep']                    = '';

                $this->user_custom_model->set_user_provider($id,$data);
                
                $mensagem = '';
            }
        }
        echo($mensagem);
    }    

    public function cancel(){
        $user_id = $this->session->userdata('SESSION_USER_ID');
        $data = $this->user_custom_model->get_user_provider_id($user_id);
        
        $retorno = $this->pagseguro_lib->CancelarAssinatura($data['payment_code']);

        if($retorno)
        {
            $data['payment_code'] = '';
            $this->user_custom_model->update_user_provider($data['id'],$data);
            redirect(base_url().'assinatura');
        }
        redirect(base_url().'pagamento/redirect/erro');
    }

    public function retorno(){
        echo 'teste';
    }    
}

?>