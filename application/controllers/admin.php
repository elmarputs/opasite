<?php

class Admin extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        if(!$this -> users -> acces(10))
        {
            redirect('home/index');
        }
    }
    
    function index()
    {
        $data_template = array(
            'focus'=> 'inloggen'
        );
        echo 'hoi';
        //$this -> template -> load('article', 'admin_panel', '', $data_template);
    }
}
?>
