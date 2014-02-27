<?php
echo $this->load->view('header');
?>


<!-- Page title -->
<div class="page-title">
    <div class="container">
        <h2><i class="icon-desktop color"></i>Account Information <small>You can change/view all of your informations</small></h2>
        <hr />
    </div>
</div>
<!-- Page title -->

<!-- Page content -->

<div class="account-content">
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="sidey">
                    <ul class="nav">
                        <li><a href="<?php echo base_url() ?>user/my_account_info">My Account</a></li>                                                                        
                        <li><a href="<?php echo base_url() ?>user/edit_profile">Edit Profile</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <h3><i class="icon-user color"></i> &nbsp;Edit Profile</h3>
                <!-- Your details -->               
                <?php
                $attribute = array(
                    'id' => 'editProfileForm',
                    'role' => 'form',
                    'class' => 'form-horizontal'
                );
                echo form_open('user/update_profile', $attribute);
                ?>

                <?php
                if ($this->session->flashdata('update_msg')) {
                    echo '<div class="alert alert-block alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-ok-sign"></i></button><strong>SUCCESS! </strong>' . $this->session->flashdata('update_msg') . '</div>';
                }
                           
                if($this->session->userdata('user_id') != NULL){
                ?>

                <div class="form-group">
                    <label for="userRegName" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="userRegName" name="userRegName" value="<?php echo $this->session->userdata('user_name'); ?>">
                    </div>
                </div>                           
                <div class="form-group">
                    <label for="userRegEmail" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                        <input type="email" class="form-control" id="userRegEmail" name="userRegEmail" value="<?php echo $this->session->userdata('user_email'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="userRegPassword" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                        <input type="password" class="form-control" id="userRegPassword" name="userRegPassword" value="<?php echo $this->session->userdata('user_password'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="userRegContact" class="col-lg-2 control-label">Contact No</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="userRegContact" name="userRegContact" value="<?php echo $this->session->userdata('user_contact'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="userRegBillingAdd" class="col-lg-2 control-label">Billing Address</label>
                    <div class="col-lg-10">                        
                        <input type="text" class="form-control" id="userRegBillingAdd" name="userRegBillingAdd" value="<?php echo $this->session->userdata('billing_address'); ?>">
                    </div>
                </div>   
                <div class="form-group">
                    <label for="userRegShippingAdd" class="col-lg-2 control-label">Shipping Address</label>
                    <div class="col-lg-10">                        
                        <input type="text" class="form-control" id="userRegShippingAdd" name="userRegShippingAdd" value="<?php echo $this->session->userdata('shipping_address'); ?>">
                    </div>
                </div>   
                
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" name="submit" class="btn btn-info">Update Profile</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>

                <?php
                }
                echo form_close();
                ?>


            </div>
        </div>

        <div class="sep-bor"></div>
    </div>
</div>


<?php
echo $this->load->view('footer');
?>