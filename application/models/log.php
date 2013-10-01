<?php

class Log extends CI_Model
{
      var $session_name = 'OPA_log';
      
      function __construct()
      {
        parent::__construct();
      }
      
      function add_message( $message = false )
      {
          if(!$message)
          {
              return false;
          }
          
          $message_data = $this -> get_messages();
          $message_data[] = array(
            'data' => $message  
          );
          $this -> session -> set_userdata($this -> session_name, $message_data);
      }
      
      function show_messages()
      {
          $messages = $this -> get_messages();
          if( !$messages ) return false;
          
          foreach($messages as $message)
          {
              echo $message['data'].'<br />';
          }
          $this -> session -> unset_userdata($this -> session_name);
      }
      
      function get_messages()
      {
          $message = $this -> session -> userdata($this -> session_name);
          return $message;
      }
      
      
    
}
?>
