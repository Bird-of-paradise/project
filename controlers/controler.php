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
            $view = DEFAULT_VIEW;
            break;

        // Open album
        case '2':
            $model = 'models/openAlbum.php';
            $view = 'views/showSongs.php';
            break;

        case 'log out':
            unset($_SESSION['user']);
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





