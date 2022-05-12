<?php 
                
include('../dbLog.php');

$id = $_GET['id'];
$number = $_GET['number'];
$query = "select title, content, date, id from review where number=$number";
$result = $db->query($query);
$rows = mysqli_fetch_assoc($result);

$title = $rows['title'];
$content = $rows['content'];
$usrid = $rows['id'];

session_start();



$URL = "../login.php";

if (!isset($_SESSION['my_id'])) {
?>
<script>
    alert("권한이 없습니다.");
    location.replace("<?php echo $URL ?>");
</script>
<?php   } else if ($_SESSION['my_id'] == $usrid) {
?>

<!doctype html>
<html>

    <head>
        <meta charset="utf-8"/>
              <!-- include libraries(jQuery, bootstrap) -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
        
        <title>공연 후기</title>
        <style>
            .nse_content {
                width: 500px;
                height: 200px;
            }

            table.table2 {
                width: 700px;
                border-collapse: separate;
                border-spacing: 1px;
                text-align: left;
                line-height: 1.5;
                border-top: 1px solid #ccc;
                margin: 20px 10px;
            }

            table.table2 tr {
                width: 500px;
                padding: 5px;
                font-weight: bold;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
            }

            table.table2 td {
                width: 60px;
                padding: 5px;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
            }
        </style>
        <script>
    // 메인화면 페이지 로드 함수
    $(document).ready(function () {
        $('#summernote').summernote({
            placeholder: '내용을 작성하세요',
            height: 400,
            maxHeight: 400
        });
    });
</script>
    </head>

    <body>

        <form enctype="multipart/form-data" name="nse" action="updateA.php" method="post">
            <table
                style="padding-top:50px"
                align="center"
                width="800"
                border="0"
                cellpadding="2">
                <tr>
                    <td height="20" align="center" bgcolor="#ccc">
                        <font color="white">
                            후기</font>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="white">
                        <table class="table2">
                            <tr>
                                <td>작성자</td>
                                <td><input type="hidden" name="id" value="<?= $_SESSION['my_id'] ?>"><?= $_SESSION['my_id'] ?></td>
                            </tr>

                            <tr>
                                <td>제목</td>
                                <td><input type="text" name="title" size="60" value="<?= $title ?>"></td>
                            </tr>

                            <tr>
                                <td>내용</td>
                                <td>
                                    <textarea name="ir2" id="summernote" class="nse_content" cols="800" rows="500"><?= $content ?></textarea>
                                </td>
                            </tr>
                           

                        </table>
                    
                            <input type="hidden" name="number" value="<?= $number ?>">
                            <input type="submit" value="작성"
                            onclick="submitContents(this)">

                            <input type="button" value="취소" onclick="javascripｔ:history.go(-1)">
                       
                    </td>
                </tr>
            </table>
        <?php   } else {
                ?>
            <script>
                alert("권한이 없습니다.");
                location.replace("<?php echo $URL ?>");
            </script>
            <?php   }
                ?>
        </form>
    </body>

</html>
<!-- <input type="submit" value="전송" onclick="submitContents(this)" /> -->