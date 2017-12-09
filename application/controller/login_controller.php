<?php
require_once(__DIR__."/../conf/master_conf.php");
require_once(__DIR__."/../model/login_model.php");

unset($_SESSION['error']);
unset($_SESSION['user_info']);


if(empty($_POST['id']) && empty($_POST['pass'])){
  $_SESSION['error']['all']['error_msg'] = "ユーザー情報を入力してください。";
} else {

  $res = getLoginData($_POST['id'], $_POST['pass']);

  while ($row = mysql_fetch_array($res)) { // DBから取得したデータの変換
    // セッション（一時領域）に取得したデータをそれぞれ代入
    $_SESSION['user_info']['user_id'] = $row['admin_user_id'];
    $_SESSION['user_info']['user_pass'] = $row['admin_user_pass'];
    $_SESSION['user_info']['user_name'] = $row['admin_user_name'];
  }

  if(empty($_SESSION['error']['all']) && empty($_SESSION['user_info']['user_id'])){ // セッションデータにユーザーIDがあるか確認
    $_SESSION['error']['user_id']['error_msg'] = "入力された「id」は登録されていません。";
  }

  if(empty($_SESSION['error']['all']) && empty($_SESSION['user_info']['user_pass'])){ // セッションデータにパスワードがあるか確認
    $_SESSION['error']['user_pass']['error_msg'] = "入力された「pass」は登録されていません。";
  }
}

// ログインページへリダイレクト
if(!empty($_SESSION['error'])){
  header("location: index.html");
}
 ?>
