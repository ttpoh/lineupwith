<?php

include('../dbLog.php');
$number = $_GET['board_number']; 



$sql = "select * from reply where number= $number";//reply테이블에서 idx가 rno변수에 저장된 값을 찾음

$result1 = $db->query($sql);
$reply = $result1->fetch_array();

$bno = $_GET['number'];


$sql2 = "select * from mate where number=$bno";//board테이블에서 idx가 bno변수에 저장된 값을 찾음
$result2 = $db->query($sql2);



$mate = $result2->fetch_array();



$sql = "delete from reply where number='".$number."'"; ?>
<?php
        $result = $db->query($sql);
?>
	<script type="text/javascript">alert('댓글이 삭제되었습니다.'); location.replace("boardView.php?number=<?php echo $mate["number"]; ?>");</script>


