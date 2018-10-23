<?php 

class Custom_Payment extends CI_Controller{

    public function __construct() 
    {
        parent::__construct();
        
        $this->data['theme'] = 'admin';
        $this->data['module'] = 'custom_payment';
        //$this->load->library('pagseguro_lib');
        $this->load->model('admin_custom_model');
    }

    public function index()
    {
        $this->data['page'] = 'index';      
        $this->data['list'] = $this->admin_custom_model->get_payment();        
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');     
    }

    //public function index ()
    //{	 
        //$this->data['page'] = 'index';    
        //$this->data['tokenSecao'] =  $this->pagseguro_lib->PegarSecao();   
        //$this->load->vars($this->data);
        //$this->load->view($this->data['theme'].'/template');     
    //}

    
    //public function pagamento ()
    //{	
        //$token = $this->input->post('token');
        //echo($token);	
        //$this->pagseguro_lib->AdicionandoAssinatura($token);      
        //$retornoPagseguro = $this->pagseguro_lib->AdicionandoPlano();
        //$retornoPagseguro = $this->pagseguro_lib->AdicionandoAssinatura();
        //echo($retornoPagseguro);
        //$message="<div class='alert alert-success text-center fade in' id='flash_succ_message'>" + $retornoPagseguro + "</div>";
        //$this->session->set_flashdata('message',$message);
        //redirect(base_url().'admin/custom_payment');
    //}

}

?>