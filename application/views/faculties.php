<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->config->item('site_name') ?> | Faculties</title>

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
                        Faculties
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
                                        <th>Employee id</th>
                                        <th>Department</th>
                                        <th>Sem</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach ($faculties_array as $faculty) { ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i++; ?></td>
                                        <td><?php echo $faculty['first_name'].' '.$faculty['last_name'] ?></td>
                                        <td><?php echo $faculty['email_id'] ?></td>
                                        <td><?php echo $faculty['employee_id'] ?></td>
                                        <td><?php echo $faculty['department_name'] ?></td>
                                        <td><?php echo $faculty['sem'] ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="<?php echo base_url('faculties/edit/'.$faculty['user_id']) ?>"><i class="fa fa-pencil"></i> Edit</a>
                                            <a class="btn btn-danger btn-xs" href="<?php echo base_url('faculties/delete/'.$faculty['user_id']) ?>"><i class="fa fa-trash-o"></i> Delete</a>
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