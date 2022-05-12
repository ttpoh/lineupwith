<?php
session_start();
include('dbLog.php');

if(isset($_POST['my_id']) && isset($_POST['my_pwd'])){
    $my_id = mysqli_real_escape_string($db,$_POST['my_id']);
    $my_pwd = mysqli_real_escape_string($db,$_POST['my_pwd']);
   
    if(empty($my_id)){
        header("location: login.php?error=아이디가 비어 있어요");
    exit();
    }

    else if(empty($my_pwd)){
        header("location: login.php?error=비밀번호가 비어 있어요");
        exit();
    }
   else{
       $sql = "select * from member where my_id = '$my_id'";
       $result = mysqli_query($db, $sql);

       if(mysqli_num_rows($result) === 1)
       {
           $row = mysqli_fetch_assoc($result);
           $hash = $row['password'];

           if(password_verify($my_pwd, $hash))
            {  
                $_SESSION['my_id'] = $row['my_id'];
                // $_SESSION['email'] = $row['email'];
                // $_SESSION['no'] = $row['my_no'];
                header("location: home.php");
               exit();
           }
           else{
            header("location: login.php?error=로그인에 실패했습니다.");
            exit();
           }
       }
       else{
        header("location: login.php?error=아이디가 잘못되었습니다.");
        exit();
       }
        
   }
}
else
{
    header("location: login.php?error=알 수 없는 오류가 발생했습니다.");
    exit();
}
?>