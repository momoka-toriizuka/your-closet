# Your Closet
家庭にある洋服の管理と、毎日のコーディネートを考えるサポートをするためのアプリです。  

## 機能

・洋服とタグを登録することが出来ます。  
・タグに複数の洋服を登録することで、洋服を分類することが出来ます。  
・逆に一つの洋服に複数のタグを登録することもできるので、その洋服の系統を確認してコーディネートのヒントとすることも可能です。  
・洋服の写真をタップすると、洋服の名前・タグをご確認いただけます。  

## 使用方法

### web上で使用する場合

1．下記のURLからアクセスしてください。
https://momoka-webapp.net/
2．テストアカウントでログインし、お試しください。

### インストールしてローカルで使用する場合

1．xampp（Macの方はMAMP）をインストールしてください。  
2．このyour_closetをxampp（MAMP)のhtdocsの中にダウンロードしてください。  
3．composerをインストールし、laravelの環境構築をしてください。  
4．MySQL Workbenchをインストールしてください。インストールしていただくと、GUI操作が行えるようになるため、MySQLを使いやすくなります。  
5．your_closet内にある.envのDB_NAMEにデータベースの名前を入力し、MySQL内にも同じ名前のデータベースを作成してください。  
6．ターミナルでphp artisan migrateを実行し、データベースにテーブルを作成してください。  
7．ターミナルでphp artisan serveを実行し、テストアカウントでログインしてお試しください。  

## テスト用アカウント

メールアドレス：test@gmail.com  
パスワード：testtest  

## 環境

言語：PHP7.4.29   
フレームワーク：Laravel8.83.15  
パッケージ管理：composer2.3.5  
OS：Windows10  
インフラ：AWS  

## 注意点

洋服データを編集する際は、画像を変更しない場合も画像ファイルをアップロードしていただく仕様になっています。  