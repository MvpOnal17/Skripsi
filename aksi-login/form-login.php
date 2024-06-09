<!doctype html>
<html class="no-js" lang="en">


<body>

    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3>PLEASE LOGIN TO ADMIN</h3>
                    <p>Sistem Informasi Prediksi Kepuasan Masyarakat</p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="login.php?page=aksi-login&op=in" method="POST">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="example******" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                                <span class="help-block small">Username unik anda untuk masuk ke sistem</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Kata Sandi anda</span>
                            </div>
                            <div class="checkbox login-checkbox">
                                <label>
                            </div>
                            <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
    </div>
</body>

</html>