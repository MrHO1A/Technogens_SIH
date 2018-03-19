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
            <h1 class="display-4 text-center">Apply Now</h1>
            <p class="text-center"><small class="text-muted">Please Do Not Hit Refresh Or You Might Have To Fill Form Again.</small></p>
            <hr class="my-2">
            <form method="post" action="./sent_otp">
                <div class="container margin-top">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                            <img src="image/IMG_20171019_222044.png" width="200" height="350" class="rounded " alt="user_image">
                            </div>
                        </div>
                    </div>
                    <div class="row margin-top">
                        <!-- Left Row -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name:</label>
                                <div>
                                    <input class="form-control disabled" placeholder="Enter Your Name" name="name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Father's Name:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">Mr </span></div>
                                    <input class="form-control" placeholder="Enter Father's Name" name="f_name"
                                           required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mother's Name:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">Mrs </i></span></div>
                                    <input class="form-control" placeholder="Enter Mother's Name" name="m_name"
                                           required>
                                </div>
                                <div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date OF Birth</label>
                                <div class="input-group">
                                    <input class="form-control" id="date_p" placeholder="DD-MM-YYYY" name="dob"
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
                                    <select class="form-control" name="gender">
                                        <option selected>-SELECT-</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email ID:</label>
                                <div>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-envelope"></i></span></div>
                                        <input type="email" class="form-control" placeholder="example@example.com"
                                               name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address:</label>
                                <textarea placeholder="Enter Your Address" class="form-control" name="address" rows="5"></textarea>
                            </div>
                        </div>
                        <!-- Right Row -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Adhaar Number:</label>
                                <div>
                                    <div class="input-group">
                                        <input type="text" class="form-control adh" placeholder="XXXX XXXX XXXX"
                                               name="adhaar"
                                               required>
                                        <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-question-circle animated tada infinite text-danger" data-toggle="popover" title="Important:"
                                               data-content="Please Enter A Valid Adhaar Number. This Is going to be utilized to verify your documents."
                                               data-placement="top"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Pin Code:</label>
                                <input type="text" name="pin" class="form-control" required placeholder="XXXXXX"
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
                                    <select class="form-control" name="qualification">
                                        <option selected value="Bachelor">Bachelor's</option>
                                        <option value="Post Graduate">Post Graduate</option>
                                        <option value="Doctorate">Doctorate</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Year Of Graduation:</label>
                                <input type="number" class="form-control" name="yog" placeholder="Year Of Graduation">
                            </div>
                            <div class="form-group">
                                <label>Last Institute Attended:</label>
                                <input type="text" class="form-control" name="inst"
                                       placeholder="Last Institute Attended">
                            </div>
                            <div class="form-group">
                                <label>Mobile Number:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">+91-</span></div>
                                    <input type="number" class="form-control" name="mobile" placeholder="Mobile Number">
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
                                <tr>
                                    <td scope="row">12Th Mark Sheet</td>
                                    <td>https;//1213</td>
                                    <td class="text-success">Verified <i class="fa fa-check-circle"></i></td>
                                </tr>
                                <tr>
                                    <td scope="row">10Th Marksheet</td>
                                    <td></td>
                                    <td class="text-danger">Failed <i class="fa fa-times-circle"></i></td>
                                </tr>
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
    </div>

<?php include "footer.php"; ?>