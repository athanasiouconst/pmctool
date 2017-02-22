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
                        <li><a class="page-scroll" href="<?php echo base_url('EvaluationScale/ViewEvaluationScale'); ?>">Evaluation Scale</a></li>                      <li>
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

            <h2 class="section-title text-center">Projects</h2>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center ">

                    <?php echo $this->session->flashdata('success_msg'); ?>
                    <?php echo $this->session->flashdata('delete_msg'); ?>
                    <?php echo $this->session->flashdata('edit_msg'); ?>

                    <div class="align-left">
                        <?php if ($is_authenticated): ?>
                        <?php $role; ?>
                        <?php if ($role == 1 || $role == 2 || $role == 4) { ?>
                            <div  style="float: right;">
                                <a href="<?php echo base_url('Projects/ViewProjectsCreationForm'); ?>" class="btn btn-danger">Add Project</a>
                                <br><br>
                            </div>
                        <?php } ?>
                    <?php if ($role == 1 || $role == 2 || $role == 4 || $role == 3) { ?>
                            <div  style="float: right;">
                                <a href="<?php echo base_url('Projects/ViewProjectsAssignModelsCreationForm'); ?>" class="btn btn-danger">Assigning Models to Projects</a>
                                <br><br>
                            </div>
                        <?php } ?>
                    <?php endif; ?> 
                        <?php if (isset($gens)): ?>
                            <?php if (count($gen) > 0) : ?>
                                <table class="table table-responsive table-active table-condensed" style="alignment-adjust: auto; text-align:  left; font-size:16px; font-family: sans-serif;">

                                    <tr class="alert-success">
                                        <?php foreach ($fields as $field_name => $field_display): ?>
                                            <td  <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
                                                <?php echo $field_display; ?>
                                                <?php
//                                            echo anchor("Projects/ViewProjects/$field_name/" .
//                                                    ( ($sort_order == 'asc' && $sort_by == $field_name ) ? 'desc' : 'asc' ), $field_display);
//                                            
                                                ?>
                                            </td>
                                        <?php endforeach; ?>
                                        <td></td>
                                    </tr>
                                    <?php foreach ($gen as $gen): ?>

                                        <tr>
                                            <?php foreach ($fields as $field_name => $field_display): ?>
                                                <td >
                                                    <?php echo $gen->$field_name; ?>
                                                </td>
                                            <?php endforeach; ?> 
                                            <td>
                                                <?php
                                                $proj_id = $gen->proj_id;
                                                $base_url = base_url();
                                                $assign = '<img alt=""' . $proj_id . '"" src="' . $base_url . 'img/messages/assignment.jpg" width="20" height="20">   ';
                                                $pdf = '<img alt=""' . $proj_id . '"" src="' . $base_url . 'img/messages/pdf.jpg" width="20" height="20">   ';
                                                $view = '<img alt=""' . $proj_id . '"" src="' . $base_url . 'img/messages/success.jpg" width="20" height="20">   ';
                                                $edit = '<img alt=""' . $proj_id . '"" src="' . $base_url . 'img/messages/edit.jpg" width="20" height="20">   ';
                                                $delete = '<img alt=""' . $proj_id . '"" src="' . $base_url . 'img/messages/delete.jpg" width="20" height="20">  ';
                                                ?>
                                                <?php
                                                echo anchor("Projects/ViewProjectAssignments/$proj_id", $assign, array('onClick' => "return confirm('Are you sure for viewing the assignments of this metric ?')"));

                                                echo anchor("Projects/ViewProjectsPDF/$proj_id", $pdf, array('target' => '_blank', 'onClick' => "return confirm('Are you sure for viewing this  model?')"));

                                                echo anchor("Projects/ViewProjectsDetails/$proj_id", $view, array('onClick' => "return confirm('Are you sure for viewing this project ?')"));
                                                ?>
                                                <?php if ($is_authenticated): ?>
                                                    <?php $role; ?>
                                                <?php if ($role == 1 || $role == 2 || $role == 4) { ?>
                                                    <?php
                                                        echo anchor("Projects/ViewProjectsEditForm/$proj_id", $edit, array('onClick' => "return confirm('Are you sure for editing this project?')"));

                                                        echo anchor("Projects/ViewProjectsDelete/$proj_id", $delete, array('onClick' => "return confirm('Are you sure for deleting this project?')"));
                                                        ?>    
                                                    <?php } ?> 
                                                <?php endif; ?>
                                            </td>
                                        <?php endforeach; ?> 
                                    </tr>

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

    <?php $this->load->view('content/content'); ?>
    <?php $this->load->view('prefooter/prefooter'); ?>
    <?php $this->load->view('footer/pmctoolFooter'); ?>
