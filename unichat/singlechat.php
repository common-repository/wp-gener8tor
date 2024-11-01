<?php
$unichatcloseicon=esc_url(plugins_url('img/closechat.png',__FILE__));
$activechaticon=esc_url(plugins_url('img/icons/'.$activechatbutton.'.png',__FILE__));
if($activechatbutton=='facebook')
{
	echo '
	<img id="singleunistartchat" src="'.$activechaticon.'" style="max-height:60px;max-width:60px;z-index:999999;bottom:10px;right:10px;position:fixed" 
onclick="wpUniChatMessangerDisplay()"
 title="Contact us on Messenger">
 ';
}
if($activechatbutton=='whatsapp')
{
echo '<script type="text/javascript">
	function openWhatsAppChatBox()
{
	window.open("https://api.whatsapp.com/send?phone='.str_replace('+','',get_option($pref.'whatsapp_number')).'", "", "width=600,height=400,toolbar=yes,scrollbars=yes,location=no,resizable=no");

}
</script>
';	
	echo '<img id="singleunistartchatwp" src="'.$activechaticon.'" style="max-height:40px;max-width:40px;z-index:999999;bottom:10px;right:10px;position:fixed;"
onclick="openWhatsAppChatBox()" title="Talk to us on WhatsApp">';
}
if($activechatbutton=='skype')
{
	echo '
	<div class="singleskype"  title="Chat with us on Skype">
	<span class="skype-button rounded textonly" data-contact-id="'.get_option($pref.'skype_botid').'" data-text="S"></span>
	</div>
	
	<style>
	.singleskype{
		padding:4px !important;background-color:#00AFF0 !important;border:1px solid white;
		max-height:60px;max-width:60px;z-index:999999;bottom:10px;right:10px;position:fixed}
		@media screen and (max-width: 470px)
{

iframe.lwc-chat-frame.chat.open-chat {
    margin-bottom: 0px;
}
}
	</style>
	';
}
if($activechatbutton=='telegram')
{
	echo '<script type="text/javascript">function openTelegramChatBox()
{
 window.open("https://telegram.me/'.get_option($pref.'telegram_number').'", "", "width=600,height=400,toolbar=yes,scrollbars=yes,location=no,resizable=no");	
}</script>';
	
	
	echo '
	<img id="singleunistartchat" src="'.$activechaticon.'" style="max-height:60px;max-width:60px;z-index:999999;bottom:10px;right:10px;position:fixed"
	onclick="openTelegramChatBox()" title="Chat with Us On Telegram">
';

}

if($activechatbutton=='email')
{
	echo '
	<script type="text/javascript">
	function uniChatMailPopup()
{
	//alert(str);
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
	var ajxurl="'.admin_url('admin-ajax.php').'";
	 var chatboxcsrf="'.wp_create_nonce('chatboxcsrf').'";

	var pref="'.$pref.'";
 var name=document.getElementById("uniemailfromname").value;
 var email=document.getElementById("uniemailfromemail").value;
 var subject=document.getElementById("uniemailsubject").value;
 var body=document.getElementById("uniemlbodycntnt").value;
 var rslt="";
 document.getElementById("uniemailerr").innerHTML="<font color=green><b>Sending Mail, Please Wait.</b></font>";
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
	{
		rslt=this.responseText;
		if(rslt ==1)
		{
			uniChatPopup("'.$activechaticon.'",btoa("Mail Sent Successfully"),"rgb(0,0,51)");
			closeUniPopupMailContainer();
		}
		else
		{
			document.getElementById("uniemailerr").innerHTML="<font color=red><b>"+rslt+"</b></font>";
		}
    };
  }
  xhttp.open("POST",ajxurl, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("action=singlechatcsrf&pref="+pref+"&uniemailfromname="+name+"&uniemailfromemail="+email+"&uniemailsubject="+subject+"&uniemlbodycntnt="+body+"&chatboxcsrf="+chatboxcsrf+"&uniemailformsubmit=1");
}
</script>
	<img id="singleunistartchat" src="'.$activechaticon.'" style="max-height:60px;max-width:60px;z-index:999999;bottom:10px;right:10px;position:fixed"
onclick="uniChatMailPopup()"
title="Email Us">

<div id="unimailpopupcontainer">
<script type="text/javascript">
function closeUniPopupMailContainer()
{
	document.getElementById("unimailpopupcontainer").style.display="none";
}
</script>
<div id="unipopupmailhead">
<img id="unipopupmailhdimg" src="'.$activechaticon.'">
<img id="unipopupmailclosediv"  src="'.$unichatcloseicon.'" onclick="closeUniPopupMailContainer()"> 

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

';
}

