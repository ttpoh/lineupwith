<?php
                include('../dbLog.php');
                
                $id = $_POST['id'];                      //Writer
                $pw = $_POST['pw'];                        //Password
                $title = $_POST['title'];                  //Title
                $content = $_POST['ir1'];              //Content
                $date = date('Y-m-d H:i:s');            //Date
 
                $URL = 'boardM.php';                   //return URL
                echo $nse_content;
 
                $query = "insert into review (number,title, content, date, hit, id, password) 
                        values(null,'$title', '$content', '$date',0, '$id', '$pw')";           
                
 
                $result = $db->query($query);
                if($result){
?>                  <script>
                        alert("<?php echo "글이 등록되었습니다."?>");
                        location.replace("<?php echo $URL?>");
                    </script>
<?php
                }
                else{
                        echo "FAIL";
                }
 
                mysqli_close($db);
?>
