<?php
session_start();
include 'class.crud.php';
$accounts = new Accounts();
$pdo = $accounts->pdo;



if (isset($_SESSION['bank']) && !empty($_SESSION['bank'])) {
  $id = $_SESSION['bank'];
  $sql = $pdo->prepare("SELECT * FROM contas WHERE id = :id");

  $sql->bindValue(':id', $id);
  $sql->execute();
} else {
  header("Location: login.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>index da conta</h1>
</body>

</html>