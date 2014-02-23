<?php
$this->load->view('admin/header');
?>

<style>
    label.error{
        color: red;
        font-weight: bold;
    }
</style>
<script src="<?php echo base_url(); ?>public/js/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $("#userEntryForm").validate({
            rules: {
                user_name: "required",
                email: {
                    required: true,
                    email: true
                },
                user_password: {
                    required: true,
                    minlength: 5
                },
                user_contact: "required",
                user_shipping_addr: "required",
                user_billing_addr: "required"
            },
            messages: {
                user_name: "Please enter your name",
                email: "Please enter a valid email address",
                user_password: {
                    required: "Please enter your password",
                    minlength: "Password should be at least 5 characters"
                },
                user_contact: "Please enter your contact number",
                user_shipping_addr: "Please enter your shipping address",
                user_billing_addr: "Please enter your billing address"
            }
        });

    });
</script>


<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">

            <div class="col-lg-2"></div>

            <?php
            $attributes = array('class' => 'form-horizontal', 'id' => 'userEntryForm', 'role' => 'form');
            echo form_open('admins/user_entry', $attributes);
            ?>
            <aside class="profile-info col-lg-8">
                <section class="panel">
                    <div class="bio-graph-heading">
                        Create New User for KENAKATA online shopping center
                    </div>
                    <div class="panel-body bio-graph-info">
                        <?php
                        if ($this->session->flashdata('user_insert_msg')) {
                            echo '<div class="alert alert-block alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-ok-sign"></i></button><strong>SUCCESS! </strong>' . $this->session->flashdata('user_insert_msg') . '</div>';
                        }
                        ?>
                        <h1> Profile Information</h1>

                        <div class="form-group">
                            <label  for="user_name" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="user_name" value="" id="user_name" placeholder="Enter your name ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-lg-2 control-label" for="email">Email</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="email" value="" id="email" placeholder="Enter your email ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-lg-2 control-label" for="user_password">Password</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" name="user_password" value="" id="user_password" placeholder="Enter your password ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-lg-2 control-label" for="user_contact">Contact</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="user_contact" value="" id="user_contact" placeholder="Enter your contact number ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-lg-2 control-label" for="user_shipping_addr">Shipping Address</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="user_shipping_addr" id="user_shipping_addr" value="" placeholder="Enter your shipping address ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-lg-2 control-label" for="user_billing_addr">Billing Address</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="user_billing_addr" value="" id="user_billing_addr" placeholder="Enter your billing address ">
                            </div>
                        </div>                                     
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-info" style="margin-left: 10px;">Save</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                </section>
            </aside>
            <div class="col-lg-2"></div>

        </div>
    </section>

    <?php
    echo form_close();
    ?>


    <!-- page end-->
</section>

<!--main content end-->


<?php
$this->load->view('admin/footer');
?>