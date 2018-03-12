<?php
session_start();
$error = null;
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
}
?>
<?php include 'header.php'; ?>
<style type="text/css">
    html {
        height: 100%;
    }

    body {
        background: linear-gradient(to bottom right, #005c97, #363795);
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
</style>
</head>
<body>
<?php
if(strlen($error)>0){?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h3><strong>Alert!</strong></h3>
        <p><?php echo $error; ?></p>
    </div>
    <?php
}
?>
<div class="container vcert">
    <h1 class="display-4 w_color text-center">LOGIN</h1>
    <div class="row align-items-center">
        <div class="col-md-6 col-lg-6 offset-md-3 offset-lg-3">
            <div class="form-group row">
                <label class="col-sm-2 w_color col-form-label">Email:</label>
                <div class="col">
                    <input type="text" class="form-control" placeholder="example@example.com">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 w_color col-form-label">Password:</label>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-primary">Login</button>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
