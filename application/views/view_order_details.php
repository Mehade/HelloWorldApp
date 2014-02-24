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
        $attributes = array('id' => 'view_order_details_form', 'role' => 'form');
        echo form_open('order/search_orders', $attributes);
        ?>
        <fieldset style="width: 60%">
            Order ID<input type="text" name="order_id"/><br/>
            Item Qty<input type="text" name="item_qty"/><br/>
            Order Date<input type="text" name="order_date"/><br/>

            Order By<input type="text" name="order_by"/><br/>
            Present Status<input type="text" name="pre_Status"/><br/>
            Delivary Address<input type="text" name="D_address"/><br/>
            Payment Address<input type="text" name="Payment_address"/><br/>
            Change Status<select name="Change_id">
                <optio value="">--------</optio>
                <select/><br/>
                <input type="submit" name="Submit" value="Save"/>
        </fieldset>

        <table border="2">

            <thead>
            <th> Item Name</th>
            <th> Unit Price</th>
            <th>  Item Qty</th>
            <th> Total</th>
            <th> Subtotal</th>

        </thead>
        <tbody>

        </tbody>
    </table>
        
        <?php 
        echo form_close();
        ?>
</body>
</html>
