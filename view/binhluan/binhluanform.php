<?php
session_start();
include '../../model/pdo.php';
include '../../model/binhluan.php';
$ma_san_pham=$_REQUEST['ma_san_pham'];
// $lay_idtk=lay_idtk($_SESSION['user']);
// extract($lay_idtk);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
    .user {
        font-weight: bold;
        color: black;
    }

    .time {
        color: gray;
    }

    .userComment {
        color: #000;
        margin-right: 20px;
    }

    .replies .comment {
        margin-top: 20px;

    }

    .replies {
        margin-left: 20px;
    }

    #registerModal input,
    #logInModal input {
        margin-top: 10px;
    }

    div.stars {
        width: 270px;
        display: inline-block;
    }

    input.star {
        display: none;
    }

    label.star {
        padding: 10px;
        font-size: 36px;
        color: #444;
        transition: all .2s;
    }

    input.star:checked~label.star:before {
        content: '\f005';
        color: #FD4;
        transition: all .25s;
    }

    input.star-5:checked~label.star:before {
        color: #FE7;
        text-shadow: 0 0 20px #952;
    }

    input.star-1:checked~label.star:before {
        color: #F62;
    }

    label.star:hover {
        transform: rotate(-15deg) scale(1.3);
    }

    label.star:before {
        content: '\f006';
        font-family: FontAwesome;
    }
    </style>
</head>

<body>
    <div class="cmt">
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <h2 style="margin:15px;color:#F28123;">Đánh giá</h2>
            <div class="col-md-12" style="width:60%">
                <input type="hidden" name="ma_san_pham" value="<?=$ma_san_pham?>">
                <input class="form-control" type="text" name="noi_dung"><br>
                <input type="submit" class="btn-primary btn" name="guibinhluan" value="Comment">
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <div class="userComments">
                    <div class="comment" style="margin: 30px;">
                        <?php  $layBL=layBL($ma_san_pham);
                        foreach ($layBL as $value ){
                            extract($value); ?>

                        <div class="user">
                            <i class="fa fa-user-circle fa-3x" aria-hidden="true"
                                style="position: relative;top:20px;right:5px;"></i>
                            <?php if(!empty($Hoten)){
                            echo($Hoten); 
                        }else{
                            echo("ẨN DANH");
                        }?>
                            <span class="time"><?= $ngay_bl ?></span>
                        </div>
                        <div class="binhluan" style="margin-left: 50px;padding-top:10px;"><?= $noi_dung ?></div>
                        <hr style="background:black;width:700px;position: relative;right:300px;">
                        <?php     }   ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
        $id_tai_khoan=$_SESSION['user']['id_tai_khoan'];
        $username=$_SESSION['user']['username'] ;
        $noi_dung= $_POST['noi_dung'];
        $ma_san_pham=$_POST['ma_san_pham'];
        $ngay_bl=date('h:i:sa d/m/Y'); 
        themBinhLuan($id_tai_khoan,$username,$ma_san_pham,$noi_dung,$ngay_bl);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
    ?>
    </div>
</body>

</html>