<div class='container' id='tbox1'>
    
<?php
echo '<strong>';
echo $this -> log -> show_messages();
echo '</strong>';
echo $text."<br />";
echo form_open("audition/do_audition/$name_audition/send");
?>
<br />
Naam:<br /> 
<input type='text' name='name' <?php if(isset($name)) echo 'value="'.$name.'"'?>/><br />
email adres:<br />
<input type='text' name='email' <?php if(isset($email)) echo 'value="'.$email.'"'?>/><br />
Leerlingnummer:<br /> 
<input type='text' name='leerlingnummer' <?php if(isset($leerlingnummer)) echo 'value="'.$leerlingnummer.'"'?>/><br />
Klas: <br />
<input type='text' name='klas' <?php if(isset($klas)) echo 'value="'.$klas.'"'?>/><br />
ervaringen: <br />
<textarea name='ervaring' cols='40' rows='5' ><?php if(isset($ervaring)) echo $ervaring ?></textarea><br />
Motivatie: <br />
<textarea name='motivatie' cols='40' rows='5' ><?php if(isset($motivatie)) echo $motivatie ?></textarea><br />
<input type='submit' value='verzend' class="button"/>
</form>
</div>

<div class='container' id='sidebar'>
<img src='<?php echo base_url()?>style/images/robot.jpg' width='576' height='384'/>
</div>
