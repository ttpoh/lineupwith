<?php
                include('../dbLog.php');
                
                $id = $_GET['id'];                     //Writer              
                $title = $_GET['title'];                  //Title
                $content = $_GET['content'];              //Content               
                $number = $_GET['number'];
                $date = date('Y-m-d H:i:s');            //Date
                $URL = 'boardMain.php';                   //return URL
 
 
                $query = "update mate set title='$title', content='$content', date='$date' WHERE number='$number'";
  
                $result = $db->query($query);
                if($result){
?>                  <script>
                        alert("<?php echo "글이 수정되었습니다."?>");
                        location.replace("<?php echo $URL?>");
                    </script>
<?php
                }
                else{
                        echo "FAIL";
                }
 
                mysqli_close($db);
?>

