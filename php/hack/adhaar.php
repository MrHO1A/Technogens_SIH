
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- BootStrap Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link  id="themes" rel="stylesheet" href="css/light.css">
    <link rel="icon" href="favicon.png">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script>
        $(function () {
            $('.adhaar').mask('0000 0000 0000');
        });
        function send_data() {
            $('.adhaar').unmask();
            $('#form').submit();
        }
    </script>
    <?php include_once "class/enter-key-disable.php"; ?>

    <title>Digital Locker</title>
    <style type="">
        .margin_top{
            margin-top: 15px;
        }
        html{
            height: 100%;
        }
        body{
            background: linear-gradient(to bottom right, #005c97, #363795);
        }
        .bottom_b{
            border-bottom: solid 0.2px white !important;
        }
        .trans{
            background-color: transparent !important;
            border: none ;
        }
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: grey !important;
            opacity: 1; /* Firefox */
        }
        .glyphicon{
            color: white !important;
        }
        .w_color{
            color: white;
        }
        input{
            border-left: white 0.2px solid !important;
        }
        a:hover{
            color: white !important;
        }
        .btn-block, .btn-block:hover{
            background: white !important;
            font-size: 18px;
            font-weight: bold;
            color: #005C97;
        }
        .vertical-center {
            position: absolute;
            top: 50%;
            left:50%;
            width: 100%;
            transform: translate(-50%,-50%);
    </style>
</head>
<body>
<div class="container vertical-center">
    <div class="row">
        <div class="offset-md-3 offset-md-3 col-md-6 col-lg-6">
            <h2 class="text-center w_color">VERIFY ADHAAR</h2>
            <form id="form" method="post" action="./sent_otp">
            <input type="text" name="adhaar" pattern="\d*" class="form-control text-center adhaar" placeholder="Enter Adhaar Card Number" required="required">
            </form>
            <button type="button" class="btn-block btn margin_top" onclick="send_data()" id="send">Verify</button>
            <p class="text-right"><small class="w_color">*This Is Going To Be Utilized To Get Your Info</small></p>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/theme-manager.js"></script>
</body>
</html>
