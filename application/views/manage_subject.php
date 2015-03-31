<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->config->item('site_name') ?> | Manage Subject</title>

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
                        Manage Subject
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">

                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Si No.</th>
                                        <th>Subject Code</th>
                                        <th>Subject Name</th>
                                        <th>Semester</th>
                                        <th>Department</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=1;
                                    foreach ($subject_list as $sub) {
                                        $edit_url = base_url('subject/update_subject/' . $sub['subject_id']);
                                        $delete_url = base_url('subject/delete_subject/' . $sub['subject_id']);
                                        echo "  <tr>
                                                    <td>{$i}</td>
                                                    <td>{$sub['subject_code']}</td>
                                                    <td>{$sub['subject_name']}</td>
                                                    <td>{$sub['semester']}</td>
                                                    <td>{$sub['department_name']}</td>
                                                    <td>
                                                        <a href='{$edit_url}' class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i> Edit</a>
                                                        <button class='btn btn-danger btn-xs' onclick='delete_subject({$sub['subject_id']})'><i class='fa fa-trash-o'></i> Delete</button>
                                                    </td>    
                                                </tr>";
                                        $i++;               
                                    }
                                    ?>

                                </tbody>  
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php $this->load->view('includes/bottom_menu') ?>
        </div><!-- ./wrapper -->

        <?php $this->load->view('includes/js_footer') ?>
        <script type="text/javascript">
            $(function () {
                $("#example1").dataTable();

            });
            
            
            function delete_subject(id)
            {
                bootbox.confirm("Are you sure, you want to delete?", function (result) {
                    if(result == true)
                    {
                        window.location.assign(base_url('subject/delete_subject/'+id));
                    }
                });
            }
        </script>
    </body>


</html>