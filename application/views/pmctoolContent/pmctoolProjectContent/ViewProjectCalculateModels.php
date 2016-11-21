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


                                            <tr> 
                                                <td class="alert-success" style="width: 20%;">Metric Title</td>
                                                <td colspan="13" class="alert-warning" ><?php echo $gen->metric_name; ?></td>
                                            </tr>

                                            <tr>
                                                <td class="alert-success" style="width: 20%;">Evaluation Scale</td>
                                                <td><?php echo $gen->ep1_descr; ?></td>
                                                <td><?php echo $gen->ep2_descr; ?></td>
                                                <td><?php echo $gen->ep3_descr; ?></td>
                                                <td><?php echo $gen->ep4_descr; ?></td>
                                                <td><?php echo $gen->ep5_descr; ?></td>
                                                <td><?php echo $gen->ep6_descr; ?></td>
                                                <td><?php echo $gen->ep7_descr; ?></td>
                                                <td><?php echo $gen->ep8_descr; ?></td>
                                                <td><?php echo $gen->ep9_descr; ?></td>
                                                <td><?php echo $gen->ep10_descr; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="alert-success" style="width: 20%;">Type: <?php echo $gen->evsc_type; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="alert-success" style="width: 20%;">Number of Choices: <?php echo $gen->evsc_number_of_choices; ?></td>
                                            </tr>
                                            <tr> 
                                                <td class="alert-success" style="width: 20%;">Possible Answer :</td>
                                                <td>
                                                    
                                                    <select>
                                                        <option><?php echo $gen->ep1_descr; ?></option>
                                                        <option><?php echo $gen->ep2_descr; ?></option>
                                                        <option><?php echo $gen->ep3_descr; ?></option>
                                                        <option><?php echo $gen->ep4_descr; ?></option>
                                                        <option><?php echo $gen->ep5_descr; ?></option>
                                                        <option><?php echo $gen->ep6_descr; ?></option>
                                                        <option><?php echo $gen->ep7_descr; ?></option>
                                                        <option><?php echo $gen->ep8_descr; ?></option>
                                                        <option><?php echo $gen->ep9_descr; ?></option>
                                                        <option><?php echo $gen->ep10_descr; ?></option>
                                                    </select>
                                                </td>
                                            </tr>
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