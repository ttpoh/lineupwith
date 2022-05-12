
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css?c">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
    
              
    <title>Document</title>
</head>
<body>
    <div class="register">
        <h3>로그인</h3>        
        <form name="join" method="post" action="loginServer.php">
            <fieldset>
                <div class="form-row">
                    
                    <?php if(isset($_GET['error'])){ ?>
                        <p><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if(isset($_GET['success'])){ ?>
                        <p><?php echo $_GET['success']; ?></p>
                    <?php } ?>
                        <input type="text" class="form-control" name="my_id" id="my_id" size="12" maxlength="12" placeholder="아이디">
                        <br>

                       
                    </div>
             
                        <input type="password" class="form-control" name="my_pwd" id="my_pwd" size="12" maxlength="12" placeholder="비밀번호">
                  
                    <br>
     
                    <div class="col-md-12 submit-btn">
                        <button type=submit class="form-control" name="login_btn">로그인</button>
                        <input type="button" class="form-control" value="취소"onclick="javascripｔ:history.go(-1)">
                        <br>
                        <a href="join.php" class="save"> 아직 회원이 아니신가요?</a>                      
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>