<?php

class Audition extends CI_Controller
{
    public function __construct()
    {
        
        parent::__construct();
        $this -> load -> model('opa_audition', 'audition');
        if($this -> users -> acces(5))
        {
            redirect('logged/auditions');
        }
    }
    
    function index()
    {
        $audition_info = $this -> audition -> available_audition();
        $data = array(
            'focus'=> 'audities'
        );
        
        $audition_view = 'dual_audition';
        
        switch ($audition_info['audition_count']) {
            case 0:
                echo 'geen audities';
            break;
            case 1:
               $this -> do_audition( $audition_info[1]['name'] );
                return false;
            break;
            case 2:
                $audition_view = 'dual_audition';
            break;
        }
        
        
        $this -> template -> load('article', $audition_view, '', $data);
           
    }
    
    function do_audition( $audition_name = false, $send = false )
    {
        
        $audition_info = $this -> audition -> get_audition_by_name( $audition_name );
        if(!$audition_info -> active)
        {
            redirect('audition/index');
        }
        
        $audition_data = array(
            'name_audition' => $audition_info -> name,
            'text' => $audition_info -> text
        );
        
         $data = array(
            'focus'=> 'audities'
        );
         
        if($send)
        {
            $post_data = $this->input->post();
            $post_data['name_audition']  = $audition_info -> name;
            if(!$this -> audition -> add_audition($post_data))
            {
                $post_data['text']           = $audition_info -> text;
                
                $this -> template -> load('article', 'audition', $post_data, $data);
                return false;
            }
            
             $this -> template -> load('article', 'audition_complete', '', $data);
            
        }
        
         $this -> template -> load('article', 'audition', $audition_data, $data);
    }
    
    
}

?>
