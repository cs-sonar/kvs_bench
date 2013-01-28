<?php
include("config.php");
$time_start = microtime( true );

// 接続
$conn = mysql_connect(SERVER, MYSQL_USER, MYSQL_PASSWORD);
mysql_select_db(MYSQL_DB,$conn);

// セット
for ($i = 1; $i <= LOOP_NUM; $i++) {
	$result = mysql_query("INSERT INTO `demo` (`key`, `value`) VALUES ('key".$i."', '".$i."')", $conn);
}
$time_set = microtime(true);

// セット数の検証
$result = mysql_query("SELECT `key` FROM `demo`");
$row = mysql_num_rows($result);
echo validate_setnum($row);

// 取得
for ($i = 1; $i <= LOOP_NUM; $i++) {
	$result = mysql_query("SELECT `key` FROM `demo` WHERE `key` = 'key" .rand(1, LOOP_NUM)."'", $conn);
	$row = mysql_fetch_assoc($result);
}
$time_end = microtime(true);

// お掃除
$result = mysql_query("TRUNCATE TABLE  `demo`", $conn);

// 結果
include("inc/printTime.php");
