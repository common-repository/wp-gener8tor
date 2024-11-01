<?php
$unichatstarticon=esc_url(plugins_url('img/startchat.png',__FILE__));
$unichatcloseicon=esc_url(plugins_url('img/closechat.png',__FILE__));
$facebookicon=esc_url(plugins_url('img/icons/facebook.png',__FILE__));
$whatsappicon=esc_url(plugins_url('img/icons/whatsapp.png',__FILE__));
$telegramicon=esc_url(plugins_url('img/icons/telegram.png',__FILE__));
$snapchaticon=esc_url(plugins_url('img/icons/snapchat.png',__FILE__));
$emailicon=esc_url(plugins_url('img/icons/email.png',__FILE__));
$telephoneicon=esc_url(plugins_url('img/icons/telephone.png',__FILE__));
$messageicon=esc_url(plugins_url('img/icons/message.png',__FILE__));
//echo "<script>alert('".$unichatstarticon."')</script>";

?>


<script>
jQuery(document).ready(function($)
{
	<?php if(get_option($pref.'opened_widget')!='1'){ ?>
	    var unistart=1;
	<?php }else{ ?>
	var unistart=0;
	<?php } ?>
   var unimaindivcotime=parseFloat("<?php echo get_option($pref.'appear_after'); ?>");
	if(unimaindivcotime<1)
	{
		unimaindivcotime=0.4;
	}
	unimaindivcotime=unimaindivcotime*1000;
	//alert(unimaindivcotime);
	$("#unistartchat,.uni-widget-close").click(function(){
	if(unistart==1)
	{
		$("#wpunichatmaindiv").show(unimaindivcotime);
		$("#unistartchat").attr("src","<?php echo $unichatcloseicon; ?>");
		unistart=0;
	}
	else
	{
		$("#wpunichatmaindiv").hide(unimaindivcotime);
		$("#unistartchat").attr("src","<?php echo $unichatstarticon; ?>");
		unistart=1;
	}
	});
});
</script>
<script type="text/javascript">
function wpUniChatMessangerDisplay()
{
	document.getElementById("unichatscrenformessanger").style.display= "block";
	document.getElementById("unichatscrenformessangerstyle").innerHTML= "<style>#unichatscrenformessanger{position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);max-height:100%;max-width:100%;z-index:9999999;box-shadow: 2px 2px 15px 2px rgba(0,0,0,4);}</style>";
}
/*
var unistart=1;
function uniStartStopChat()
{
	if(unistart==1)
	{
		document.getElementById("wpunichatmaindiv").style.display= "block";
		document.getElementById("unistartchat").src="<?php echo $unichatcloseicon; ?>";
		unistart=0;
	}
	else
	{
		document.getElementById("wpunichatmaindiv").style.display= "none";
		document.getElementById("unistartchat").src= "<?php echo $unichatstarticon; ?>";
		unistart=1;
	}
}
*/
function openWhatsAppChatBox()
{
	window.open("https://api.whatsapp.com/send?phone=<?php echo str_replace('+','',get_option($pref.'whatsapp_number')); ?>", "", "width=600,height=400,toolbar=yes,scrollbars=yes,location=no,resizable=no");

}
function openTelegramChatBox()
{
 window.open("https://telegram.me/<?php echo get_option($pref.'telegram_number'); ?>", "", "width=600,height=400,toolbar=yes,scrollbars=yes,location=no,resizable=no");	
}
function uniChatPopup(str,txt,bg)
{
	document.getElementById("unipopupcontainer").style.position="fixed";
	document.getElementById("unipopupcontainer").style.display="block";
	document.getElementById("unipopuphead").style.backgroundColor=bg;
	document.getElementById("unipopuphdimg").src=str;
	document.getElementById("unipopupdescription").innerHTML=atob(txt);
}
function uniChatMailPopup()
{
	document.getElementById("unimailpopupcontainer").style.position="fixed";
	document.getElementById("unimailpopupcontainer").style.display="block";
	document.getElementById("unipopupmailhead").style.backgroundColor="rgb(0,0,51)";
	try
	{
		document.getElementById("uniemailerr").innerHTML="";
	}catch(err){}
}
function sendUniWqMailFromPopup()
{
	var xhttp = new XMLHttpRequest();

	var ajxurl="<?php echo admin_url('admin-ajax.php'); ?>";
	var pref="<?php echo $pref; ?>";
 var name=document.getElementById("uniemailfromname").value;
 var email=document.getElementById("uniemailfromemail").value;
 var subject=document.getElementById("uniemailsubject").value;
 var body=document.getElementById("uniemlbodycntnt").value;
 var chatboxcsrf="<?php echo wp_create_nonce('chatboxcsrf'); ?>";

 var rslt="";
 document.getElementById("uniemailerr").innerHTML="<font color='green'><b>Sending Mail, Please Wait.</b></font>";
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
	{
		rslt=this.responseText;
		if(rslt ==1)
		{
			uniChatPopup("<?php echo $emailicon; ?>",btoa("Mail Sent Successfully"),"rgb(0,0,51)");
			closeUniPopupMailContainer();
		}
		else
		{
			document.getElementById("uniemailerr").innerHTML="<font color='red'><b>"+rslt+"</b></font>";
		}
    };
  }
  xhttp.open("POST",ajxurl, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("action=chatboxcsrxpref&pref="+pref+"&uniemailfromname="+name+"&uniemailfromemail="+email+"&uniemailsubject="+subject+"&uniemlbodycntnt="+body+"&chatboxcsrf="+chatboxcsrf+"&uniemailformsubmit=1");
 
}
</script>

