<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Back Office!</h1>
                                    </div>
                                    <form class="form-signin" action="<?php echo site_url('login/auth'); ?>" method="post">
                                        <h2 class="form-signin-heading">Please sign in</h2>
                                        <?php echo $this->session->flashdata('msg'); ?>
                                        <label for="username" class="sr-only">Username</label>
                                        <input type="text" name="user" class="form-control" placeholder="Username" required autofocus>
                                        <label for="password" class="sr-only">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="remember-me"> Remember me
                                            </label>
                                        </div>
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>