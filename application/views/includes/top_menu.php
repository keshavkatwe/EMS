<header class="main-header">
    <a href="../../index2.html" class="logo"><?php echo $this->config->item('site_name') ?></a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">



                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <?php
                        if ($this->session->profile_image == "") {
                            $profile_image = base_url('file_uploads/profile_images/default.png');
                        } else {
                            $profile_image = base_url('file_uploads/profile_images/' . $this->session->profile_image);
                        }
                        ?>


                        <img src="<?php echo $profile_image ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?php echo ucfirst($this->session->first_name . ' ' . $this->session->last_name) ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo $profile_image ?>" class="img-circle" alt="User Image" />
                            <p>
                                <?php echo ucfirst($this->session->first_name . ' ' . $this->session->last_name) ?> - Web Developer
                                <small><?php echo $this->session->email_id ?> - 
                                    <?php
                                    if ($this->session->role_id == 1) {
                                        echo 'Admin';
                                    }
                                    else if($this->session->role_id == 2){
                                        echo 'Faculty';
                                    }
                                    else
                                    {
                                        echo 'Student';
                                    }
                                    ?>
                                </small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url('profile/edit/' . $this->session->user_id) ?>" class="btn btn-default btn-flat">Edit profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url('account/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>