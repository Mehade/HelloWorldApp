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
        $("#addDiscount").validate({
            rules: {
                category_id: "required",
                item_id: "required",
                discount_price: "required",
                strtDate: "required",
                endDate: "required"

            },
            messages: {
                category_id: "Please Select a Category",
                item_id: "Please Select a Item",
                discount_price: "Please Enter discount percentage ",
                strtDate: "Please Select Start date ",
                endDate: "Please Select End Date "
            }
        });



        $('#category_id').on('change', function(e) {
            var category = $(this).val();

            if (category == 0) {
                alert("please select a category  first");
            }
            else {
                $.ajax(
                        {
                            type: "POST",
                            url: "<?php echo base_url(); ?>discount/getCategoryForItem",
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
                $("#item_name").val('');
                $("#unit_price").val('');

            }
            else {
                $.ajax(
                        {
                            type: "POST",
                            url: "<?php echo base_url(); ?>discount/getItemnameForDiscount",
                            data: "id=" + itemId,
                            success: function(data)
                            {
                                $("#item_name").val(data.name);
                                $("#unit_price").val(data.price);

                            }, dataType: 'json'
                        });
            }
        });

    });
</script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
            $(function() {
                $("#strtDate").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1998:2020',
                    dateFormat: 'yy-mm-dd'
                });
                $("#endDate").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '1998:2020',
                    dateFormat: 'yy-mm-dd'
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
            $attributes = array('class' => 'form-horizontal', 'id' => 'addDiscount', 'role' => 'form');
            echo form_open_multipart('discount/insert_discount', $attributes);
            ?>
            <aside class="profile-info col-lg-8">
                <section class="panel">
                    <div class="bio-graph-heading">
                        Add Discount in Items
                    </div>
                    <div class="panel-body bio-graph-info">
                        <?php
                        if ($this->session->flashdata('msg')) {
                            echo '<div class="alert alert-block alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-ok-sign"></i></button><strong>SUCCESS! </strong>' . $this->session->flashdata('msg') . '</div>';
                        }
                        ?>
                        <h1> Discount Price Information</h1>

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
                            <label  for="item_name" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="item_name" value="" id="item_name" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  for="unit_price" class="col-lg-2 control-label">Unit Price</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="unit_price" value="" id="unit_price" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-lg-2 control-label" for="discount_price">Discount Price</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="discount_price" value="" id="discount_price" placeholder="Enter discount amount in percentage (%) ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-lg-2 control-label" for="strtDate">Start Date</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="strtDate" value="" id="strtDate" placeholder="Enter start date ">
                            </div>
                        </div>   

                        <div class="form-group">
                            <label  class="col-lg-2 control-label" for="endDate">End Date</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="endDate" value="" id="endDate" placeholder="Enter end date">
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