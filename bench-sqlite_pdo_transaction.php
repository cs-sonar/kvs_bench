<?php
include("config.php");
$time_start = microtime( true );

// 接続
$db = new PDO('sqlite:'.SQLITE_DB);

// セット(トランザクション)
$db->beginTransaction();
for ($i = 1; $i <= 10000; $i++) {
	$stmt = $db->query("INSERT INTO `demo` (`key`, `value`) VALUES ('key".$i."', '".$i."')");
}
$db->commit();
$time_set = microtime(true);

// ランダムに10000個の値を取得
for ($i = 1; $i <= 10000; $i++) {
        $stmt = $db->prepare("SELECT `key` FROM `demo` WHERE `key` = 'key" .rand(1, 10000)."'");
        $stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
}
$time_end = microtime(true);

//お掃除
$stmt = $db->prepare('DELETE FROM `demo`');
$stmt->execute();

// 時間
include('./inc/printTime.php');
