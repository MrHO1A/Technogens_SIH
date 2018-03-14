<?php
require_once "class/otp_verif_fun.php";
$opt_o = new otp_verif_fun();
$adhaar = $_POST['adhaar'];
session_start();
$_SESSION['uid'] = md5($adhaar);
$res = $opt_o->request_otp($_SESSION['uid'], $adhaar);
$json_res = $res->raw_body;
$json_data = json_decode($json_res);
if ($json_data->result == "true") {
    $mobile = $json_data->mobile;
    // Setting Post Values in json array
    $arr = $_POST;
    $_SESSION['data'] = json_encode($arr);
    //Post value end

} else {
    $_SESSION['error'] = "Sorry We Cannot Verify You Using Adhaar Number. Please Login To Your Digital Locker";
    header("location:./login_digi");
}
?>
<?php include "header.php"; ?>
    <link id="themes" rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/fontawesome-all.min.js"></script>
<link rel="stylesheet" href="css/animate.css">
<?php include "preloader.php"; ?>
    <style type="">
        .margin_top {
            margin-top: 15px;
        }

        html {
            height: 100%;
        }

        body {
            background: linear-gradient(to bottom right, #005c97, #363795);
        }

        .fa {
            color: white;
        }

        .w_color {
            color: white;
        }

        a:hover {
            color: white !important;
        }
        .vertical-center {
            min-height: 100%; /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh; /* These two lines are counted as one 🙂       */
            display: flex;
            align-items: center;
        }

        .def_btn:hover {
            color: white;
        }

        .border_bottom {
            border-bottom: white 2px solid !important;
            font-size: 25px;
            border-radius: 0px !important;
        }

        .vcert {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #ok {
            animation-iteration-count: 1;
        }
    </style>
    </head>
    <body>
    <div id="error_container"></div>
        <div class="container vcert">
            <h1 class="display-4 text-center w_color animated tada infinite"><i class="fa fa-check-circle"></i></h1>
            <h2 class="text-center w_color">OTP Successfully Sent To Mobile Number</h2>
            <h1 class="w_color text-center"><?php echo $mobile; ?></h1>
            <form method="post" id="form" action="./verify">
            <input class="form-control text-center margin_top form-control-lg col-6 offset-3" name="otp" placeholder="XXXX" id="OTP">
            </form>
            <p class="text-center margin_top">
                <button type="button" class="btn btn-danger btn-lg" onclick="verify_otp()">Verify</button>
            </p>

        </div>
        <script>
            function verify_otp() {
                var value = $('#OTP').val();
                $.ajax(
                    {
                        type: "GET",
                        url: "./verify_otp.php?otp=" + value,
                        cache: false,
                        crossDomain: true,
                        success: function (data) {
                            var json_o = JSON.parse(data);
                            if (json_o.verified == "true") {
                                alert("OTP VERIFIED");
                                $('#form').submit();
                            }
                            else {
                                alert("OTP VERIFICATION FAILED");
                                $("#error_container").innerHTML("no");
                            }
                        }
                    }
                );
            }
        </script>
<?php include "footer.php" ?>