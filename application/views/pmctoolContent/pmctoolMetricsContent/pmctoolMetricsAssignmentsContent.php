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
                                <tr class="alert-success">
                                    <?php foreach ($fields as $field_name => $field_display): ?>
                                        <td <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
                                            <?php echo $field_display; ?>
                                            <?php
                                            //echo anchor("Metrics/ViewMetricsAssignments/$field_name/" .
                                            //        ( ($sort_order == 'asc' && $sort_by == $field_name ) ? 'desc' : 'asc' ), $field_display);
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
                                            $metric_evsc_id = $gen->metric_evsc_id;
                                            $base_url = base_url();
                                            $assign = '<img alt=""' . $metric_evsc_id . '"" src="' . $base_url . 'img/messages/assignment.jpg" width="20" height="20">   ';
                                            $view = '<img alt=""' . $metric_evsc_id . '"" src="' . $base_url . 'img/messages/success.jpg" width="20" height="20">   ';
                                            $edit = '<img alt=""' . $metric_evsc_id . '"" src="' . $base_url . 'img/messages/edit.jpg" width="20" height="20">   ';
                                            $delete = '<img alt=""' . $metric_evsc_id . '"" src="' . $base_url . 'img/messages/delete.jpg" width="20" height="20">  ';
                                            ?>
                                            <?php
                                            //echo anchor("Metrics/ViewMetricsAssignments/$metric_id", $assign, array('onClick' => "return confirm('Are you sure for viewing the assignment of this metric ?')"));
                                            ?>
                                            <?php
                                            echo anchor("Metrics/ViewMetricsAssignmentsDetails/$metric_evsc_id", $view, array('onClick' => "return confirm('Are you sure for viewing this assignment ?')"));
                                            ?>
                                            <?php
                                            echo anchor("Metrics/ViewMetricsAssignmentsEditForm/$metric_evsc_id", $edit, array('onClick' => "return confirm('Are you sure for editing this assignment ?')"));
                                            ?>
                                            <?php echo anchor("Metrics/ViewMetricsAssignmentsDelete/$metric_evsc_id", $delete, array('onClick' => "return confirm('Are you sure for deleting this assignment ?')")); ?>    
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
<!-- Metrics Section -->