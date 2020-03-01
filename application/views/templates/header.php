<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
        <script src="<?php echo base_url(); ?>/assets/js/ckeditor.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url();?>">TechSunday</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>posts">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>categories">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>about">About</a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <?php if(!$this->session->userdata('logged_in')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>users/register">Sign up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>users/login">Log in</a>
                        </li>
                    <?php endif; ?>
                    <?php if($this->session->userdata('logged_in')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>posts/add">Create Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>categories/add">Create Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>users/logout">Log out</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>

        <!-- Check for message -->

        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-3">
                    <?php if ($this->session->flashdata('user_registered')): ?>
                        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('user_logged_in')): ?>
                        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logged_in').'</p>'; ?>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('user_logged_out')): ?>
                        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logged_out').'</p>'; ?>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('user_login_failed')): ?>
                        <?php echo '<p class="alert alert-warning">'.$this->session->flashdata('user_login_failed').'</p>'; ?>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('post_created')): ?>
                        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('post_updated')): ?>
                        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('post_deleted')): ?>
                        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('category_created')): ?>
                        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
                    <?php endif; ?>
                </div>
            </div>