<?php
class Home extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    function index()
    {
        $data = array(
            'focus'=> 'home'
        );
        $this -> load -> view('homepage', $data);
    }
}
?>
