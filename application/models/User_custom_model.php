<?php 
class User_custom_model extends CI_Model
{

    public function get_plan($id)
    {
        if($id == 1)
        {
            $data["id"] = 1;
            $data["nome"] = 'MENSAL';
            $data["preco"] = 30.00;
            $data["chave"] = '82135DC61F1FFAE0046DCFAFD6E05B7B';
        }
        else if($id == 2)
        {
            $data["id"] = 2;
            $data["nome"] = 'TRIMESTRAL';
            $data["preco"] = 50.00;
            $data["chave"] = '82135DC61F1FFAE0046DCFAFD6E05B7B';
        }
        else if($id == 3)
        {
            $data["id"] = 3;
            $data["nome"] = 'SEMESTRAL';
            $data["preco"] = 95.00;
            $data["chave"] = '82135DC61F1FFAE0046DCFAFD6E05B7B';
        }
        return $data;          
    }

    public function get_user_provider_id($id)
    {
        $query = $this->db->query("SELECT * FROM `service_provider` WHERE `fk_members_service` = '".$id."'; ");
        $result = $query->row_array();
        return $result;       
    }

    public function set_user_provider($id, $data)
    {
        
        $from_timezone = $this->session->userdata('time_zone');		   
        date_default_timezone_set($from_timezone); 
        $current_time= date('Y-m-d H:i:s');
        
        $data['start'] =  $current_time;
        $data['end'] =  $current_time;

        if($id == 0)
        {
            $result = $this->db->insert('service_provider',$data);
        }
        else
        {
            $this->db->where('id',$id);
            $result = $this->db->update('service_provider',$data);
        }

        return $result;
    }

    public function update_user_provider($id, $data)
    {
        $this->db->where('id',$id);
        $result = $this->db->update('service_provider',$data);

        return $result;
    }    

    public function get_user_by_email($email)
    {   
        $query = $this->db->query("SELECT * FROM `members` WHERE `email` = $email ;");
        $result = $query->row_array();
        return $result;                  
    }

    public function set_user_pagamento($data)
    {       
        $result = $this->db->insert('pagamento',$data);

        return $result;
    }    

    public function get_user_pagamento_by_id($id)
    {   
        $query = $this->db->query("SELECT * FROM `pagamento` WHERE `user_id` = $id ;");
        $result = $query->result_array();
        return $result;                  
    }

    public function get_cupom_by_code($code)
    {
        $query = $this->db->query("SELECT * FROM `custom_cupom` WHERE `codigo` = '".$code."' AND `status` = 'ATIVO' AND `delete` = 0; ");
        $result = $query->row_array();
        return $result;       
    }

}
?>
