<?php
include 'class.crud.php';
$accounts = new Accounts();

if(!empty($_POST['account'])){
$account = $_POST['account'];
$agency = $_POST['agency'];
$password = $_POST['password'];

$accounts->login($account,$agency,$password);

header('Location: index.php');
    exit;
}else{
    header('Location: login.php');
    exit;
}
