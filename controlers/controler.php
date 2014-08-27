<?php
define('DEFAULT_MODEL', 'models/allAlbums.php');
define('DEFAULT_VIEW', 'views/allAlbums.php');

//Guest requests processing
if (isset($_REQUEST['action_guest'])) {

    $request = $_REQUEST['action_guest'];

    switch ($request) {

        case 'Log in':
            $model = 'models/login.php';
            $view = DEFAULT_VIEW;
            break;

        case 'Registration':
            $model = 'models/registration.php';
            $view = DEFAULT_VIEW;
            break;

        default:
            $view = DEFAULT_VIEW;
            $model = DEFAULT_MODEL;
    }

    require_once $model;
    $model = DEFAULT_MODEL;

} else if (isset($_REQUEST['action_user'])) {
//User requests processing

    $request = $_REQUEST['action_user'];

    switch ($request) {

        //Show Add Album Form
        case '1':
            $model = null;
            $view = 'views/addAlbumForm.php';
            break;

        //Add Album
        case 'Add Album':
            $model = 'models/addAlbum.php';
            $model2 = DEFAULT_MODEL;
            $view = DEFAULT_VIEW;
            break;

        // Open album
        case '2':
            $model = 'models/openAlbum.php';
            $view = 'views/showSongs.php';
            break;

		//Show Add Song Form
		case '3':
			$model = null;
			$view = 'views/addSongForm.php';
			break;
			
		case 'Add Song':
			$model = 'models/addSong.php';
            $model2 = 'models/openAlbum.php';
            $view = 'views/showSongs.php';
            break;
			
		case '4':
			$model = null;
			$view = 'views/editAlbumForm.php';
			break;
			
		case 'Edit Album':
			$model = 'models/editAlbum.php';
			$view = DEFAULT_VIEW;
			break;
			
		case '5':
			$model = null;
			$view = 'views/editSongForm.php';
			break;
			
		case 'Edit Song':
			$model = 'models/editSong.php';
			$view = DEFAULT_VIEW;
			break;
			
		case '6':
			$model = 'models/removeSong.php';
			$view = DEFAULT_VIEW;
			break;

        //Show Add Comment Form
        case '8':
            $model = null;
            $view = 'views/addCommentForm.php';
            break;

        //Show all Comment
        case '9':
            $model = 'models/getComments.php';
            $view = 'views/viewComments.php';
            break;

        // Add Comment in DB
        case 'Send':
            $model = 'models/addComment.php';
            $view = DEFAULT_VIEW;
            break;

        //remove song
		case '7':
			$model = 'models/removeAlbum.php';
			$view = DEFAULT_VIEW;
			break;
			
		case 'Download Song':
			$model = 'models/downloadSong.php';
			$view = 'models/downloadSong.php';
			break;
	
        case 'log out':
            unset($_SESSION['user']);
            break;

        case 'about':
            $model = null;
            $view = 'views/about.php';
            break;

        case 'plus':
            $model = 'models/rankPlus.php';
            $view = 'views/allAlbums.php';
            break;
        case 'minus':
            $model = rankMinus;
            $view = 'views/allAlbums.php';
            break;

        default:
            $view = DEFAULT_VIEW;
            $model = DEFAULT_MODEL;
    }


} else if (isset($_SESSION['current_model'])) {
//No action_user or action_guest

    $model = $_SESSION['current_model'];
    $view = $_SESSION['current_view'];
} else {

    $view = DEFAULT_VIEW;
    $model = DEFAULT_MODEL;
}

//check for user log in
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
} else {
    $user = $_SESSION['user'];
}

$_SESSION['current_model'] = $model;
$_SESSION['current_view'] = $view;


//execute current model
if(isset($model)){
    require_once $model;
}

if(isset($model2)){
    require_once $model2;
}




