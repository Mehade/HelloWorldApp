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
        
    </head>
    <body>
        
        <?php
        
        if($this->session->flashdata('update')){
            echo $this->session->flashdata('update');
        }
        
        echo validation_errors();
        $attribute = array(
            'role' => 'form',
            'id' => 'updatePriceForm'
        );
        echo form_open('item/update_price', $attribute);
        ?>
        
        Category <select name="category_id" id="category_id" required>
            <option value="">Select a Category</option>
            <?php
            foreach ($categoryList as $aCategory){
                echo '<option value='.$aCategory->category_id.'>'.$aCategory->category_name.'</option>';
            }
            ?>
        </select><br/>
        
        Item <select name="item_id" id="item_id" required>
            <option value="">Select a Item</option>
           
        </select><br/>
        
        Present Price : <input type="text" name="present_price" id="present_price" readonly/><br/>

        <input type="hidden" name="prductId" id="prductId" value="">
        New Price: <input type="text" name="new_price" id="new_price"/><br/>
        <input type="submit" name="submit" value="Save" id="submit"/>
        <?php
        echo form_close();
        ?>
    </body>
</html>
