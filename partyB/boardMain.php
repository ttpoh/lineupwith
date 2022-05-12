<?php
session_start();
// echo "session_cache_expire = ".session_cache_expire();
$my_id = isset($_SESSION["my_id"]) ? $_SESSION["my_id"] : "";
include('../dbLog.php');
$query = "select * from mate order by number desc";
$result = $db->query($query);
$total = mysqli_num_rows($result);

if (isset($_GET["page"]))
        $page = $_GET["page"];
else
        $page = 1;

?>
<!DOCTYPE html>

<html>

<head>
        <meta charset='utf-8'>
        <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<style>
        table {
                left: 0;
                right: 0;
                margin-left: auto;
                margin-right: auto;
                border-top: 1px solid #444444;
                border-collapse: collapse;
        }

        tr {
                border-bottom: 1px solid #444444;
                padding: 10px;
        }

        td {
                border-bottom: 1px solid #efefef;
                padding: 10px;
        }

        table .even {
                background: #efefef;
        }

        .page_btn {
                text-align: center;
                padding-top: 20px;
                color: #000000
        }

        .text {
                text-align: center;
                padding-top: 20px;
                color: #000000
        }

        .text:hover {
                text-decoration: underline;
        }

        a:link {
                color: #57A0EE;
                text-decoration: none;
        }

        a:hover {
                text-decoration: underline;
        }
</style>

<body>
        <div class="header">
                <div class="searchArea">
                        <form></form>
                        
                </div>
                <ul class="nav">
                        <li><a href="../home.php">HOME</a></li>
                        <li><a href="boardMain.php">COMMUNITY</a></li>
                        <?php if (!$my_id) {/* 로그인 전  */ ?>
                                <p>
                                        <li><a href="../login.php">LOGIN</a></li>
                                        <li><a href="../join.php">JOIN</a></li>
                                </p>
                        <?php } else { /* 로그인 후 */ ?>
                                <p>
                                        <br>
                                        "<?php echo $my_id; ?>"님 안녕하세요.
                                </p>
                                <!-- <button type="logout_btn" onclick="location.href='logout.php'">로그아웃</button>  -->
                                <a href="../logout.php" class="bar">로그아웃</a>
                        <?php }; ?>
                </ul>
        </div>
        <div class="nav">
                <li><a href="boardMain.php">공연 친구 모집</a></li>
                <li><a href="../reviewB/boardM.php">공연 후기</a></li>
                <!-- <li><a href="../board3/boardM.php">공연 후기2</a></li>                      -->

        </div>

        <h2 width="50" align="center">공연 친구 모집</h2>

        <table align=center>

                <thead align="center">
                        <tr>
                                <td width="50" align="center">번호</td>
                                <td width="500" align="center">제목</td>
                                <td width="100" align="center">작성자</td>
                                <td width="200" align="center">날짜</td>
                                <td width="50" align="center">조회수</td>
                        </tr>
                </thead>

                <tbody>
                        <?php
                        $sql = "SELECT * FROM mate";
                        $number = "select * from mate order by number desc";
                        $result = $db->query($sql);
                        $total_record = mysqli_num_rows($result);

                        $list = 5;
                        $block_cnt = 5;
                        $block_num = ceil($page / $block_cnt);
                        $block_start = (($block_num - 1) * $block_cnt) + 1;

                        $block_end = $block_start + $block_cnt - 1;

                        $total_page = ceil($total_record / $list);
                        if ($block_end > $total_page) {
                                $block_end = $total_page;
                        }
                        $total_block = ceil($total_page / $block_cnt);
                        $page_start = ($page - 1) * $list;

                        $sql2 = "SELECT * FROM mate ORDER BY number DESC LIMIT $page_start, $list";
                        $result2 = $db->query($sql2);



                        while ($rows = mysqli_fetch_assoc($result2)) { //DB에 저장된 데이터 수 (열 기준)
                                if ($total_record % 2 == 0) {
                        ?> <tr class="even">
                                        <?php   } else {
                                        ?>
                                        <tr>
                                        <?php } ?>
                                        <td width="50" align="center"><?php echo $rows['number'] ?></td>
                                        <td width="500" align="center">
                                                <a href="boardView.php?number=<?php echo $rows['number'] ?>">
                                                        <?php if (empty($rows['title'])) { ?>

                                                                <?php echo $rows['date'] ?>에 작성된 글입니다.
                                        </td>

                                <?php

                                                        } else { ?>
                                        <?php echo $rows['title'] ?></td>


                                <?php } ?>


                                <td width="100" align="center"><?php echo $rows['id'] ?></td>
                                <td width="200" align="center"><?php echo $rows['date'] ?></td>
                                <td width="50" align="center"><?php echo $rows['hit'] ?></td>
                                        </tr>
                                <?php
                                $total--;
                        }
                                ?>
                </tbody>
        </table>

        <div class="page_btn" id="page_num">
                <?php
                if ($page <= 1) {
                } else {
                        echo "<a href='boardMain.php?page=1'>처음</a>";
                }
                if ($page <= 1) {
                } else {
                        $pre = $page - 1;
                        echo "<a href='boardMain.php?page=$pre'>   ◀</a>";
                }
                for ($i = $block_start; $i <= $block_end; $i++) {
                        if ($page == $i) {
                                echo "<b> $i </b>";
                        } else {
                                echo "<a href='boardMain.php?page=$i'> $i </a>";
                        }
                }
                if ($page >= $total_page) {
                } else {
                        $next = $page + 1;
                        echo "<a href='boardMain.php?page=$next'>▶   </a>";
                }
                if ($page >= $total_page) {
                } else {
                        echo "<a href='boardMain.php?page=$total_page'>마지막</a>";
                }
                ?>
        </div>

        <div class=text>
                <button class="write_btn" onclick="location.href='boardWrite.php'">글쓰기</button>

                <input type="button" value="취소" onclick="javascripｔ:history.go(-1)">
        </div>



</body>

</html>