<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


        <fieldset style="width: 60%">
            <legend>View Orders</legend>
            
            <?php
            $attributes = array('class' => 'form-horizontal', 'id' => 'viewOrdersForm', 'role' => 'form');
            echo form_open('order/search_orders', $attributes);
            ?>
            
            <input type="radio" name="radio" value="1"/> Pending
            <input type="radio" name="radio" value="2"/> Delivered
            <input type="radio" name="radio" value="0"/> Cancelled
            <input type="submit" name="searchButton" value="Search"/>
            
            <?php
            echo form_close();
            ?>

            <br/>

            <table border="1">
                <thead>
                <th>Order Id</th>
                <th>Item Qty</th>
                <th>Date</th>
                <th>Order By</th>
                <th>Shipping Address</th>
                </thead>


                <tbody>
                    <?php
                    foreach ($orderViewList as $aList) {
                    ?>
                    <tr>
                    <td><?php echo $aList->number; ?></td>
                    <td><?php echo $aList->qty; ?></td>
                    <td><?php echo $aList->date; ?></td>
                    <td><?php echo $aList->user; ?></td>
                    <td><?php echo $aList->address; ?></td>
                    </tr>

                <?php } ?>
                </tbody>

                
            </table> 
            <?php echo $this->pagination->create_links(); ?>
        </fieldset>

        <?php
        // put your code here
        ?>
    </body>
</html>
