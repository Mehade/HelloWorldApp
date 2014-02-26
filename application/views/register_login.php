<?php
echo $this->load->view('header');
?>

<style>
    label.error{
        color: red;
        font-weight: bold;
    }
</style>
<script src="<?php echo base_url(); ?>main/js/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $("#userLoginForm").validate({
            rules: {
                userLoginEmail:{
                    required: true,
                    email: true
                },
                userLoginPassword: "required"
            },
            messages: {
                userLoginEmail:{
                    required: "Please enter your email",
                    email: "Please enter a valid email"
                },
                userLoginPassword: "Please enter correct password"
            }
        });
        
        $("#userRegForm").validate({            
            rules: {
                userRegName: "required",
                userRegEmail:{
                    required: true,
                    email: true
                },
                userRegPassword: "required",
                userRegContact: "required",
                userRegBillingAdd: "required",
                userRegShippingAdd: "required",
                agree: "required"
            },
            messages: {                
                userRegName: "Please enter your name",
                userRegEmail:{
                    required: "Please enter your email",
                    email: "Please enter a valid email"
                },
                userRegPassword: "Please enter your password",
                userRegContact: "Please enter Contact Number",
                userRegBillingAdd: "Please enter billing address",
                userRegShippingAdd: "Please enter shipping address",
                agree: "Please you must accept our terms and conditions"
            }
        });
        

    });
</script>




<div class="row">
    <!--Registration Form Start-->
    <div class="col-md-6">

        <div class="register-login">
            <div class="cool-block">
                <div class="cool-block-bor">

                    <h3>Register <small>Don't have any account? Please register here</small></h3>                  

                    <?php
                    if ($this->session->flashdata('log')) {
                        echo $this->session->flashdata('log');
                    }
                    ?>

                    <?php
                    $attribute = array(
                        'id' => 'userRegForm',
                        'role' => 'form',
                        'class' => 'form-horizontal'
                    );
                    echo form_open('user/user_registration', $attribute);
                    ?>

                    <?php
                    if ($this->session->flashdata('user_insert_msg')) {
                        echo '<div class="alert alert-block alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-ok-sign"></i></button><strong>SUCCESS! </strong>' . $this->session->flashdata('user_insert_msg') . '</div>';
                    }
                    ?>
                   
                        <div class="form-group">
                            <label for="userRegName" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="userRegName" name="userRegName" placeholder="Enter your Name">
                            </div>
                        </div>                           
                        <div class="form-group">
                            <label for="userRegEmail" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="email" class="form-control" id="userRegEmail" name="userRegEmail" placeholder="Enter your Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="userRegPassword" class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" id="userRegPassword" name="userRegPassword" placeholder="Enter your Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="userRegContact" class="col-lg-2 control-label">Contact No</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" id="userRegContact" name="userRegContact" placeholder="Enter your Contact Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="userRegBillingAdd" class="col-lg-2 control-label">Billing Address</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" rows="3" name="userRegBillingAdd" id="userRegBillingAdd"></textarea>
                            </div>
                        </div>   
                        <div class="form-group">
                            <label for="userRegShippingAdd" class="col-lg-2 control-label">Shipping Address</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" rows="3" name="userRegShippingAdd" id="userRegShippingAdd"></textarea>
                            </div>
                        </div>   
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="agree" id="agree" required> I Agree Terms & Conditions
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-info">Register</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    
                    <?php
                    echo form_close();
                    ?>

                </div>
            </div>   
        </div>
    </div>
    <!--Registration Form End-->


    <!--Login Form Start-->
    <div class="col-md-6">
        <div class="register-login">
            <div class="cool-block">
                <div class="cool-block-bor">

                    <h3>Login <small>Please give your username and password</small></h3>

                    <?php
                    if ($this->session->flashdata('log')) {
                        echo $this->session->flashdata('log');
                    }
                    ?>

                    <?php
                    $attribute = array(
                        'id' => 'userLoginForm',
                        'role' => 'form',
                        'class' => 'form-horizontal'
                    );
                    echo form_open('user/user_login', $attribute);
                    ?>

                    <div class="form-group">
                        <label for="userLoginEmail" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" id="userLoginEmail" name="userLoginEmail" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="userLoginPassword" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" id="userLoginPassword" name="userLoginPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-info">Sign in</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                    <?php
                    echo form_close();
                    ?>

                </div>
            </div>   
        </div>
    </div>

    <!--Login Form End-->


</div>


<?php
echo $this->load->view('footer');
?>
