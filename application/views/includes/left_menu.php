<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php
                if ($this->session->profile_image == "") {
                    $profile_image = base_url('file_uploads/profile_images/default.png');
                } else {
                    $profile_image = base_url('file_uploads/profile_images/' . $this->session->profile_image);
                }
                ?>
                <img src="<?php echo $profile_image ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php echo ucfirst($this->session->first_name . ' ' . $this->session->last_name) ?></p>

                <a href="#"><?php echo $this->session->email_id ?></a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li class="<?php echo (isset($current_page) && $current_page == 'home') ? 'active' : '' ?>"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
            
            
            <?php if($this->session->role_id == 1){ ?>
            
            <li class="treeview <?php echo (isset($current_tab) && $current_tab == 'students_tab') ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Student</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo (isset($current_page) && $current_page == 'add_student') ? 'active' : '' ?>"><a href="<?php echo base_url('students/add') ?>"><i class="fa fa-circle-o"></i> Add student</a></li>
                    <li class="<?php echo (isset($current_page) && $current_page == 'students') ? 'active' : '' ?>"><a href="<?php echo base_url('students') ?>"><i class="fa fa-circle-o"></i> Manage students</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo (isset($current_tab) && $current_tab == 'faculties_tab') ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Faculties</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo (isset($current_page) && $current_page == 'add_faculty') ? 'active' : '' ?>"><a href="<?php echo base_url('faculties/add'); ?>"><i class="fa fa-circle-o"></i> Add faculty</a></li>
                    <li class="<?php echo (isset($current_page) && $current_page == 'faculties') ? 'active' : '' ?>"><a href="<?php echo base_url('faculties'); ?>"><i class="fa fa-circle-o"></i> Manage faculties</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo (isset($current_tab) && $current_tab == 'subject') ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Subject</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo (isset($current_page) && $current_page == 'add_subject') ? 'active' : '' ?>"><a href="<?php echo base_url("subject/add_subject"); ?>"><i class="fa fa-circle-o"></i> Add subject</a></li>
                    <li class="<?php echo (isset($current_page) && $current_page == 'manage_subject') ? 'active' : '' ?>"><a href="<?php echo base_url("subject/manage_subject"); ?>"><i class="fa fa-circle-o"></i> Manage subject</a></li>
                    <li class="<?php echo (isset($current_page) && $current_page == 'assign_subject') ? 'active' : '' ?>"><a href="<?php echo base_url("subject/assign_subject"); ?>"><i class="fa fa-circle-o"></i> Assign subject</a></li>
                </ul>
            </li>
            <?php } ?>
        
            
            <?php if($this->session->role_id == 2){ ?>
            <li class="<?php echo (isset($current_page) && $current_page == 'ia') ? 'active' : '' ?>"><a href="<?php echo base_url('ia') ?>"><i class="fa fa-check"></i> IA marks</a></li>

            <li class="<?php echo (isset($current_page) && $current_page == 'attendance') ? 'active' : '' ?>"><a href="<?php echo base_url('attendance') ?>"><i class="fa fa-calendar"></i> Attendance</a></li>

            <?php } ?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->