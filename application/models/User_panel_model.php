<?php 
class User_panel_model extends CI_Model{
    
     public function policy_setting()
    {
        $query = $this->db->query("SELECT * FROM `policy_settings` WHERE `status` = 0 ;");
        $result = $query->result_array();
        return $result;                  
    }
    
    public function profile($user_id)
    {
        $query = $this->db->query("SELECT members.*,(SELECT `profession_name` FROM `profession` WHERE id = members.profession ) as profession_name FROM `members` WHERE `USERID` = $user_id AND `verified` = 0 AND `status` = 0 ;");
        $result = $query->row_array();
        return $result;          
    }
   
     public function country_list()
    {   
        $query = $this->db->query("SELECT * FROM `country` WHERE `country_status` = 1 ;");
        $result = $query->result_array();
        return $result;                  
    }
    
    public function check_username($username)
    {        
        $query = $this->db->query("SELECT * FROM `members` WHERE `username` = '$username';");
        $result = $query->num_rows();
        return $result;          
    }
    public function check_email($email)
    {        
        $query = $this->db->query("SELECT * FROM `members` WHERE `email` = '$email';");
 
        $result = $query->num_rows();
        return $result;          
    }   

    public function check_ong($user_id, $cnpj)
    {        
        $query = $this->db->query("SELECT * FROM `cadastro_ong` WHERE `ID_USUARIO` = '$user_id' or `CNPJ` = '$cnpj';");
 
        $result = $query->num_rows();
        return $result;          
    }   

    public function get_client_list()
    {
        $query = $this->db->query("SELECT * FROM `client` WHERE `status` = 0 ;");
        $result = $query->result_array();
        return $result;                  
    }
     public function categories()
    {
        $query = $this->db->query(" SELECT * FROM `categories` WHERE `status` = 0 AND parent = 0 AND delete_sts =0 ");
        $result = $query->result_array();
        return $result;        
    }
    public function categories_subcategories()
    {
        $query = $this->db->query(" SELECT * FROM `categories` WHERE `status` = 0 AND delete_sts =0 ");
        $result = $query->result_array();
        return $result;        
    }
    public function get_logo()
    {
        $query = $this->db->query("SELECT * FROM `system_settings` WHERE `key` = 'logo_front' ");
        $result = $query->row_array();
        return $result;                
    }
    public function get_slogan()
    {
        $query = $this->db->query("SELECT * FROM `system_settings` WHERE `key` = 'website_slogan' ");
        $result = $query->row_array();
        return $result;                
    }
    public function footer_main_menu()
    {
        $query = $this->db->query(" SELECT * FROM `footer_menu` WHERE `status` =  1 ");
        $result = $query->result_array();
        return $result;        
    }
    public function footer_sub_menu()
    {
        $query = $this->db->query(" SELECT * FROM `footer_submenu` WHERE `status` = 1  ");
        $result = $query->result_array();
        return $result;        
    }
    public function system_setting()    
    {
        $query = $this->db->query("SELECT * FROM `system_settings`");
        $result = $query->result_array();
        return $result;        
    }

    public function getTituloPost($uid)    
    {
        $query = $this->db->query("SELECT POST.title AS title  FROM sell_gigs AS POST  INNER JOIN sell_post_ong AS ONG ON ONG.id_sell_gigs = POST.id WHERE ong.id_cadastro_ong = $uid");
        $result = $query->result_array();
        return $result;        
    }


    public function verify_Ong($uid)    
    {
        $query = $this->db->query("SELECT ID AS ID_ONG FROM `cadastro_ong` WHERE `ID_USUARIO` = $uid");
        $result = $query->result_array();
        return $result;        
    }

    public function verify_Premium($uid)    
    {
        $query = $this->db->query("SELECT * FROM `service_provider` WHERE `fk_members_service` = $uid");
        $result = $query->result_array();
        return $result;        
    }

     public function get_user_data($id) {
		 $st= ("SELECT a.*,cu.country,cu.sortname,st.state_name 
			 FROM `members` a
			 left join country cu on cu.id = a.country
			 left join states st on st.state_id = a.state
			 where a.USERID = ".$id." ");
		
		$query = $this->db->query($st);							 
         if ($query->num_rows()) {
               return $query->row_array();
         }
         return false;
    }

    public function get_plan()  
    {        
        $query = $this->db->query("SELECT `title`, `description`, `price`  FROM contract_plans;");
        $result = $query->result_array();
        return $result;                  
    }
  
    public function tipoServico_ong()  
    {        
        $query = $this->db->query("SELECT `ID`, `DESCRICAO`  FROM tipoServico_ong;");
        $result = $query->result_array();
        return $result;                  
    }


    public function user_all_ong()
    {
        $query = $this->db->query("  SELECT sell_gigs.*,members.`fullname`, `members`.username, `members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` ,( SELECT gigs_image.`gig_image_medium` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , ( SELECT gigs_image.`gig_image_tile` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image_tile , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN sell_post_ong ON sell_post_ong.id_sell_gigs = sell_gigs.id
                    LEFT JOIN country ON members.`country` = country.id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
                    WHERE sell_gigs.user_id not in (select USERID from members where  status=1)  
					AND sell_gigs.status = 0 AND sell_gigs.id = sell_post_ong.id_sell_gigs
                    ORDER BY sell_gigs.id DESC ");
        $result =  $query->result_array();    
        return $result;
    }


   /*public function UpdateCurrentCuuencyRate(){
	   
	   $query  = $this->db->query("SELECT * FROM `currency` ORDER BY `created_date` DESC LIMIT 0 , 1 ;");
	   $result = $query->row_array();		 
	  
	if(!empty($result))
		{
			$last_inserted_date = date('Y-m-d',strtotime($result['created_date']));
			$current_date = date('Y-m-d');
			if($current_date!=$last_inserted_date)
			{
			$from   = 'USD'; 
			$to     = 'INR';
			$url    = 'http://finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s='. $from . $to .'=X';
			
			$handle = fopen($url, 'r');			
			if ($handle) 
			{
				$result = fgets($handle, 4096);
				fclose($handle);
			}			
			$allData 	 			= explode(',',$result); 
			$data['dollar_rate'] 	= $allData[1];
			$data['indian_rate']  	= (1 / $data['dollar_rate']);		
			$this->db->insert('currency',$data);	
			}
		}
		else
			{
				$from   = 'USD'; 
				$to     = 'INR';
				$url    = 'http://finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s='. $from . $to .'=X';
				$handle = fopen($url, 'r');			
				if ($handle) 
				{
					$result = fgets($handle, 4096);
					fclose($handle);
				}			
				$allData 	 			= explode(',',$result); 
				$data['dollar_rate'] 	= $allData[1];
				$data['indian_rate']  	= (1 / $data['dollar_rate']);		
				$this->db->insert('currency',$data);				
			}
   }  */
   
    
}
?>