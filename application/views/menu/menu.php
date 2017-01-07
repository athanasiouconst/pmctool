
<body>

    <!-- Heaser Area Start -->
    <header class="header-area">
        <!-- Navigation start -->
        <nav class="navbar navbar-custom tb-nav" role="navigation">
            <div class="container">        
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#tb-nav-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand logo" href="<?php echo base_url(); ?>"><h2>Project Management <br><span>Complexity </span>Tool</h2></a>
                </div>

                <div class="collapse navbar-collapse" id="tb-nav-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a class="page-scroll" href="#top">Home</a></li>
                        <li><a class="page-scroll" href="<?php echo base_url('pmctool'); ?>">Project Management Tool</a></li>
                        <li><a class="page-scroll" href="#about">About</a></li>
                        <li><a class="page-scroll" href="#testimonial">Members</a></li>
                        <!--                    <li><a class="page-scroll" href="#portfolio">Portfolio</a></li>-->
                        <!--                    <li><a class="page-scroll" href="#pricing">Pricing</a></li>-->
                        <!--                    <li><a class="page-scroll" href="#blog">Blog</a></li>-->
                        <li><a class="page-scroll" href="#contact">Contact Us</a></li>
                        <li>
                            <?php if ($this->session->userdata('userIsLoggedIn')) { ?>
                                <a href="<?php echo base_url('User/Logout'); ?>" >Logout </a>
                            <?php } else { ?>
                                <a class="page-scroll" href="<?php echo base_url('User'); ?>">Login</a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Navigation end -->

    <!-- Navigation end -->