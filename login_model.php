<?php
require_once("database_conf.php");

function getLoginData($id,$pass){
  $cn = conectDatabase();
  // DBに流すSQLを変数$sqlに代入
  $sql = "SELECT * FROM m_admin_user_info WHERE `admin_user_id`='%s' AND `admin_user_pass`='%s' LIMIT 0,1";
  // 取得したデータを代入
  $query = sprintf($sql, $id, $pass);
  // SQLの実行と実行結果を変数$resに代入
  $res = mysql_query($query);

  return $res;
}

?>
