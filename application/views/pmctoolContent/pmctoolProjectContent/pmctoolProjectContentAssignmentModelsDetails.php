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

    <section class="models-section section-padding" id="models">
        <div class="container-fluid">
            <h2 class="section-title text-center">Project with Models</h2>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center ">
                    <div class="align-left">
                        <?php echo $this->session->flashdata('success_msg'); ?>
                        <?php echo $this->session->flashdata('delete_msg'); ?>
                        <?php echo $this->session->flashdata('edit_msg'); ?>

                        <div class="align-left">
                            <div  style="float: right;">
                                <a href="<?php echo base_url('Projects/ViewProjectsCreationForm'); ?>" class="btn btn-danger">Add Project</a>
                                <a href="<?php echo base_url('Projects/ViewProjectsAssignModelsCreationForm'); ?>" class="btn btn-danger">Assigning Models to Projects</a>

                                <br><br>
                            </div>
                            <?php if (isset($gens)): ?>
                                <?php if (count($gen) > 0) : ?>

                                    <?php foreach ($gen as $gen): ?>
                                        <table class="table table-responsive table-active table-condensed" style="font-size:16px; font-family: sans-serif; 
                                               alignment-adjust: auto; text-align:  left; " >
                                            <tr class="alert-success" >
                                                <td ></td>
                                                <td style="float: right;">
                                                    <?php
                                                    $mod_proj_id = $gen->mod_proj_id;
                                                    $base_url = base_url();
                                                    $assign = '<img alt=""' . $mod_proj_id . '"" src="' . $base_url . 'img/messages/assignment.jpg" width="20" height="20">   ';
                                                    $calculate = '<img alt=""' . $mod_proj_id . '"" src="' . $base_url . 'img/messages/calculate.jpg" width="40" height="40">   ';
                                                    $print = '<img alt=""' . $mod_proj_id . '"" src="' . $base_url . 'img/messages/print.jpg" width="20" height="20">   ';
                                                    $pdf = '<img alt=""' . $mod_proj_id . '"" src="' . $base_url . 'img/messages/pdf.jpg" width="20" height="20">   ';
                                                    $view = '<img alt=""' . $mod_proj_id . '"" src="' . $base_url . 'img/messages/success.jpg" width="20" height="20">   ';
                                                    $edit = '<img alt=""' . $mod_proj_id . '"" src="' . $base_url . 'img/messages/edit.jpg" width="20" height="20">   ';
                                                    $delete = '<img alt=""' . $mod_proj_id . '"" src="' . $base_url . 'img/messages/delete.jpg" width="20" height="20">  ';
                                                    ?>
                                                    <?php
                                                    //echo anchor("Models/ViewProjectAssignments/$mod_id", $assign, array('onClick' => "return confirm('Are you sure for viewing the assignments of this metric ?')"));
                                                    ?>
                                                    <?php
                                                    echo anchor("Projects/ViewProjectCalculateModels/$mod_proj_id", $calculate, array('onClick' => "return confirm('Are you sure for Calculating this model ?')"));
                                                    ?>
                                                    <?php
                                                    echo anchor("Projects/ViewProjectAssignmentsPDF/$mod_proj_id", $print, array('target' => '_blank', 'onClick' => "return confirm('Are you sure for viewing this  model?')"));
                                                    ?>
                                                    <?php
                                                    echo anchor("Projects/ViewProjectAssignmentsPDF/$mod_proj_id", $pdf, array('target' => '_blank', 'onClick' => "return confirm('Are you sure for viewing this  model?')"));
                                                    ?>
                                                    <?php
                                                    echo anchor("Projects/ViewProjectAssignmentsDetails/$mod_proj_id", $view, array('onClick' => "return confirm('Are you sure for viewing this model ?')"));
                                                    ?>
                                                    <?php
                                                    echo anchor("Projects/ViewModelsAssignFactorEditForm/$mod_proj_id", $edit, array('onClick' => "return confirm('Are you sure for editing this model ?')"));
                                                    ?>
                                                    <?php echo anchor("Projects/ViewProjectAssignmentsDelete/$mod_proj_id", $delete, array('onClick' => "return confirm('Are you sure for deleting this model?')")); ?>    
                                                </td>
                                            </tr>

                                            <tr><td class="alert-success" style="width: 20%;">Project Title</td><td><?php echo $gen->proj_title; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Project Kind</td><td><?php echo $gen->proj_kind; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Project Description</td><td><?php echo $gen->proj_description; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Model Title</td><td><?php echo $gen->mod_name; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Model Description</td><td><?php echo $gen->mod_description; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Complexity Factor Title</td><td><?php echo $gen->cf_name; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Complexity Factor Description</td><td><?php echo $gen->cf_description; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Complexity Factor Reference</td><td><?php echo $gen->cf_reference; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Complexity Factor Restriction</td><td><?php echo $gen->cf_restriction; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Complexity Factor Category</td><td><?php echo $gen->cf_category; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Complexity Factor Weight</td><td><?php echo $gen->cf_weight; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Metric Title</td><td><?php echo $gen->metric_name; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Metric Description</td><td><?php echo $gen->metric_description; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Metric Reference</td><td><?php echo $gen->metric_reference; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Metric Restriction</td><td><?php echo $gen->metric_restriction; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Metric Weight</td><td><?php echo $gen->metric_weight; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Evaluation Scale Title</td><td><?php echo $gen->evsc_name; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Evaluation Scale Description</td><td><?php echo $gen->evsc_description; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Evaluation Scale Type</td><td><?php echo $gen->evsc_type; ?></td></tr>
                                            <tr><td class="alert-success" style="width: 20%;">Evaluation Scale Number of Choices</td><td><?php echo $gen->evsc_number_of_choices; ?></td></tr>
                                            
                                            <?php endforeach; ?> 

                                    <?php else : ?>
                                        <tr>
                                            <td>
                                                <div style="padding-left: 25px;"><i>There is no Data to Display !!</i></div>
                                            </td>
                                        </tr>
                                    <?php endif ?>

                                </table>
                                
                        <?php endif; ?>
                    </div>
                </div>
            </div>
    </section>
    <!-- Projects Section -->
    <?php $this->load->view('menu/pmctoolPreloader'); ?>

    <?php $this->load->view('footer/pmctoolFooter'); ?>