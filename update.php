<?php

//1. POSTデータ取得
$company_name = $_POST['company_name'];
$capital = $_POST['capital'];
$industry = $_POST['industry'];
$email = $_POST['email'];
$password = $_POST['password'];
$id = $_POST['id'];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE users
SET company_name =:company_name,capital=:capital,industry=:industry,email=:email,password= :password WHERE id =:id;');
$stmt->bindValue(':company_name', $company_name, PDO::PARAM_STR);
$stmt->bindValue(':capital', $capital, PDO::PARAM_INT);
$stmt->bindValue(':industry', $industry, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: datail.php');
    exit();
}

?>

