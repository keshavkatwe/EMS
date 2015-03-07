<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->config->item('site_name') ?> | Add faculty</title>

        <?php $this->load->view('includes/css_header') ?>
    </head>

    <body class="<?php echo THEME_COLOR; ?>">
        <!-- Site wrapper -->
        <div class="wrapper">
            <?php $this->load->view('includes/top_menu') ?>
            <?php $this->load->view('includes/left_menu') ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Add faculty
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-2 text-center">
                                    <div class="form-group">
                                        <label>Profile image</label><br/>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="max-width: 100px;">
                                                <img alt="" src="<?php echo base_url('file_uploads/profile_images/default.png') ?>">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file btn-xs"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                                                <a href="#" class="btn btn-default fileinput-exists btn-xs" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>First name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Email id</label>
                                        <input type="text" class="form-control" name="email_id" id="email_id"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" id="password"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Employee id</label>
                                        <input type="text" class="form-control" name="employee_id" id="employee_id"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="form-control" name="department" id="department">
                                            <?php echo get_departments(); ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm password</label>
                                        <input type="password" class="form-control" name="password" id="password"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" class="form-control" name="designation" id="designation"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" id="address"/>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-offset-2">
                                <button class="btn btn-danger">Save <i class="fa fa-check-circle"></i></button>
                            </div>
                        </div><!-- /.box-footer-->
                    </div><!-- /.box -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php $this->load->view('includes/bottom_menu') ?>
        </div><!-- ./wrapper -->

        <?php $this->load->view('includes/js_footer') ?>
    </body>


</html>