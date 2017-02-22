<?php $this->load->view('header/header'); ?>
<?php $this->load->view('menu/menu'); ?>
<body>

    <!-- Users Section-->

    <section class="users-section section-padding" id="users">
        <div class="container-fluid">

            <h2 class="section-title text-center">Create a User</h2>

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

                        <?php echo form_open('User/CreateUser') ?>  
                        <table class="table " style="width: 100%; alignment-adjust: auto; text-align:  left; font-size:16px; font-family: sans-serif;">

                            <tr>
                                <td >
                                    <span title="User's Name">
                                        <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="first_name" id="first_name" placeholder="User's Name" value="<?php echo set_value('first_name'); ?>"  />
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span title="User's LastName">
                                        <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="last_name" id="last_name" placeholder="User's LastName" value="<?php echo set_value('last_name'); ?>"  />
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span title="Email">
                                        <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>"  />
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span title="Username">
                                        <input class="table table-responsive" style="color:#000; border: 0px;" type="text" name="username" id="username" placeholder="Username" value="<?php echo set_value('username'); ?>"  />
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span title="Password">
                                        <input class="table table-responsive" style="color:#000; border: 0px;" type="password" name="password" id="password" placeholder="Password" value="<?php echo set_value('password'); ?>"  />
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span title="User's Group">
                                        <label for="User's Group"></label>
                                        <select name='user_group_id' id='user_group_id' >
                                            <option value="-1">Select Group</option>
                                            <?php if (isset($gGroup)): ?>
                                                <?php foreach ($genGroup as $genGroup): ?>
                                                    <option value="<?php echo $genGroup->user_group_id; ?>">
                                                        <?php echo $genGroup->user_group_name; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <div class="btn btn-danger">
                            <?php echo form_submit('submit', 'Submit User'); ?>
                            <?php echo form_close() ?>
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