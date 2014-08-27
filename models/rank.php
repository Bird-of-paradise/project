<?php
require_once 'php/dbFunction.php';
$id = $_POST['id_album'];
$id = str_replace('/', '', $id);
ranking($id, $_POST['action_user']);
