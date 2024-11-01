<?php 
	$pref='wpunichatbox-';
	$img=esc_url(get_option($pref.'upload_logo'));
?>

<script type="text/javascript">

var unichatwidgetdiv;
var singlechatwidgetdiv;
function uniChatModeSelection(str)
			{
				
				if(str=="unionsingle")
				{
					unichatwidgetdiv=document.getElementById("unichatwidget").innerHTML;
					document.getElementById("unichatwidget").innerHTML="";
			        document.getElementById("singlechatwidget").innerHTML=singlechatwidgetdiv;
				}
				else
				{
					document.getElementById("unichatwidget").innerHTML=unichatwidgetdiv;
					singlechatwidgetdiv=document.getElementById("singlechatwidget").innerHTML;
					document.getElementById("singlechatwidget").innerHTML="";
				}
			}

</script>
	
<div class="container" id="unicontainer"><br>

	<div class="row">
		<div class="col-sm-12">
	<div class="panel panel-primary" style="">
	<div class="panel-heading unitoppanel" style=" "><center><h4 style="margin:0px;">Gener8tor Settings</h4></center></div>
	<div class="panel-body" >
	  <form action="" method="post"  name="wpucb_admin_form">  
	  <div class="row">
	  <div class="col-sm-8">
			<div class="panel panel-primary" style="" >
			<div class="panel-heading" style=" "><h5 style="margin:0px;">Gener8tor
			form</h5></div>
				<div class="panel-body" style="margin-left: 40px;">
			<br>
			<div class="generalsettings">
			<strong>Select Chat Mode</strong><br>
			
			<hr class="unilinebreak">
			
			<div>
 					 <div class="input-group" data-toggle="tooltip" title="">
    				 <span class="input-group-addon">
   		 		<input type="radio" style="" value="1" name="unionmode" id="unionsingle" 
   		 		 onclick="uniChatModeSelection(this.id)" <?php if(get_option($pref.'is_single')=='1'){echo "checked";} ?>>
   		 		</span>
    			<p class="form-control">Show Chat Icon</p>
    			</div>
               <br>
			<div class="input-group" data-toggle="tooltip" title="">
    		<span class="input-group-addon">
   			<input type="radio" style="" value="0" name="unionmode" id="unionwidget" 
   			onclick="uniChatModeSelection(this.id)" <?php if(get_option($pref.'is_single')=='0'){echo "checked";} ?>></span>
    		<p class="form-control">Show Chat Widget</p>
    	</div>
              </div>
			  <br>
			  <div class="input-group" data-toggle="tooltip" title="">
    		<span class="input-group-addon">Delay In Widget Popup</span>
    		<input type="number" class="form-control" placeholder="Value In Second" value="<?php echo esc_attr(get_option($pref.'appear_after')); ?>" min="0" name="uniwidgetdelay" required>
    	     </div>
			  <br>
			  <div class="input-group" data-toggle="tooltip" title="">
			 <span class="input-group-addon"><input type="checkbox" value="1" name="uniprepopup" <?php if(get_option($pref.'opened_widget')=='1'){echo "checked";} ?>></span>
    		<p class="form-control">Keep Widget Open</p>
    	     </div>
			  
			  
			</div>
			
			<br><br>
			
			<strong>Chat Options</strong>
			<hr class="unilinebreak">
			
			<div id="singlechatwidget">
			<label >Facebook:</label>
					<div class="input-group"  data-toggle="tooltip" title="Enter Your Facebook Page URL to Active">

						<span class="input-group-addon"><input type="radio" value="facebook" 
					   	id="wpucb-fb" name="singlewpucb" 
					   	<?php if(get_option($pref.'facebook_pagid')==""){ ?> disabled="disabled" <?php } ?><?php if(get_option($pref.'single_name')=="facebook"){ ?>checked  <?php } ?> >
					    </span>
						<input type="url"  name="wpucb-fb-url" id="wpucb-fb-url" class="form-control"       placeholder="Please Enter Page Url" oninput="fbshow()"
						 value=<?php echo esc_attr(get_option($pref.'facebook_pagid')); ?> >
						<span class="input-group-addon">
						<img id="img"src=<?php echo  esc_url(plugins_url('img/f.png' , __FILE__));?>></span>	
						   
					</div>
				<label >Whatsapp:</label>
					<div class="input-group"  data-toggle="tooltip" title="Enter WhatsApp number with country code.">

						<span class="input-group-addon"><input type="radio" value="whatsapp" 
						   	id="wpucb-whatsapp" name="singlewpucb"
						<?php  if(get_option($pref.'whatsapp_number')==""){ ?> disabled="disabled" <?php }
						   	    else{ ?> onfocus="wtsupshow()" <?php } ?> 
						<?php if(get_option($pref.'single_name')=="whatsapp"){ ?> checked  <?php } ?> >
					    </span>
						<input type="tel" name="wpucb-whatsapp-number" id="wpucb-whatsapp-number" 
						    class="form-control" oninput="wtsupshow()" placeholder="Please Enter Your Number" 
						   value=<?php echo esc_attr(get_option($pref.'whatsapp_number')); ?>>
						<span class="input-group-addon">
						<img 	id="img"src=<?php echo  esc_url(plugins_url('img/w.png' , __FILE__));?>></span>	
						   
					</div>
				<label >Telegram:</label>
					<div class="input-group"  data-toggle="tooltip" title="Enter Your Telegram bot Id only eg: unichatbox123appbot">

					    <span class="input-group-addon"><input type="radio" value="telegram" 
						   	id="wpucb-telegram"  name="singlewpucb"
						<?php if(get_option($pref.'telegram_number')==""){ ?> disabled="disabled" <?php } 
							  else{ ?> onfocus="telegshow()" <?php }
						  ?> 
						<?php if(get_option($pref.'single_name')=='telegram'){ ?> checked  <?php } ?>></span>
						<input type="tel" name="wpucb-telegram-number" id="wpucb-telegram-number" 
							class="form-control" oninput="telegshow()" placeholder="Please Enter Your BOT Id"  value=<?php echo esc_attr(get_option($pref.'telegram_number')); ?>>
						<span class="input-group-addon">
					   	<img id="img"src=<?php echo  esc_url(plugins_url('img/t.png' , __FILE__));?>></span>
						   
					</div>
				<label >Skype:</label>
					<div class="input-group"  data-toggle="tooltip" title="Enter Your Skype Id to active">

						  <span class="input-group-addon"><input type="radio" value="skype" 
						  	id="wpucb-skype" name="singlewpucb"
						  	<?php if(get_option($pref.'skype_botid')==""){ ?> disabled="disabled" <?php } 
						  			else { ?> onfocus="skyshow()" <?php }
						  	 ?> 
						  	<?php if(get_option($pref.'single_name')=='skype'){ ?> checked  <?php } ?>></span>
						  <input type="text" name="wpucb-skype-email" id="wpucb-skype-email" class="form-control" oninput="skyshow()" placeholder="Enter your Skype Id"
						  value=<?php echo esc_attr(get_option($pref.'skype_botid')); ?> >
						  <span class="input-group-addon">
						  	<img id="img" src=<?php echo  esc_url(plugins_url('img/s.png' , __FILE__));?>></span>	
						   
					</div>
					<label >Snap Chat:</label>
					<div class="input-group"  data-toggle="tooltip" title="Enter Your Snap Chat Id to active, User will just get a popup with that detail">

						   <span class="input-group-addon"><input type="radio" value="snapchat" 
						   	id="wpucb-snapchat"  name="singlewpucb"
						   	<?php if(get_option($pref.'snapchat_id')==""){ ?> disabled="disabled" <?php } 
						   			else{ ?>  onfocus="snapshow()" <?php }
						   	 ?>
						   	<?php if(get_option($pref.'single_name')=='snapchat'){ ?>checked  <?php } ?> >
						   </span>
						   <input type="test" name="wpucb-snapchat-email" id="wpucb-snapchat-email" class="form-control" oninput="snapshow()" placeholder="Please Enter Your Id" 
						   value=<?php echo esc_attr(get_option($pref.'snapchat_id')); ?>>
						   <span class="input-group-addon">
						   	<img 	id="img"src=<?php echo  esc_url(plugins_url('img/sn.png' , __FILE__));?>></span>	
						   
					</div>
					<label >Message:</label>
					<div class="input-group"  data-toggle="tooltip" title="Enter Your Contact Number, Messaging will work on Mobile device. On Desktop, visitors will get a popup with the number. ">

						   <span class="input-group-addon"><input type="radio" value="message" 
						   id="wpucb-message" name="singlewpucb"
						   <?php if(get_option($pref.'message_number')==""){ ?> disabled="disabled" <?php }	else{ ?> onfocus="msgshow()" <?php 	}
						      ?> 
						   	<?php if(get_option($pref.'single_name')=='message'){ ?>checked  <?php } ?> >
						   </span>
						   <input type="tel" name="wpucb-message-number" id="wpucb-message-number" class="form-control" oninput="msgshow()" placeholder="Please Enter Your Number" 
						   value=<?php echo esc_attr(get_option($pref.'message_number')); ?>>
						   <span class="input-group-addon">
						   	<img 	id="img"src=<?php echo  esc_url(plugins_url('img/msg.png' , __FILE__));?>></span>	
						   
					</div>
						<label >Email:</label>
					<div class="input-group"  data-toggle="tooltip" title="Enter Your Email Id">

						  <span class="input-group-addon"><input type="radio" value="email" 
						  	id="wpucb-email"  name="singlewpucb"
						  	<?php if(get_option($pref.'email_id')==""){ ?> disabled="disabled" <?php } ?> 
						  	<?php if(get_option($pref.'single_name')=='email'){ ?>checked  <?php } ?>></span>
						  <input type="email" name="wpucb-email-id" id="wpucb-email-id" 
						  oninput="emailshow()" class="form-control" placeholder="Enter your Email"
						  value=<?php echo esc_attr(get_option($pref.'email_id')); ?> >
						  <span class="input-group-addon">
						  	<img id="img" src=<?php echo  esc_url(plugins_url('img/bootmgr.png' , __FILE__));?>></span>	
						   
					</div>
					<label >Telephone:</label>
					<div class="input-group"  data-toggle="tooltip" title="Enter Your Telephone number, This will work only on mobile. Visitors will get a popup with the number on desktop">

						<span class="input-group-addon"><input type="radio" value="telephone" 
						   	id="wpucb-telephone" name="singlewpucb" name="wpucb-telephone"
						<?php if(get_option($pref.'telephone_number')==""){ ?> disabled="disabled" <?php } 
					   		  else{ ?>  onfocus="teleshow()" <?php }
					   	  ?> 
						<?php if(get_option($pref.'single_name')=='telephone'){ ?>checked  <?php } ?> >
						</span>
						<input type="tel" name="wpucb-telephone-number" id="wpucb-telephone-number" 
						class="form-control" oninput="teleshow()" placeholder="Please Enter Your Number" 
						value=<?php echo esc_attr(get_option($pref.'telephone_number')); ?>>
						<span class="input-group-addon">
						<img id="img"src=<?php echo  esc_url(plugins_url('img/telephone.png' , __FILE__));?>></span> 
					</div>		
					<br><br>
			
			
			
			</div>
			
			<div id="unichatwidget">
				<label >Facebook:</label>
					<div class="input-group"  data-toggle="tooltip" title="Enter Your Facebook Page URL to Active">

						<span class="input-group-addon"><input type="checkbox" class="form-control" 
					   	id="wpucb-fb" name="wpucb-fb" 
					   	<?php if(get_option($pref.'facebook_pagid')==""){ ?> disabled="disabled" <?php } ?><?php if(get_option($pref.'facebook_active')==1){ ?>checked  <?php } ?> >
					    </span>
						<input type="url"  name="wpucb-fb-url" id="wpucb-fb-url" class="form-control"       placeholder="Please Enter Page Url" oninput="fbshow()"
						 value=<?php echo esc_attr(get_option($pref.'facebook_pagid')); ?> >
						<span class="input-group-addon">
						<img id="img"src=<?php echo  esc_url(plugins_url('img/f.png' , __FILE__));?>></span>	
						   
					</div>
				<label >Whatsapp:</label>
					<div class="input-group"  data-toggle="tooltip" title="Enter WhatsApp number with country code.">

						<span class="input-group-addon"><input type="checkbox" class="form-control" 
						   	id="wpucb-whatsapp" name="wpucb-whatsapp"
						<?php  if(get_option($pref.'whatsapp_number')==""){ ?> disabled="disabled" <?php }
						   	    else{ ?> onfocus="wtsupshow()" <?php } ?> 
						<?php if(get_option($pref.'whatsapp_active')==1){ ?>checked  <?php } ?> >
					    </span>
						<input type="tel" name="wpucb-whatsapp-number" id="wpucb-whatsapp-number" 
						    class="form-control" oninput="wtsupshow()" placeholder="Please Enter Your Number" 
						   value=<?php echo esc_attr(get_option($pref.'whatsapp_number')); ?>>
						<span class="input-group-addon">
						<img 	id="img"src=<?php echo  esc_url(plugins_url('img/w.png' , __FILE__));?>></span>	
						   
					</div>
				<label >Telegram:</label>
					<div class="input-group"  data-toggle="tooltip" title="Enter Your Telegram bot Id only eg: unichatbox123appbot">

					    <span class="input-group-addon"><input type="checkbox" class="form-control" 
						   	id="wpucb-telegram"  name="wpucb-telegram"
						<?php if(get_option($pref.'telegram_number')==""){ ?> disabled="disabled" <?php } 
							  else{ ?> onfocus="telegshow()" <?php }
						?> 
						<?php if(get_option($pref.'telegram_active')==1){ ?> checked  <?php } ?>></span>
						<input type="tel" name="wpucb-telegram-number" id="wpucb-telegram-number" 
							class="form-control" oninput="telegshow()" placeholder="Please Enter Your BOT Id"  value=<?php echo esc_attr(get_option($pref.'telegram_number')); ?>>
						<span class="input-group-addon">
					   	<img id="img"src=<?php echo  esc_url(plugins_url('img/t.png' , __FILE__));?>></span>
						   
					</div>
				<label >Skype:</label>
					<div class="input-group"  data-toggle="tooltip" title="Enter Your Skype Id to active">

						  <span class="input-group-addon"><input type="checkbox" class="form-control" 
						  	id="wpucb-skype" name="wpucb-skype"
						  	<?php if(get_option($pref.'skype_botid')==""){ ?> disabled="disabled" <?php } 
						  			else { ?> onfocus="skyshow()" <?php }
						  	?> 
						  	<?php if(get_option($pref.'skype_active')==1){ ?>checked  <?php } ?>></span>
						  <input type="text" name="wpucb-skype-email" id="wpucb-skype-email" class="form-control" oninput="skyshow()" placeholder="Enter your Skype Id"
						  value=<?php echo get_option($pref.'skype_botid'); ?> >
						  <span class="input-group-addon">
						  	<img id="img" src=<?php echo  esc_url(plugins_url('img/s.png' , __FILE__));?>></span>	
						   
					</div>
					<label >Snap Chat:</label>
					<div class="input-group"  data-toggle="tooltip" title="Enter Your Snap Chat Id to active, User will just get a popup with that detail">

						   <span class="input-group-addon"><input type="checkbox" class="form-control" 
						   	id="wpucb-snapchat"  name="wpucb-snapchat"
						   	<?php if(get_option($pref.'snapchat_id')==""){ ?> disabled="disabled" <?php } 
						   			else{ ?>  onfocus="snapshow()" <?php }
						   	?>
						   	<?php if(get_option($pref.'snapchat_active')==1){ ?>checked  <?php } ?> >
						   </span>
						   <input type="test" name="wpucb-snapchat-email" id="wpucb-snapchat-email" class="form-control" oninput="snapshow()" placeholder="Please Enter Your Id" 
						   value=<?php echo get_option($pref.'snapchat_id'); ?>>
						   <span class="input-group-addon">
						   	<img 	id="img"src=<?php echo  esc_url(plugins_url('img/sn.png' , __FILE__));?>></span>	
						   
					</div>
					<label >Message:</label>
					<div class="input-group"  data-toggle="tooltip" title="Enter Your Contact Number, Messaging will work on Mobile device. On Desktop, visitors will get a popup with the number. ">

						   <span class="input-group-addon"><input type="checkbox" class="form-control" 
						   id="wpucb-message" name="wpucb-message"  name="wpucb-message"
						   <?php if(get_option($pref.'message_number')==""){ ?> disabled="disabled" <?php }	else{ ?> onfocus="msgshow()" <?php 	}
						   ?> 
						   	<?php if(get_option($pref.'message_active')==1){ ?>checked  <?php } ?> >
						   </span>
						   <input type="tel" name="wpucb-message-number" id="wpucb-message-number" class="form-control" oninput="msgshow()" placeholder="Please Enter Your Number" 
						   value=<?php echo get_option($pref.'message_number'); ?>>
						   <span class="input-group-addon">
						   	<img 	id="img"src=<?php echo  esc_url(plugins_url('img/msg.png' , __FILE__));?>></span>	
						   
					</div>
						<label >Email:</label>
					<div class="input-group"  data-toggle="tooltip" title="Enter Your Email Id">

						  <span class="input-group-addon"><input type="checkbox" class="form-control" 
						  	id="wpucb-email"  name="wpucb-email"
						  	<?php if(get_option($pref.'email_id')==""){ ?> disabled="disabled" <?php } ?> 
						  	<?php if(get_option($pref.'email_active')==1){ ?>checked  <?php } ?>></span>
						  <input type="email" name="wpucb-email-id" id="wpucb-email-id" 
						  oninput="emailshow()" class="form-control" placeholder="Enter your Email"
						  value=<?php echo esc_attr(get_option($pref.'email_id')); ?> >
						  <span class="input-group-addon">
						  	<img id="img" src=<?php echo  esc_url(plugins_url('img/bootmgr.png' , __FILE__));?>></span>	
						   
					</div>
					<label >Telephone:</label>
					<div class="input-group"  data-toggle="tooltip" title="Enter Your Telephone number, This will work only on mobile. Visitors will get a popup with the number on desktop">

						<span class="input-group-addon"><input type="checkbox" class="form-control" 
						   	id="wpucb-telephone" name="wpucb-telephone" name="wpucb-telephone"
						<?php if(get_option($pref.'telephone_number')==""){ ?> disabled="disabled" <?php } 
					   		  else{ ?>  onfocus="teleshow()" <?php }
					   	?> 
						<?php if(get_option($pref.'telephone_active')==1){ ?>checked  <?php } ?> >
						</span>
						<input type="tel" name="wpucb-telephone-number" id="wpucb-telephone-number" 
						class="form-control" oninput="teleshow()" placeholder="Please Enter Your Number" 
						value=<?php echo esc_attr(get_option($pref.'telephone_number')); ?>>
						<span class="input-group-addon">
						<img id="img"src=<?php echo esc_url(plugins_url('img/telephone.png' , __FILE__));?>></span> 
					</div>		
					<br><br>
					</div>
		</div>
		
		
		
		</div></div>
		<div class="col-sm-4">
			<div class="panel panel-primary" style="" data-toggle="tooltip" title="This logo will shown with with the widget .">
				<div class="panel-heading" style=" ">Upload Company logo </div>
				<div class="panel-body"><center>
				<?php if($img!==""){
					?> <img id="wpucb_upload_img" src="<?php echo $img; ?>" style="max-height:60px;max-width:60px;vertical-align:middle;border-radius:50%"> <?php
				}
				else{
					?> <br/><span class="glyphicon glyphicon-picture" style="font-size:90px; "></span> <?php
				}
				?>
				</center>
				</div>
					<div class="panel-footer">
					<div class="input-group" >
						
               			<span class="input-group-addon" id="wpucb-upload-btn" style="cursor:pointer">
			   				<img id="img" class="glyphicon glyphicon-picture" src=<?php echo esc_url(plugins_url('img/upload.png' , __FILE__));?>></span>
			   			<input type="text" class="form-control" name="wpucb_upload_url" id="wpucb_upload_url" 
						value=<?php echo $img;?>>
						
                	</div></div>
			</div>
			<div class="panel panel-primary" data-toggle="tooltip" title="The text you want to show with the widget">
				<div class="panel-heading" style="">Chat Prompt Message</div>
				<div class="panel-body" style="padding:0px">
					<div class="input-group">
       						<?php wp_editor(get_option($pref.'greeting_message'),'wpucb-greeting-msg',array('textarea_rows'=>'4','media_buttons'=>FALSE)); ?>
  					</div>
			  		
				</div>
				
				<div class="panel-footer">
				 <input type="hidden" name="unichatformcsrf" value="<?php echo wp_create_nonce('unichatformcsrf'); ?>">

				<button id="unisavesettings" type="submit" name="wpucb-btn" class="btn" style=""></button>
				
				</div>
					
			</div>
		</div>
	</div>
