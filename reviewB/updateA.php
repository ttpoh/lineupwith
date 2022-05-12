<?php

include('../dbLog.php');

                $id = $_POST['id'];                     //Writer              
                $title = $_POST['title'];                  //Title
                $content = $_POST['ir2'];              //Content
               
                $number = $_POST['number'];
                $date = date('Y-m-d H:i:s');            //Date

                $URL = 'boardM.php';                   //return URL
 
                // echo $content;
                
                $query = "update review set title='$title', content='$content', date='$date' WHERE number='$number'";
  
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

