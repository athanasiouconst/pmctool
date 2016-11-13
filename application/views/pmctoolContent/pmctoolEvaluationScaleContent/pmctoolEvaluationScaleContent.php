<!-- Evaluation Scale Section-->

<section class="evaluationScale-section section-padding" id="evaluationScale">
    <div class="container-fluid">
        <h2 class="section-title text-center">Evaluation Scale</h2>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center ">
                <?php echo $this->session->flashdata('success_msg'); ?>
                <?php echo $this->session->flashdata('delete_msg'); ?>
                <?php echo $this->session->flashdata('edit_msg'); ?>
                <div class="align-left">
                    <div  style="float: right;">
                        <a href="<?php echo base_url('EvaluationScale/ViewEvaluationScaleCreationForm'); ?>" class="btn btn-danger">Add Evaluation Scale</a>
                        <br><br>
                    </div>
                    <?php if (isset($gens)): ?>
                        <?php if (count($gen) > 0) : ?>
                            <table class="table table-responsive table-active table-condensed" style="font-size:16px; font-family: sans-serif; 
                                    alignment-adjust: auto; text-align:  left;" >
                                <tr>
                                    <?php foreach ($fields as $field_name => $field_display): ?>
                                        <td <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
                                            <?php
                                            echo anchor("EvaluationScale/ViewEvaluationScale/$field_name/" .
                                                    ( ($sort_order == 'asc' && $sort_by == $field_name ) ? 'desc' : 'asc' ), $field_display);
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
                                            $evsc_id = $gen->evsc_id;
                                            $base_url = base_url();
                                            $view = '<img alt=""' . $evsc_id . '"" src="' . $base_url . 'img/messages/success.jpg" width="20" height="20">   ';
                                            $edit = '<img alt=""' . $evsc_id . '"" src="' . $base_url . 'img/messages/edit.jpg" width="20" height="20">   ';
                                            $delete = '<img alt=""' . $evsc_id . '"" src="' . $base_url . 'img/messages/delete.jpg" width="20" height="20">  ';
                                            ?>
                                            <?php
                                            echo anchor("EvaluationScale/ViewEvaluationScaleDetails/$evsc_id", $view, array('onClick' => "return confirm('Are you sure for viewing this metric ?')"));
                                            ?>
                                            <?php echo anchor("EvaluationScale/ViewEvaluationScaleDelete/$evsc_id", $delete, array('onClick' => "return confirm('Are you sure for deleting this evaluation scale?')")); ?>    
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
                        <?php if (strlen($pagination)): ?>
                            <div class="pagination gradient" style="width: 100%; margin-top: -10px;">
                                <div class="page gradient">
                                    &nbsp; <?php echo $pagination; ?> &nbsp;
                                </div>
                            </div>                 
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- Evaluation Scale Section -->