<div id="wpunichatmaindiv" class="wp-unichat-box">


<img src="<?php echo $unichatcloseicon; ?>" class="uni-widget-close">
<?php if(strlen($unichatcloseicon)>5){ ?>
<div class="uni-chat-icon"><img src="<?php echo get_option($pref.'upload_logo'); ?>"></div>
<?php } ?>
<?php if(strlen(get_option($pref.'greeting_message'))>0){ ?>
<div class="uni-chat-text"><p style=" overflow-wrap: break-word;"><?php echo get_option($pref.'greeting_message'); ?></p></div>
<?php }else {echo "<br>";} ?> 

<div class="uni-chat-options">
<?php 
if(get_option($pref.'facebook_active')=='1'){
	echo '
<img src="'.$facebookicon.'" onclick="wpUniChatMessangerDisplay()" title="Contact us on Messenger">';
	}

	if(get_option($pref.'whatsapp_active')=='1')
		echo '
<img src="'.$whatsappicon.'" onclick="openWhatsAppChatBox()" title="Talk to us on WhatsApp">';

if(get_option($pref.'skype_active')=='1')
echo'
<span class="skype-button rounded textonly" data-contact-id="'.get_option($pref.'skype_botid').'" data-text="S" title="Chat with us on Skype"></span>
';
if(get_option($pref.'telegram_active')=='1')
	echo '
<img src="'.$telegramicon.'" onclick="openTelegramChatBox()" title="Contact Us On Telegram">';
if(get_option($pref.'snapchat_active')=='1')
{
	$snapchat=base64_encode('SNAPCHAT: '.get_option($pref.'snapchat_id'));
	echo '
<img src="'.$snapchaticon.'" onclick=uniChatPopup(this.src,"'.$snapchat.'","rgb(0,0,51)") title="Contact Us On Snapchat">';

}

if(get_option($pref.'message_active')=='1'){
if($ismobile==1)
{echo '<a href="sms:'.get_option($pref.'message_number').'"><img src="'.$messageicon.'" title="Message Us On Mobile"></a>';
}
else
{
$unismsnumber=base64_encode("SMS: ".get_option($pref.'message_number')."");
echo '<img src="'.$messageicon.'" data="test" onclick=uniChatPopup(this.src,"'.$unismsnumber.'","#000033") title="Message Us On Mobile">';
}
}
if(get_option($pref.'email_active')=='1'){echo '<img src="'.$emailicon.'" title="Send Email" onclick="uniChatMailPopup()">';
}
if(get_option($pref.'telephone_active')=='1'){
if($ismobile==1){
echo'
<a href="tel:'.get_option($pref.'telephone_number').'">
<img src="'.$telephoneicon.'" title="Call Us">
</a>';}
else
{
	$unicallnumber="CALL: ".get_option($pref.'telephone_number')."";
	$unicallnumber=base64_encode($unicallnumber);
	echo '<img src="'.$telephoneicon.'" onclick=uniChatPopup(this.src,"'.$unicallnumber.'","rgb(0,0,51)") title="Call Us">';
}
}
?>



</div>

</div>
<img id="unistartchat" src="<?php echo $unichatstarticon; ?>" style="max-height:60px;max-width:60px;z-index:999999;bottom:10px;right:10px;position:fixed;cursor:pointer;">


<div id="unichatscrenformessanger">
<img src="<?php echo $unichatcloseicon; ?>" style="max-width:30px;max-height:30px;top:5px;right:0px;position:absolute;z-index:999999;cursor:pointer" onclick="closeUnichatFbScreen()">
<script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '95100348886',
          xfbml      : true,
          version    : 'v2.6'
        });
      };

      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
