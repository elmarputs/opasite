<?php

class test extends CI_Controller
{
     function __construct()
    {
       
        parent::__construct();
        
        
    }
    
    function send()
    {
        $this -> load -> model('OPA_Email', 'mail');
        $this -> mail -> send_mail('hoi', 'test');
    }
    
    function addlog()
    {
         $this -> load -> model('log');
        $this -> log -> add_message( 'test' );
       
            
    
    }
    
    function showlog()
    {
         $this -> load -> model('log');
         $this -> log -> show_messages();
    }
    
    function add_user()
    {
        $this -> load -> model('users');
        $data = array(
          'name'            => 'Joris',
          'email'           => 'geertzondermail@gmail.com',
          'password'        => md5('test'),
          'student_number'  => '7881',
          'level'           => '42'
        );
        $this -> users -> add_user( $data );
        $this -> log -> show_messages();
    }
    
    function login()
    {
        $this -> load -> model('users');
        $data = array(
          'email'       => 'geertzondermail@gmail.com',
          'password'    => 'test'
        );
        
        $this -> users -> log_in( $data );
        
        $this -> log -> show_messages();
        echo $this -> session -> userdata('id');
    }
}

?>
