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

<section class="models-section section-padding" id="models">
        <div class="container-fluid">
            <h2 class="section-title text-center">Calculated Models at Project :<br><i style="color:red;"><?php echo $proj_title; ?></i></h2>
            <h2 class="section-title text-center">
                <i style="color: #398439;">
                    <?php echo $today ; ?>
                    <br>
                    <?php
                    $counter = 0;
                    foreach ($ep as $key => $n) {
                        $counter = $n + $counter;
                    }
                    ?>
                    
                </i>
            </h2>
            <h2 class="section-title text-center"> Total Complexity: <?php echo round($counter / count($ep), 3); ?></h2>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center ">
                    <div class="align-left">
                        <?php echo $this->session->flashdata('success_msg'); ?>
                        <?php echo $this->session->flashdata('delete_msg'); ?>
                        <?php echo $this->session->flashdata('edit_msg'); ?>

                        <div class="align-left">
                            <div class="row alert-success">

                                <div class="col-md-12 text-center active logo">
                                    <table class="text-center ">
                                        <th class="text-center glyphicon-subtitles" style="padding-left: 50px;">    Metric</th>
                                        <th class="text-center glyphicon-bookmark" style="padding-left: 50px;">    Evaluation Scale</th>
                                        <th class="text-center glyphicon-certificate" style="padding-left: 50px;">    Your Answer's Value * Weight</th>
                                        <tr >
                                            <td class="text-left" style="padding-left: 100px;"> 
                                                <?php foreach ($metric_name as $key => $metric_name) { ?>
                                                    <?php echo $metric_name; ?>
                                                    <?php echo "<br>"; ?>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center" style="padding-left: 50px;">
                                                <?php foreach ($evsc_type as $key => $evsc_type) { ?>
                                                    <?php echo $evsc_type; ?>
                                                    <?php echo "<br>"; ?>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center" style="padding-left: 50px;">
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

    <?php $this->load->view('content/content'); ?>
    <?php $this->load->view('prefooter/prefooter'); ?>
    <?php $this->load->view('footer/pmctoolFooter'); ?>