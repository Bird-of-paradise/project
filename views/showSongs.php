<table border="1">
<?php for ($i = 0; $i < count($rows); $i++) :
?>
<tr>
    <td><span id="dummy"></span>
        <a href="#" ><img src="images/play_button.jpg" width="10" height="20" border="0" onclick="playSound('<?php echo($rows[$i]['file_name'])?>');" /></a>
    </td>
    <td><?= $rows[$i]['id']?></td>
    <td><?= $rows[$i]['name']?></td>
    <td><?= $rows[$i]['artist']?></td>
    <td><?= $rows[$i]['genre']?></td>
    <td><a href=<?="?action_user=5&id_song=" . $rows[$i]['id']?>>edit</a> / <a href=<?="?action_user=6&id_song=" . $rows[$i]['id']?>>remove</a></td>
</tr>
<?php endfor; ?>
</table>

<script language="javascript" type="text/javascript">
    function playSound(soundfile) {
        document.getElementById("dummy").innerHTML=
            "<embed src=\"music\\"+soundfile+"\" hidden=\"true\" autostart=\"true\" loop=\"false\" />";
    }
</script>







