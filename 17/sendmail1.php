<?php
require_once dirname(__FILE__) . '/vendor/autoload.php';

// 送信元(GmailのSMTPサーバ)の設定
$transport = new Swift_SmtpTransport(
  'smtp.gmail.com', 587, 'tls'
);
// 差出人の認証に使用する資格情報(SMTP Credentials)を指定
$transport->setUsername('tennis6293@gmail.com');
// Googleのアプリパスワードを添付
$transport->setPassword('xqwx owqn ipzf izkk');
// サーバリソースを設定したメール送信のインスタンスを生成
$mailer = new Swift_Mailer($transport);

// メールメッセージの作成
$message = new Swift_Message('タイトル');
$message->setBody('本文です');
// メールの差出人
$message->setFrom(['tennis6293@gmail.com']);
// メールの送信先
$message->setTo(['tennis6293@gmail.com']);

// メール送信(成功時1失敗時0が返る)
echo $mailer->send($message);