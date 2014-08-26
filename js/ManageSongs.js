
	function editSong(id) {
		document.location = "?action_user=5&id_song=" + id;
	}
	
	function removeSong(id, songName, fileName) {
		if(confirm("Are you sure you want to delete " + songName + "?")) {
			document.location = "?action_user=6&id_song=" + id + "&file_name=" + fileName;
		}
	}
