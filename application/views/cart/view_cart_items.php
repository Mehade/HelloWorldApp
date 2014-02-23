<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        foreach ($itemList as $aList){
            ?>
        
        <?php 
            $attribute = array(
                'id' => 'addCart',
                'role' => 'form'
            );
            echo form_open('cart/add_to_cart', $attribute);
        
        ?>
        
        <fieldset style="width: 50%;">
            <legend><?php echo $aList->item_name ?></legend>
            Image <img src="<?php echo base_url(); ?>upload/<?php echo $aList->item_image ?>" height="200" width="200"/><br/>
            Quantity <input type="text" name="quantity" />
           <button type="button" class="btn btn-success"><?php echo $aList->item_unit_price; ?></button>
             <input type="hidden" name="price" value="<?php echo $aList->item_unit_price; ?>"/>
             <input type="hidden" name="item_id" value="<?php echo $aList->item_id; ?>"/>
             <input type="submit" name="submit" value="Add to Cart"/><br/>
        </fieldset>
        
        <?php
        echo form_close();
        }
        
        ?>
    </body>
</html>
