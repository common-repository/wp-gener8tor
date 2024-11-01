<?php
if ( ! class_exists( 'wpunichatsettings' ) ) {

class wpunichatsettings
{
	var $pref;
	function __construct($pref)
	{
		$this->pref=$pref;
		add_menu_page('WP_Gener8tor', 'WP Gener8tor', 'administrator', 'uni_settings_page',array($this,'wpunichatsettingspage'));
	}
	function wpunichatsavesettings()
	{
		require_once('unichatsaveadminform.php');
	
	}
	function wpunichatsettingspage()
	{
			self::wpunichatsavesettings();
		wp_enqueue_media();
		require_once('unichatadminform.php');

	}
}
}
if ( ! class_exists( 'wpunichatusersight' ) ) {

class  wpunichatusersight
{
	
	function __construct($pref)
	{
		$activstat=self::widgetactiveStat($pref);
		if($activstat==1)
		{
		$mailsentstat=self::sendMailWpUnichat($pref);
		require_once("mobiledetect.php");
		$detect = new Mobile_Detect_Uni();
		
		if($detect->isMobile())
		{$ismobile=1;}
		else
		{$ismobile=0;}
	
		require_once('chatboxes.php');
		}
		else
		{
			$activechatbutton=$activstat;
			$mailsentstat=self::sendMailWpUnichat($pref);
			require_once("mobiledetect.php");
		$detect = new Mobile_Detect_Uni();
		
		if($detect->isMobile())
		{$ismobile=1;}
		else
		{$ismobile=0;}
	
		require_once('singlechat.php');
		}
	}
	
	function widgetactiveStat($pref)
	{
		if(get_option($pref.'is_single')=='1')
		{
		  return get_option($pref.'single_name');	
		}
		else
		{
		if(get_option($pref.'whatsapp_active')=='1'||get_option($pref.'facebook_active')=='1'||get_option($pref.'skype_active')=='1'||get_option($pref.'telegram_active')=='1'||get_option($pref.'message_active')=='1'||get_option($pref.'email_active')=='1'||get_option($pref.'telephone_active')=='1'||get_option($pref.'snapchat_active')=='1')
		{
			return 1;
		}
		}
	}
	
	function sendMailWpUnichat($pref)
	{
		
	}
}
}
?>