<?php

class OPA_Email extends CI_Model
{
    function __construct()
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'opaschondeln@gmail.com',
            'smtp_pass' => 'organisatie42',
            'mailtype' => 'html'
        );
        $this -> load -> library('email', $config);
        $this->email->set_newline("\r\n");
        parent::__construct();
    }
    
    function send_mail( $subject, $message)
    {
        
        $this -> email -> from('geertzondermail@gmail.com','opa');
        $this -> email -> to('joris.h.j@gmail.com');
        $this -> email -> subject($subject);
        $this -> email -> message($message);	

        
        if(!$this->email->send())
        {
            
        }
        die();
    
         
     }
         
}

?>
