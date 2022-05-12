<!DOCTYPE html>

<html>
    <head>
        <meta charset='utf-8'>

        <link rel="stylesheet" type="text/css" href="style.css?a"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="./comment.js"></script>
        <script type="text/javascript" src="./reply.js"></script>
    </head>
    <style>
        .view_table {
            border: 1px solid #444444;
            margin-top: 30px;
        }
        .view_title {
            height: 30px;
            text-align: center;
            background-color: #cccccc;
            color: white;
            width: 700px;
        }
        .view_id {
            text-align: center;
            background-color: #EEEEEE;
            width: 30px;
        }
        .view_id2 {
            background-color: white;
            width: 60px;
        }
        .view_hit {
            background-color: #EEEEEE;
            width: 30px;
            text-align: center;
        }
        .view_hit2 {
            background-color: white;
            width: 60px;
        }
        .view_content {
            padding-top: 20px;
            border-top: 1px solid #444444;
            height: 300px;
        }
        .view_btn {
            width: 700px;
            height: 5px;
            /* float: right; */
            text-align: right;
            margin: auto;
        }
        .view_btn1 {
            height: 30px;
            width: 70px;
            float: right;
            font-size: 10px;
            text-align: center;
            background-color: white;
            border: 2px solid black;
            border-radius: 10px;
        }
        .view_comment_input {
            width: 700px;
            height: 350px;
            text-align: center;
            margin: auto;
        }
        .view_text3 {
            font-weight: bold;
            float: left;
            margin-left: 20px;
        }
        .view_com_id {
            width: 100px;
        }
        .view_comment {
            width: 500px;

        }
        .dap_lo {
            text-align: left;
            font-size: 14px;
            padding: 10px 0 15px;
            margin-bottom: 10px;
            height: 50px;
            /* background-color: red; */
            border-bottom: solid 1px gray;
        }
        .reply_view {
            width: 700px;

            left: 0;
            right: 0;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            text-align: center;
            word-break: break-all;

        }
        .reply_view > h3 {
            height: 5px;
        }

        .dap_lo.rep_me {
            left: 0;
            right: 0;
            margin-left: auto;
            margin-right: auto;
        }
        .dap_to {
            margin-top: 5px;
        }
        .rep_me {
            font-size: 12px;
        }
        .rep_me ul li {
            float: left;
            width: 30px;
        }
        .dat_delete {
            height: 10px;

            display: none;
        }
        .dat_edit {
            display: none;
        }
        .dap_sm {
            position: absolute;
            top: 10px;
        }
        .dap_edit_t {
            width: 520px;
            height: 70px;
            position: absolute;
            top: 40px;
        }
        .re_mo_bt {
            position: absolute;
            top: 40px;
            right: 5px;
            width: 90px;
            height: 72px;
        }
        #re_content {
            width: 700px;
            height: 56px;
        }
        .dap_ins {
            margin-top: 5px;
            height: 120px;
        }
        .re_bt {

            /* position: absolute;
	top: 100px; */
            width: 150px;
            height: 30px;
            font-size: 15px;

        }
    </style>

    <body>
        <?php
                include('../dbLog.php');
                $number = $_GET['number'];
                session_start();
                $query = "select title, content, date, hit, id from mate where number =$number";
                
                                                             
                $hit = "update board set hit=hit+1 where number=$number";
                $db->query($hit);
               

                $result = $db->query($query);
                $rows = mysqli_fetch_assoc($result);
        ?>

        <table class="view_table" align="center">
            <tr>
                <td colspan="4" class="view_title"><?php echo $rows['title']?></td>
            </tr>
            <tr>
                <td class="view_id">작성자</td>
                <td class="view_id2"><?php echo $rows['id']?></td>
                <td class="view_hit">조회수</td>
                <td class="view_hit2"><?php echo $rows['hit']?></td>
            </tr>

            <tr>
                <td colspan="4" class="view_content" valign="top">
                    <?php echo $rows['content']?></td>
            </tr>
        </table>
        <div class="view_btn">
            <button
                class="view_btn1"
                onclick="location.href='boardUpdate.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">수정</button>
            <button class="view_btn1" onclick="location.href='boardMain.php'">목록으로</button>
            <button
                class="view_btn1"
                onclick="location.href='del.php?number=<?=$number?>&id=<?=$_SESSION['userid']?>'">삭제</button>
        </div>
        <div class="reply_view" align="center">
            <h3>
                댓글 수정</h3>
            <?php
		// $sql3 = mq("select * from reply where con_num='".$bno."' order by idx desc");
		
			$sql3 = "select * from reply where board_number='".$number."' order by number";
                        $result = $db->query($sql3);

			while($reply=$result->fetch_array()){ 
		?>
            <div class="dap_lo">
                <div>
                    <b><?php echo $reply['id'];?></b>
                </div>
                <div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
                <div class="rep_me dap_to" style="float:right"><?php echo $reply['date']; ?>                   

                    <!-- <a class="dat_edit_bt" href="javascript:void(0);">수정</a>
                    <a class="dat_delete_bt" href="javascript:void(0);">삭제</a> -->
					</div>
                   
					<script src="./comment.js"></script>
                <!-- 댓글 수정 폼 dialog -->
                <div class="dat_edit">
                    <form method="post" action="repU.php">
						
                        <input type="hidden" name="rno" value="<?php echo $number['number']; ?>"/><input type="hidden" name="b_no" value="<?php echo $number; ?>">
						
						

                        <input type="password" name="pw" class="dap_sm" placeholder="비밀번호"/>

                        <textarea name="content" class="dap_edit_t"><?php echo $rows['content']; ?></textarea>

                        <input type="submit" value="수정하기" class="re_mo_bt">
                    </form>
                </div>
                <!-- 댓글 삭제 비밀번호 확인 -->
                <div class='dat_delete'>
                    <form action="repD.php" method="post">
                        <input type="hidden" name="rno" value="<?php echo $reply['number']; ?>"/><input type="hidden" name="b_no" value="<?php echo $number; ?>">
                        <p>비밀번호<input type="password" name="pw"/>
                            <input type="submit" value="확인"></p>
                    </form>
                </div>
            </div>
            <?php } ?>
            <!--- 댓글 입력 폼 -->
            <?php
		$rnum = $_GET['board_number'];
        $query = "select id, content from reply where number =$rnum";
        
                                                  
        
        $result = $db->query($query);
        $reply = mysqli_fetch_assoc($result);
		?>
            <div class="dap_ins">            

                <form action="repUA.php" method="get">

                <input type="hidden" name="rno" value="<?php echo $rnum; ?>"/><input type="hidden" name="b_no" value="<?php echo $number; ?>">

                    <input
                        type="text"
                        name="dat_user"
                        id="dat_user"
                        class="dat_user"
                        size="10"
                        value="<?= $reply['id']?>">
                   
                    <div style="margin-top:5px; ">
                        <textarea name="content" class="reply_content" id="re_content"><?=$reply['content']?></textarea>

                        <button id="rep_bt" class="re_bt">댓글 수정</button>
                    </div>
                </form>
            </div>
        </div>
        
        <!--- 댓글 불러오기 끝 -->

    </body>

</html>
<!-- MODIFY & DELETE -->