<?php
	include('../dbLog.php');

    $number = $_GET['number'];
    $user = $_POST['dat_user'];
    $content = $_POST['content'];
    $userpw = password_hash($_POST['dat_pw'], PASSWORD_DEFAULT);

 
    if($number && $user && $userpw && $content){
        // $sql3 = "select * from reply where board_number='".$number."' order by number desc";
        $date = date('Y-m-d H:i:s');
        $sql = "insert into reply(board_number,id,content,date,pw) values('$number','$user','$content','$date','$userpw')";
        
        $result = $db->query($sql);
       

        echo "<script>alert('댓글이 작성되었습니다.'); 

        location.href='/myweb/partyB/boardView.php?number=$number';</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
	
?>