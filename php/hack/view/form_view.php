<?php include "header.php"; ?>
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        });
    </script>
    <link id="themes" rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/fontawesome-all.min.js"></script>
    <link rel="stylesheet" href="css/animate.css">
<?php include "preloader.php"; ?>
    <script src="js/jquery.mask.min.js"></script>
    <script>
        $(function () {
            $('.adhaar').mask('0000 0000 0000');
        });
    </script>
    <style type="">
        .margin_top {
            margin-top: 15px;
        }
        .form-control:disabled{
            background-color: white !important;

        }
        .form-control:disabled, .input-group-text:disabled{
            border: 1px solid green !important;
            border-collapse: collapse !important;
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
    <div class="load"></div>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center">Check Details</h1>
            <p class="text-center"><small class="text-muted">Please Do Not Hit Refresh Or You Might Have To Fill Form Again.</small></p>
            <hr class="my-2">
            <form method="post" action="./sent_otp">
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
                                    <input class="form-control" value="<?php echo $data->father_name; ?>" disabled name="f_name"
                                           required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mother's Name:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">Mrs </i></span></div>
                                    <input class="form-control" value="<?php echo $data->mother_name; ?>" disabled name="m_name"
                                           required>
                                </div>
                                <div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date OF Birth</label>
                                <div class="input-group">
                                    <input class="form-control" id="date_p" value="<?php echo $data->dob; ?>" disabled name="dob"
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
                                               name="email" required placeholder="Enter Your Email Address">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address:</label>
                                <textarea class="form-control" name="address" rows="5"><?php echo $data->address; ?></textarea>
                                <p class="text-right"><small class="text-danger">*Editable</small></p>
                            </div>
                        </div>
                        <!-- Right Row -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Adhaar Number:</label>
                                <div>
                                    <div class="input-group">
                                        <input type="text" class="form-control adh adhaar" disabled value="<?php echo $data->adhaar; ?>"
                                               name="adhaar"
                                               required>
                                        <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-check-circle animated tada infinite text-success" data-toggle="popover" title="Important:"
                                               data-content="Adhaar Card Verified."
                                               data-placement="top"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Pin Code:</label>
                                <input type="text" name="pin" class="form-control" required value="<?php echo $data->pin; ?>" disabled
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
                                    <input class="form-control" name="qualification" placeholder="Enter Your Qualification">
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Year Of Graduation:</label>
                                <input type="number" class="form-control" name="yog" placeholder="Year Of Graduation">
                            </div>
                            <div class="form-group">
                                <label>Last Institute Attended:</label>
                                <input type="text" class="form-control" name="inst"
                                       placeholder="Last Institute Attended" required>
                            </div>
                            <div class="form-group">
                                <label>Mobile Number:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">+91-</span></div>
                                    <input type="number" class="form-control" name="mobile" required placeholder="Your Current Contact Number">
                                </div>

                            </div>
                        </div>
                    </div>
                    <p class="text-center">
                        <button type="submit" id=""
                                class="btn btn-primary btn-lg border-s">Submit Application
                        </button>
                    </p>
            </form>

        </div>
    </div>
<?php include_once "footer.php"; ?>