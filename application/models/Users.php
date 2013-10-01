<?php

class users extends CI_Model
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    function add_user( $user_data = false )
    {
        if(!$user_data)
        {
            $this -> log -> add_message('geen data');
            return false;
        }
        
        $param_names = array(
          'name',
          'email',
          'password',
          
        );
        
        if(!$this -> check_params($user_data, $param_names)) echo 'niet alle velden zijn ingevuld';
        
        if($this -> get_user_by_email( $user_data['email'] ))
        {
            $this -> log -> add_message('email adres al geregistreerd.');
            return false;
        }
        
        if(!$this ->db -> insert('users', $user_data))
        {
            $this -> log -> add_message('kon geen verbinding maken met database.');
            return false;
        }
        
        return true;
    }
    
    function get_user_by_email( $user_email = false)
    {
        if(!$user_email)
        {
            $this -> log -> add_message('geen gebruiker opgegeven');
            return false;
        }
        
        $this -> db -> where( 'email', $user_email );
        $user = $this -> db -> get('users');
        
        if(!$user -> num_rows())
        {
            return false;
        }
        return $user -> row();
    }
    
    function get_user_by_id( $user_id = false )
    {
        
         if(!$user_id)
        {
            $this -> log -> add_message('geen gebruiker opgegeven');
            
            return false;
        }
        
        $this -> db -> where( 'id', $user_id );
        $user = $this -> db -> get('users');
        
        
        if(!$user -> num_rows())
        {
            $this -> log -> add_message('gebruiker niet gevonden');
            return false;
        }
        
        return $user -> row();
    }
    
    function delete_user()
    {
        
    }
    
    function acces( $level = 1, $log = true )
    {
        
        $user_id = $this -> session -> userdata('id');
        
        if(!$user_id)
        {
            return false;
        }
        
        
        $user = $this -> get_user_by_id( $user_id );
        if(!$user)
        {
            if($log) $this -> log -> add_message('forbidden');
            return false;
        }
        
        
        
        if($user -> level < $level)
        {
            if($log) $this -> log -> add_message('forbidden');
            return false;
        }
        
        return true;
    }
    
    function update_user()
    {
    
        
    }
    
    function log_in( $data = false )
    {
        if(!$data)
        {
            $this -> log -> add_message('niet alle velden zijn ingevuld.');
            return false;
        }
        
        $param_names = array(
            'email',
            'password'
        );
        
        if(!$this -> check_params($data, $param_names))
        {
            $this -> log -> add_message('niet alle velden zijn ingevuld');
            return false;
        }
        
        $this -> db -> where('email', $data['email']);
        $this -> db -> where('password', md5($data['password']));
        $result = $this -> db -> get('users');
        
        if(!$result -> num_rows())
        {
            $this -> log -> add_message('gebruikersnaam of wachtwoord incorrect');
            return false;
        }
        
        $user = $result -> row();
        $session_data = array(
          'id'       =>  $user -> id,
          'name'     =>  $user -> name
        );
        
        
        $this -> session -> set_userdata($session_data);
        return true;
    }
    
    function log_out()
    {
        $session_data = array(
          'id' => '',
          'name' => ''
        );
        
        $this -> session -> unset_userdata( $session_data );
    }
    
    function check_params( $params, $paramnames)
    {
        foreach($paramnames as $param)
        {
            if(!isset($params[$param])) return false;
        }
        return true;
    }
}
?>
