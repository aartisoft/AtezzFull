<?php 
class admin_custom_model extends CI_Model
{

    public function get_lista_cupom()
    {
        $query = $this->db->query("SELECT * FROM `custom_cupom` WHERE `delete` = '0'; ");
        $result = $query->result_array();         
        return $result;          
    }

    public function get_id($id)
    {
        $query = $this->db->query("SELECT * FROM `custom_cupom` WHERE `cupom_id` = '".$id."'; ");
        $result = $query->row_array();
        return $result;       
    }

    public function criar_cupom($data)
    {
        $from_timezone = $this->session->userdata('time_zone');		   
		date_default_timezone_set($from_timezone); 
        $current_time= date('Y-m-d H:i:s');
        
        $data['qtd_usado'] = 0;
        $data['status'] = 'ATIVO';
        $data['data_criacao'] = $current_time;
        $data['data_inicio'] = $current_time;
        $data['data_fim'] = $current_time;
        $data['delete'] = false;

        $result = $this->db->insert('custom_cupom',$data);

        return $result;
    }

    public function editar_cupom($id, $data)
    {
        $this->db->where('cupom_id',$id);
        $result = $this->db->update('custom_cupom',$data);
        return $result;
    }    

    public function delete_cupom($id)
    {
        $data['delete'] = true;

        $this->db->where('cupom_id',$id);
        $result = $this->db->update('custom_cupom',$data);
        return $result;
    }

    public function get_payment()
    {   
        $query = $this->db->query("SELECT * FROM `pagamento` ORDER BY `date` DESC");
        $result = $query->result_array();
        return $result;                  
    }
    
    public function get_signature()
    {   
        $query = $this->db->query("SELECT `id`, `fullname`,`service_provider`.`status`,`status_pay`,`start`,`end` FROM `service_provider` INNER JOIN `members` ON USERID = fk_members_service ORDER BY `id` DESC");
        $result = $query->result_array();
        return $result;                  
    }    

}
?>
