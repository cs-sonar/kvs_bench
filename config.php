<?php

/*
 * global setting
 */

define("SERVER", "localhost");
define("LOOP_NUM", 1000);

/*
 * memcache setting
 */

define("MEMCACHE_PORT", "11211");

/*
 * mysql setting
 */

define("MYSQL_PORT", "3306");
define("MYSQL_USER", "demo");
define("MYSQL_PASSWORD", "123123");
define("MYSQL_DB", "demo_bench");

/*
 * redis setting
 */

define("REDIS_PORT", "6379");

/*
 * sqlite setting
 */

define("SQLITE_DB", "bench.db");

/*
 * function
 */

function validate_setnum($row)
{
    if($row != LOOP_NUM){
        return "set error. This program try set ".LOOP_NUM." keys. But " .$row. " of keys in DB. \n";
    }else{
        return "set done. (".$row." keys) \n";
    }
}
