<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->config->item('site_name') ?> | Add Subject</title>

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
                        <?php echo $title; ?>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="box box-default">
                        <!-- form start -->
                        <div class="row">
                            <div class="col-md-6">
                                <form role="form" action="<?php echo $submit_url; ?>" method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="department">Department <span class="text-red">*</span></label>
                                            <select name="department" id="department" class="form-control">
                                                <option value="">--Choose--</option>
                                                <?php echo get_departments(set_value('department',$form_data['department'])); ?>
                                            </select>
                                            <?php echo form_error('department'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="semester">Semester <span class="text-red">*</span></label>
                                            <select name="semester" id="semester" class="form-control">
                                                <option value="">--Choose--</option>
                                                <?php echo get_semester(set_value('semester',$form_data['semester'])); ?>
                                            </select>
                                            <?php echo form_error('semester'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="subject_code">Subject code <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="subject_code" name="subject_code" placeholder="Subject code" value="<?php echo set_value('subject_code',$form_data['subject_code']); ?>">
                                            <?php echo form_error('subject_code'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="subject_name">Subject name <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="subject_name" name="subject_name" placeholder="Subject name" value="<?php echo set_value('subject_name',$form_data['subject_name']); ?>">
                                            <?php echo form_error('subject_name'); ?>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-check-circle"></i> Save</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6"></div>
                        </div>


                    </div>




                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php $this->load->view('includes/bottom_menu') ?>
        </div><!-- ./wrapper -->

        <?php $this->load->view('includes/js_footer') ?>
    </body>


</html>