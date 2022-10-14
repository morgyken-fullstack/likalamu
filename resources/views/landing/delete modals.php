  <!-- Modal log in modal-->
    <div class="modal modal-lg fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login here</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="login_form_wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-md-offset-2">
                                    <!-- login_wrapper -->
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="login_wrapper">
                                            <div class="row">

                                                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                                                    <a href="#" class="btn btn-primary facebook"> <span>Login with
                                                            Facebook</span> <i class="fa fa-facebook"></i> </a>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                                                    <a href="#" class="btn btn-primary google-plus"> Login with Google
                                                        <i class="fa fa-google-plus"></i> </a>
                                                </div>
                                            </div>
                                            <h2>or</h2>
                                            <div class="formsix-pos">
                                                <div class="form-group i-email">
                                                    <input type="email" class="form-control" required="" id="email2"
                                                        placeholder="Email Address *">
                                                </div>
                                            </div>
                                            <div class="formsix-e">
                                                <div class="form-group i-password">
                                                    <input type="password" class="form-control" required=""
                                                        id="password2" placeholder="Password *">
                                                </div>
                                            </div>
                                            <div class="login_remember_box">
                                                <label class="control control--checkbox">Remember me
                                                    <input type="checkbox">
                                                    <span class="control__indicator"></span>
                                                </label>
                                                @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                    href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                                @endif
                                                <a href="#" class="forget_password">
                                                    Forgot Password
                                                </a>
                                            </div>
                                            <div class="login_btn_wrapper">
                                                <button class="btn btn-primary login_btn" type="submit"> Login </button>
                                            </div>
                                            <div class="login_message">
                                                <p>Don&rsquo;t have an account ? <a href="#"> Sign up </a> </p>
                                            </div>
                                        </div>
                                </div>
                                <!-- /.login_wrapper-->
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>


    <!-- Modal Sign up modal modal-->
    <div class="modal modal-lg fade" id="signupModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Sign up </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="login_form_wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-md-offset-2">

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <!-- login_wrapper -->
                                        <div class="login_wrapper">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-8">

                                                    <a href="#" class="btn btn-primary facebook"> <span>Sign up with
                                                            Facebook</span> <i class="fa fa-facebook"></i> </a>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-8">
                                                    <a href="#" class="btn btn-primary google-plus"> Sign up with Google
                                                        <i class="fa fa-google-plus"></i> </a>
                                                </div>
                                            </div>
                                            <h2>or</h2>
                                            <div class="formsix-pos">
                                                <div class="form-group i-email">
                                                    <input type="text" class="form-control" required="" name="username"
                                                        id="username" placeholder="username *">
                                                </div>
                                            </div>
                                            <div class="formsix-pos">
                                                <div class="form-group i-email">
                                                    <input type="email" class="form-control" name="useremail"
                                                        required="" id="email" placeholder="Email Address *">
                                                </div>
                                            </div>
                                            <div class="formsix-pos">
                                                <div class="form-group i-password">
                                                    <input type="password" class="form-control" name="password"
                                                        required="" id="password1" placeholder="Password *">
                                                </div>
                                            </div>
                                            <div class="formsix-pos">
                                                <div class="form-group i-password">
                                                    <input type="password" class="form-control" required=""
                                                        name="password_confirmation" id="password2"
                                                        placeholder="Password Confirm *">
                                                </div>
                                            </div>
                                            <div class="login_btn_wrapper">
                                                <button type="submit" class="btn btn-primary login_btn">
                                                    Sign up
                                                </button>
                                            </div>

                                            <div class="login_message">
                                                <p>Have have an account ? <a href="#"> Log in </a> </p>
                                            </div>
                                        </div>
                                        <!-- /.login_wrapper-->

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
