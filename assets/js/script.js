jQuery(document).ready(function($){
			    $('#wpucb-upload-btn').click(function(e) {
			        e.preventDefault();
			        var image = wp.media({ 
			            title: 'Upload Image',
						library: {type:'image'},
			            // mutiple: true if you want to upload multiple files at once
			            multiple: false
			        }).open()
			        .on('select', function(e){
			            // This will return the selected image from the Media Uploader, the result is an object
			            var uploaded_image = image.state().get('selection').first();
			            // We convert uploaded_image to a JSON object to make accessing it easier
			            // Output to the console uploaded_image
			            //console.log(uploaded_image);
			            var image_url = uploaded_image.toJSON().url;
			            // Let's assign the url value to the input field
			            $('#wpucb_upload_url').val(image_url);
						document.getElementById("wpucb_upload_img").src=image_url;
			   
			        });
			    });
			});

jQuery(document).ready(function($){
	 $('[data-toggle="tooltip"]').tooltip(); 
});	


			var uniphonenumberfilter=/^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,3})|(\(?\d{2,3}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$/;
			var unimailfilter = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9$#.-]+\.[a-zA-Z]{2,8}$/;
			
			
			function uniEmlValidation(str)
			{
				x=str;
				var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) 
	{
        return false;
    }
	else
	{
		return true;
	}
			}
			
			function wtsupshow(){
    		

				var wtsup=document.getElementById("wpucb-whatsapp-number").value;
				if(wtsup!=="" && uniphonenumberfilter.test(wtsup)){
					document.getElementById("wpucb-whatsapp").disabled=false;
				}else{document.getElementById("wpucb-whatsapp").disabled=true;
				document.getElementById("wpucb-whatsapp").checked=false;
			}
				
			}
			function fbshow(){
				var fburl=document.getElementById("wpucb-fb-url").value;
				var pattern =  /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
				if (pattern.test(fburl)) {
	            document.getElementById("wpucb-fb").disabled=false;
				}else{document.getElementById("wpucb-fb").disabled=true;
				document.getElementById("wpucb-fb").checked=false;}
			}
			function skyshow(){
				var skyemail=document.getElementById("wpucb-skype-email").value;
				if(skyemail.length>3)	
				{document.getElementById("wpucb-skype").disabled=false;}
				else{document.getElementById("wpucb-skype").disabled=true;
				document.getElementById("wpucb-skype").checked=false;}
			}
			
			function snapshow(){
				var snapemail=document.getElementById("wpucb-snapchat-email").value;
				if(snapemail.length>4)
				{document.getElementById("wpucb-snapchat").disabled=false;}
				else{document.getElementById("wpucb-snapchat").disabled=true;
				document.getElementById("wpucb-snapchat").checked=false;}

			}
			function telegshow(){
				var telegno=document.getElementById("wpucb-telegram-number").value;
				if(telegno.length>4)
				{document.getElementById("wpucb-telegram").disabled=false;}
				else{document.getElementById("wpucb-telegram").disabled=true;
				document.getElementById("wpucb-telegram").checked=false;}

			}
			function msgshow(){
				var msgno=document.getElementById("wpucb-message-number").value;
				if(msgno!=="" && uniphonenumberfilter.test(msgno))
					{document.getElementById("wpucb-message").disabled=false;}
				else{document.getElementById("wpucb-message").disabled=true;
				document.getElementById("wpucb-message").checked=false;}

			}
			function emailshow(){
				var email=document.getElementById("wpucb-email-id").value;			 
				if(uniEmlValidation(email))
	       		 	{document.getElementById("wpucb-email").disabled=false; }
	       		else{document.getElementById("wpucb-email").disabled=true; 
	       		document.getElementById("wpucb-email").checked=false;}
			}
			function teleshow() {
				var telno=document.getElementById("wpucb-telephone-number").value;
				if(telno!=="" && uniphonenumberfilter.test(telno))
				 	{document.getElementById("wpucb-telephone").disabled=false;	}
				else{document.getElementById("wpucb-telephone").disabled=true;
				document.getElementById("wpucb-telephone").checked=false;}
		 	}		
		 	

			