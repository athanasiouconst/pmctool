<?php $this->load->view('header/header'); ?>
<?php $this->load->view('menu/menu'); ?>

<!-- Users Section-->

<section class="users-section section-padding" id="users">
    <div class="container-fluid">

        <h2 class="section-title text-center">Users</h2>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center ">

                <?php echo $this->session->flashdata('success_msg'); ?>
                <?php echo $this->session->flashdata('delete_msg'); ?>
                <?php echo $this->session->flashdata('edit_msg'); ?>

                <div class="align-left">
                    <?php if ($is_authenticated): ?>
                        <?php $role; ?>
                        <?php if ($role == 1) { ?>
                            <div  style="float: right;">
                                <a href="<?php echo base_url('User/ViewUsersCreationForm'); ?>" class="btn btn-danger">Add User</a>
                                <br><br>
                            </div>
                        <?php } ?>
                    <?php endif; ?>                                
                </div>
                <?php if (isset($gens)): ?>
                    <?php if (count($gen) > 0) : ?>
                        <table class="table table-responsive table-active table-condensed" style="alignment-adjust: auto; text-align:  left; font-size:16px; font-family: sans-serif;">

                            <tr>
                                <?php foreach ($fields as $field_name => $field_display): ?>
                                    <td <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
                                        <?php
                                        echo anchor("User/ViewUsers/$field_name/" .
                                                ( ($sort_order == 'desc' && $sort_by == $field_name ) ? 'asc' : 'desc' ), $field_display);
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
                                        $users_id = $gen->users_id;
                                        $base_url = base_url();
                                        $assign = '<img alt=""' . $users_id . '"" src="' . $base_url . 'img/messages/assignment.jpg" width="20" height="20">   ';
                                        $pdf = '<img alt=""' . $users_id . '"" src="' . $base_url . 'img/messages/pdf.jpg" width="20" height="20">   ';
                                        $view = '<img alt=""' . $users_id . '"" src="' . $base_url . 'img/messages/success.jpg" width="20" height="20">   ';
                                        $edit = '<img alt=""' . $users_id . '"" src="' . $base_url . 'img/messages/edit.jpg" width="20" height="20">   ';
                                        $delete = '<img alt=""' . $users_id . '"" src="' . $base_url . 'img/messages/delete.jpg" width="20" height="20">  ';
                                        ?>

                                        <?php if ($is_authenticated): ?>
                                            <?php $role; ?>
                                            <?php if ($role == 1) { ?>
                                                <?php
                                                echo anchor("User/ViewUsersPDF/$users_id", $pdf, array('target' => '_blank', 'onClick' => "return confirm('Are you sure for viewing this  User?')"));
                                                echo anchor("User/ViewUsersDetails/$users_id", $view, array('onClick' => "return confirm('Are you sure for viewing this User ?')"));
                                                echo anchor("User/ViewUsersEditForm/$users_id", $edit, array('onClick' => "return confirm('Are you sure for editing this User?')"));
                                                echo anchor("User/ViewUsersDelete/$users_id", $delete, array('onClick' => "return confirm('Are you sure for deleting this User?')"));
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
</section>
<!-- Users Section -->





    <?php $this->load->view('menu/pmctoolPreloader'); ?>

    <?php $this->load->view('footer/pmctoolFooter'); ?>