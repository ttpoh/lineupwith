<?php
include('dbLog.php');

if(isset($_POST['my_id']) && isset($_POST['my_pwd']) && isset($_POST['my_pwd2']) && isset($_POST['my_mail'])){
    $my_id = mysqli_real_escape_string($db,$_POST['my_id']);
    $my_pwd = mysqli_real_escape_string($db,$_POST['my_pwd']);
    $my_pwd2 = mysqli_real_escape_string($db,$_POST['my_pwd2']);
    $my_mail = mysqli_real_escape_string($db,$_POST['my_mail']);

    if(empty($my_id)){
        header("location: join.php?error=아이디가 비어 있어요");
    exit();
    }

    else if(empty($my_pwd)){
        header("location: join.php?error=비밀번호가 비어 있어요");
        exit();
    }
    else if(empty($my_pwd2)){
        header("location: join.php?error=비밀번호가 비어 있어요");
        exit();
    }
    else if(empty($my_mail)){
        header("location: join.php?error=이메일이 비어 있어요");
        exit();
    }
    else if($my_pwd !== $my_pwd2){
        header("location: join.php?error=비밀번호가 일치하지 않아요.");
        exit();
    }
    else{
        
        $my_pwd = password_hash($my_pwd, PASSWORD_DEFAULT);

        $sql_same = "SELECT * FROM member where my_id = '$my_id'";
        $order = mysqli_query($db, $sql_same);

        if(mysqli_num_rows($order) > 0){
        header("location: join.php?error=이미 존재하는 아이디입니다.");
        exit();
    }
        else{

        $sql_save = "insert into member(my_id, password, email) values('$my_id', '$my_pwd', '$my_mail')";

        $result = mysqli_query($db, $sql_save);

        if($result){
            
            echo "<script>alert(\"가입되었습니다.\")
            </script>";
            echo "<script>location.href='home.php'</script>";
         exit();
        
        }else
        {
        header("location: join.php?error=가입에 실패했습니다.");
        exit();
        }

    }
    
    }
}
else
{
    header("location: join.php?error=알 수 없는 오류가 발생했습니다.");
    exit();
}
?>