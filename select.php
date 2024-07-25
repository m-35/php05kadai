<?php
require_once('funcs.php');

//２．データ取得SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM users;');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    sql_error($stmt);
    // $error = $stmt->errorInfo();
    // exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。
        // 更新用
        $view .= '<p>';
        // $view .= '<a href="detail.php?id='. $result['id'] . '">';
        $view .= "【会社名】 ".$result['company_name'] . '   ' ;
        $view .= "【資本金】 ".$result['capital']."万円".'   ' ;
        $view .= "【業  種】 ".$result['industry']. '   ' ;
        // $view .= "【投稿者】 ".$result['uploader']. '   ' ;        
        $view .= "【email】 ". $result['email']. '   ' ;
        $view .= '</a>';
        // 削除用
        // $view .= '<a href="delete.php?id='. $result['id'] . '">';
        // $view .='[削除]';
        $view .='</a>';

        $view .='</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>アカウント情報表示一覧</title>
<link href="css/styles.css" rel="stylesheet">
<style>
div{
  padding: 10px;
  font-size:18px;
  width: 900px; /* borderとpaddingをwidthに含める */
  box-sizing: border-box; /* CSS3, IE8~, Opera8~ */
  }
</style>
</head>

<body id="main">
<!-- Head[Start] -->
<header>
    <div class="header-left">
            <img src="img/logo3.png" alt="ロゴ">
        </div>
        <nav>
            <a href="index.php" class="btn">トップページ</a>
        </nav>
</header>
<!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="detail.php"></a>
            <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->
</body>

</html>