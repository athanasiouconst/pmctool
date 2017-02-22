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
                        <li><a class="page-scroll" href="<?php echo base_url('ComplexityFactors/ViewComplexityFactors'); ?>">Complexity Factors</a></li>
                        <li class="active"><a class="page-scroll" href="<?php echo base_url('Metrics/ViewMetrics'); ?>">Metrics</a></li>
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






    <!-- Metrics Section-->

    <section class="metrics-section section-padding" id="metrics">
        <div class="container-fluid">

            <h2 class="section-title text-center">Metrics</h2>

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

                        <?php echo form_open('Metrics/ViewMetricsEditSubmitForm') ?>  

                        <?php if (count($edit) > 0) : ?>
                            <?php foreach ($edit as $edit): ?>
                                <table class="table " style="width: 100%; alignment-adjust: auto; text-align:  left; font-size:16px; font-family: sans-serif;">
                                <p><input type="hidden" size="80" id="metric_id" name="metric_id" value="<?= $edit['metric_id'] ?>"/>    

                                    <tr>
                                        <td >
                                            <span title="Metric's Name">
                                                <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="metric_name" id="metric_name" placeholder="Metric's Name" value="<?= $edit['metric_name'] ?>"  />
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span title="Metric's Description">
                                                <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="metric_description" id="metric_description" placeholder="Metric's Description" value="<?= $edit['metric_description'] ?>"  />
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span title="Metric's Reference" >
                                                <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="metric_reference" id="metric_reference" placeholder="Metric's Reference" value="<?= $edit['metric_reference'] ?>"  />
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span title="Metric's Restriction">
                                                <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="metric_restriction" id="metric_restriction" placeholder="Metric's Restriction" value="<?= $edit['metric_restriction'] ?>"  />
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span title="Metric's Weight">
                                                <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="metric_weight" id="metric_weight" placeholder="Metric's Weight" value="<?= $edit['metric_weight'] ?>"  />
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span title="Complexity Factor">
                                                <label for="Complexity Factor"></label>
                                                <select name='cf_id' id='cf_id' >
                                                    <option value="<?= $edit['cf_id'] ?>"><?= $edit['cf_name'] ?></option>
                                                    <option value="-1">Complexity Factor</option>
                                                    <?php if (isset($gComplexityFactors)): ?>
                                                        <?php foreach ($genCF as $genComplexityFactor): ?>
                                                            <option value="<?php echo $genComplexityFactor->cf_id; ?>">
                                                                <?php echo $genComplexityFactor->cf_name; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <div class="btn btn-danger">
                                <?php echo form_submit('submit', 'Edit Metric'); ?>
                                <?php echo form_close() ?>
                            </div> 
                        <?php else: ?>
                            <a href="javascript:history.go(-1)" class="btn btn-danger">go to the Metric's Form</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Metrics Section -->


    <?php $this->load->view('menu/pmctoolPreloader'); ?>

    <?php $this->load->view('content/content'); ?>
    <?php $this->load->view('prefooter/prefooter'); ?>
    <?php $this->load->view('footer/pmctoolFooter'); ?>