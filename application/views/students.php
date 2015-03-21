<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->config->item('site_name') ?> | Students</title>

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
                        Students
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="box">
                        <div class="box-body">

                            
                            <table id="example" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Department</th>
                                        <th>Sem</th>
                                        <th>Roll number</th>
                                        <th>Register number</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach ($students_list as $student) { ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i++; ?></td>
                                        <td><?php echo $student['first_name'].' '.$student['last_name'] ?></td>
                                        <td><?php echo $student['email_id'] ?></td>
                                        <td><?php echo $student['department_name'] ?></td>
                                        <td class="text-center"><?php echo $student['semester'] ?></td>
                                        <td class="text-center"><?php echo $student['roll_number'] ?></td>
                                        <td class="text-center"><?php echo $student['reg_number'] ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="<?php echo base_url('students/edit/'.$student['user_id']) ?>"><i class="fa fa-pencil"></i> Edit</a>
                                            <a class="btn btn-danger btn-xs" href="<?php echo base_url('students/delete/'.$student['user_id']) ?>"><i class="fa fa-trash-o"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>


                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php $this->load->view('includes/bottom_menu') ?>
        </div><!-- ./wrapper -->

        <?php $this->load->view('includes/js_footer') ?>


        <script>
            $(document).ready(function () {
                $('#example').dataTable();
            });
            
            
            
        </script>
    </body>


</html>