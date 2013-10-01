<?php
class Logged extends CI_Controller
{
        public function __construct()
        {
            parent::__construct();
            $this -> load -> model('opa_audition', 'audition');
        }
    
        function auditions( $page = 0 )
        {
              $data = array(
              'focus'=> 'audities'
              );
              
              $count = $this -> audition -> count_auditions();
              $more = 0;
              $less = 0;
              
              if($count > 10*$page+10)
              {
                  $more = 1;
              }
              if($page > 0)
              {
                  $less = 1;
              }
              $result = $this -> audition -> get_auditions( $page );
              
              $data_page = array(
                  'auditions'   => $result,
                  'more'        => $more,
                  'less'        => $less,
                  'page'        => $page
               );
              $this -> template -> load('article', 'audition_view', $data_page, $data);
        
        }
}
?>
