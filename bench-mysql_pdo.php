<?php
include("config.php");
$time_start = microtime( true );

// 接続
$db = new PDO('mysql:host='.SERVER.';dbname='.MYSQL_DB.';', MYSQL_USER, MYSQL_PASSWORD);

// セット
for ($i = 1; $i <= LOOP_NUM; $i++) {
	$stmt = $db->prepare("INSERT INTO `demo` (`key`, `value`) VALUES ('key".$i."', '".$i."')");
	$stmt->execute();
}
$time_set = microtime(true);

// セット数の検証
$stmt = $db->prepare("SELECT count(`key`) FROM `demo`");
$stmt->execute();
$row = $stmt->fetchColumn();
echo validate_setnum($row);

// 取得
for ($i = 1; $i <= LOOP_NUM; $i++) {
        $stmt = $db->prepare("SELECT `key` FROM `demo` WHERE `key` = 'key" .rand(1, LOOP_NUM)."'");
        $stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
}
$time_end = microtime(true);

// お掃除
$stmt = $db->prepare('TRUNCATE TABLE  `demo`');
$stmt->execute();

// 出力
include("inc/printTime.php");

