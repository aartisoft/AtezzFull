<?php 

class Custom_Cupom extends CI_Controller{

    public function __construct() 
    {
        parent::__construct();
        
        $this->data['theme'] = 'admin';
        $this->data['module'] = 'custom_cupom';
        $this->load->model('admin_custom_model');
    }

    public function index ()
    {	 
        $this->data['page'] = 'index';      
        $this->data['list'] = $this->admin_custom_model->get_lista_cupom();        
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');     
    }

    public function add()
    {
        $this->data['page'] = 'add'; 
		
        if($this->input->post('form_submit'))
        {
            $data = array(
                'codigo' => $this->input->post('cupom_codigo'),
                'qtd' => $this->input->post('cupom_qtd')
            );

            if($this->admin_custom_model->criar_cupom($data))
            {
                $message="<div class='alert alert-success text-center fade in' id='flash_succ_message'>Cupom Criado com sucesso!</div>";
                $this->session->set_flashdata('message',$message);
                redirect(base_url().'admin/Custom_Cupom');
            }	
        }
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');      
    }

    public function edit($id)
    {
        $this->data['page'] = 'edit'; 
        $this->data['list'] = $this->admin_custom_model->get_id($id);

        if($this->input->post('form_submit'))
        {
            $id = $this->input->post('cupom_id');
            $data = array(
                'codigo' => $this->input->post('cupom_codigo'),
                'qtd' => $this->input->post('cupom_qtd'),
                'status' => $this->input->post('cupom_status')
            );

            
            if($this->admin_custom_model->editar_cupom($id, $data))
            {
                $message="<div class='alert alert-success text-center fade in' id='flash_succ_message'>Cupom Criado com sucesso!</div>";
                $this->session->set_flashdata('message',$message);
                redirect(base_url().'admin/Custom_Cupom');
            }	
        }
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');      
    }    

    public function delete()
    {
        if($this->input->post('id'))
        {
            $id = $this->input->post('id');
            $result = 1;

            if(!empty($id))
            {
                if($this->admin_custom_model->delete_cupom($id)){
                    $message = "<div class='alert alert-success text-center fade in' id='flash_succ_message'>Cupom deletado com sucesso!</div>";
                }

                $this->session->set_flashdata('message', $message);
            }

            echo $result;
            die();
        }
    }

}

?>