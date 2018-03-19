<?php include 'header.php';?>

<?php
//Will Store POST DATA in Session Storage
session_start();
$_SESSION['form_data'] = $_POST;
//End
?>

<?php include "preloader.php"; ?>
    <style type="text/css">
        html {
            height: 100%;
        }

        body {
            /*background: linear-gradient(to bottom right, #005c97, #363795);*/
            background-color: #e9ecef;
        }

        .vcert {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .w_color {
            color: white;
        }
        .margin-top {
            margin-top: 18px;
        }
        .border-s{
            transition: all ease 0.36s;
        }
        .border-s:hover{
            border-radius: 25px;
        }
    </style>
    </head>
    <body>
    <div class="load"></div>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><span><i class="fa fa-file"></i> Select Documents</span></h1>
            <p class="lead text-danger">Select Proper Documents From Digital Locker</p>
            <hr class="my-2">
            <form action="./final_submit" method="post">
            <?php
            include_once "class/document_selector.php";
            //Will Generate Select Option
            doc_names("tenth,twelth");
            //End
            ?>
                <p class="text-center">
                    <button type="submit"
                            class="btn btn-primary btn-lg border-s">Next
                    </button>
                </p>
            </form>
        </div>
<?php include "footer.php"; ?>