<?php

class Accounts
{
    public $pdo;

    

    public function __construct()
    {
        try {

            $this->pdo = new PDO("mysql:dbname=bankxl;host=localhost", "root", "");
            
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function login($account, $agency, $password)
    {

        $sql = $this->pdo->prepare("SELECT * FROM accounts WHERE account = :account AND agency = :agency AND password = :password");

        $sql->bindValue(":account", addslashes($account));
        $sql->bindValue(":agency", addslashes($agency));
        $sql->bindValue(":password", md5($password));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $_SESSION['bank'] = $sql['id'];
            header("Location: index.php");
            exit;
        } else {
            header("Location: login.php");
            exit;
        }
    }
}
