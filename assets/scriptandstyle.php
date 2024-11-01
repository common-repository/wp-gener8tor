<?php

if ( ! class_exists( 'unichatScriptandstyle' ) ) {

class unichatScriptandstyle
{
	function __construct()
	{
		
	}
	function unichatAdminScript()
	{
		//echo "<script>alert('ok');</script>";
		if($_GET['page']=='uni_settings_page')
		{
	  wp_register_script('unichat_admin_script',plugins_url('js/script.js',__FILE__),array('jquery'));
	  wp_enqueue_script('unichat_admin_script');
	  
	  wp_register_style('unichat_admin_bootstrap',plugins_url('bootstrap/css/bootstrap.min.css',__FILE__));
	  
	  
	  wp_enqueue_style('unichat_admin_bootstrap');
	  
	  wp_register_script('wp_gener8tor_bootstrap_popper',plugins_url('bootstrap/js/popper.min.js',__FILE__),array('jquery'));
	  wp_enqueue_script('wp_gener8tor_bootstrap_popper');
	  wp_register_script('unichat_admin_bootstrap_js',plugins_url('bootstrap/js/bootstrap.min.js',__FILE__),array('jquery'));
	  wp_enqueue_script('unichat_admin_bootstrap_js');	


     // wp_register_script('unichat_skype_js','https://swc.cdn.skype.com/sdk/v1/sdk.min.js');

	 
		}
	}
	function unichatUserScript()
	{
		wp_enqueue_script('jquery');

       // wp_register_script('unichat_skype_js','https://swc.cdn.skype.com/sdk/v1/sdk.min.js',array('jquery'));

	  wp_register_script('unichat_skype_js',plugins_url('js/skype.js',__FILE__),array('jquery'));
	  wp_enqueue_script('unichat_skype_js');
	}
	function unichatFooterLogo()
	{
		if($_GET['page']=='uni_settings_page')
		{
		  echo '<span style="bottom:0px;left:85px;margin-bottom:45px;margin-left:100px;position:absolute"><a target="_BLANK"><img src="'.esc_url(plugins_url('img/logo.png',__FILE__)).'" style="height:35px"></a></span>';

   echo '<span class="pull-right" style="bottom:0px;right:0px;margin-bottom:50px;margin-right:20px;position:absolute"><a href="https://teknikforce.com" target="_BLANK"><img src="'.esc_url(plugins_url('img/tekniklogo.png',__FILE__)).'" style="cursor:pointer"></a></span>';
		}
	}
}
}

?>