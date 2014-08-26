<ul class="graphic">
<?php for ($i = 0; $i < count($rows); $i++) :
?>
<tr>
    <li><a href="music\<?php echo($rows[$i]['file_name'])?>"><?php echo($rows[$i]['name'])?></a></li>
<?php endfor; ?>
</ul>









