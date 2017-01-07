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
                        <li class="active"><a class="page-scroll" href="<?php echo base_url('Models/ViewModels'); ?>">Models</a></li>
                        <li><a class="page-scroll" href="<?php echo base_url('ComplexityFactors/ViewComplexityFactors'); ?>">Complexity Factors</a></li>
                        <li><a class="page-scroll" href="<?php echo base_url('Metrics/ViewMetrics'); ?>">Metrics</a></li>
                        <li><a class="page-scroll" href="<?php echo base_url('EvaluationScale/ViewEvaluationScale'); ?>">Evaluation Scale</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Navigation end -->







    <!-- Models Section-->

    <section class="models-section section-padding" id="models">
        <div class="container-fluid">

            <h2 class="section-title text-center">Models</h2>

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

                        <?php echo form_open('Models/ViewModelsEditSubmitForm') ?>  
                        <?php if (count($edit) > 0) : ?>
                            <?php foreach ($edit as $edit): ?>
                                <table class="table " style="width: 100%; alignment-adjust: auto; text-align:  left; font-size:16px; font-family: sans-serif;">
                                    <p><input type="hidden" size="80" id="proj_id" name="mod_id" value="<?= $edit['mod_id'] ?>"/>    

                                    <tr>
                                        <td >
                                            <span title="Model's Title">
                                                <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="mod_name" id="mod_name" placeholder="Model's Title" value="<?= $edit['mod_name'] ?>"  />
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span title="Model's Description">
                                                <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="mod_description" id="mod_description" placeholder="Model's Description" value="<?= $edit['mod_description'] ?>"  />
                                            </span>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>
                            </table>
                            <div class="btn btn-danger">
                                <?php echo form_submit('submit', 'Edit Model'); ?>
                                <?php echo form_close() ?>
                            </div> 
                        <?php else: ?>
                            <a href="javascript:history.go(-1)" class="btn btn-danger">go to the Model's Form</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Models Section -->


    <?php $this->load->view('menu/pmctoolPreloader'); ?>

    <?php $this->load->view('footer/pmctoolFooter'); ?>