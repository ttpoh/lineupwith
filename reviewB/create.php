<?php
                session_start();
                $URL = "../login.php";
                if(!isset($_SESSION['my_id'])) {
        ?>

<script>
    alert("로그인이 필요합니다");
    location.replace("<?php echo $URL?>");
</script>
<?php
                }
        ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>nse</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.6/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.6/dist/summernote.min.js"></script>
 
        <style>
            .nse_content {
                width: 360px;
                height: 300px;
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
        <link rel="shortcut icon" href="#">

    </head>

    <body>
        <form name="nse" action="createA.php" method="post">
            
        <input type="hidden" name="imgUrl" id="imgUrl" value="">
        <input type="hidden" name="attachFile" id="attachFile" value="">
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
                                <!-- <td><input type="text" name="name" size="20"></td> -->
                                <td><input type="hidden" name="id" value="<?=$_SESSION['my_id']?>"><?=$_SESSION['my_id']?></td>

                            </tr>

                            <tr>
                                <td>제목</td>
                                <td><input type="text" name="title" size="60"></td>
                            </tr>

                            <tr>
                                <td>내용</td>
                                <td>
                                    <textarea name="ir1" id="summernote" class="nse_content"></textarea>
                                </td>                               
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>

            <center>
                <input type="submit" value="작성" onclick="submitContents(this)">
                <input type="button" value="취소" onclick="javascripｔ:history.go(-1)">
            </center>
        </form>
        <script>

$(document).ready(function () {

var $summernote = $('#summernote').summernote({

    codeviewFilter: false,

    codeviewIframeFilter: true,

    lang: 'ko-KR',

    height: 600,

    callbacks: {

        onImageUpload: function (files) {

            for(var i=0; i < files.length; i++) {

                if(i>20){

                    alert('20개까지만 등록할 수 있습니다.');

                    return;

                }

            }

            for(var i=0; i < files.length; i++) {

                if(i>20){

                    alert('20개까지만 등록할 수 있습니다.');

                    return;

                }
            sendFile($summernote, files[i]);
          }       

        }

    }

});

});   

function sendFile($summernote, file) {
    var formData = new FormData();

    formData.append("file", file);
    
    $.ajax({

        url: 'createImg.php',

        data: formData,

        cache: false,

        contentType: false,

        processData: false,

        type: 'POST', 
    
    
        success: function (data) {
            console.log(data);
            if(data==-1){

                alert('용량이 너무크거나 이미지 파일이 아닙니다.');
                return;
            }else{
                console.log($summernote.summernote());
                $summernote.summernote('insertImage', data, function ($image) {
                    $image.attr('src', data);
                    $image.attr('class', 'childImg');
                
                });

                var imgUrl=$("#imgUrl").val();

                if(imgUrl){
                    imgUrl=imgUrl+",";
                }
                $("#imgUrl").val(imgUrl+data);
            }
        }
    });
}
        
        </script>
    </body>
</html>