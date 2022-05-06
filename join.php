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
        <h3>회원가입</h3>
        <form name="join" method="post" action="joinServer.php">
            <fieldset>
                <div class="form-row">
                    
                    <?php if(isset($_GET['error'])){ ?>
                        <p><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if(isset($_GET['success'])){ ?>
                        <p><?php echo $_GET['success']; ?></p>
                    <?php } ?>


                        <label for="my_id">아이디</label>
                        <input type="text" class="form-control" name="my_id" id="my_id" size="12" maxlength="12" placeholder="아이디">
                        <!-- <input type=button value="중복" onclick=chid()>
                        <input type=hidden id="chk_id2" name=chk_id2 value="0"> -->

                    </div>
                    <div class="form-group col-md-4">
                        <label for="my_pwd">비밀번호</label>
                        <input type="password" class="form-control" name="my_pwd" id="my_pwd" maxlength="12" placeholder="비밀번호">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="my_pwd">비밀번호 확인</label>
                        <input type="password" class="form-control" name="my_pwd2" id="my_pwd2" maxlength="12" placeholder="비밀번호 확인">
                    </div>
                    <!-- <div class="form-group col-md-6">
                    <p>                                     
                        <label for="male">남성</label>
                        <input id="male" type="radio"  value="남성" name="ss">
                      
                        <label for="female">여성</label>
                        <input id="female" type="radio" checked value="여성" name="ss">
                      </p> -->
                    <!-- </div> -->
                    <div class="form-group col-md-6">
                        <label for="my_mail">이메일</label>
                        <input type="email" class="form-control" name="my_mail" id="my_mail" placeholder="메일주소">
                   
                    </div>                  
                                                 
                    <div class="col-md-12 submit-btn">
                        <input type=submit value="회원가입">
                        <a href="login.php" class="save"> 이미 회원이신가요?</a>                       
                        <input type="button" value="취소"onclick="javascripｔ:history.go(-1)">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>