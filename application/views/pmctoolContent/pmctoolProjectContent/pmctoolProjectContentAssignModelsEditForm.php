<?php $this->load->view('header/header'); ?>

<body>

    <!-- Heaser Area Start -->
    <header class="header-area" style="position: fixed; width: 100%;">
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






    <!-- Projects Section-->

    <section class="metrics-section section-padding" id="metrics">
        <div class="container-fluid">

            <h2 class="section-title text-center">Assign Models to Project</h2>

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

                        <?php echo form_open('Projects/ViewProjectsAssignModelsEditSubmitForm') ?>  
                        <table class="table " style="width: 100%; alignment-adjust: auto; text-align:  left; font-size:16px; font-family: sans-serif;">
                            <?php if (isset($gProjects)): ?>
                                <?php foreach ($genProjects as $genProject): ?>
                                    <p><input type="hidden" size="80" id="mod_proj_id" name="mod_proj_id" value="<?php echo $genProject->mod_proj_id; ?>"/>
                                    <?php endforeach; ?>
                                <?php endif; ?>  
                            <tr>
                                <td>
                                    <span title="Project">
                                        <label for="Project"></label>
                                        <select name='proj_id' id='proj_id' >
                                            <?php if (isset($gProjects)): ?>
                                                <?php foreach ($genProjects as $genProjects): ?>
                                                    <option value="<?php echo $genProjects->proj_id; ?>">
                                                        <?php echo $genProjects->proj_title; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </span>
                                </td>
                            </tr>
                            <tr><td>Selected Model (before update) :</td></tr>
                            <tr>
                                <td>
                                    <span title="Model">
                                        <label for="Model"></label>
                                        <select >
                                            <?php if (isset($gModel)): ?>
                                                <?php foreach ($genModel as $genModel): ?>
                                                    <option value="<?php echo $genModel->mod_id; ?>">
                                                        <?php echo $genModel->mod_name; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </span>
                                </td>
                            </tr>
                            <tr><td>New Model :</td></tr>

                            <tr>
                                <td>
                                    <span title="Model">
                                        <label for="Model"></label>
                                        <select name='mod_id' id='mod_id' >
                                            <option value="-1">Select Model</option>
                                            <?php if (isset($gModel1)): ?>
                                                <?php foreach ($genModel1 as $genModel1): ?>
                                                    <option value="<?php echo $genModel1->mod_id; ?>">
                                                        <?php echo $genModel1->mod_name; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <div class="btn btn-danger">
                            <?php echo form_submit('submit', 'Edit Assignment'); ?>
                            <?php echo form_close() ?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Projects Section -->
    <?php $this->load->view('menu/pmctoolPreloader'); ?>

    <?php $this->load->view('footer/pmctoolFooter'); ?>