<div class='container' id='tbox1'>
<?php
echo $this -> log -> show_messages();
echo "ingelogd als: ".$user_name."<br />";
echo anchor('login/logout/send', 'uitloggen', 'class="button"');
?>
 </div>

<div class="container" id="tbox2">
    <?php
        if($admin)
        {
            echo "ga naar admin panel.";
            echo anchor('admin/index', 'admin panel', 'class="button"');
        }
    ?>
</div>