<?php
include("config.php");

$time_start = microtime( true );

// 接続
$mongo = new Mongo();
$db = $mongo->selectDB("bench");
$col = $db->createCollection("demo");
$col = $db->selectCollection("demo");

// セット
for ($i = 1; $i <= LOOP_NUM; $i++) {
	$col->insert(array("key" => "key".$i , "value" => $i));
}
$time_set = microtime(true);

// 取得
for ($i = 1; $i <= LOOP_NUM; $i++) {
	$res = $col->findOne(array('key' => 'key'.rand(1, 10000).''));
	var_dump($res);
}
$time_end = microtime(true);

// お掃除
// $db->drop();

// 時間
include('./inc/printTime.php');

