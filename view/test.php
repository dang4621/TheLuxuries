<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<body>
<script  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    <form method="POST" action="" id="insert_data">
            <label for="">Họ và tên</label>
        <input type="text" id="name" placeholder="Họ tên">
            <label for="">Số điện thoại</label>
        <input type="number" id="phone" placeholder="sdt">

        <input type="button" id="insert" name="insert" value="Thêm">
    </form>
    <label for="" id="data"></label>
    <script type="text/javascript">
        $('#insert').on('click',function(){
            var name = $('#name').val();
            var phone = $('#phone').val();
            if(name == '' || phone == ''){
                alert("Không được để trống trường dữ liệu");
            }else{
                $.ajax({
                    url : 'ajax_action.php',
                    method : 'POST',
                    data : {
                        name:name,
                        phone:phone
                    },success:function(data){
                        alert("Thêm thành công");
                        $('#data').html(data);
                    }
                })
            }
        })
    </script>

</body>

</html>