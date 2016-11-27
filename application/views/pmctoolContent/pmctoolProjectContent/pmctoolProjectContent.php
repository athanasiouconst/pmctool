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
                    <div  style="float: right;">
                        <a href="<?php echo base_url('Projects/ViewProjectsCreationForm'); ?>" class="btn btn-danger">Add Project</a>
                        <a href="<?php echo base_url('Projects/ViewProjectsAssignModelsCreationForm'); ?>" class="btn btn-danger">Assigning Models to Projects</a>
                        <br><br>
                    </div>
                    <?php if (isset($gens)): ?>
                        <?php if (count($gen) > 0) : ?>
                            <table class="table table-responsive table-active table-condensed" style="alignment-adjust: auto; text-align:  left; font-size:16px; font-family: sans-serif;">

                                <tr>
                                    <?php foreach ($fields as $field_name => $field_display): ?>
                                        <td <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
                                            <?php
                                            echo anchor("Projects/ViewProjects/$field_name/" .
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
                                            $proj_id = $gen->proj_id;
                                            $base_url = base_url();
                                            $assign = '<img alt=""' . $proj_id . '"" src="' . $base_url . 'img/messages/assignment.jpg" width="20" height="20">   ';
                                            $pdf = '<img alt=""' . $proj_id . '"" src="' . $base_url . 'img/messages/pdf.jpg" width="20" height="20">   ';
                                            $view = '<img alt=""' . $proj_id . '"" src="' . $base_url . 'img/messages/success.jpg" width="20" height="20">   ';
                                            $edit = '<img alt=""' . $proj_id . '"" src="' . $base_url . 'img/messages/edit.jpg" width="20" height="20">   ';
                                            $delete = '<img alt=""' . $proj_id . '"" src="' . $base_url . 'img/messages/delete.jpg" width="20" height="20">  ';
                                            ?>
                                            <?php
                                            echo anchor("Projects/ViewProjectAssignments/$proj_id", $assign, array('onClick' => "return confirm('Are you sure for viewing the assignments of this project ?')"));
                                            ?>
                                            <?php
                                            echo anchor("Projects/ViewProjectsPDF/$proj_id", $pdf, array('target' => '_blank', 'onClick' => "return confirm('Are you sure for viewing this  project?')"));
                                            ?>                                            
                                            <?php
                                            echo anchor("Projects/ViewProjectsDetails/$proj_id", $view, array('onClick' => "return confirm('Are you sure for viewing this project ?')"));
                                            ?>
                                            <?php
                                            echo anchor("Projects/ViewProjectsEditForm/$proj_id", $edit, array('onClick' => "return confirm('Are you sure for editing this project?')"));
                                            ?>
                                            <?php echo anchor("Projects/ViewProjectsDelete/$proj_id", $delete, array('onClick' => "return confirm('Are you sure for deleting this project?')")); ?>    
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
<!-- Projects Section -->




