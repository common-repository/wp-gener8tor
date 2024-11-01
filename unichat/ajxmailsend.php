<?php
$wpunichatcsrfvalid=false;

if(isset($_POST['chatboxcsrf'])&& wp_verify_nonce($_POST['chatboxcsrf'],'chatboxcsrf'))
{
	$wpunichatcsrfvalid=true;
}
if(isset($_POST['uniemailformsubmit']) && $wpunichatcsrfvalid)
{

	$pref=sanitize_text_field($_POST['pref']);
	if(strlen($_POST['uniemailfromname'])<1)
	{
		echo "Please Enter Valid Name.";
	}
	elseif(!filter_var($_POST['uniemailfromemail'],FILTER_VALIDATE_EMAIL))
	{
		echo "Not a Valid Email ID.";
	}
	elseif(strlen($_POST['uniemailsubject'])<1)
	{
		echo "Please Enter Email Subject.";
	}
	elseif(strlen($_POST['uniemlbodycntnt'])<1)
	{
		echo "Please Enter Email Body";
	}
	else
	{
	$unimailcontentduringsend=sanitize_textarea_field($_POST['uniemlbodycntnt']);
	$headers= array('From: '.sanitize_text_field($_POST['uniemailfromname']).' <'.sanitize_email($_POST['uniemailfromemail']).'>');
	$ml=wp_mail(get_option($pref.'email_id'),sanitize_text_field($_POST['uniemailsubject']),$unimailcontentduringsend,$headers);
	
	if($ml){echo 1;}else{echo "Unable To Send Email";}
	}
      }
?>