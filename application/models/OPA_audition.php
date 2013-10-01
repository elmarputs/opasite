<?php

class OPA_audition extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    function available_audition()
    {
        $this -> db -> where('name', 'steunzool_auditie');
        $this -> db -> or_where('name', 'artiest_auditie');
        $result = $this -> db -> get('settings');
        
        $audition = array(
          'audition_count' => 0  
        );
        foreach($result -> result() as $row)
        {
            if($row -> active)
            {
                $audition['audition_count']++;
                $audition[$audition['audition_count']]['name'] = $row -> name;
                $audition[$audition['audition_count']]['text'] = $row -> text;
            }
        }
        
        return $audition;       
    }
    
    function get_audition_by_name( $audition_name )
    {
        $this -> db -> where('name', $audition_name);
        $result = $this -> db -> get('settings');
        
        return $result -> row();
    }
    
    function add_audition( $data )
    {
        $parameters = array(
          'name',
          'email',
          'leerlingnummer',
          'klas',
          'ervaring',
          'motivatie',
          'name_audition'
        );
        if(!$this -> check_params($data, $parameters))
        {
            $this -> log -> add_message('niet alle velden zijn ingevuld');
            return false;
        }
        
        $this -> load -> helper('email');
        if(!valid_email($data['email']))
        {
            $this -> log -> add_message('geen geldig email adres');
            return false;
        }
        
        if(strlen($data['ervaring'])>4094)
        {
            $this -> log -> add_message('ervaring te groot.');
            return false;
        }
        
        if( strlen($data['motivatie']) > 4094 )
        {
            $this -> log -> add_message('motivatie te groot');
            return false;
        }
        if(!$this -> db -> insert('audition', $data)) return false;
        
        return true;
    }
    
    function get_auditions( $page = 0 )
    {
        $this -> db -> select('name, klas, leerlingnummer, email, name_audition');
        $result = $this -> db -> get('audition', 10, $page*10);
        
        if(!$result -> num_rows())
        {
            $this -> log -> add_message('geen audities gevonden');
            return false;
        }
        
        return $result -> result();
    }
    
    function count_auditions()
    {
        return $this -> db -> count_all_results('audition');
        
    }
    
    function check_params( $params, $paramnames)
    {
        foreach($paramnames as $param)
        {
            if(!isset($params[$param]) || empty($params[$param])) return false;
        }
        return true;
    }
    
}
?>
