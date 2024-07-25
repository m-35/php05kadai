<?php
session_start();
include('funcs.php');

loginCheck();

$pdo = db_conn();

// ユーザー情報（会社名）を取得
$stmt = $pdo->prepare("SELECT company_name FROM users WHERE id = :user_id");
$stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// セッションに会社名がない場合はデータベースから取得した会社名を使用
if (!isset($_SESSION['company_name']) && $user) {
    $_SESSION['company_name'] = $user['company_name'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $company_name = $_SESSION['company_name'] ?? '会社名なし'; // セッションから会社名を取得
    $uploader_name = $_POST['uploader_name']; // フォームから投稿者名を取得
    $comments = $_POST['comments'];
    $video_path = $_FILES['video']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($video_path);

    $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $maxFileSize = 50 * 1024 * 1024; // 50MB

    if ($_FILES["video"]["size"] > $maxFileSize) {
        $error = "ファイルサイズが大きすぎます。50MB以下にしてください。";
    } elseif($videoFileType != "mp4" && $videoFileType != "avi" && $videoFileType != "mov") {
        $error = "申し訳ありませんが、MP4、AVI、MOV形式のファイルのみアップロード可能です。";
    } elseif (move_uploaded_file($_FILES['video']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO videos (company_name, video_path, uploader, uploader_name, comments, created_at)
                VALUES (:company_name, :video_path, :uploader, :uploader_name, :comments, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':company_name', $company_name, PDO::PARAM_STR);
        $stmt->bindValue(':uploader', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->bindValue(':uploader_name', $uploader_name, PDO::PARAM_STR);
        $stmt->bindValue(':video_path', $video_path, PDO::PARAM_STR);
        $stmt->bindValue(':comments', $comments, PDO::PARAM_STR);
      
        if ($stmt->execute()) {
            $_SESSION['success'] = '動画が正常にアップロードされました。';
            redirect('my_videos.php');
        } else {
            $error = "データベースへの登録に失敗しました。";
        }
    } else {
        $error = "動画のアップロードに失敗しました。";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>動画アップロード - ブースト</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
    <img src="img/logo3.png" alt="ロゴ">
        <nav>
            <a href="index.php" class="btn">トップページ</a>
            <a href="my_videos.php" class="btn">投稿履歴</a>
        </nav>
    </header>
    <main>
        <h2>動画を投稿する</h2>
        <?php if (isset($error)) echo "<p class='error'>" . h($error) . "</p>"; ?>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="company_name">会社名:</label>
            <input type="text" name="company_name" value="<?php echo h($_SESSION['company_name'] ?? ''); ?>" readonly><br>
            <label for="uploader_name">投稿者名:</label>
            <input type="text" name="uploader_name" required><br>
            <label for="comments">コメント:</label>
            <textarea name="comments" maxlength="200"></textarea><br>
            <label for="video">動画:</label>
            <input type="file" name="video" accept="video/*" required><br>
            <button type="submit">アップロード</button>
        </form>
    </main>
</body>
</html>