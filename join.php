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


                        <!-- <label for="my_id">아이디</label> -->
                        <input type="text" class="form-control" name="my_id" id="my_id" size="12" maxlength="12" placeholder="아이디">
                        <br>
                        <!-- <input type=button value="중복" onclick=chid()>
                        <input type=hidden id="chk_id2" name=chk_id2 value="0"> -->

                    <!-- </div> -->
                    <!-- <div class="form-group col-md-4"> -->
                        <!-- <label for="my_pwd">비밀번호</label> -->
                        <input type="password" class="form-control" name="my_pwd" id="my_pwd" size="12" maxlength="12" placeholder="비밀번호">
                        <br>
                    <!-- </div> -->
                    <!-- <div class="form-group col-md-4"> -->
                        <!-- <label for="my_pwd">비밀번호 확인</label> -->
                        <input type="password" class="form-control" name="my_pwd2" id="my_pwd2" size="12" maxlength="12" placeholder="비밀번호 확인">
                        <br>
                    <!-- </div> -->
                 
                    <!-- <div class="form-group col-md-6"> -->
                        <!-- <label for="my_mail">이메일</label> -->
                        <input type="email" class="form-control" name="my_mail" id="my_mail" placeholder="메일주소">
                        <br>
                   
                    <!-- </div>                   -->
                                                 
                    <!-- <div class="col-md-12 submit-btn"> -->
                        <input type=submit class="form-control" value="회원가입">
                        <input type="button" class="form-control" value="취소"onclick="javascripｔ:history.go(-1)">
                        <a href="login.php" class="save"> 이미 회원이신가요?</a>                       
                        
                    <!-- </div> -->
                <!-- </div> -->
            </fieldset>
        </form>
    </div>
</body>
</html>