<?php
/*
PLUGIN NAME: WP Gener8Tor 
Plugin URI: http://www.teknikforce.com
DESCRIPTION: Engage and get leads from every leading messaging platform
AUTHOR:TEKNIKFORCE
AUTHOR URI:https://teknikforce.com
Version:1.1
*/


if(!defined('ABSPATH')) exit;

if ( ! class_exists( 'wpunichatboxmainclass' ) ) {

class wpunichatboxmainclass
{
	var $pref;
function __construct()
{
	$this->pref='wpunichatbox-';
	register_activation_hook(__FILE__,array($this,'wp_unichat_installation_function'));
	
	self::wpactiveunichatBox();
	
	add_action('wp_footer',array($this,'wpunichatusersight'));
	
	add_action('admin_enqueue_scripts',array($this,'unichatAdminSightScriptEnqueue'));
	add_action('wp_enqueue_scripts',array($this,'unichatUsersightScriptEnqeue'));
	
	add_action('admin_footer',array($this,'unichatfooterscriptandlogo'));
	self::allAjax();
}
function wp_unichat_installation_function()
{
	$pref=$this->pref;
//whatsapp
add_option($pref.'whatsapp_active','0');
add_option($pref.'whatsapp_number','');
//facebook
add_option($pref.'facebook_active','0');
add_option($pref.'facebook_pagid','');
//skype
add_option($pref.'skype_active','0');
add_option($pref.'skype_botid','');
//telegram
add_option($pref.'telegram_active','0');
add_option($pref.'telegram_number','');		
//message
add_option($pref.'message_active','0');
add_option($pref.'message_number','');
//email
add_option($pref.'email_active','0');
add_option($pref.'email_id','');
//Telephone
add_option($pref.'telephone_active','0');
add_option($pref.'telephone_number','');
//widget mode single or all
add_option($pref.'is_single','0');
add_option($pref.'single_name','none');
//time to appear
add_option($pref.'appear_after','3');
add_option($pref.'opened_widget','1');
//social media
add_option($pref.'snapchat_active','0');
add_option($pref.'snapchat_id','');
//Greeting message
add_option($pref.'greeting_message','Hello, how may we help you? Just send us a message now to get assistance.');
//Company logo
add_option($pref.'upload_logo','');
}

function wpactiveunichatBox()
{
		require_once("unichatbox/plugin.php");
$gdprwpvar=new \Gener8Tor\license\wpgdprpluginlisence(array('wpgener8tor',$this->pref));
if($gdprwpvar->validate()==1)
{
	
	add_action('admin_menu',array($this,'unichatadminsettingspagecall'));
}
else
{
new \Gener8Tor\license\gdpractivationpage(array('wpgener8tor',$this->pref));
}
}

function unichatadminsettingspagecall()
{
	require_once("unichat/function.php");
	$ob=new wpunichatsettings($this->pref);
}

function wpunichatusersight()
{
	require_once("unichat/function.php");
	$ob=new wpunichatusersight($this->pref);
}

function unichatAdminSightScriptEnqueue()
{
	require_once("assets/scriptandstyle.php");
	$ob=new unichatScriptandstyle();
	$ob->unichatAdminScript();
}
function unichatUsersightScriptEnqeue()
{
	require_once("assets/scriptandstyle.php");
	$ob=new unichatScriptandstyle();
	$ob->unichatUserScript();
}
function unichatfooterscriptandlogo()
{
	require_once("assets/scriptandstyle.php");
	$ob=new unichatScriptandstyle();
	$ob->unichatFooterLogo();
}

function addUniWpmlrNameSetting($name)
{
	return sanitize_text_field($_POST['uniemailfromname']);
}
function addUniWpmlrEmailSetting($email)
{
	return sanitize_email($_POST['uniemailfromemail']);
}
function allAjax()
{
	add_action('wp_ajax_gener8toractionresponse_adminajxlcnc',array($this,'licenseAjaxRun'));
	add_action('wp_ajax_singlechatcsrf',array($this,'dosinglechatcsrf'));
	add_action('wp_ajax_nopriv_singlechatcsrf',array($this,'dosinglechatcsrf'));
	
		add_action('wp_ajax_chatboxcsrxpref',array($this,'dochatboxcsrxpref'));


	add_action('wp_ajax_nopriv_chatboxcsrxpref',array($this,'dochatboxcsrxpref'));

}
function licenseAjaxRun()
{
	if(isset($_POST['reverifyjkmvhblicense']) && isset($_POST['rvryfyplugin']) && isset($_POST['rvryfypluginpref']) && isset($_POST["pluginnonce"]) && wp_verify_nonce($_POST["pluginnonce"],$this->pref))
	{
	//echo $_POST["pluginnonce"];
	//wpgener8tor
	$ob=new \Gener8Tor\license\wpgdprpluginlisence(array(sanitize_text_field($_POST['rvryfyplugin']),sanitize_text_field($_POST['rvryfypluginpref'])));
	$ob->reValidate("server");
	}
	wp_die();
}
function dosinglechatcsrf()
{
	require_once("unichat/ajxmailsend.php");
	wp_die();

}
function dochatboxcsrxpref()
{
	require_once("unichat/ajxmailsend.php");
	wp_die();

}
}
}
	

$wpunichatob=new wpunichatboxmainclass();
?>