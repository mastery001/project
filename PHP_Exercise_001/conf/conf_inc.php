<?php

/**
 * 	@Description:
  
 @author: master

 @time: 2015-6-18
 */

define("DB_HOST" , 'localhost');
define("DB_USER" , 'root');
define("DB_PWD" , 'root');
define("DB_NAME" , 'messageboard');
define("DB_CONFIG",'utf-8');
$link = @mysql_connect(DB_HOST , DB_USER , DB_PWD) or die("数据库连接错误！");
if($link) {
	mysql_select_db(DB_NAME);
	mysql_query("set names DB_CONFIG");
}else {
	die(mysql_error());
}