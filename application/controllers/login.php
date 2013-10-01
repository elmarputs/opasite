<?php

class Login extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    function index( $send = false )
    {
        if( $this -> users -> acces(5) )
        {
            redirect('login/logout');
        }
        $data = array(
            'focus'=> 'inloggen'
        );
        
        if($send)
        {
            $post_data = $this->input->post();
            $result = $this -> users -> log_in( $post_data );
            if($result)
            {
                redirect('home/index');
            }
        }
        
        $this -> template -> load('article', 'login_view', '', $data);
    }
    
    function logout( $send = false)
    {
        if(!$this -> users -> acces(5))
        {
            redirect('login/index');
        }
        
        $data_template = array(
            'focus'=> 'inloggen'
        );
        
        $data_page = array(
          'user_name'   => $this -> session-> userdata('name'),
          'admin'       => false
        );
        if($this -> users -> acces(10, false))
        {
            $data_page['admin'] = true;
        }
        if( $send )
        {
            $this -> users -> log_out();
            redirect('login/index');
        }
        $this -> template -> load('article', 'logout', $data_page, $data_template);
    }
}
?>
