<?php
/**
 * Created by PhpStorm.
 * User: AMAN
 * Date: 16-03-2018
 * Time: 15:22
 */
include_once "class/otp_verif_fun.php";
$otp_v_f = new otp_verif_fun();
session_start();
$uid = $_SESSION['uid'];
$doc_data = $otp_v_f->get_documents($uid);
//Converting JSON string to json arr from Servlet
$doc_data = json_decode($doc_data->raw_body, true);
//END
//Getting POST DATA
$data = json_decode(json_encode($_POST));
//END
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
<div class="jumbotron jumbotron-fluid">
    <h1 class="display-4 text-center">Check Details</h1>
    <p class="text-center">
        <small class="text-muted">Please Do Not Hit Refresh Or You Might Have To Fill Form Again.</small>
    </p>
    <hr class="my-2">
    <form method="post" action="./get_documents">
        <div class="container margin-top">
            <div class="row">
                <!-- Left Row -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name:</label>
                        <div>
                            <input class="form-control" value="<?php echo $data->name; ?>" disabled name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Father's Name:</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Mr </span></div>
                            <input class="form-control" value="<?php echo $data->f_name; ?>" disabled name="f_name"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mother's Name:</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Mrs </i></span></div>
                            <input class="form-control" value="<?php echo $data->m_name; ?>" disabled name="m_name"
                                   required>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Date OF Birth</label>
                        <div class="input-group">
                            <input class="form-control" id="date_p" value="<?php echo $data->dob; ?>" disabled
                                   name="dob"
                                   required>
                            <div class="input-group-append">
                                    <span class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                            </div>
                            <input class="form-control" name="gender" disabled value="<?php echo $data->gender; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email ID:</label>
                        <div>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-envelope"></i></span></div>
                                <input type="email" class="form-control"
                                       name="email" required value="<?php echo $data->email; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address:</label>
                        <textarea class="form-control" disabled name="address"
                                  rows="5"><?php echo $data->address; ?></textarea>
                    </div>
                </div>
                <!-- Right Row -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Adhaar Number:</label>
                        <div>
                            <div class="input-group">
                                <input type="text" class="form-control adh adhaar" disabled
                                       value="<?php echo $data->adhaar; ?>"
                                       name="adhaar"
                                       required>
                                <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-check-circle animated tada infinite text-success"
                                               data-toggle="popover" title="Important:"
                                               data-content="Adhaar Card Verified."
                                               data-placement="top"></i>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pin Code:</label>
                        <input type="text" name="pin" class="form-control" required value="<?php echo $data->pin; ?>"
                               disabled
                               title="Please Enter A Valid Indian  Pincode" pattern="^[1-9][0-9]{5}$">
                    </div>
                    <div class="form-group">
                        <label>Qualification:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-graduation-cap"></i>
                                </span>
                            </div>
                            <input class="form-control" name="qualification" value="<?php echo $data->qualification ?>">
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Year Of Graduation:</label>
                        <input type="number" class="form-control" value="<?php echo $data->yog ?>" name="yog"
                               placeholder="Year Of Graduation">
                    </div>
                    <div class="form-group">
                        <label>Last Institute Attended:</label>
                        <input type="text" class="form-control" name="inst"
                               value="<?php echo $data->inst ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Mobile Number:</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">+91-</span></div>
                            <input type="text" class="form-control mobile" name="mobile" required
                                   value="<?php echo $data->mobile ?>">
                        </div>

                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-inverse">
                    <thead class="thead-inverse|thead-default">
                    <tr>
                        <th>Document Name</th>
                        <th>Link</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php include_once "class/table_maker.php"; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <p class="text-center">
            <button type="submit" id=""
                    class="btn btn-primary btn-lg border-s">Verify Documents
            </button>
        </p>
    </form>

</div>

<?php include "footer.php"; ?>