<div class="fb-page" 
         data-href="<?php echo get_option($pref.'facebook_pagid'); ?>" 
         data-tabs="messages" 
		 <?php 
		 if($ismobile==1)
		 {
			 echo 'data-width:"250"
	         data-height:"200"
	       ';}
	     else
		 {
         echo 'data-width="400" 
         data-height="300" ';
		 }
		 ?>
         data-small-header="true">
      <div class="fb-xfbml-parse-ignore">
        <blockquote>Loading</blockquote>
      </div>
    </div>
</div>




<?php if(get_option($pref.'opened_widget')!='1'){ ?>
<script>
(function($){$("#wpunichatmaindiv").hide();})(jQuery);
</script>
<?php } ?>

<script type="text/javascript">
function closeUnichatFbScreen()
{
document.getElementById("unichatscrenformessanger").style.display= "none";
}
closeUnichatFbScreen();
//document.getElementById("wpunichatmaindiv").style.display= "none";

function unichatSkypeBox()
{
document.getElementById("chatIconText").value= "none";
var t=setTimeout(unichatSkypeBox(),1000);
}
//unichatSkypeBox();
</script>
<div id="unichatscrenformessangerstyle">
</div>

<style>
.wp-unichat-box
{
	box-shadow: 2px 2px 15px 2px rgba(0,0,0,0.17);
    border: 1px solid #e2e2e2;
	border-radius:5px;
	width:400px;
	/*min-height:170px;*/
	bottom:75px;
	right:15px;
	z-index:999999;
	background-color:white;
	position:fixed;
	padding:5px;
	
}
.uni-widget-close{

    right: 0px;
    top: 1px;
    position: absolute;
    margin:5px;
	margin-top:0px;
	max-height:20px;
	max-width:20px;
	cursor:pointer;
}
.uni-chat-icon,.uni-chat-icon img
{
	max-height:40px;max-width:40px;border-radius:50%;margin-top:6px;
}
.uni-chat-text
{
	<?php if(strlen(get_option($pref.'upload_logo'))>5) {echo "width:85%;";}else{echo "width:94%;";} ?>
	margin-top:22px;
	margin-left:10px;
	border:1px solid white;
	padding:10px;
	border-radius:0px 5px 0px 5px; 
	box-shadow:1px 2px 2px 2px rgba(0,0,0,0.10);
	font-size:15px;
	position:relative;
}

.uni-chat-options{
	margin-left:30px;border:1px solid white;
	}
.uni-chat-options img,.skype-button
{
	margin:5px;
	max-height:40px; max-width:32px;float:left;
	shadow:1px 2px 2px 2px rgba(0,0,0,0.10);
	cursor:pointer;
}
span.skype-button.rounded.textonly {
    /*margin-top: -1px;*/
}

.uni-chat-icon,.uni-chat-text{float:left;}
@media screen and (max-width:430px)
{
	.wp-unichat-box
	{
	width:95%;
	}
	.uni-chat-text
{
<?php if(strlen(get_option($pref.'upload_logo'))>5) {echo "width:80%;";}else{echo "width:95%;";} ?>}
	.uni-chat-options{
	border:1px solid white;
	bottom:5px;
	}

	
	.uni-chat-options img,.skype-button,.rounded .lwc-chat-button
{
	
	max-height:25px; max-width:30px;float:left;
	shadow:1px 2px 2px 2px rgba(0,0,0,0.10);
	cursor:pointer;
}
.lwc-chat-button{padding: 1px 10px;}
	.lwc-button-text{font-size:10px;}
}
</style>

<div id="unimailpopupcontainer">
<script type="text/javascript">
function closeUniPopupMailContainer()
{
	document.getElementById("unimailpopupcontainer").style.display="none";
}
</script>
<div id="unipopupmailhead">
<img id="unipopupmailhdimg" src="<?php echo $emailicon; ?>">
<img id="unipopupmailclosediv"  src="<?php echo $unichatcloseicon; ?>" onclick="closeUniPopupMailContainer()"> 

</div>

<div id="unipopupmailbody">
<center><strong><p id="unipopupmaildescription">Send Email</p></strong></center>
<div id="uniperformmail">
<center>
<input type="text" placeholder="Enter Your Name" id="uniemailfromname" required>
<input type="email" placeholder="Your Email Id" id="uniemailfromemail" required>
<input type="text" placeholder="Enter Subject" id="uniemailsubject" required>
<textarea placeholder="Add Email Body" id="uniemlbodycntnt" required></textarea>
<div id="uniemailerr" style="font-size:15px;"></div>
<input type="button" value="Send Email" id="uniemailformsubmit" onclick="sendUniWqMailFromPopup()">
</center>
</div>
</div>
<div id="unpopupmailfooter">


</div>

</div>
<style>
#uniperformmail input[type=text],#uniperformmail input[type=email] 
{
	width:95%;
	margin:5px;
	margin-bottom:8px;
	height:35px;
	border:1px solid #bb99ff;
	border-radius:5px;
	padding:5px;
	padding-top:8px;padding-bottom:8px;
	font-size:15px;
}
#uniperformmail input::placeholder,#uniperformmail textarea::placeholder
	{
		color:#4da6ff;
		font-size:15px;
	}
#uniperformmail textarea
{
	width:95%;
	margin:5px;
	margin-top:10px;
	min-height:200px;
	resize:vertical;
	border:1px solid #bb99ff;
	font-size:15px;
}
#uniperformmail input[type=button]
{
	width:95%;
	font-size:15px !important;
	color:white;
	background-color:#0080ff;
	border:0px;
	border-radius:5px;
	padding-top:10px;
	padding-bottom:10px;
}

#unimailpopupcontainer{
	max-width:480px;
	min-width:450px;
	top: 50%;
  left: 50%;
  /* bring your own prefixes */
  transform: translate(-50%, -50%);
	box-shadow: -1px 3px 33px 2px rgba(228,235,14,1);
	border-radius:5px;
	z-index:999999;
	background-color:white;
	display:none;
	}

