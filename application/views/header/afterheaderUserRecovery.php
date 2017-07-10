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

                            <?php

//create passwords for users
                            function randomPassword() {
                                $alphabet = "abcdefghijklmnopqrstuwxyz0123456789!@#$%";
                                $pass = array(); //remember to declare $pass as an array
                                $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                                for ($i = 0; $i < 8; $i++) {
                                    $n = rand(0, $alphaLength);
                                    $pass[] = $alphabet[$n];
                                }
                                return implode($pass); //turn the array into a string
                            }

//echo randomPassword();
                            ?>
                            <?php echo form_open('User/RecoveryPassword'); ?>
                            <table class="tg" style="width: 100%;">
                                <p><input type="hidden" size="80" id="new_password" name="new_password" value="<?php echo randomPassword() ?>"/> 

                                <tr>
                                    <td class="tg-qgsu" style="width: 100%;" >
                                        <label for="username">Username <span class="text-danger">*</span></label>
                                        <input style="width: 100%;"type="text" name="username"  placeholder="Username . . . ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-qgsu" style="width: 100%;" >
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input style="width: 100%;"type="text" name="email"  placeholder="Email . . . ">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-qgsu" style="width: 100%;" >
                                        <label for="choosenWord">Security Phrase <span class="text-danger">*</span></label>
                                        <input style="width: 100%;"type="text" name="choosenWord"  placeholder="Security Phrase . . . ">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="btn-success" type="submit" value="Recovery!" />
                                        <input class="btn-danger" type="reset" value="Clear Form" />
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