<?php
session_start();
include 'funcs.php';
loginCheck();
$pdo = db_conn();

// 動画一覧を取得するクエリ（投稿者名を含む）
$stmt = $pdo->prepare("SELECT videos.*, users.company_name FROM videos JOIN users ON videos.uploader = users.id WHERE videos.uploader = :user_id ORDER BY videos.created_at DESC");
$stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
$stmt->execute();
$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイ投稿 - ブースト</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="header-left">
            <img src="img/logo3.png" alt="ロゴ">
        </div>
        <nav>
            <a href="index.php" class="btn">トップページ</a>
            <a href="upload_video.php" class="btn">新規投稿</a>
            <a href="account_settings.php" class="btn">アカウント情報の編集</a>
        </nav>
    </header>
    <main>
        <h2>あなたの会社の投稿履歴</h2>
        <?php if (isset($_SESSION['success'])): ?>
            <p class="success"><?php echo h($_SESSION['success']); unset($_SESSION['success']); ?></p>
        <?php endif; ?>
        <div class="video-container">
            <?php if (!empty($videos)): ?>
                <?php foreach ($videos as $video): ?>
                    <div class="video-item">
                        <video src="uploads/<?php echo h($video['video_path']); ?>" controls loop playsinline></video>
                        <div class="video-info">
                            <p>会社名: <?php echo h($video['company_name']); ?></p>
                            <p>投稿者: <?php echo h($video['uploader_name']); ?></p>
                            <p>コメント: <?php echo h($video['comments']); ?></p>
                            <p>投稿日: <?php echo date('Y年m月d日 H:i', strtotime($video['created_at'])); ?></p>
                            <a href="edit_video.php?id=<?php echo h($video['id']); ?>" class="btn">編集</a>
                            <a href="delete_video.php?id=<?php echo h($video['id']); ?>" class="btn" onclick="return confirm('本当に削除しますか？');">削除</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>投稿された動画はありません。</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>