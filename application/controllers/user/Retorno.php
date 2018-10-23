<?php 

class Retorno extends CI_Controller{

    public function __construct() 
    {
        parent::__construct();
        
        $this->data['theme'] = 'user';
        $this->data['module'] = 'pagamento';
        $this->load->helper('favourites');
        $this->smtp_config  = smtp_mail_config();
    }

    public function index()
    {
        $message = "TESTE<BR>";
        
        foreach($_POST as $key => $value) {
            $message = $message .  "POST parameter '$key' has '$value'<BR>";
        }

        $message = $message . "TESTE<BR>";

        foreach($_GET as $key => $value) {
            $message = $message . "GET parameter '$key' has '$value'<BR>";
        }

        $this->load->library('email');
        $this->email->initialize($this->smtp_config);
        $this->email->set_newline("\r\n");

        $this->email->from("thv.contato11@gmail.com","VanderMaldito"); 
        $this->email->to("equipestaff@gmail.com"); 
        $this->email->subject('Sniffer Retorno ');
        $this->email->message($message);

        $this->email->send();
        echo $message;


    }    
}

?>