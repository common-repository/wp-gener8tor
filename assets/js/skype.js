jQuery(document).ready(function( $ ) {
    setTimeout(function(){
		try
		{
		let skypedoc=document.querySelectorAll("span.skype-button");
		if(skypedoc !==undefined && skypedoc.length>0)
		{
		let skypeCDNScript = document.createElement('script');
		skypeCDNScript.src = "https://swc.cdn.skype.com/sdk/v1/sdk.min.js";
		//skype-button
        document.body.appendChild(skypeCDNScript);
		}
		}catch(err){console.log(err.message);}
    },20);
});
