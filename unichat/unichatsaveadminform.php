<?php

		$pref='wpunichatbox-';
		if(isset($_POST['wpucb-btn']) && wp_verify_nonce($_POST['unichatformcsrf'],'unichatformcsrf'))
		{
			
			if(isset($_POST['wpucb-fb'])){$facebook='1';}else{$facebook='0';}
			$facebookid=esc_url($_POST['wpucb-fb-url']);

			if(isset($_POST['wpucb-whatsapp'])){$whatsapp='1';}else{$whatsapp='0';}
			$whatsappno=sanitize_text_field($_POST['wpucb-whatsapp-number']);

			if(isset($_POST['wpucb-telegram'])){$telegram='1';}else{$telegram='0';}
			$telegramno=sanitize_text_field($_POST['wpucb-telegram-number']);

			if(isset($_POST['wpucb-skype'])){$skype='1';}else{$skype='0';}
			$skypeid=sanitize_text_field($_POST['wpucb-skype-email']);

			if(isset($_POST['wpucb-snapchat'])){$snapchat='1';}else{$snapchat='0';}
			$snapchatid=sanitize_text_field($_POST['wpucb-snapchat-email']);

			if(isset($_POST['wpucb-message'])){$message='1';}else{$message='0';}
			$messageno=sanitize_text_field($_POST['wpucb-message-number']);

			if(isset($_POST['wpucb-telephone'])){$telephone='1';}else{$telephone='0';}
			$telephoneno=sanitize_text_field($_POST['wpucb-telephone-number']);

			$greetingmsg=sanitize_textarea_field($_POST['wpucb-greeting-msg']);

			$uploadedimage=esc_url($_POST['wpucb_upload_url']);

			if(isset($_POST['wpucb-email'])){$email='1';}else{$email='0';}
			$emailid=sanitize_email($_POST['wpucb-email-id']);

			if(isset($_POST['unionmode']))
			{
				if($_POST['unionmode']=='1')
				{
					update_option($pref.'is_single',sanitize_text_field($_POST['unionmode']));
					update_option($pref.'single_name',sanitize_text_field($_POST['singlewpucb']));
					$unionmode=1;
				}
			    else
				{
					update_option($pref.'is_single',sanitize_text_field($_POST['unionmode']));
					
					$unionmode=0;
				}
			}


			if($facebookid!==""){
				if(get_option($pref.'facebook_active')!==false && $unionmode==0){
					update_option($pref.'facebook_active', $facebook);
				}
				if(get_option($pref.'facebook_pagid')!==false ){
					update_option($pref.'facebook_pagid', $facebookid);
				}
			}else{
				update_option($pref.'facebook_active', '0');
				update_option($pref.'facebook_pagid', '');	
			}

			if($whatsappno!==""){
				if(get_option($pref.'whatsapp_active')!==false && $unionmode==0){
					update_option($pref.'whatsapp_active', $whatsapp);
				}
				if(get_option($pref.'whatsapp_number')!==false){
					update_option($pref.'whatsapp_number', $whatsappno);
				}
			}else{
					update_option($pref.'whatsapp_active', '0');
					update_option($pref.'whatsapp_number', '');
			}

			if($telegramno!==""){
				if(get_option($pref.'telegram_active')!==false && $unionmode==0){
					update_option($pref.'telegram_active', $telegram);
				}
				if(get_option($pref.'telegram_number')!==false){
					update_option($pref.'telegram_number', $telegramno);
				}
			}else{
				update_option($pref.'telegram_active', '0');
				update_option($pref.'telegram_number', '');
			}

			if($skypeid!==""){
				if(get_option($pref.'skype_active')!==false && $unionmode==0){
					update_option($pref.'skype_active', $skype);
				}
				if(get_option($pref.'skype_botid')!==false){
					update_option($pref.'skype_botid', $skypeid);
				}
			}else{
				update_option($pref.'skype_active', '0');
				update_option($pref.'skype_botid', '');
			}

			if($greetingmsg!==""){
				if(get_option($pref.'greeting_message')!==false){
					update_option($pref.'greeting_message',stripslashes($greetingmsg));
				}
			}else{
				update_option($pref.'greeting_message','');
			}

			if($uploadedimage!==""){
				if(get_option($pref.'upload_logo')!==false){
					update_option($pref.'upload_logo',$uploadedimage);

				}
			}else{ update_option($pref.'upload_logo',''); }

			if($messageno!==""){
				if(get_option($pref.'message_active')!==false && $unionmode==0){
					update_option($pref.'message_active', $message);
				}
				if(get_option($pref.'message_number')!==false){
					update_option($pref.'message_number', $messageno);
				}
			}else{
				update_option($pref.'message_active', '0');
				update_option($pref.'message_number', '');	
			}

			if($snapchatid!==""){
				if(get_option($pref.'snapchat_active')!==false && $unionmode==0){
					update_option($pref.'snapchat_active', $snapchat);
				}
				if(get_option($pref.'snapchat_id')!==false){
					update_option($pref.'snapchat_id', $snapchatid);
				}
			}else{
				update_option($pref.'snapchat_active', '0');
				update_option($pref.'snapchat_id', '');	
			}

			if($emailid!==""){
				if(get_option($pref.'email_active')!==false && $unionmode==0){
					update_option($pref.'email_active', $email);
				}
				if(get_option($pref.'email_id')!==false){
					update_option($pref.'email_id', $emailid);
				}
			}else{
				update_option($pref.'email_active', '0');
				update_option($pref.'email_id', '');	
			}

			if($telephoneno!==""){
				if(get_option($pref.'telephone_active')!==false && $unionmode==0){
					update_option($pref.'telephone_active', $telephone);
				}
				if(get_option($pref.'telephone_number')!==false){
					update_option($pref.'telephone_number', $telephoneno);
				}
			}else{
				update_option($pref.'telephone_active', '0');
				update_option($pref.'telephone_number', '');	
			}
						//echo "<script> alert('Data Sucessfully Inserted');</script>"
			 update_option($pref.'appear_after',sanitize_text_field($_POST['uniwidgetdelay']));
			 if(isset($_POST['uniprepopup']))
			 {
				update_option($pref.'opened_widget','1');
			 }
			 else
			 {
				update_option($pref.'opened_widget','0'); 
			 }
		}
	?>