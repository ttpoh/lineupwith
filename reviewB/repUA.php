<?php


include('../dbLog.php');

$rno = $_GET['rno'];//댓글번호

echo $rno;

$sql = "select * from reply where number=$rno";
//reply테이블에서 idx가 rno변수에 저장된 값을 찾음


$result1 = $db->query($sql);
$reply = $result1->fetch_array();

$bno = $_GET['b_no']; //게시글 번호
$sql2 = "select * from mate where number=$bno";//board테이블에서 idx가 bno변수에 저장된 값을 찾음
$result2 = $db->query($sql2);
$mate = $result2->fetch_array();

$sql3 = "update reply set content='".$_GET['content']."' where number = $rno";//reply테이블의 idx가 rno변수에 저장된 값의 content를 선택해서 값 저장
$result3 = $db->query($sql3);
?>

<script type="text/javascript">
    alert('수정되었습니다.');
    location.replace("view.php?number=<?php echo $bno; ?>");
</script>