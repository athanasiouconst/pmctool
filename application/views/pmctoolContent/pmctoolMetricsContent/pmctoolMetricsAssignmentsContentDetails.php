<?php $this->load->view('header/header'); ?>

<body>

    <!--     Navigation start  -->    
    <header class="header-area" style="position: fixed; width: 100%;">

        <nav class="navbar navbar-custom tb-nav" role="navigation" >
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
                        <li class="active">
                            <a class="page-scroll" href="<?php echo base_url('Metrics/ViewMetrics'); ?>">Metrics</a>

                        </li>
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
    <!--     Navigation end -->
    <!-- Metrics Section-->

    <section class="metrics-section section-padding" id="metrics">
        <div class="container-fluid">
            <h2 class="section-title text-center">Metrics</h2>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center ">
                    <?php echo $this->session->flashdata('success_msg'); ?>
                    <?php echo $this->session->flashdata('delete_msg'); ?>
                    <?php echo $this->session->flashdata('edit_msg'); ?>

                    <div class="align-left">
                        <div  style="float: right;">
                            <a href="<?php echo base_url('Metrics/ViewMetricsCreationForm'); ?>" class="btn btn-danger">Add Metrics</a>
                            <a href="<?php echo base_url('Metrics/ViewMetricsAssignScaleCreationForm'); ?>" class="btn btn-danger">Assigning Scale at Metrics</a>

                            <br><br>
                        </div>
                        <?php if (isset($gens)): ?>
                            <?php if (count($gen) > 0) : ?>
                                <table class="table table-responsive table-active table-condensed" style="font-size:16px; font-family: sans-serif; 
                                       alignment-adjust: auto; text-align:  left;" >

                                    <?php foreach ($gen as $gen): ?>

                                        <tr class="alert-success" >
                                            <td ></td>
                                            <td style="float: right;">
                                                <?php
                                                $metric_evsc_id = $gen->metric_evsc_id;
                                                $base_url = base_url();
                                                $assign = '<img alt=""' . $metric_evsc_id . '"" src="' . $base_url . 'img/messages/assignment.jpg" width="20" height="20">   ';
                                                $pdf = '<img alt=""' . $metric_evsc_id . '"" src="' . $base_url . 'img/messages/pdf.jpg" width="20" height="20">   ';
                                                $view = '<img alt=""' . $metric_evsc_id . '"" src="' . $base_url . 'img/messages/success.jpg" width="20" height="20">   ';
                                                $edit = '<img alt=""' . $metric_evsc_id . '"" src="' . $base_url . 'img/messages/edit.jpg" width="20" height="20">   ';
                                                $delete = '<img alt=""' . $metric_evsc_id . '"" src="' . $base_url . 'img/messages/delete.jpg" width="20" height="20">  ';
                                                ?>
                                                <?php
                                                echo anchor("Metrics/ViewMetricsAssignmentsDetailsPDF/$metric_evsc_id", $pdf, array('target' => '_blank', 'onClick' => "return confirm('Are you sure for viewing this  ?')"));
                                                ?>
                                                <?php
                                                echo anchor("Metrics/ViewMetricsAssignmentsDetails/$metric_evsc_id", $view, array('onClick' => "return confirm('Are you sure for viewing this assignment ?')"));
                                                ?>
                                                <?php
                                                echo anchor("Metrics/ViewMetricsAssignmentsEditForm/$metric_evsc_id", $edit, array('onClick' => "return confirm('Are you sure for editing this assignment ?')"));
                                                ?>
                                                <?php echo anchor("Metrics/ViewMetricsAssignmentsDelete/$metric_evsc_id", $delete, array('onClick' => "return confirm('Are you sure for deleting this assignment ?')")); ?>    
                                            </td>
                                        </tr>
                                        <tr><td class="alert-success" style="width: 20%;">Metric Title</td><td><?php echo $gen->metric_name; ?></td></tr>
                                        <tr><td class="alert-success" style="width: 20%;">Metric Description</td><td><?php echo $gen->metric_description; ?></td></tr>
                                        <tr><td class="alert-success" style="width: 20%;">Metric Reference</td><td><?php echo $gen->metric_reference; ?></td></tr>
                                        <tr><td class="alert-success" style="width: 20%;">Metric Restriction</td><td><?php echo $gen->metric_restriction; ?></td></tr>
                                        <tr><td class="alert-success" style="width: 20%;">Metric Weight</td><td><?php echo $gen->metric_weight; ?></td></tr>
                                        <tr><td class="alert-success" style="width: 20%;">Complexity Factor</td><td><?php echo $gen->cf_name; ?></td></tr>
                                        <tr><td class="alert-success" style="width: 20%;">Evaluation Scale Name</td><td><?php echo $gen->evsc_name; ?></td></tr>
                                        <tr><td class="alert-success" style="width: 20%;">Evaluation Scale Description</td><td><?php echo $gen->evsc_description; ?></td></tr>
                                        <tr><td class="alert-success" style="width: 20%;">Evaluation Scale Type</td><td><?php echo $gen->evsc_type; ?></td></tr>
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
    <!-- Metrics Section -->

    <?php $this->load->view('menu/pmctoolPreloader'); ?>

    <?php $this->load->view('footer/pmctoolFooter'); ?>