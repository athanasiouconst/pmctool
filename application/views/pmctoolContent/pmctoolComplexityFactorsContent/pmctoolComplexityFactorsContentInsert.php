<?php $this->load->view('header/header'); ?>

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
                        <li ><a class="page-scroll" href="<?php echo base_url('pmctool'); ?>">Home</a></li>
                        <li><a class="page-scroll" href="<?php echo base_url('Projects/ViewProjects'); ?>">Projects</a></li>
                        <li><a class="page-scroll" href="<?php echo base_url('Models/ViewModels'); ?>">Models</a></li>
                        <li class="active"><a class="page-scroll" href="<?php echo base_url('ComplexityFactors/ViewComplexityFactors'); ?>">Complexity Factors</a></li>
                        <li><a class="page-scroll" href="<?php echo base_url('Metrics/ViewMetrics'); ?>">Metrics</a></li>
                        <li><a class="page-scroll" href="<?php echo base_url('EvaluationScale/ViewEvaluationScale'); ?>">Evaluation Scale</a></li>
                        <li>
                            <?php if ($is_authenticated): ?>
                                <?php $role; ?>
                                <?php if ($role == 1) { ?>
                                    <a href="<?php echo base_url('User/ViewUsers'); ?>" >Admin </a>
                                <?php } ?>
                            <?php endif; ?>

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






    <!-- Projects Section-->

    <section class="projects-section section-padding" id="projects">
        <div class="container-fluid">

            <h2 class="section-title text-center">Complexity Factors</h2>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center ">

                    <div class="align-left">

                        <!--  FORM -->
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger" >
                                <strong><?= $error ?></strong>
                                <strong><?php echo validation_errors(); ?></strong>
                            </div>                    
                        <?php endif; ?>
                        
                        <?php echo form_open('ComplexityFactors/CreateComplexityFactors') ?>  
                        <table class="table " style="width: 100%; alignment-adjust: auto; text-align:  left; font-size:16px; font-family: sans-serif;">

                            <tr>
                                <td >
                                    <span title="Complexity Factor's Name">
                                        <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="cf_name" id="cf_name" placeholder="Complexity Factor's Name" value="<?php echo set_value('cf_name'); ?>"  />
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span title="Complexity Factor's Description">
                                        <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="cf_description" id="cf_description" placeholder="Complexity Factor's Description" value="<?php echo set_value('cf_description'); ?>"  />
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span title="Complexity Factor's Reference" >
                                        <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="cf_reference" id="cf_reference" placeholder="Complexity Factor's Reference" value="<?php echo set_value('cf_reference'); ?>"  />
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span title="Complexity Factor's Restriction">
                                        <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="cf_restriction" id="cf_restriction" placeholder="Complexity Factor's Restriction" value="<?php echo set_value('cf_restriction'); ?>"  />
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span title="Complexity Factor's Category">
                                        <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="cf_category" id="cf_category" placeholder="Complexity Factor's Category" value="<?php echo set_value('cf_category'); ?>"  />
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span title="Complexity Factor's Weight">
                                        <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="cf_weight" id="cf_weight" placeholder="Complexity Factor's Weight" value="<?php echo set_value('cf_weight'); ?>"  />
                                    </span>
                                </td>
                            </tr>




                        </table>
                        <div class="btn btn-danger">
                            <?php echo form_submit('submit', 'Submit Complexity Factor'); ?>
                            <?php echo form_close() ?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Projects Section -->


    <?php $this->load->view('menu/pmctoolPreloader'); ?>

    <?php $this->load->view('content/content'); ?>
    <?php $this->load->view('prefooter/prefooter'); ?>
    <?php $this->load->view('footer/pmctoolFooter'); ?>