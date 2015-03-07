<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->config->item('site_name') ?> | Login</title>

        <?php $this->load->view('includes/css_header') ?>
    </head>




    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html"><?php echo $this->config->item('site_name') ?></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Login</p>
                <form method="post">
                    <div class="form-group has-feedback">
                        <input id="email_id" name="email_id" type="text" class="form-control" placeholder="Email"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <?php echo form_error('email_id'); ?>
                    </div>
                    <div class="form-group has-feedback">
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <?php echo form_error('password'); ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">    
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div><!-- /.col -->
                    </div>
                </form>


            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <?php $this->load->view('includes/js_footer') ?>
        
    </body>


</html>