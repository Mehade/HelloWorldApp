<?php
$this->load->view('admin/header');
?>

<style>
label.error{
color:red;
font-wide:bold;
}
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.validate.js"></script>

<script>
    $(document).ready(function() {
        $("#updatePriceForm").validate({
            rules: {
                category_id: "required",
                item_id: "required",
                new_price: "required"
            },
            messages: {
                category_id: "Please Select a Category",
                item_id: "Please Select a Item",
                new_price: "Please Enter New Price"
            }
        });



        $('#category_id').on('change', function(e) {
            var category = $(this).val();

            if (category == 0) {
                alert("please select a teacher first");
            }
            else {
                $.ajax(
                        {
                            type: "POST",
                            url: "<?php echo base_url(); ?>item/getCategoryForItem",
                            data: "id=" + category,
                            success: function(data)
                            {
                                //alert(data.credit);
                                var mySelect = $('#item_id');
                                $('#item_id option').remove();
                                mySelect.append($('<option></option>').val('').html('Select a Item')
                                        )
                                $.each(data, function(v, k) {

                                    mySelect.append(
                                            $('<option></option>').val(k.item_id).html(k.item_name)
                                            );
                                });


                            }, dataType: 'json'
                        });
            }
        });

        $('#item_id').on('change', function(e) {
            var itemId = $(this).val();
            if (itemId == 0) {
                alert("Please Select a Item first");
                $("#present_price").val('');
                $("#prductId").val('');
            }
            else {
                $.ajax(
                        {
                            type: "POST",
                            url: "<?php echo base_url(); ?>item/getCategorywiseItemList",
                            data: "id=" + itemId,
                            success: function(data)
                            {
                                $("#present_price").val(data.price);
                                $("#prductId").val(data.item_id);
                            }, dataType: 'json'
                        });
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
            $attributes = array('class' => 'form-horizontal', 'id' => 'updatePriceForm', 'role' => 'form');
            echo form_open_multipart('item/update_price', $attributes);
            ?>
            <aside class="profile-info col-lg-8">
                <section class="panel">
                    <div class="bio-graph-heading">
                        Update Items Price From here
                    </div>
                    <div class="panel-body bio-graph-info">
                        <?php
                        if ($this->session->flashdata('update')) {
                            echo '<div class="alert alert-block alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-ok-sign"></i></button><strong>SUCCESS! </strong>' . $this->session->flashdata('update') . '</div>';
                        }
                        ?>
                        <h1> Update Price Information</h1>

                        <div class="form-group">
                            <label  class="col-lg-2 control-label" for="category_id">Category</label>
                            <div class="col-lg-6">
                                <select name="category_id" id="category_id" class="form-control" required>
                                    <option value="">Select a Category</option>
                                    <?php
                                    $categoryList = kanakata_category_list();
                                    foreach ($categoryList as $list) {
                                        echo '<option value=' . $list->category_id . '> ' . $list->category_name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-lg-2 control-label" for="category_id">Item</label>
                            <div class="col-lg-6">
                                <select name="item_id" id="item_id" class="form-control" required>
                                    <option value="">Select a Item</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  for="item_name" class="col-lg-2 control-label">Present Price</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="present_price" value="" id="present_price" readonly>
                            </div>
                        </div>

                        <input type="hidden" name="prductId" id="prductId" value="">
                        <div class="form-group">
                            <label  class="col-lg-2 control-label" for="new_price">New Price</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="new_price" value="" id="new_price" placeholder="Enter items new price ">
                            </div>
                        </div>                                                                                                  
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" id="submit" name="submit" class="btn btn-info" style="margin-left: 10px;">Save</button>
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


<?php
$this->load->view('admin/footer');
?>