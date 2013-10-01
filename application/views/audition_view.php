<div class="tablecontainer" id="article">
    <?php
        echo $this -> log -> show_messages();
    ?>
<table id="auditions">
    <tr>
        <th>naam</th>
        <th>klas</th>
        <th>leerlingnummer</th>
        <th>email adres</th>
        <th>type auditie</th>
    </tr>
<?php
if( isset($auditions) && !empty($auditions))
{
foreach($auditions as $audition)
{
    echo "<tr>";
        echo "<td>".$audition -> name."</td>";
        echo "<td>".$audition -> klas."</td>";
        echo "<td>".$audition -> leerlingnummer."</td>";
        echo "<td>".$audition -> email."</td>";
        echo "<td>".explode("_", $audition -> name_audition)[0]."</td>";
    echo "</tr>";
}
}


?>
</table>
<?php
   $nextpage = $page+1;
   $lastpage = $page-1;
   if( $less ) echo anchor("logged/auditions/$lastpage", 'vorige', 'class="button"');
   if( $more ) echo anchor("logged/auditions/$nextpage", 'volgende', 'class="button"');
?>
</div>