<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->config->item('site_name') ?> | <?php echo ucfirst($operation) ?> student</title>

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
                        <?php echo ucfirst($operation) ?> student
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    
                    <!-- Default box -->
                    <div class="box">
                        <form method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-2 text-center">
                                        <div class="form-group">
                                            <label>Profile image</label><br/>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="max-width: 100px;">
                                                    
                                                    <?php 
                                                    if($students_array['profile_image'] == "" || $students_array['profile_image'] == 0)
                                                    {
                                                        $profile_image = base_url('file_uploads/profile_images/default.png');
                                                    }
                                                    else
                                                    {
                                                        $profile_image = base_url('file_uploads/profile_images/'.$students_array['profile_image']);
                                                    }
                                                    ?>
                                                    
                                                    <img alt="" src="<?php echo $profile_image ?>">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px;"></div>
                                                <div>
                                                    <span class="btn btn-default btn-file btn-xs">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="profile_image" id="profile_image"></span>
                                                    <a href="#" class="btn btn-default fileinput-exists btn-xs" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>First name</label>
                                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo set_value('first_name',$students_array['first_name']) ?>"/>
                                            <?php echo form_error('first_name'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Email id</label>
                                            <input type="text" class="form-control" name="email_id" id="email_id" value="<?php echo set_value('email_id',$students_array['email_id']) ?>"/>
                                            <?php echo form_error('email_id'); ?>
                                        </div>

                                        


                                        <div class="form-group">
                                            <label>Department</label>
                                            <select class="form-control" name="department" id="department">
                                                <option value="">--Choose department--</option>
                                                <?php echo get_departments(set_value('department', $students_array['department'])); ?>
                                            </select>
                                            <?php echo form_error('department'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Semester</label>
                                            <select class="form-control" name="semester" id="semester">
                                                <option value="">--Choose semester--</option>
                                                <?php echo get_semester(set_value('semester', $students_array['semester'])); ?>
                                            </select>
                                            <?php echo form_error('semester'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea type="text" class="form-control" name="address" id="address"><?php echo set_value('address',$students_array['address']) ?></textarea>
                                            <?php echo form_error('address'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Last name</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo set_value('last_name',$students_array['last_name']) ?>"/>
                                            <?php echo form_error('last_name'); ?>
                                        </div>
                                        <div class="form-group">
                                            
                                            <label>Gender</label>
                                            <div>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" value="male" class="flat-red" <?php echo set_radio('gender', 'male',(($students_array['gender'] == 'male')?TRUE:FALSE)) ?>> Male
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" value="female" class="flat-red" <?php echo set_radio('gender', 'female',(($students_array['gender'] == 'female')?TRUE:FALSE)) ?>> Female
                                                </label>
                                            </div>
                                            <?php echo form_error('gender'); ?>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>Mobile number</label>
                                            <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo set_value('mobile',$students_array['mobile']) ?>"/>
                                            <?php echo form_error('mobile'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Register number</label>
                                            <input type="text" class="form-control" name="reg_number" id="reg_number" value="<?php echo set_value('reg_number',$students_array['reg_number']) ?>"/>
                                            <?php echo form_error('reg_number'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Roll number</label>
                                            <input type="text" class="form-control" name="roll_number" id="roll_number" value="<?php echo set_value('roll_number',$students_array['roll_number']) ?>"/>
                                            <?php echo form_error('roll_number'); ?>
                                        </div>
                                        
                                        
                                    </div>
                                </div>

                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <div class="col-md-offset-2">
                                    <button class="btn btn-danger"><i class="fa fa-check-circle"></i> Save</button>
                                </div>
                            </div><!-- /.box-footer-->
                        </form>
                    </div><!-- /.box -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php $this->load->view('includes/bottom_menu') ?>
        </div><!-- ./wrapper -->

        <?php $this->load->view('includes/js_footer') ?>


        <script>
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-red',
                radioClass: 'iradio_flat-red'
            });
        </script>
    </body>


</html>