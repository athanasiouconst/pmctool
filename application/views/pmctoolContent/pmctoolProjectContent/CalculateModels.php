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
            <h2 class="section-title text-center">Calculated Models at Project :<br><i style="color:red;"><?php echo $proj_title; ?></i></h2>
            <h2 class="section-title text-center">
                <i style="color: #398439;">
                    <?php
                    $counter = 0;
                    foreach ($ep as $key => $n) {
                        $counter = $n + $counter;
                    }
                    ?>
                    <?php echo round($counter / count($ep), 3); ?>
                </i>
            </h2>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center ">
                    <div class="align-left">
                        <?php echo $this->session->flashdata('success_msg'); ?>
                        <?php echo $this->session->flashdata('delete_msg'); ?>
                        <?php echo $this->session->flashdata('edit_msg'); ?>

                        <div class="align-left">
                            <div class="row alert-success">

                                <div class="col-md-12 text-center active logo">
                                    <table class="text-left" style="margin-left: 125px; font-size: 18px;">
                                        <tr>
                                            <th class="text-center">  
                                        <h4>Metric</h4>
                                        </th>
                                        <th class="text-center" style="padding-left: 25px;">  
                                        <h4>Evaluation Scale</h4>
                                        </th>
                                        <th class="text-center" style="padding-left: 25px;">  
                                        <h4>The Value of your Answer</h4>
                                        </th>
                                        </tr>
                                        <tr>
                                            <td>  
                                                <?php foreach ($metric_name as $key => $n) { ?>
                                                    <?php echo $n; ?>
                                                    <?php echo "<br>"; ?>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center" style="padding-left: 25px;">  
                                                <?php foreach ($evsc_type as $key => $n) { ?>
                                                    <?php echo $n; ?>
                                                    <?php echo "<br>"; ?>
                                                <?php } ?>
                                            </td>
                                            <td class="text-left" style="padding-left: 45px;">  
                                                <?php foreach ($ep as $key => $n) { ?>
                                                    <?php echo $n; ?>
                                                    <?php echo "<br>"; ?>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div> 
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Projects Section -->
    <?php $this->load->view('menu/pmctoolPreloader'); ?>

    <?php $this->load->view('footer/pmctoolFooter'); ?>