</form>
</div>
</div>
</div>
</div>
</div>

	<script type="text/javascript">
	
	unichatwidgetdiv=document.getElementById('unichatwidget').innerHTML;
    singlechatwidgetdiv=document.getElementById('singlechatwidget').innerHTML;
	
	
	<?php
		if(get_option($pref.'is_single')=='1')
		{
			echo "
			document.getElementById('unichatwidget').innerHTML='';
			document.getElementById('singlechatwidget').innerHTML=singlechatwidgetdiv;";
		}
		else
		{
			echo "
			document.getElementById('unichatwidget').innerHTML=unichatwidgetdiv;
			document.getElementById('singlechatwidget').innerHTML='';";
		}
	?>
	
	</script>
	
	<style type="text/css">
		
		#unicontainer
		{
			/*margin-right: 10px;*/
		

		}
		#unicontainer label{
			margin-top: 10px;
		}
		
		#unicontainer .panel-heading{background: linear-gradient(#374048,#374048);}
		
		#unicontainer .unitoppanel{background: linear-gradient(#2c333a,#2c333a);}
		
		#unicontainer .panel{border-color:#525863 !important;}
		#unicontainer #img	{width: 20px; }
		#unicontainer #unisavesettings{background-image:url(<?php echo plugins_url('img/savesettings.png',__FILE__); ?>);height: 37px;
    width: 162px;border:0px;}
	
	.unilinebreak {
    border: 0px;
    height: 2px;
	margin-top:0px;
	margin-bottom:20px;
    background: linear-gradient(to right,#4d4d4d,white);
}
.panel-primary {
    border-color: #337ab7;
}
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.panel-primary>.panel-heading {
    color: #fff;
    background-color: #337ab7;
    border-color: #337ab7;
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}


.h4, .h5, .h6, h4, h5, h6 {
    margin-top: 10px;
    margin-bottom: 10px;
}
.panel-body {
    padding: 15px;
}
b, strong {
    font-weight: 700;
}
.input-group {
    position: relative;
    display: table;
    border-collapse: separate;
}
.input-group-addon:first-child {
    border-right: 0;
}

.input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group>.btn, .input-group-btn:first-child>.dropdown-toggle, .input-group-btn:last-child>.btn-group:not(:last-child)>.btn, .input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.input-group-addon {
    padding: 6px 12px;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    color: #555;
    text-align: center;
    background-color: #eee;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.input-group-addon, .input-group-btn {
    width: 1%;
    white-space: nowrap;
    vertical-align: middle;
}
.input-group .form-control, .input-group-addon, .input-group-btn {
    display: table-cell;
}
.input-group-addon input[type=checkbox], .input-group-addon input[type=radio] {
    margin-top: 0;
}
input[type=checkbox], input[type=radio] {
    margin: 4px 0 0;
    margin-top: 1px\9;
    line-height: normal;
}
input[type=checkbox], input[type=radio] {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0;
}
@media screen and (max-width: 782px)
{
input[type=checkbox], input[type=radio] {
    height: 1.5625rem;
    width: 1.5625rem;
}
input[type=radio] {
    border-radius: 50%;
    margin-right: .25rem;
    line-height: .71428571;
}
}
.input-group .form-control:last-child, .input-group-addon:last-child, .input-group-btn:first-child>.btn-group:not(:first-child)>.btn, .input-group-btn:first-child>.btn:not(:first-child), .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group>.btn, .input-group-btn:last-child>.dropdown-toggle {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
.input-group .form-control, .input-group-addon, .input-group-btn {
    display: table-cell;
}
.input-group .form-control {
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;
}
.form-control {
    display: block;
    width: 90%;
    height: 34px;
    padding: 4px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
p {
    margin: 0 0 10px;
}
.input-group {
    position: relative;
    display: table;
    border-collapse: separate;
}
.panel-footer {
    padding: 10px 15px;
    background-color: #f5f5f5;
    border-top: 1px solid #ddd;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}
</style>