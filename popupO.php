<!DOCTYPE html>
<html>
	  
	  <head>
		  <script type="text/javascript">
			  function getCookie(name)
			  {
				  var cookie = document.cookie;
						  if (document.cookie != "") {
							  var cookie_array = cookie.split("; ");
							  for ( var index in cookie_array) {
								  var cookie_name = cookie_array[index].split("=");
								  if (cookie_name[0] == "popupYN") {
									  return cookie_name[1]; } }
						  }
				  return ;
			  }
	  
			 function openPopup(url)
				  {
				  var cookieCheck = getCookie("popupYN");
				  if (cookieCheck != "N") window.open(url, '', 'width=300,height=300,left=0,top=0')
				  }
		  </script>
		</head>
		
		
		
		<body onload=javascript:openPopup('popup.html'>
		
		
		
		
		</body>
		
</html>