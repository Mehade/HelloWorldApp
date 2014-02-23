<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        $att = array(
            'id' => 'placeOrderForm',
            'role' => 'form'
        );
        echo form_open('order/orderInsert', $att);
        ?>
        
        <fieldset style="width: 40%;">
            
            <?php if($this->session->userdata('user_id') > 0){ ?>
            
            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id') ?>"/>
            
            <?php
            }
            else{
                echo '<input type="hidden" name="user_id" value=""/>';
            }
            ?>
            Default Billing Address<br/>
            <div>
                <input type="text" name="default_bill_add" value="<?php echo $this->session->userdata('billing_address') ?>" readonly/>
            </div>


            <input type="radio" name="radio" value="different_bill_add"/> Use Different Address(Below) for billing
            <div>
                <input type="text" name="different_bill_add"/>
            </div>



            Default Shipping Address<br/>
            <div>
                <input type="text" name="default_ship_add" value="<?php echo $this->session->userdata('shipping_address') ?>" readonly/>
            </div>


            <input type="radio" name="radio_different_ship_add" value="different_ship_add" > Same address of billings
            <div>
                <input type="text" name="different_ship_add"/>
            </div>

            <input type="radio" name="radio_different_ship_add" value="different_address"/> Different Address
            <div>
                <input type="text" name="different_address"/>
            </div>
        </fieldset>
       
        <fieldset style="width: 40%; text-align: center;">
            <legend>Order Overview</legend>
            <table border="1">
                <thead>
                <th>Item Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Sub Total</th>
                </thead>

                <tbody>
                    <?php
                    
                    
                    $i = 1; ?>

                    <?php foreach ($this->cart->contents() as $items): ?>

                        <tr>

                            <td><?php echo $items['name']; ?></td>
                            <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                            <td style="text-align:right"><?php echo $items['qty']; ?></td>
                            <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>

                        </tr>

                        <?php $i++; ?>

                    <?php endforeach; ?>

                    <tr>
                        <td colspan="2"> </td>
                        <td class="right"><strong>Total</strong></td>
                        <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                    </tr>                    

                </tbody>
            </table>
            
            <a herf="" ><input type="submit" name="submit" class="btn btn-info" value="Place Order"/></a>
            
        </fieldset>
        
        <?php
        echo form_close();
        ?>

    </body>
</html>
