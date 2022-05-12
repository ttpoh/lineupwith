<?php
session_start();
$my_id = isset($_SESSION["my_id"])? $_SESSION["my_id"]:"";
// echo $my_id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1. 0">

    <link rel="stylesheet" type="text/css" href="style.css?d">
            
    <title>main</title>
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
	  
			 function openPopup()
				  {
				  var cookieCheck = getCookie("popupYN");
				  if (cookieCheck != "N") window.open('popup.html?d', 'event', 'width=300,height=300,width:200px left:0 right:0 margin-left:auto')
				  }
		  </script>
  
</head>
<body>
<div class="wrap">   
    <div class="intro_bg">        
        <div class="header">
            <div class="searchArea">
                <form></form> 
                                    
            </div>
         <ul class="nav">
            <li><a href="">HOME</a></li>
            <li><a href="./partyB/boardMain.php">COMMUNITY</a></li>
            <?php if(!$my_id){/* 로그인 전  */ ?>
            <p>        
            <li><a href="login.php">LOGIN</a></li>
            <li><a href="join.php">JOIN</a></li>
            </p>
            <?php } else{ /* 로그인 후 */ ?>
            <p>
            <br>
                "<?php echo $my_id; ?>"님 안녕하세요.</p>
                <!-- <button type="logout_btn" onclick="location.href='logout.php'">로그아웃</button>  -->
                <a href="logout.php" class="bar">로그아웃</a>      
                <?php }; ?>
         </ul> 
        </div>
         <div class="intro_text">
             <h1>LINE UP WITH</h1>
             <!-- <h1>떼창</h1> -->
             <!-- <img src="./board2/img/concert2.jpg" width="1200", height="500">    -->
         </div>
        </div>
        </div>
        </div>
        <body onload=javascript:openPopup()>
    </body>
</html>
