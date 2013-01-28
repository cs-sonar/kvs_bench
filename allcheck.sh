#!/bin/sh

echo "------------------- memcached -------------------";
php bench-memcached.php
echo "------------------- mysql -------------------";
php bench-mysql.php
echo "------------------- mysql(pdo) -------------------";
php bench-mysql_pdo.php
echo "------------------- mysql(pdo,transaction) -------------------";
php bench-mysql_pdo_transaction.php
echo "---------------- redis(phpredis) -------------------";
php bench-redis_phpredis.php
echo "------------------- redis(phpredis,transaction) -------------------";
php bench-redis_phpredis_pipeline.php
echo "------------------- redis(predis) -------------------";
php bench-redis_predis.php
echo "------------------- sqlite(pdo) -------------------";
php bench-sqlite_pdo.php
echo "------------------- sqlite(pdo,transaction) -------------------";
php bench-sqlite_pdo_transaction.php
echo "------------------- mongodb -------------------";
php bench-mongodb.php

