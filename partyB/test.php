<?php

include('../dbLog.php');

$date = date('Y-m-d H:i:s');

for($i=0;$i<1000;$i++)
{
    $z=$i+100;
    $query = "insert into mate (number,title, content, date, hit, id, password) 
                        values('$z','$i 번째게시물', 'b', '$date',0, 'a', '1234')";

    echo $query;
                
 
                $result = $db->query($query);

}
?>
