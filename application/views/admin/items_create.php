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
        $("#itemEntryForm").validate({
            rules: {
                item_name: "required",                
                unit_price: "required",
                category_id: "required"                
            },
            messages: {
                item_name: "Please enter item name",
                unit_price: "Please enter unit price",                
                category_id: "Please select a category"               
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
            $attributes = array('class' => 'form-horizontal', 'id' => 'itemEntryForm', 'role' => 'form');
            echo form_open_multipart('item/insert_item', $attributes);
            ?>
            <aside class="profile-info col-lg-8">
                <section class="panel">
                    <div class="bio-graph-heading">
                        Add New Items into KENAKATA online shopping center
                    </div>
                    <div class="panel-body bio-graph-info">
                        <?php
                        if ($this->session->flashdata('user_insert_msg')) {
                            echo '<div class="alert alert-block alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-ok-sign"></i></button><strong>SUCCESS! </strong>' . $this->session->flashdata('user_insert_msg') . '</div>';
                        }
                        ?>
                        <h1> Items Information</h1>

                        <div class="form-group">
                            <label  for="item_name" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="item_name" value="" id="item_name" placeholder="Enter item name ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-lg-2 control-label" for="unit_price">Unit Price</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="unit_price" value="" id="unit_price" placeholder="Enter items unit price ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-lg-2 control-label" for="category_id">Category</label>
                            <div class="col-lg-6">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select a Category</option>
                                    <?php
                                    foreach ($categoryList as $list) {
                                        echo '<option value=' . $list->category_id . '> ' . $list->category_name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-lg-2 control-label" for="user_contact">Image</label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control" name="userfile" accept="image/*" placeholder="Choose a image.... ">
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