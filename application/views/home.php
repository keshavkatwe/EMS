<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->config->item('site_name') ?> | Home</title>

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


                <!-- Main content -->
                <section class="content">
                    <?php if ($this->session->role_id == 1) { ?>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <a href="<?php echo base_url('students') ?>">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-person-outline"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Students</span>
                                            <span class="info-box-number"><?php echo $counts['students']; ?></span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </a>

                            </div><!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <a href="<?php echo base_url('faculties') ?>">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Faculty</span>
                                            <span class="info-box-number"><?php echo $counts['faculty']; ?></span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </a>
                            </div><!-- /.col -->

                            <!-- fix for small devices only -->
                            <div class="clearfix visible-sm-block"></div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <a href="<?php echo base_url('subject/manage_subject') ?>">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-green"><i class="ion ion-ios-book-outline"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Subjects</span>
                                            <span class="info-box-number"><?php echo $counts['subjects']; ?></span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </a>
                            </div><!-- /.col -->

                        <?php } ?>
                            
                            
                            
                            
                            
                            
                            
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php $this->load->view('includes/bottom_menu') ?>
        </div><!-- ./wrapper -->

        <?php $this->load->view('includes/js_footer') ?>






        <script>
            // create angular app
            var validationApp = angular.module('validationApp', []);

            // create angular controller
            validationApp.controller('mainController', function ($scope) {

                // function to submit the form after all validation has occurred            
                $scope.submitForm = function () {

                    // check to make sure the form is completely valid
                    if ($scope.userForm.$valid) {
                        alert('our form is amazing');
                    }

                };

            });
        </script>




    </body>

</html>