#unipopupmailhead{width:100%;background-color:#DC143C;border-radius:5px 5px 0px 0px;margin-bottom:2px;position:relative;}

#unipopupmailhdimg{margin:5px;max-height:30px;max-width:30px;display:inline-block;}

#unipopupmailclosediv{right:0px;position:absolute;margin:5px;max-height:20px;max-width:20px;cursor:pointer;}

#unipopupmailbody{padding-top:10px;padding-bottom:10px;border-radius:5px;font-size:10px;}

#unipopupmaildescription{margin:6px;font-size:15px;}

#unpopupmailfooter{}

@media only screen and (max-width:700px)
{
	#unimailpopupcontainer
 {
  min-width:100% !important;
  max-width:100% !important;
  }
  #uniperformmail textarea
  {
	  min-height:100px;
  }
}
</style>

<div id="unipopupcontainer">
<script type="text/javascript">
function closeUniPopupContainer()
{
	document.getElementById("unipopupcontainer").style.display="none";
}
</script>
<div id="unipopuphead">
<img id="unipopuphdimg" src="">

<img id="unipopupclosediv"  src="<?php echo $unichatcloseicon; ?>" onclick="closeUniPopupContainer()"> 

</div>

<div id="unipopupbody">
<p id="unipopupdescription"></p>
</div>

<div id="unpopupfooter"></div>

</div>

<style>
#unipopupcontainer{
	min-width:250px;top:40%;left:40%;
	box-shadow: -1px 3px 33px 2px rgba(228,235,14,1);
	border-radius:5px;
	z-index:999999;
	background-color:white;
	display:none;
	}

#unipopuphead{width:100%;background-color:#DC143C;border-radius:5px 5px 0px 0px;margin-bottom:2px;}

#unipopuphdimg{margin:5px;max-height:30px;max-width:30px;}

#unipopupclosediv{right:0px;position:absolute;margin:5px;max-height:20px;max-width:20px;cursor:pointer;}

#unipopupbody{padding-top:10px;padding-bottom:10px;border-radius:5px;font-size:10px;}

#unipopupdescription{margin:6px;font-size:20px;}

#unpopupfooter{}

@media screen and (max-width:480px)
{
	#unipopupcontainer
	{top: 30%;
  left: 50%;
  /* bring your own prefixes */
  transform: translate(-50%, -50%);
  }
}
</style>
<div id="unipopupdynamicstyle">
</div>
<!-- skype manage for mobile -->
<style>
@media screen and (max-width: 470px)
{

iframe.lwc-chat-frame.chat.open-chat {
    margin-bottom: 0px;
}
}
</style>