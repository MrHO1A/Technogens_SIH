<?php
include "class/otp_verif_fun.php";
if(!empty($_FILES['file']['name'])){
session_start();
$uid = $_SESSION['uid'];
$file_name = $_FILES['file']['name'];
$otp_c = new otp_verif_fun();
$result = json_decode($otp_c->update_files($uid,$file_name)->raw_body);
}
?>

<?php include 'header.php'; ?>
<script>
    $(function () {
        $("#date_p").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy",
            yearRange: '1980:2010',
            defaultDate: '13-05-1998'
        });
    });
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>
<?php include "preloader.php"; ?>
<style type="text/css">
    html {
        height: 100%;
    }

    body {
        background-color: #e9ecef;
    }
    .form-control:read-only{
        background-color: white !important;

    }
    .form-control:read-only{
        border: 1px solid green !important;
        border-collapse: collapse !important;
    }

    .margin-top {
        margin-top: 18px;
    }

    .border-s {
        transition: all ease 0.36s;
    }

    .border-s:hover {
        border-radius: 25px;
    }
</style>
</head>
<body>
<div class="load"></div>
<?php
if(isset($result)){
if($result->result == "success"){?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h3><strong>Success!</strong></h3>
        <p>File Upload was successful... Upload more files OR </p>
        <p><a href="./select_doc.php"><button type="button" class="btn btn-primary">Go To Document Selection</button></a></p>
    </div>
<?php }} ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-3"><i class="fa fa-file" aria-hidden="true"></i> Upload Document</h1>
        <p class="lead">Upload Document Directly To Digital Locker</p>
        <hr class="my-2">
        <form method="post" action="./upload_doc" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Upload Document</label>
                <input type="file" class="form-control-file" name="file" placeholder="Select Document"
                       aria-describedby="fileHelpId">
                <small id="fileHelpId" class="form-text text-muted">Please select valid document</small>
            </div>
            <button type="submit" name="submit" id=""
                    class="btn btn-primary margin-top">Upload Document
            </button>
        </form>
    </div>
</div>
<?php include "footer.php"; ?>
