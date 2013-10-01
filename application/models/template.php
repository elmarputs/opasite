<?php

class Template extends CI_Model
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    function load($template = false, $view = false, $view_data = false, $template_data = false)
    {
        $container = $this -> load -> view($view, $view_data, true);
        $template_data['contents'] = $container;
       
        $this -> load -> view($template, $template_data);
    }
    
}
?>
