<?php if (!$is_authenticated): ?>
    <section class="login-us" id="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-xs-12 no-padding">
                    <!-- About Us Left -->
                    <div class="about-us-left">
                        <!-- About Us Info -->
                        <h2 class="section-title-left text-info">Information<br></h2>
                        <p>In order of full functionilty users must to Login.
                        <p>More Details in the following :
                        <p><a href="http://pmc.teilar.gr/"  target="_blank">Project Management Complexity Research Group <br>Technological Educational Institute of Thessaly (TEI Thessaly)</a>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12 no-padding">
                    <!-- About Us Left -->
                    <div class="about-us-left">
                        <!-- About Us Info -->
                        <h2 class="section-title-left">Reset your Account</h2>

                        <div class="panel">
                            <style type="text/css">
                                .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;}
                                .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;color:#333;background-color:#fff;border-top-width:1px;border-bottom-width:1px;}
                                .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;color:#333;background-color:#f0f0f0;border-top-width:1px;border-bottom-width:1px;}
                                .tg .tg-qgsu{font-size:15px;vertical-align:top}
                            </style>
                            <?php if (isset($error)) : ?>
                                <div class="alert alert-danger" style="width: 100%; font-size: 18px; padding-left: 20%;  ">
                                    <strong><?= $error ?></strong>
                                    <strong><?php echo validation_errors(); ?></strong>
                                </div>                    
                            <?php endif; ?>   

                            <?php echo form_open('User/RecoverySubmitPassword'); ?>
                            <table class="tg" style="width: 100%;">
                                <tr>
                                    <td class="tg-qgsu" style="width: 100%;" >
                                        <p><input type="hidden" size="80" id="username" name="username" value="<?php echo $username; ?>"/> 
                                        <p><input type="hidden" size="80" id="email" name="email" value="<?php echo $email; ?>"/> 
                                        <p><input type="hidden" size="80" id="choosenWord" name="choosenWord" value="<?php echo $choosenWord; ?>"/> 

                                            <label for="new_password">Password <span class="text-danger">*</span></label>
                                            <input style="width: 100%;"type="text" name="new_password"  placeholder="Password . . . " value="<?php echo $new_password; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="btn-success" type="submit" value="Reset My Account!" />
                                    </td>
                                </tr>

                                <?php echo form_close(); ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>