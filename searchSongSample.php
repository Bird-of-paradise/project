<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">
    <title>Search  Songs</title>
  </head>
  <body>
    <h3>Search  for a song</h3>
    <p>You  may search either by artist or song title</p>
    <form  method="post" action="searchSong.php?go"  id="searchform">
  <input  type="text" name="song">
      <input  type="submit" name="submit" value="Search">
    </form>
    <?php
        if( isset($_POST['submit']) ){
        if(isset($_GET['go'])){
            $song = htmlentities($_POST['song']);
            $db = mysql_connect("servername",  "<username>", "<password>") or die ('I cannot connect  to the database because: ' . mysql_error());
            $mydb = mysql_select_db("album");
            $sql = "SELECT ID, Artist, Title FROM Music WHERE Artist LIKE '%" . $song . "%' OR Title LIKE '%" . $song  ."%'";
            $result = mysql_query($sql);
            while($row = mysql_fetch_array($result)){
              $Artist = $row['Artist'];
	          $Title = $row['Title'];
	          $ID = $row['ID'];

	  //-display the result of the array
	    echo "<ul>\n";
	    echo "<li>" . "<a  href=\"searchSong.php?id=$ID\">"   .$Artist . " " . $Title .  "</a></li>\n";
	    echo "</ul>";
            }

        } else{
            echo "<p>Please enter a search query</p>";
        }
        }
    ?>
  </body>
</html>