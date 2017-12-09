<?php
require_once(__DIR__."/../conf/master_conf.php");

function conectDatabase(){
  // DB接続
  $con = mysql_connect(DB_HOST, DB_USER, DB_PASS);
  // 使用するDB名の指定
  mysql_select_db(DB_NAME);
}
?>
