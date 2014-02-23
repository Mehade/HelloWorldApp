<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

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

    </head>
    <body>
        <?php
        $attribute = array(
            'role' => 'form',
            'id' => 'addDiscount'
        );
        echo form_open('discount/insert_discount', $attribute);
        ?>
        <fieldset>
            <legend> Discount Add</legend> 


            Category<select name="category_id" id="category_id">
                <option value="#">-----Select category---</option>


                <?php
                foreach ($categoryList as $list) {

                    echo '<option value=' . $list->category_id . '> ' . $list->category_name . '</option>';
                }
                ?>
            </select><br/>
            Item<select name="item_id" id="item_id">
                <option value="#">-----Select Item---</option>
            </select><br/>
            
            Name<input type="text" name="item_name" readonly id="item_name"/><br/>
            Unit Price<input type="text" name="unit_price" readonly id="unit_price"/><br/>
            Discount<input type="text" name="discount_price" id="discount_price"/>%<br/>
            Start Date<input type="tex" name="strtDate" id="strtDate"/><br/>
            Endt Date<input type="tex" name="endDate" id="endDate"/><br/>
            <input type="submit" name="submit" value="Save"/>

        </fieldset>
        <?php
        echo form_close();
        If($this->session->flashdata('msg')){
            echo $this->session->flashdata('msg');
        }
        ?>
    </body>
</html>
