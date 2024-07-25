# 課題① 課題番号-プロダクト名
- 課題番号：【再提出】PHP⑤課題アプリ（DB本番環境版）
- プロダクト名：スタートアップ企業広告動画配信サービスアプリの"種"
- キャッチフレーズ:「10月にはちゃんと咲きます🌸」

## ②課題内容（どんな作品か）
- ｢php05（画像アップロード、JOIN機能）｣講義後のファイルをトレースして、主に以下２点の機能を改善・追加した。
- ⑴画像（動画）アップロードの改善
- ⑵外部キーによるテーブル間の連携

## ③ DEMO
- https://drive.google.com/file/d/1pMqYtcw9D65EMiepGYAa0jZASaq45peY/view?usp=sharing
- ※ご注意：動画は完成時のイメージとしてtiktok動画をサンプル使用
- ※local接続時のDEMOです。約５分余あります。急に音が出ます。

## ④ 工夫した点・こだわった点
- ⑴目標としているtiktok風にして、縦スクロールで投稿動画一覧が視聴できるようにした。
- ⑵今まで講義で学んだ機能も少し変更しながらほぼ全部搭載した。
- ⑶前回果たせなかったバリデーション機能をつけた。

## ⑤ 難しかった点・今後トライしたいこと（又は機能）
- 【難しかった点】
- (1)投稿動画の表示
- 画面サイズをcssで調整できず、tiktokweb版の画面サイズを検証ツールで調べ大きさを指定した。しかしレスポンシブルではないので、多分このままではだめだと思う。早めに解決したい。
- (2)dbテーブルのリレーション
- アカウント情報（usersテーブル）と投稿内容（videosテーブル）を外部キーで関連付けてみた。
- しかし、投稿内容のうち投稿者名が 全部数字の「１」になったり、sqlエラーを繰り返した。
- AIに設定を-質問したが、質問の仕方を誤り、かえって設定を部分的に変更するはめになり、余計深く沼にはまった。遠い目になった。
- 今度の補習で、AIの適切な使い方を学びたい。

- 【卒制にむけて改良したい点・追加したい機能】
- (1)改良点
- i. 動画の再生を自動再生にする
- ⅱ. 動画の再生を自動再生にする
- ⅲ.bd設計を再構築してセキュリティ面を強化する
- (2)追加したい機能
- i. 投稿記事に追加
-   「いいね」「コメント」「DM」「マッチング」ボタン
- ⅱ.ユーザーページの追加機能
-  投稿履歴一覧だけでなく「リアクションリポート」（競合他社との
-  比較やグラフなど）」や投稿有効残日数（１年未満のスタートアッ
-  プ企業対象のサービスなので）のマッチング履歴情報も提供したい。
- ⅲ.その他ページ追加
-   ・企業マッチングページ
-   ・検索ページ
-   ・中小企業のためになる情報ページ
-   ・区民の生活お役立ちページ
-   ・登録企業の割引とかクーポンに特化したページ

## ⑥ 感想など
- 卒制のプロトタイプとしては貧弱だが巻き返せるようコツコツやる。

## 以上
