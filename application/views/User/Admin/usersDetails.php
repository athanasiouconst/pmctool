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

                        <?php foreach ($gen as $gen): ?>
                            <table class="table table-responsive table-active table-condensed" style="font-size:16px; font-family: sans-serif; 
                                   alignment-adjust: auto; text-align:  left; " >
                                <tr class="alert-success" >
                                    <td ></td>
                                    <td style="float: right;">
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
                                </tr>
                                <tr><td class="alert-success" style="width: 20%;">First Name</td><td><?php echo $gen->first_name; ?></td></tr>
                                <tr><td class="alert-success" style="width: 20%;">Last Name</td><td><?php echo $gen->last_name; ?></td></tr>
                                <tr><td class="alert-success" style="width: 20%;">Username</td><td><?php echo $gen->username; ?></td></tr>
                                <tr><td class="alert-success" style="width: 20%;">Password</td><td><?php echo $gen->password; ?></td></tr>
                                <tr><td class="alert-success" style="width: 20%;">Email</td><td><?php echo $gen->email; ?></td></tr>
                                <tr><td class="alert-success" style="width: 20%;">User Group</td><td><?php echo $gen->user_group_name; ?></td></tr>
                                <tr><td class="alert-success" style="width: 20%;">Send Activation Email</td><td><?php echo $gen->sendEmail; ?></td></tr>
                                <tr><td class="alert-success" style="width: 20%;">Register Date</td><td><?php echo $gen->registerDate; ?></td></tr>
                                <tr><td class="alert-success" style="width: 20%;">Last Visit</td><td><?php echo $gen->lastvisitDate; ?></td></tr>
                                <tr><td class="alert-success" style="width: 20%;">User Activation</td><td><?php echo $gen->activation; ?></td></tr>
                                <tr><td class="alert-success" style="width: 20%;">Last PasswordReset Time</td><td><?php echo $gen->lastResetTime; ?></td></tr>
                                <tr><td class="alert-success" style="width: 20%;">Reset Counter</td><td><?php echo $gen->resetCount; ?></td></tr>
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
</section>
<!-- Users Section -->





<?php $this->load->view('menu/pmctoolPreloader'); ?>

<?php $this->load->view('footer/pmctoolFooter'); ?>