?>
<?php
if($activechatbutton=='message'||$activechatbutton=='telephone'||$activechatbutton=='snapchat'||$activechatbutton=='email')
{

 echo '
 <script type="text/javascript">
 function uniChatPopup(str,txt,bg)
{
	//alert(str);
	document.getElementById("unipopupcontainer").style.position="fixed";
	document.getElementById("unipopupcontainer").style.display="block";
	document.getElementById("unipopuphead").style.backgroundColor=bg;
	document.getElementById("unipopuphdimg").src=str;
	document.getElementById("unipopupdescription").innerHTML=atob(txt);
}
</script>

<div id="unipopupcontainer">
<script type="text/javascript">
function closeUniPopupContainer()
{
	document.getElementById("unipopupcontainer").style.display="none";
}
</script>
<div id="unipopuphead">
<img id="unipopuphdimg" src="">

<img id="unipopupclosediv"  src="'.$unichatcloseicon.'" onclick="closeUniPopupContainer()"> 

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
<script type="text/javascript">document.getElementById("unipopupcontainer").style.display="none";</script>

';

}
?>

<?php
if($activechatbutton=='snapchat')
{
	$snapchat=base64_encode('SNAPCHAT: '.get_option($pref.'snapchat_id'));
	echo '<img id="singleunistartchat" src="'.$activechaticon.'" style="max-height:60px;max-width:60px;z-index:999999;bottom:10px;right:10px;position:fixed"
onclick=uniChatPopup(this.src,"'.$snapchat.'","rgb(0,0,51)")
title="Contact Us On SnapChat">';
}
if($activechatbutton=='message')
{
	if($ismobile==1)
	{
	echo '<a href="sms:'.get_option($pref.'message_number').'"><img id="singleunistartchat" src="'.$activechaticon.'" style="max-height:60px;max-width:60px;z-index:999999;bottom:10px;right:10px;position:fixed"></a>';
	}
	else
	{
		$unismsnumber=base64_encode("SMS: ".get_option($pref.'message_number')."");
	echo '<img id="singleunistartchat" src="'.$activechaticon.'" style="max-height:60px;max-width:60px;z-index:999999;bottom:10px;right:10px;position:fixed" 
	onclick=uniChatPopup(this.src,"'.$unismsnumber.'","#000033") title="Message Us On Mobile">';
	}
}

if($activechatbutton=='telephone')
{
	if($ismobile==1){
	echo'
	<a href="tel:'.get_option($pref.'telephone_number').'">
	
	<img id="singleunistartchat" src="'.$activechaticon.'" style="max-height:60px;max-width:60px;z-index:999999;bottom:10px;right:10px;position:fixed"
	onclick="uniStartStopChat()">
	
	</a>';}
	else
	{
		$unicallnumber=base64_encode("CALL: ".get_option($pref.'telephone_number')."");
	echo '<img id="singleunistartchat" src="'.$activechaticon.'" style="max-height:60px;max-width:60px;z-index:999999;bottom:10px;right:10px;position:fixed"
onclick=uniChatPopup(this.src,"'.$unicallnumber.'","rgb(0,0,51)")
 telephone="">';
	}
	
}

?>

<?php if($activechatbutton=='facebook'){ ?>

<script type="text/javascript">
function wpUniChatMessangerDisplay()
{
	//alert("ok");
	document.getElementById("unichatscrenformessanger").style.display= "block";
	document.getElementById("unichatscrenformessangerstyle").innerHTML= "<style>#unichatscrenformessanger{position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);max-height:100%;max-width:100%;z-index:9999999;box-shadow: 2px 2px 15px 2px rgba(0,0,0,4);}</style>";
}
</script>

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




<script type="text/javascript">
function closeUnichatFbScreen()
{
document.getElementById("unichatscrenformessanger").style.display= "none";
}
closeUnichatFbScreen();
</script>
<div id="unichatscrenformessangerstyle">
</div>
<?php } ?>

<style>
#singleunistartchat,.singleskype{
	padding:1px;
	background-color:white;
	border-radius:50%;
	-webkit-box-shadow: 0px 0px 19px 1px rgba(228,235,14,1);
-moz-box-shadow: 0px 0px 19px 1px rgba(228,235,14,1);
box-shadow: 0px 0px 19px 1px rgba(228,235,14,1);
cursor:pointer;
}
</style>