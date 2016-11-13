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
                        <li class="active"><a class="page-scroll" href="<?php echo base_url('Projects/ViewProjects'); ?>">Projects</a></li>
                        <li><a class="page-scroll" href="<?php echo base_url('Models/ViewModels'); ?>">Models</a></li>
                        <li><a class="page-scroll" href="<?php echo base_url('ComplexityFactors/ViewComplexityFactors'); ?>">Complexity Factors</a></li>
                        <li><a class="page-scroll" href="<?php echo base_url('Metrics/ViewMetrics'); ?>">Metrics</a></li>
                        <li><a class="page-scroll" href="<?php echo base_url('EvaluationScale/ViewEvaluationScale'); ?>">Evaluation Scale</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Navigation end -->





    <!-- Projects Section-->

    <section class="projects-section section-padding" id="projects">
        <div class="container-fluid">

            <h2 class="section-title text-center">Projects</h2>

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
                        <?php echo form_open('Projects/ViewProjectsEditSubmitForm') ?>
                        <?php if (count($edit) > 0) : ?>
                            <?php foreach ($edit as $edit): ?>

                                <p><input type="hidden" size="80" id="proj_id" name="proj_id" value="<?= $edit['proj_id'] ?>"/>    

                                <table class="table " style="width: 100%; alignment-adjust: auto; text-align:  left; font-size:16px; font-family: sans-serif;">

                                    <tr>
                                        <td >
                                            <span title="Project's Title">
                                                <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="proj_title" id="proj_title" placeholder="Project's Title" value="<?= $edit['proj_title'] ?>"  />
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span title="Kind of Project">
                                                <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="proj_kind" id="proj_kind" placeholder="Kind of Project" value="<?= $edit['proj_kind'] ?>"  />
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span title="Project's Description">
                                                <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="proj_description" id="proj_description" placeholder="Project's Description" value="<?= $edit['proj_description'] ?>"  />
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <div class="btn btn-danger">
                                <?php echo form_submit('submit', 'Edit Project'); ?>
                                <?php echo form_close() ?>
                            </div> 
                        <?php else: ?>
                            <a href="javascript:history.go(-1)" class="btn btn-danger">go to the Project's Form</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Projects Section -->


    <?php $this->load->view('menu/pmctoolPreloader'); ?>

    <?php $this->load->view('footer/pmctoolFooter'); ?>