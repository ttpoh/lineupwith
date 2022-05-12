<?php
                include('../dbLog.php');
                
                $id = $_GET['id'];
                                     //Writer
                $pw = $_GET['pw'];                        //Password
                $title = $_GET['title'];
                                 //Title
                $content = $_GET['content'];              //Content
                $date = date('Y-m-d H:i:s');            //Date
 
                $URL = 'boardMain.php';                   //return URL
 
 
                $query = "insert into mate (number,title, content, date, hit, id, password) 
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
