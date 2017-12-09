<?php
function conectDatabase(){
  // DB接続
  $con = mysql_connect('localhost', 'root', '');
  // 使用するDB名の指定
  mysql_select_db('maroyu_guide');
}
?>
