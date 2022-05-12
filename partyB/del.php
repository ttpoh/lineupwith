<?php
                include('../dbLog.php');
                
                $id = $_GET['name'];                      //Writer
                $number = $_GET['number'];                //number
                $title = $_GET['title'];                  //Title
                $content = $_GET['content'];              //Content
                $date = date('Y-m-d H:i:s');            //Date
 
                $URL = 'boardMain.php';                   //return URL
 
 
                $query = "delete from mate where number='$number'";
 
 
                $result = $db->query($query);
                
?>                  
<script>
                        alert("<?php echo "글이 삭제되었습니다."?>");
                        location.replace("<?php echo $URL?>");
</script>