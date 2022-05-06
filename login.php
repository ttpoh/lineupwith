
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    
              
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

                        <label for="my_id">아이디</label>
                        <br>
                        <input type="text" class="form-control" name="my_id" id="my_id" size="12" maxlength="12" placeholder="아이디">
                       
                    </div>
                    <div class="form-group col-md-4">
                        <label for="my_pwd">비밀번호</label>
                        <input type="password" class="form-control" name="my_pwd" id="my_pwd" maxlength="12" placeholder="비밀번호">
                    </div>
                  
                                                 
                    <div class="col-md-12 submit-btn">
                        <button type=submit name="login_btn">로그인</button>
                        <a href="join.php" class="save"> 아직 회원이 아니신가요?</a>                      
                        <input type="button" value="취소"onclick="javascripｔ:history.go(-1)">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>