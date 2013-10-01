
<div class ='container' id='tbox1'/>
<?php
echo $this -> log -> show_messages();
echo form_open('login/index/send');
?>
<table> 
    <tr>
        <td>email: </td>
        <td><input type='text' name='email' /></td>
    </tr>
    <tr>
        <td>password: </td>
        <td><input type='password' name='password'/></td>
    </tr>
</table>
<input type='submit' value='Inloggen' class='button'/>
</form>
</div>