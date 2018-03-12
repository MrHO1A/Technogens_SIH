<?php
require_once "class/otp_verif_fun.php";
$opt_o = new otp_verif_fun();
$adhaar = $_POST['adhaar'];
session_start();
$_SESSION['uid'] = md5($adhaar);
$res = $opt_o->request_otp($_SESSION['uid'],$adhaar);
$json_res = $res->raw_body;
$json_data = json_decode($json_res);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- BootStrap Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link  id="themes" rel="stylesheet" href="css/light.css">
    <link rel="icon" href="favicon.png">
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="css/animate.css">
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
        .trans{
            background-color: transparent !important;
            border: none ;
        }
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: white !important;
            opacity: 1; /* Firefox */
        }
        .glyphicon{
            color: white !important;
        }
        .w_color{
            color: white;
        }
        a:hover{
            color: white !important;
        }
        .vertical-center {
            min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh; /* These two lines are counted as one 🙂       */
            display: flex;
            align-items: center;
        }
        .def_btn{
            background-color: transparent !important;
            color: white;
            border-radius: 25px;
            border: 2px white solid;
            font-size: 25px;
        }
        .def_btn:hover{
            color: white;
        }
        .border_bottom{
            border-bottom: white 2px solid !important;
            font-size: 25px;
            border-radius: 0px !important;
        }
        .vcert{
            position: absolute;
            top: 50%;
            left:50%;
            transform: translate(-50%,-50%);
        }
        #ok{
            animation-iteration-count: 1;
        }
    </style>
</head>
<body>
<div class="vcert">
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-lg-offset-4 col-md-4 col-lg-4">
            <h1 class="text-center w_color animated flip" id="ok"><span class="glyphicon glyphicon-ok-sign"></span></h1>
            <h2 class="text-center w_color">OTP Successfully Sent To Mobile Number</h2>
            <h1 class="text-center w_color"><?php echo $json_data->mobile; ?></h1>
            <p class="w_color">Enter OTP to verify</p>
            <input type="number" name="OTP" id="OTP" style="font-size: 25px;" class="form-control text-center margin_top trans border_bottom w_color" title="Enter OTP" placeholder="XXXX" required="required">
            <p class="text-center margin_top"><button class="btn btn-block def_btn" onclick="verify_otp()">Verify</button> </p>
        </div>
    </div>
</div>
</div>
<script>
    function verify_otp() {
        var value = $('#OTP').val();
        $.ajax(
            {
                type:"GET",
                url:"./verify_otp.php?otp="+value,
                cache:false,
                crossDomain:true,
                success:function (data) {
                    var json_o = JSON.parse(data);
                    if(json_o.verified == "true"){
                        alert("OTP VERIFIED");
                    }
                    else{
                        alert("OTP VERIFICATION FAILED");
                    }
                }
            }
        );
    }
</script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
