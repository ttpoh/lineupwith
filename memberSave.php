<html>
   <meta charset="utf-8">
<?php
 
$host = '192.168.56.101';
$user = 'aiden';
$pw = 'zZ11626815!@';
$dbName = 'myweb';
$mysqli = new mysqli($host, $user, $pw, $dbName);
 
 $id=$_POST['id'];
 $password=($_POST['password']);
 $gender=$_POST['gender'];
 $email=$_POST['email'];
 
 
 $sql = "insert into member (id, password, gender, email)";            
 // (입력받음)insert into 테이블명 (column-list)
 $sql = $sql. "values('$id','$password','$gender','$email')";         
 // calues(column-list에 넣을 value-list)
 if($mysqli->query($sql)){                                                              
    //만약 sql로 잘 들어갔으면
  echo 'success inserting <p/>';                                                            //success inserting 으로 표시
  echo $name.'님 가입 되셨습니다.<p/>';                                   
  // id님 안녕하세요.
 }else{                                                                                //아니면
  echo 'fail to insert sql';                                                            //fail to insert sql로 표시
 }
mysqli_close($mysqli);
 
 
?>
<input type="button" value="로그인하러가기" onclick="location='home.html'">
</html>
