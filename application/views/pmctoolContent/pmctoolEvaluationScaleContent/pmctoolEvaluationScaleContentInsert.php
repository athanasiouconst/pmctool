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
                        <li><a class="page-scroll" href="<?php echo base_url('Metrics/ViewMetrics'); ?>">Metrics</a></li>
                        <li class="active"><a class="page-scroll"  href="<?php echo base_url('EvaluationScale/ViewEvaluationScale'); ?>">Evaluation Scale</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Navigation end -->






    <!-- Evaluation Scale Section-->

    <section class="evaluationScale-section section-padding" id="evaluationScale">
        <div class="container-fluid">

            <h2 class="section-title text-center">Evaluation Scale</h2>

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

                        <?php echo form_open('EvaluationScale/CreateEvaluationScale') ?>
                        <table class="table " id="tbl1" style="width: 100%; alignment-adjust: auto; text-align:  left; font-size:16px; font-family: sans-serif;">

                            <tr>
                                <td >
                                    <span title="Evaluation Scale's Name">
                                        <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="evsc_name" id="evsc_name" placeholder="Evaluation Scale's Name" value="<?php echo set_value('evsc_name'); ?>"  />
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span title="Evaluation Scale's Description">
                                        <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="evsc_description" id="evsc_description" placeholder="Evaluation Scale's Description" value="<?php echo set_value('evsc_description'); ?>"  />
                                    </span>
                                </td>
                            </tr>
                            <script>
                                function evsc_typeCheck(that) {
                                    if (that.value == "yes/no") {
                                        document.getElementById("ifevsc_typeyes_no").style.display = "block";
                                        document.getElementById("ifevsc_typeyes_no").innerHTML =
                                                "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='evsc_number_of_choices' id='evsc_number_of_choices' placeholder='Evaluation Scale ' value='2'  />"
                                                + "<label class='table table-responsive'>Possible Answers: </label>"
                                                + "<label class='table table-responsive'>Yes</label>"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep1_value' id='ep1_value' placeholder='Evaluation Scale Value for Answer 1' value='1'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep1_descr' id='ep1_descr' placeholder='Evaluation Scale Description for Answer 1' value='Your Answer is Yes'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep1_weight' id='ep1_weight' placeholder='Evaluation Scale Weight for Answer 1' value='1'  />"
                                                + "<label class='table table-responsive'>No</label>"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep2_value' id='ep2_value' placeholder='Evaluation Scale Value for Answer 2' value='0'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep2_descr' id='ep2_descr' placeholder='Evaluation Scale Description for Answer 2' value='Your Answer is No'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep2_weight' id='ep2_weight' placeholder='Evaluation Scale Weight for Answer 2' value='0'  />"


                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep3_value' id='ep3_value' placeholder='Evaluation Scale Value for Answer 3' value='0'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep3_descr' id='ep3_descr' placeholder='Evaluation Scale Description for Answer 3' value='Your Answer is No'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep3_weight' id='ep3_weight' placeholder='Evaluation Scale Weight for Answer 3' value='0'  />"

                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep4_value' id='ep4_value' placeholder='Evaluation Scale Value for Answer 4' value='0'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep4_descr' id='ep4_descr' placeholder='Evaluation Scale Description for Answer 4' value='Your Answer is No'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep4_weight' id='ep4_weight' placeholder='Evaluation Scale Weight for Answer 4' value='0'  />"

                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep5_value' id='ep5_value' placeholder='Evaluation Scale Value for Answer 5' value='0'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep5_descr' id='ep5_descr' placeholder='Evaluation Scale Description for Answer 5' value='Your Answer is No'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep5_weight' id='ep5_weight' placeholder='Evaluation Scale Weight for Answer 5' value='0'  />"

                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_value' id='ep6_value' placeholder='Evaluation Scale Value for Answer 6' value='0'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_descr' id='ep6_descr' placeholder='Evaluation Scale Description for Answer 6' value='Your Answer is No'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_weight' id='ep6_weight' placeholder='Evaluation Scale Weight for Answer 6' value='0'  />"

                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep2_value' id='ep7_value' placeholder='Evaluation Scale Value for Answer 7' value='0'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep2_descr' id='ep7_descr' placeholder='Evaluation Scale Description for Answer 7' value='Your Answer is No'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep2_weight' id='ep7_weight' placeholder='Evaluation Scale Weight for Answer 7' value='0'  />"

                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_value' id='ep8_value' placeholder='Evaluation Scale Value for Answer 8' value='0'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_descr' id='ep8_descr' placeholder='Evaluation Scale Description for Answer 8' value='Your Answer is No'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_weight' id='ep8_weight' placeholder='Evaluation Scale Weight for Answer 8' value='0'  />"

                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_value' id='ep9_value' placeholder='Evaluation Scale Value for Answer 9' value='0'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_descr' id='ep9_descr' placeholder='Evaluation Scale Description for Answer 9' value='Your Answer is No'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_weight' id='ep9_weight' placeholder='Evaluation Scale Weight for Answer 9' value='0'  />"

                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_value' id='ep10_value' placeholder='Evaluation Scale Value for Answer 10' value='0'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_descr' id='ep10_descr' placeholder='Evaluation Scale Description for Answer 10' value='Your Answer is No'  />"
                                                + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_weight' id='ep10_weight' placeholder='Evaluation Scale Weight for Answer 10' value='0'  />"

                                                ;
                                    } else {
                                        document.getElementById("ifevsc_typeyes_no").style.display = "none";
                                        
                                    }
                                    if (that.value == "Number") {
                                        document.getElementById("ifNumber").style.display = "block";
                                        document.getElementById("ifNumber").innerHTML =
                                                "<span title='Number of Choices'>"
                                                + "\n" + "                                <select class='table table-responsive' style='color:#000; border: 0px;' name='evsc_number_of_choices' id='evsc_number_of_choices' placeholder='Number of Choices' onchange='evsc_numberCheck(this);'>"
                                                + "\n" + "                                    <option value='-1'>Select the Number of choices of your Evaluation Scale</option>"
                                                + "\n" + "                                    <option value='1'>1</option>"
                                                + "\n" + "                                    <option value='2'>2</option>"
                                                + "\n" + "                                    <option value='3'>3</option>"
                                                + "\n" + "                                   <option value='4'>4</option>"
                                                + "\n" + "                                    <option value='5'>5</option>"
                                                + "\n" + "                                   <option value='6'>6</option>"
                                                + "\n" + "                                    <option value='7'>7</option>"
                                                + "\n" + "                                    <option value='8'>8</option>"
                                                + "\n" + "                                  <option value='9'>9</option>"
                                                + "\n" + "                                    <option value='10'>10</option>"
                                                + "\n" + "                               </select>"
                                                + "\n" + "                            </span>"
                                        "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='evsc_number_of_choices' id='evsc_number_of_choices' placeholder='Evaluation Scale ' value='<?php echo set_value("evsc_number_of_choices"); ?>'  />"
                                                ;
                                    } else {
                                        document.getElementById("ifNumber").style.display = "none";
                                    }
                                    if (that.value == "Likert Scale") {
                                        document.getElementById("ifLikertScale").style.display = "block";
                                        document.getElementById("ifLikertScale").innerHTML =
                                                "<span title='Number of Choices'>"
                                                + "\n" + "                                <select class='table table-responsive' style='color:#000; border: 0px;' name='evsc_number_of_choices' id='evsc_number_of_choices' placeholder='Number of Choices' onchange='evsc_numberCheck(this);'>"
                                                + "\n" + "                                    <option value='-1'>Select the Number of choices of the Likert Scale</option>"
                                                + "\n" + "                                    <option value='1'>1</option>"
                                                + "\n" + "                                    <option value='2'>2</option>"
                                                + "\n" + "                                    <option value='3'>3</option>"
                                                + "\n" + "                                   <option value='4'>4</option>"
                                                + "\n" + "                                    <option value='5'>5</option>"
                                                + "\n" + "                                   <option value='6'>6</option>"
                                                + "\n" + "                                    <option value='7'>7</option>"
                                                + "\n" + "                                    <option value='8'>8</option>"
                                                + "\n" + "                                  <option value='9'>9</option>"
                                                + "\n" + "                                    <option value='10'>10</option>"
                                                + "\n" + "                               </select>"
                                                + "\n" + "                            </span>"
                                        "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='evsc_number_of_choices' id='evsc_number_of_choices' placeholder='Evaluation Scale ' value='<?php echo set_value("evsc_number_of_choices"); ?>'  />"
                                                ;

                                    } else {
                                        document.getElementById("ifLikertScale").style.display = "none";
                                    }
                                }
                            </script>
                            <tr>
                                <td>
                                    <select name='evsc_type' class="table table-responsive" style="color:#000; border: 0px;"  onchange="evsc_typeCheck(this);">
                                        <option value="-1">Select the Type of the Evaluation Scale </option>
                                        <option id="1" value="yes/no" >yes/no</option>
                                        <option id="2" value="Number" >Number</option>
                                        <option id="3" value="Likert Scale" >Likert Scale</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="ifevsc_typeyes_no" style="display: none;"></div>
                                    <script>
                                        function evsc_numberCheck(that) {
                                            if (that.value == 1) {
                                                document.getElementById("ifNumberChoice1").style.display = "block";
                                                document.getElementById("ifNumberChoice1").innerHTML =
                                                        "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_value' id='ep1_value' placeholder='Evaluation Scale Value for Answer 1' value='<?php echo set_value("ep1_value"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_descr' id='ep1_descr' placeholder='Evaluation Scale Description for Answer 1' value='<?php echo set_value("ep1_descr"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_weight' id='ep1_weight' placeholder='Evaluation Scale Weight for Answer 1' value='<?php echo set_value("ep1_weight"); ?>'  />"

                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep2_value' id='ep2_value' placeholder='Evaluation Scale Value for Answer 2' value='<?php echo set_value("ep2_value"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep2_descr' id='ep2_descr' placeholder='Evaluation Scale Description for Answer 2' value='<?php echo set_value("ep2_descr"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep2_weight' id='ep2_weight' placeholder='Evaluation Scale Weight for Answer 2' value='<?php echo set_value("ep2_weight"); ?>'  />"


                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep3_value' id='ep3_value' placeholder='Evaluation Scale Value for Answer 3' value='<?php echo set_value("ep3_value"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep3_descr' id='ep3_descr' placeholder='Evaluation Scale Description for Answer 3' value='<?php echo set_value("ep3_descr"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep3_weight' id='ep3_weight' placeholder='Evaluation Scale Weight for Answer 3' value='<?php echo set_value("ep3_weight"); ?>'  />"

                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep4_value' id='ep4_value' placeholder='Evaluation Scale Value for Answer 4' value='<?php echo set_value("ep4_value"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep4_descr' id='ep4_descr' placeholder='Evaluation Scale Description for Answer 4' value='<?php echo set_value("ep4_descr"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep4_weight' id='ep4_weight' placeholder='Evaluation Scale Weight for Answer 4' value='<?php echo set_value("ep4_weight"); ?>'  />"

                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep5_value' id='ep5_value' placeholder='Evaluation Scale Value for Answer 5' value='<?php echo set_value("ep5_value"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep5_descr' id='ep5_descr' placeholder='Evaluation Scale Description for Answer 5' value='<?php echo set_value("ep5_descr"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep5_weight' id='ep5_weight' placeholder='Evaluation Scale Weight for Answer 5' value='<?php echo set_value("ep5_weight"); ?>'  />"

                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_value' id='ep6_value' placeholder='Evaluation Scale Value for Answer 6' value='<?php echo set_value("ep6_value"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_descr' id='ep6_descr' placeholder='Evaluation Scale Description for Answer 6' value='<?php echo set_value("ep6_descr"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_weight' id='ep6_weight' placeholder='Evaluation Scale Weight for Answer 6' value='<?php echo set_value("ep6_weight"); ?>'  />"

                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep2_value' id='ep7_value' placeholder='Evaluation Scale Value for Answer 7' value='<?php echo set_value("ep7_value"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep2_descr' id='ep7_descr' placeholder='Evaluation Scale Description for Answer 7' value='<?php echo set_value("ep7_descr"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep2_weight' id='ep7_weight' placeholder='Evaluation Scale Weight for Answer 7' value='<?php echo set_value("ep7_weight"); ?>'  />"

                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_value' id='ep8_value' placeholder='Evaluation Scale Value for Answer 8' value='<?php echo set_value("ep8_value"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_descr' id='ep8_descr' placeholder='Evaluation Scale Description for Answer 8' value='<?php echo set_value("ep8_descr"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_weight' id='ep8_weight' placeholder='Evaluation Scale Weight for Answer 8' value='<?php echo set_value("ep8_weight"); ?>'  />"

                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_value' id='ep9_value' placeholder='Evaluation Scale Value for Answer 9' value='<?php echo set_value("ep9_value"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_descr' id='ep9_descr' placeholder='Evaluation Scale Description for Answer 9' value='<?php echo set_value("ep9_descr"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_weight' id='ep9_weight' placeholder='Evaluation Scale Weight for Answer 9' value='<?php echo set_value("ep9_weight"); ?>'  />"

                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_value' id='ep10_value' placeholder='Evaluation Scale Value for Answer 10' value='<?php echo set_value("ep10_value"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_descr' id='ep10_descr' placeholder='Evaluation Scale Description for Answer 10' value='<?php echo set_value("ep10_descr"); ?>'  />"
                                                        + "\n" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_weight' id='ep10_weight' placeholder='Evaluation Scale Weight for Answer 10' value='<?php echo set_value("ep10_weight"); ?>'  />"


                                                        ;
                                            } else {
                                                document.getElementById("ifNumberChoice1").style.display = "none";
                                                
                                            }

                                            if (that.value == 2) {
                                                document.getElementById("ifNumberChoice2").style.display = "block";
                                                document.getElementById("ifNumberChoice2").innerHTML =
                                                        "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_value' id='ep1_value' placeholder='Evaluation Scale Value for Answer 1' value='<?php echo set_value("ep1_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_descr' id='ep1_descr' placeholder='Evaluation Scale Description for Answer 1' value='<?php echo set_value("ep1_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_weight' id='ep1_weight' placeholder='Evaluation Scale Weight for Answer 1' value='<?php echo set_value("ep1_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_value' id='ep2_value' placeholder='Evaluation Scale Value for Answer 2' value='<?php echo set_value("ep2_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_descr' id='ep2_descr' placeholder='Evaluation Scale Description for Answer 2' value='<?php echo set_value("ep2_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_weight' id='ep2_weight' placeholder='Evaluation Scale Weight for Answer 2' value='<?php echo set_value("ep2_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep3_value' id='ep3_value' placeholder='Evaluation Scale Value for Answer 3' value='<?php echo set_value("ep3_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep3_descr' id='ep3_descr' placeholder='Evaluation Scale Description for Answer 3' value='<?php echo set_value("ep3_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep3_weight' id='ep3_weight' placeholder='Evaluation Scale Weight for Answer 3' value='<?php echo set_value("ep3_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep4_value' id='ep4_value' placeholder='Evaluation Scale Value for Answer 4' value='<?php echo set_value("ep4_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep4_descr' id='ep4_descr' placeholder='Evaluation Scale Description for Answer 4' value='<?php echo set_value("ep4_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep4_weight' id='ep4_weight' placeholder='Evaluation Scale Weight for Answer 4' value='<?php echo set_value("ep4_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep5_value' id='ep5_value' placeholder='Evaluation Scale Value for Answer 5' value='<?php echo set_value("ep5_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep5_descr' id='ep5_descr' placeholder='Evaluation Scale Description for Answer 5' value='<?php echo set_value("ep5_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep5_weight' id='ep5_weight' placeholder='Evaluation Scale Weight for Answer 5' value='<?php echo set_value("ep5_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_value' id='ep6_value' placeholder='Evaluation Scale Value for Answer 6' value='<?php echo set_value("ep6_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_descr' id='ep6_descr' placeholder='Evaluation Scale Description for Answer 6' value='<?php echo set_value("ep6_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_weight' id='ep6_weight' placeholder='Evaluation Scale Weight for Answer 6' value='<?php echo set_value("ep6_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep7_value' id='ep7_value' placeholder='Evaluation Scale Value for Answer 7' value='<?php echo set_value("ep7_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep7_descr' id='ep7_descr' placeholder='Evaluation Scale Description for Answer 7' value='<?php echo set_value("ep7_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep7_weight' id='ep7_weight' placeholder='Evaluation Scale Weight for Answer 7' value='<?php echo set_value("ep7_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_value' id='ep8_value' placeholder='Evaluation Scale Value for Answer 8' value='<?php echo set_value("ep8_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_descr' id='ep8_descr' placeholder='Evaluation Scale Description for Answer 8' value='<?php echo set_value("ep8_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_weight' id='ep8_weight' placeholder='Evaluation Scale Weight for Answer 8' value='<?php echo set_value("ep8_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_value' id='ep9_value' placeholder='Evaluation Scale Value for Answer 9' value='<?php echo set_value("ep9_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_descr' id='ep9_descr' placeholder='Evaluation Scale Description for Answer 9' value='<?php echo set_value("ep9_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_weight' id='ep9_weight' placeholder='Evaluation Scale Weight for Answer 9' value='<?php echo set_value("ep9_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_value' id='ep10_value' placeholder='Evaluation Scale Value for Answer 10' value='<?php echo set_value("ep10_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_descr' id='ep10_descr' placeholder='Evaluation Scale Description for Answer 10' value='<?php echo set_value("ep10_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_weight' id='ep10_weight' placeholder='Evaluation Scale Weight for Answer 10' value='<?php echo set_value("ep10_weight"); ?>'  />"
                                                        ;
                                            } else {
                                                document.getElementById("ifNumberChoice2").style.display = "none";
                                            }
                                            if (that.value == 3) {
                                                document.getElementById("ifNumberChoice3").style.display = "block";
                                                document.getElementById("ifNumberChoice3").innerHTML =
                                                        "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_value' id='ep1_value' placeholder='Evaluation Scale Value for Answer 1' value='<?php echo set_value("ep1_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_descr' id='ep1_descr' placeholder='Evaluation Scale Description for Answer 1' value='<?php echo set_value("ep1_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_weight' id='ep1_weight' placeholder='Evaluation Scale Weight for Answer 1' value='<?php echo set_value("ep1_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_value' id='ep2_value' placeholder='Evaluation Scale Value for Answer 2' value='<?php echo set_value("ep2_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_descr' id='ep2_descr' placeholder='Evaluation Scale Description for Answer 2' value='<?php echo set_value("ep2_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_weight' id='ep2_weight' placeholder='Evaluation Scale Weight for Answer 2' value='<?php echo set_value("ep2_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_value' id='ep3_value' placeholder='Evaluation Scale Value for Answer 3' value='<?php echo set_value("ep3_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_descr' id='ep3_descr' placeholder='Evaluation Scale Description for Answer 3' value='<?php echo set_value("ep3_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_weight' id='ep3_weight' placeholder='Evaluation Scale Weight for Answer 3' value='<?php echo set_value("ep3_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep4_value' id='ep4_value' placeholder='Evaluation Scale Value for Answer 4' value='<?php echo set_value("ep4_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep4_descr' id='ep4_descr' placeholder='Evaluation Scale Description for Answer 4' value='<?php echo set_value("ep4_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep4_weight' id='ep4_weight' placeholder='Evaluation Scale Weight for Answer 4' value='<?php echo set_value("ep4_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep5_value' id='ep5_value' placeholder='Evaluation Scale Value for Answer 5' value='<?php echo set_value("ep5_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep5_descr' id='ep5_descr' placeholder='Evaluation Scale Description for Answer 5' value='<?php echo set_value("ep5_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep5_weight' id='ep5_weight' placeholder='Evaluation Scale Weight for Answer 5' value='<?php echo set_value("ep5_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_value' id='ep6_value' placeholder='Evaluation Scale Value for Answer 6' value='<?php echo set_value("ep6_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_descr' id='ep6_descr' placeholder='Evaluation Scale Description for Answer 6' value='<?php echo set_value("ep6_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_weight' id='ep6_weight' placeholder='Evaluation Scale Weight for Answer 6' value='<?php echo set_value("ep6_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep7_value' id='ep7_value' placeholder='Evaluation Scale Value for Answer 7' value='<?php echo set_value("ep7_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep7_descr' id='ep7_descr' placeholder='Evaluation Scale Description for Answer 7' value='<?php echo set_value("ep7_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep7_weight' id='ep7_weight' placeholder='Evaluation Scale Weight for Answer 7' value='<?php echo set_value("ep7_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_value' id='ep8_value' placeholder='Evaluation Scale Value for Answer 8' value='<?php echo set_value("ep8_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_descr' id='ep8_descr' placeholder='Evaluation Scale Description for Answer 8' value='<?php echo set_value("ep8_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_weight' id='ep8_weight' placeholder='Evaluation Scale Weight for Answer 8' value='<?php echo set_value("ep8_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_value' id='ep9_value' placeholder='Evaluation Scale Value for Answer 9' value='<?php echo set_value("ep9_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_descr' id='ep9_descr' placeholder='Evaluation Scale Description for Answer 9' value='<?php echo set_value("ep9_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_weight' id='ep9_weight' placeholder='Evaluation Scale Weight for Answer 9' value='<?php echo set_value("ep9_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_value' id='ep10_value' placeholder='Evaluation Scale Value for Answer 10' value='<?php echo set_value("ep10_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_descr' id='ep10_descr' placeholder='Evaluation Scale Description for Answer 10' value='<?php echo set_value("ep10_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_weight' id='ep10_weight' placeholder='Evaluation Scale Weight for Answer 10' value='<?php echo set_value("ep10_weight"); ?>'  />"
                                                        ;

                                            } else {
                                                document.getElementById("ifNumberChoice3").style.display = "none";
                                            }
                                            if (that.value == 4) {
                                                document.getElementById("ifNumberChoice4").style.display = "block";
                                                document.getElementById("ifNumberChoice4").innerHTML =
                                                        "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_value' id='ep1_value' placeholder='Evaluation Scale Value for Answer 1' value='<?php echo set_value("ep1_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_descr' id='ep1_descr' placeholder='Evaluation Scale Description for Answer 1' value='<?php echo set_value("ep1_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_weight' id='ep1_weight' placeholder='Evaluation Scale Weight for Answer 1' value='<?php echo set_value("ep1_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_value' id='ep2_value' placeholder='Evaluation Scale Value for Answer 2' value='<?php echo set_value("ep2_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_descr' id='ep2_descr' placeholder='Evaluation Scale Description for Answer 2' value='<?php echo set_value("ep2_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_weight' id='ep2_weight' placeholder='Evaluation Scale Weight for Answer 2' value='<?php echo set_value("ep2_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_value' id='ep3_value' placeholder='Evaluation Scale Value for Answer 3' value='<?php echo set_value("ep3_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_descr' id='ep3_descr' placeholder='Evaluation Scale Description for Answer 3' value='<?php echo set_value("ep3_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_weight' id='ep3_weight' placeholder='Evaluation Scale Weight for Answer 3' value='<?php echo set_value("ep3_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_value' id='ep4_value' placeholder='Evaluation Scale Value for Answer 4' value='<?php echo set_value("ep4_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_descr' id='ep4_descr' placeholder='Evaluation Scale Description for Answer 4' value='<?php echo set_value("ep4_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_weight' id='ep4_weight' placeholder='Evaluation Scale Weight for Answer 4' value='<?php echo set_value("ep4_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep5_value' id='ep5_value' placeholder='Evaluation Scale Value for Answer 5' value='<?php echo set_value("ep5_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep5_descr' id='ep5_descr' placeholder='Evaluation Scale Description for Answer 5' value='<?php echo set_value("ep5_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep5_weight' id='ep5_weight' placeholder='Evaluation Scale Weight for Answer 5' value='<?php echo set_value("ep5_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_value' id='ep6_value' placeholder='Evaluation Scale Value for Answer 6' value='<?php echo set_value("ep6_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_descr' id='ep6_descr' placeholder='Evaluation Scale Description for Answer 6' value='<?php echo set_value("ep6_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_weight' id='ep6_weight' placeholder='Evaluation Scale Weight for Answer 6' value='<?php echo set_value("ep6_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep7_value' id='ep7_value' placeholder='Evaluation Scale Value for Answer 7' value='<?php echo set_value("ep7_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep7_descr' id='ep7_descr' placeholder='Evaluation Scale Description for Answer 7' value='<?php echo set_value("ep7_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep7_weight' id='ep7_weight' placeholder='Evaluation Scale Weight for Answer 7' value='<?php echo set_value("ep7_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_value' id='ep8_value' placeholder='Evaluation Scale Value for Answer 8' value='<?php echo set_value("ep8_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_descr' id='ep8_descr' placeholder='Evaluation Scale Description for Answer 8' value='<?php echo set_value("ep8_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_weight' id='ep8_weight' placeholder='Evaluation Scale Weight for Answer 8' value='<?php echo set_value("ep8_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_value' id='ep9_value' placeholder='Evaluation Scale Value for Answer 9' value='<?php echo set_value("ep9_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_descr' id='ep9_descr' placeholder='Evaluation Scale Description for Answer 9' value='<?php echo set_value("ep9_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_weight' id='ep9_weight' placeholder='Evaluation Scale Weight for Answer 9' value='<?php echo set_value("ep9_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_value' id='ep10_value' placeholder='Evaluation Scale Value for Answer 10' value='<?php echo set_value("ep10_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_descr' id='ep10_descr' placeholder='Evaluation Scale Description for Answer 10' value='<?php echo set_value("ep10_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_weight' id='ep10_weight' placeholder='Evaluation Scale Weight for Answer 10' value='<?php echo set_value("ep10_weight"); ?>'  />"
                                                        ;

                                            } else {
                                                document.getElementById("ifNumberChoice4").style.display = "none";
                                            }
                                            if (that.value == 5) {
                                                document.getElementById("ifNumberChoice5").style.display = "block";
                                                document.getElementById("ifNumberChoice5").innerHTML =
                                                        "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_value' id='ep1_value' placeholder='Evaluation Scale Value for Answer 1' value='<?php echo set_value("ep1_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_descr' id='ep1_descr' placeholder='Evaluation Scale Description for Answer 1' value='<?php echo set_value("ep1_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_weight' id='ep1_weight' placeholder='Evaluation Scale Weight for Answer 1' value='<?php echo set_value("ep1_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_value' id='ep2_value' placeholder='Evaluation Scale Value for Answer 2' value='<?php echo set_value("ep2_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_descr' id='ep2_descr' placeholder='Evaluation Scale Description for Answer 2' value='<?php echo set_value("ep2_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_weight' id='ep2_weight' placeholder='Evaluation Scale Weight for Answer 2' value='<?php echo set_value("ep2_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_value' id='ep3_value' placeholder='Evaluation Scale Value for Answer 3' value='<?php echo set_value("ep3_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_descr' id='ep3_descr' placeholder='Evaluation Scale Description for Answer 3' value='<?php echo set_value("ep3_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_weight' id='ep3_weight' placeholder='Evaluation Scale Weight for Answer 3' value='<?php echo set_value("ep3_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_value' id='ep4_value' placeholder='Evaluation Scale Value for Answer 4' value='<?php echo set_value("ep4_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_descr' id='ep4_descr' placeholder='Evaluation Scale Description for Answer 4' value='<?php echo set_value("ep4_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_weight' id='ep4_weight' placeholder='Evaluation Scale Weight for Answer 4' value='<?php echo set_value("ep4_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_value' id='ep5_value' placeholder='Evaluation Scale Value for Answer 5' value='<?php echo set_value("ep5_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_descr' id='ep5_descr' placeholder='Evaluation Scale Description for Answer 5' value='<?php echo set_value("ep5_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_weight' id='ep5_weight' placeholder='Evaluation Scale Weight for Answer 5' value='<?php echo set_value("ep5_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_value' id='ep6_value' placeholder='Evaluation Scale Value for Answer 6' value='<?php echo set_value("ep6_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_descr' id='ep6_descr' placeholder='Evaluation Scale Description for Answer 6' value='<?php echo set_value("ep6_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep6_weight' id='ep6_weight' placeholder='Evaluation Scale Weight for Answer 6' value='<?php echo set_value("ep6_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep7_value' id='ep7_value' placeholder='Evaluation Scale Value for Answer 7' value='<?php echo set_value("ep7_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep7_descr' id='ep7_descr' placeholder='Evaluation Scale Description for Answer 7' value='<?php echo set_value("ep7_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep7_weight' id='ep7_weight' placeholder='Evaluation Scale Weight for Answer 7' value='<?php echo set_value("ep7_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_value' id='ep8_value' placeholder='Evaluation Scale Value for Answer 8' value='<?php echo set_value("ep8_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_descr' id='ep8_descr' placeholder='Evaluation Scale Description for Answer 8' value='<?php echo set_value("ep8_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_weight' id='ep8_weight' placeholder='Evaluation Scale Weight for Answer 8' value='<?php echo set_value("ep8_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_value' id='ep9_value' placeholder='Evaluation Scale Value for Answer 9' value='<?php echo set_value("ep9_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_descr' id='ep9_descr' placeholder='Evaluation Scale Description for Answer 9' value='<?php echo set_value("ep9_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_weight' id='ep9_weight' placeholder='Evaluation Scale Weight for Answer 9' value='<?php echo set_value("ep9_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_value' id='ep10_value' placeholder='Evaluation Scale Value for Answer 10' value='<?php echo set_value("ep10_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_descr' id='ep10_descr' placeholder='Evaluation Scale Description for Answer 10' value='<?php echo set_value("ep10_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_weight' id='ep10_weight' placeholder='Evaluation Scale Weight for Answer 10' value='<?php echo set_value("ep10_weight"); ?>'  />"
                                                        ;

                                            } else {
                                                document.getElementById("ifNumberChoice5").style.display = "none";
                                            }
                                            if (that.value == 6) {
                                                document.getElementById("ifNumberChoice6").style.display = "block";
                                                document.getElementById("ifNumberChoice6").innerHTML =
                                                        "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_value' id='ep1_value' placeholder='Evaluation Scale Value for Answer 1' value='<?php echo set_value("ep1_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_descr' id='ep1_descr' placeholder='Evaluation Scale Description for Answer 1' value='<?php echo set_value("ep1_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_weight' id='ep1_weight' placeholder='Evaluation Scale Weight for Answer 1' value='<?php echo set_value("ep1_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_value' id='ep2_value' placeholder='Evaluation Scale Value for Answer 2' value='<?php echo set_value("ep2_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_descr' id='ep2_descr' placeholder='Evaluation Scale Description for Answer 2' value='<?php echo set_value("ep2_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_weight' id='ep2_weight' placeholder='Evaluation Scale Weight for Answer 2' value='<?php echo set_value("ep2_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_value' id='ep3_value' placeholder='Evaluation Scale Value for Answer 3' value='<?php echo set_value("ep3_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_descr' id='ep3_descr' placeholder='Evaluation Scale Description for Answer 3' value='<?php echo set_value("ep3_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_weight' id='ep3_weight' placeholder='Evaluation Scale Weight for Answer 3' value='<?php echo set_value("ep3_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_value' id='ep4_value' placeholder='Evaluation Scale Value for Answer 4' value='<?php echo set_value("ep4_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_descr' id='ep4_descr' placeholder='Evaluation Scale Description for Answer 4' value='<?php echo set_value("ep4_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_weight' id='ep4_weight' placeholder='Evaluation Scale Weight for Answer 4' value='<?php echo set_value("ep4_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_value' id='ep5_value' placeholder='Evaluation Scale Value for Answer 5' value='<?php echo set_value("ep5_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_descr' id='ep5_descr' placeholder='Evaluation Scale Description for Answer 5' value='<?php echo set_value("ep5_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_weight' id='ep5_weight' placeholder='Evaluation Scale Weight for Answer 5' value='<?php echo set_value("ep5_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep6_value' id='ep6_value' placeholder='Evaluation Scale Value for Answer 6' value='<?php echo set_value("ep6_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep6_descr' id='ep6_descr' placeholder='Evaluation Scale Description for Answer 6' value='<?php echo set_value("ep6_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep6_weight' id='ep6_weight' placeholder='Evaluation Scale Weight for Answer 6' value='<?php echo set_value("ep6_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep7_value' id='ep7_value' placeholder='Evaluation Scale Value for Answer 7' value='<?php echo set_value("ep7_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep7_descr' id='ep7_descr' placeholder='Evaluation Scale Description for Answer 7' value='<?php echo set_value("ep7_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep7_weight' id='ep7_weight' placeholder='Evaluation Scale Weight for Answer 7' value='<?php echo set_value("ep7_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_value' id='ep8_value' placeholder='Evaluation Scale Value for Answer 8' value='<?php echo set_value("ep8_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_descr' id='ep8_descr' placeholder='Evaluation Scale Description for Answer 8' value='<?php echo set_value("ep8_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_weight' id='ep8_weight' placeholder='Evaluation Scale Weight for Answer 8' value='<?php echo set_value("ep8_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_value' id='ep9_value' placeholder='Evaluation Scale Value for Answer 9' value='<?php echo set_value("ep9_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_descr' id='ep9_descr' placeholder='Evaluation Scale Description for Answer 9' value='<?php echo set_value("ep9_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_weight' id='ep9_weight' placeholder='Evaluation Scale Weight for Answer 9' value='<?php echo set_value("ep9_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_value' id='ep10_value' placeholder='Evaluation Scale Value for Answer 10' value='<?php echo set_value("ep10_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_descr' id='ep10_descr' placeholder='Evaluation Scale Description for Answer 10' value='<?php echo set_value("ep10_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_weight' id='ep10_weight' placeholder='Evaluation Scale Weight for Answer 10' value='<?php echo set_value("ep10_weight"); ?>'  />"
                                                        ;

                                            } else {
                                                document.getElementById("ifNumberChoice6").style.display = "none";
                                            }
                                            if (that.value == 7) {
                                                document.getElementById("ifNumberChoice7").style.display = "block";
                                                document.getElementById("ifNumberChoice7").innerHTML =
                                                        "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_value' id='ep1_value' placeholder='Evaluation Scale Value for Answer 1' value='<?php echo set_value("ep1_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_descr' id='ep1_descr' placeholder='Evaluation Scale Description for Answer 1' value='<?php echo set_value("ep1_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_weight' id='ep1_weight' placeholder='Evaluation Scale Weight for Answer 1' value='<?php echo set_value("ep1_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_value' id='ep2_value' placeholder='Evaluation Scale Value for Answer 2' value='<?php echo set_value("ep2_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_descr' id='ep2_descr' placeholder='Evaluation Scale Description for Answer 2' value='<?php echo set_value("ep2_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_weight' id='ep2_weight' placeholder='Evaluation Scale Weight for Answer 2' value='<?php echo set_value("ep2_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_value' id='ep3_value' placeholder='Evaluation Scale Value for Answer 3' value='<?php echo set_value("ep3_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_descr' id='ep3_descr' placeholder='Evaluation Scale Description for Answer 3' value='<?php echo set_value("ep3_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_weight' id='ep3_weight' placeholder='Evaluation Scale Weight for Answer 3' value='<?php echo set_value("ep3_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_value' id='ep4_value' placeholder='Evaluation Scale Value for Answer 4' value='<?php echo set_value("ep4_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_descr' id='ep4_descr' placeholder='Evaluation Scale Description for Answer 4' value='<?php echo set_value("ep4_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_weight' id='ep4_weight' placeholder='Evaluation Scale Weight for Answer 4' value='<?php echo set_value("ep4_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_value' id='ep5_value' placeholder='Evaluation Scale Value for Answer 5' value='<?php echo set_value("ep5_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_descr' id='ep5_descr' placeholder='Evaluation Scale Description for Answer 5' value='<?php echo set_value("ep5_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_weight' id='ep5_weight' placeholder='Evaluation Scale Weight for Answer 5' value='<?php echo set_value("ep5_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep6_value' id='ep6_value' placeholder='Evaluation Scale Value for Answer 6' value='<?php echo set_value("ep6_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep6_descr' id='ep6_descr' placeholder='Evaluation Scale Description for Answer 6' value='<?php echo set_value("ep6_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep6_weight' id='ep6_weight' placeholder='Evaluation Scale Weight for Answer 6' value='<?php echo set_value("ep6_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep7_value' id='ep7_value' placeholder='Evaluation Scale Value for Answer 7' value='<?php echo set_value("ep7_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep7_descr' id='ep7_descr' placeholder='Evaluation Scale Description for Answer 7' value='<?php echo set_value("ep7_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep7_weight' id='ep7_weight' placeholder='Evaluation Scale Weight for Answer 7' value='<?php echo set_value("ep7_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_value' id='ep8_value' placeholder='Evaluation Scale Value for Answer 8' value='<?php echo set_value("ep8_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_descr' id='ep8_descr' placeholder='Evaluation Scale Description for Answer 8' value='<?php echo set_value("ep8_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep8_weight' id='ep8_weight' placeholder='Evaluation Scale Weight for Answer 8' value='<?php echo set_value("ep8_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_value' id='ep9_value' placeholder='Evaluation Scale Value for Answer 9' value='<?php echo set_value("ep9_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_descr' id='ep9_descr' placeholder='Evaluation Scale Description for Answer 9' value='<?php echo set_value("ep9_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_weight' id='ep9_weight' placeholder='Evaluation Scale Weight for Answer 9' value='<?php echo set_value("ep9_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_value' id='ep10_value' placeholder='Evaluation Scale Value for Answer 10' value='<?php echo set_value("ep10_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_descr' id='ep10_descr' placeholder='Evaluation Scale Description for Answer 10' value='<?php echo set_value("ep10_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_weight' id='ep10_weight' placeholder='Evaluation Scale Weight for Answer 10' value='<?php echo set_value("ep10_weight"); ?>'  />"
                                                        ;

                                            } else {
                                                document.getElementById("ifNumberChoice7").style.display = "none";
                                            }
                                            if (that.value == 8) {
                                                document.getElementById("ifNumberChoice8").style.display = "block";
                                                document.getElementById("ifNumberChoice8").innerHTML =
                                                        "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_value' id='ep1_value' placeholder='Evaluation Scale Value for Answer 1' value='<?php echo set_value("ep1_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_descr' id='ep1_descr' placeholder='Evaluation Scale Description for Answer 1' value='<?php echo set_value("ep1_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_weight' id='ep1_weight' placeholder='Evaluation Scale Weight for Answer 1' value='<?php echo set_value("ep1_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_value' id='ep2_value' placeholder='Evaluation Scale Value for Answer 2' value='<?php echo set_value("ep2_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_descr' id='ep2_descr' placeholder='Evaluation Scale Description for Answer 2' value='<?php echo set_value("ep2_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_weight' id='ep2_weight' placeholder='Evaluation Scale Weight for Answer 2' value='<?php echo set_value("ep2_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_value' id='ep3_value' placeholder='Evaluation Scale Value for Answer 3' value='<?php echo set_value("ep3_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_descr' id='ep3_descr' placeholder='Evaluation Scale Description for Answer 3' value='<?php echo set_value("ep3_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_weight' id='ep3_weight' placeholder='Evaluation Scale Weight for Answer 3' value='<?php echo set_value("ep3_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_value' id='ep4_value' placeholder='Evaluation Scale Value for Answer 4' value='<?php echo set_value("ep4_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_descr' id='ep4_descr' placeholder='Evaluation Scale Description for Answer 4' value='<?php echo set_value("ep4_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_weight' id='ep4_weight' placeholder='Evaluation Scale Weight for Answer 4' value='<?php echo set_value("ep4_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_value' id='ep5_value' placeholder='Evaluation Scale Value for Answer 5' value='<?php echo set_value("ep5_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_descr' id='ep5_descr' placeholder='Evaluation Scale Description for Answer 5' value='<?php echo set_value("ep5_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_weight' id='ep5_weight' placeholder='Evaluation Scale Weight for Answer 5' value='<?php echo set_value("ep5_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep6_value' id='ep6_value' placeholder='Evaluation Scale Value for Answer 6' value='<?php echo set_value("ep6_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep6_descr' id='ep6_descr' placeholder='Evaluation Scale Description for Answer 6' value='<?php echo set_value("ep6_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep6_weight' id='ep6_weight' placeholder='Evaluation Scale Weight for Answer 6' value='<?php echo set_value("ep6_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep7_value' id='ep7_value' placeholder='Evaluation Scale Value for Answer 7' value='<?php echo set_value("ep7_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep7_descr' id='ep7_descr' placeholder='Evaluation Scale Description for Answer 7' value='<?php echo set_value("ep7_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep7_weight' id='ep7_weight' placeholder='Evaluation Scale Weight for Answer 7' value='<?php echo set_value("ep7_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep8_value' id='ep8_value' placeholder='Evaluation Scale Value for Answer 8' value='<?php echo set_value("ep8_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep8_descr' id='ep8_descr' placeholder='Evaluation Scale Description for Answer 8' value='<?php echo set_value("ep8_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep8_weight' id='ep8_weight' placeholder='Evaluation Scale Weight for Answer 8' value='<?php echo set_value("ep8_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_value' id='ep9_value' placeholder='Evaluation Scale Value for Answer 9' value='<?php echo set_value("ep9_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_descr' id='ep9_descr' placeholder='Evaluation Scale Description for Answer 9' value='<?php echo set_value("ep9_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep9_weight' id='ep9_weight' placeholder='Evaluation Scale Weight for Answer 9' value='<?php echo set_value("ep9_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_value' id='ep10_value' placeholder='Evaluation Scale Value for Answer 10' value='<?php echo set_value("ep10_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_descr' id='ep10_descr' placeholder='Evaluation Scale Description for Answer 10' value='<?php echo set_value("ep10_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_weight' id='ep10_weight' placeholder='Evaluation Scale Weight for Answer 10' value='<?php echo set_value("ep10_weight"); ?>'  />"
                                                        ;

                                            } else {
                                                document.getElementById("ifNumberChoice8").style.display = "none";
                                            }
                                            if (that.value == 9) {
                                                document.getElementById("ifNumberChoice9").style.display = "block";
                                                document.getElementById("ifNumberChoice9").innerHTML =
                                                        "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_value' id='ep1_value' placeholder='Evaluation Scale Value for Answer 1' value='<?php echo set_value("ep1_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_descr' id='ep1_descr' placeholder='Evaluation Scale Description for Answer 1' value='<?php echo set_value("ep1_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_weight' id='ep1_weight' placeholder='Evaluation Scale Weight for Answer 1' value='<?php echo set_value("ep1_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_value' id='ep2_value' placeholder='Evaluation Scale Value for Answer 2' value='<?php echo set_value("ep2_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_descr' id='ep2_descr' placeholder='Evaluation Scale Description for Answer 2' value='<?php echo set_value("ep2_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_weight' id='ep2_weight' placeholder='Evaluation Scale Weight for Answer 2' value='<?php echo set_value("ep2_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_value' id='ep3_value' placeholder='Evaluation Scale Value for Answer 3' value='<?php echo set_value("ep3_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_descr' id='ep3_descr' placeholder='Evaluation Scale Description for Answer 3' value='<?php echo set_value("ep3_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_weight' id='ep3_weight' placeholder='Evaluation Scale Weight for Answer 3' value='<?php echo set_value("ep3_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_value' id='ep4_value' placeholder='Evaluation Scale Value for Answer 4' value='<?php echo set_value("ep4_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_descr' id='ep4_descr' placeholder='Evaluation Scale Description for Answer 4' value='<?php echo set_value("ep4_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_weight' id='ep4_weight' placeholder='Evaluation Scale Weight for Answer 4' value='<?php echo set_value("ep4_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_value' id='ep5_value' placeholder='Evaluation Scale Value for Answer 5' value='<?php echo set_value("ep5_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_descr' id='ep5_descr' placeholder='Evaluation Scale Description for Answer 5' value='<?php echo set_value("ep5_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_weight' id='ep5_weight' placeholder='Evaluation Scale Weight for Answer 5' value='<?php echo set_value("ep5_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep6_value' id='ep6_value' placeholder='Evaluation Scale Value for Answer 6' value='<?php echo set_value("ep6_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep6_descr' id='ep6_descr' placeholder='Evaluation Scale Description for Answer 6' value='<?php echo set_value("ep6_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep6_weight' id='ep6_weight' placeholder='Evaluation Scale Weight for Answer 6' value='<?php echo set_value("ep6_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep7_value' id='ep7_value' placeholder='Evaluation Scale Value for Answer 7' value='<?php echo set_value("ep7_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep7_descr' id='ep7_descr' placeholder='Evaluation Scale Description for Answer 7' value='<?php echo set_value("ep7_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep7_weight' id='ep7_weight' placeholder='Evaluation Scale Weight for Answer 7' value='<?php echo set_value("ep7_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep8_value' id='ep8_value' placeholder='Evaluation Scale Value for Answer 8' value='<?php echo set_value("ep8_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep8_descr' id='ep8_descr' placeholder='Evaluation Scale Description for Answer 8' value='<?php echo set_value("ep8_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep8_weight' id='ep8_weight' placeholder='Evaluation Scale Weight for Answer 8' value='<?php echo set_value("ep8_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep9_value' id='ep9_value' placeholder='Evaluation Scale Value for Answer 9' value='<?php echo set_value("ep9_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep9_descr' id='ep9_descr' placeholder='Evaluation Scale Description for Answer 9' value='<?php echo set_value("ep9_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep9_weight' id='ep9_weight' placeholder='Evaluation Scale Weight for Answer 9' value='<?php echo set_value("ep9_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_value' id='ep10_value' placeholder='Evaluation Scale Value for Answer 10' value='<?php echo set_value("ep10_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_descr' id='ep10_descr' placeholder='Evaluation Scale Description for Answer 10' value='<?php echo set_value("ep10_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='hidden' name='ep10_weight' id='ep10_weight' placeholder='Evaluation Scale Weight for Answer 10' value='<?php echo set_value("ep10_weight"); ?>'  />"
                                                        ;
                                            } else {
                                                document.getElementById("ifNumberChoice9").style.display = "none";
                                            }
                                            if (that.value == 10) {
                                                document.getElementById("ifNumberChoice10").style.display = "block";
                                                document.getElementById("ifNumberChoice10").innerHTML =
                                                        "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_value' id='ep1_value' placeholder='Evaluation Scale Value for Answer 1' value='<?php echo set_value("ep1_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_descr' id='ep1_descr' placeholder='Evaluation Scale Description for Answer 1' value='<?php echo set_value("ep1_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep1_weight' id='ep1_weight' placeholder='Evaluation Scale Weight for Answer 1' value='<?php echo set_value("ep1_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_value' id='ep2_value' placeholder='Evaluation Scale Value for Answer 2' value='<?php echo set_value("ep2_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_descr' id='ep2_descr' placeholder='Evaluation Scale Description for Answer 2' value='<?php echo set_value("ep2_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep2_weight' id='ep2_weight' placeholder='Evaluation Scale Weight for Answer 2' value='<?php echo set_value("ep2_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_value' id='ep3_value' placeholder='Evaluation Scale Value for Answer 3' value='<?php echo set_value("ep3_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_descr' id='ep3_descr' placeholder='Evaluation Scale Description for Answer 3' value='<?php echo set_value("ep3_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep3_weight' id='ep3_weight' placeholder='Evaluation Scale Weight for Answer 3' value='<?php echo set_value("ep3_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_value' id='ep4_value' placeholder='Evaluation Scale Value for Answer 4' value='<?php echo set_value("ep4_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_descr' id='ep4_descr' placeholder='Evaluation Scale Description for Answer 4' value='<?php echo set_value("ep4_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep4_weight' id='ep4_weight' placeholder='Evaluation Scale Weight for Answer 4' value='<?php echo set_value("ep4_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_value' id='ep5_value' placeholder='Evaluation Scale Value for Answer 5' value='<?php echo set_value("ep5_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_descr' id='ep5_descr' placeholder='Evaluation Scale Description for Answer 5' value='<?php echo set_value("ep5_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep5_weight' id='ep5_weight' placeholder='Evaluation Scale Weight for Answer 5' value='<?php echo set_value("ep5_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep6_value' id='ep6_value' placeholder='Evaluation Scale Value for Answer 6' value='<?php echo set_value("ep6_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep6_descr' id='ep6_descr' placeholder='Evaluation Scale Description for Answer 6' value='<?php echo set_value("ep6_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep6_weight' id='ep6_weight' placeholder='Evaluation Scale Weight for Answer 6' value='<?php echo set_value("ep6_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep7_value' id='ep7_value' placeholder='Evaluation Scale Value for Answer 7' value='<?php echo set_value("ep7_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep7_descr' id='ep7_descr' placeholder='Evaluation Scale Description for Answer 7' value='<?php echo set_value("ep7_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep7_weight' id='ep7_weight' placeholder='Evaluation Scale Weight for Answer 7' value='<?php echo set_value("ep7_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep8_value' id='ep8_value' placeholder='Evaluation Scale Value for Answer 8' value='<?php echo set_value("ep8_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep8_descr' id='ep8_descr' placeholder='Evaluation Scale Description for Answer 8' value='<?php echo set_value("ep8_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep8_weight' id='ep8_weight' placeholder='Evaluation Scale Weight for Answer 8' value='<?php echo set_value("ep8_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep9_value' id='ep9_value' placeholder='Evaluation Scale Value for Answer 9' value='<?php echo set_value("ep9_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep9_descr' id='ep9_descr' placeholder='Evaluation Scale Description for Answer 9' value='<?php echo set_value("ep9_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep9_weight' id='ep9_weight' placeholder='Evaluation Scale Weight for Answer 9' value='<?php echo set_value("ep9_weight"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep10_value' id='ep10_value' placeholder='Evaluation Scale Value for Answer 10' value='<?php echo set_value("ep10_value"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep10_descr' id='ep10_descr' placeholder='Evaluation Scale Description for Answer 10' value='<?php echo set_value("ep10_descr"); ?>'  />"
                                                        + "" + "<input class='table table-responsive' style='color:#000; border: 0px;' type='text' name='ep10_weight' id='ep10_weight' placeholder='Evaluation Scale Weight for Answer 10' value='<?php echo set_value("ep10_weight"); ?>'  />"
                                                        ;

                                            } else {
                                                document.getElementById("ifNumberChoice10").style.display = "none";
                                            }
                                        }
                                    </script>
                                    <div id="ifNumber" style="display: none;"></div>
                                    <div id="ifLikertScale" style="display: none;"></div>
                                    <div id="ifNumberChoice1" style="display: none;"></div>
                                    <div id="ifNumberChoice2" style="display: none;"></div>
                                    <div id="ifNumberChoice3" style="display: none;"></div>
                                    <div id="ifNumberChoice4" style="display: none;"></div>
                                    <div id="ifNumberChoice5" style="display: none;"></div>
                                    <div id="ifNumberChoice6" style="display: none;"></div>
                                    <div id="ifNumberChoice7" style="display: none;"></div>
                                    <div id="ifNumberChoice8" style="display: none;"></div>
                                    <div id="ifNumberChoice9" style="display: none;"></div>
                                    <div id="ifNumberChoice10" style="display: none;"></div>
                                </td>
                            </tr>





                        </table>
                        <div class="btn btn-danger">
                            <?php echo form_submit('submit', 'Submit Evaluation Scale'); ?>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Evaluation Scale Section -->


    <?php $this->load->view('menu/pmctoolPreloader'); ?>

    <?php $this->load->view('footer/pmctoolFooter'); ?>