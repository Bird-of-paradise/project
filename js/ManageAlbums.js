function removeAlbum(id) {
	if(confirm("Are you sure you want to delete the current album?")) {
		document.location = "?action_user=7&id_album="  + id;
	}
}
