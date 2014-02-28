<?php
echo $this->load->view('header');
?>
<script>
    $(document).ready(function() {
        $('input:radio[id="sameadd"]').change(
                function() {
                  var mm =  $("#differentBillAdd").val();
                  
                  $("#sameAddBill").text(mm);
                  $("#sameAddBill").val(mm);
                });
    });
</script>

<!-- Page title -->
<div class="page-title">
    <div class="container">
        <h2><i class="icon-desktop color"></i> Checkout </h2>
        <hr />
    </div>
</div>
<!-- Page title -->

<!-- Page content -->

<div class="checkout">
    <div class="container">

        <?php
        $attribute = array(
            'id' => 'checkoutForm',
            'role' => 'form'
        );
        echo form_open('order/orderInsert', $attribute)
        ?>

        <?php if ($this->session->userdata('user_id') > 0) { ?>

            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id') ?>"/>

            <?php
        } else {
            echo '<input type="hidden" name="user_id" value="3"/>';
        }
        ?>

        <div class="row">

            <h4>Shipping & Billing Details</h4>
            <br />

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="defaultBillAdd" >Billing Address</label>
                    <textarea class="form-control" rows="3" cols="20" id="defaultBillAdd" name="defaultBillAdd" readonly ><?php echo $this->session->userdata('billing_address') ?></textarea>
                </div>
                <div class="form-group">
                    <input type="radio" name="radio"  value="differentBillAdd"/> Use Different Address (below) for billing
                    <textarea class="form-control" rows="3" cols="50" name="differentBillAdd" id="differentBillAdd" ></textarea>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="defaultShipAdd" >Shipping Address</label>                    
                    <textarea class="form-control" rows="3" cols="20" id="defaultShipAdd" name="defaultShipAdd" readonly><?php echo $this->session->userdata('shipping_address') ?></textarea>                    
                </div>
                <div class="form-group">
                    <input type="radio" name="radio" value="sameAddBill" id="sameadd"/> Same Address of Billing                    
                    <textarea class="form-control" rows="3" cols="20" name="sameAddBill" id="sameAddBill" ></textarea>                    
                </div>
                <div class="form-group">
                    <input type="radio" name="radio" value="differentAddBill"/> Different Address                    
                    <textarea class="form-control" rows="3" cols="20" name="differentAddBill" id="differentAddBill" ></textarea>                    
                </div>
            </div>

        </div>

        <div class="row">
            <h4><i class="icon-user color"></i> &nbsp;Order Overview</h4>
            <br />

            <table class="table table-striped tcart">
                <thead>
                    <tr>
                        <th>Item Names</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i = 1; ?>

                    <?php foreach ($this->cart->contents() as $items): ?>

                        <tr>

                            <td><?php echo $items['name']; ?></td>
                            <td><?php echo $this->cart->format_number($items['price']); ?></td>
                            <td><?php echo $items['qty']; ?></td>
                            <td><?php echo $this->cart->format_number($items['subtotal']); ?> TK</td>

                        </tr>

                        <?php $i++; ?>

                    <?php endforeach; ?>

                    <tr>
                        <td colspan="2"></td>
                        <td class="right"><strong>Total</strong></td>
                        <td class="right"><?php echo $this->cart->format_number($this->cart->total()); ?> TK</td>
                    </tr>

                </tbody>
            </table>

            <a herf="" ><input type="submit" name="submit" class="btn btn-info" value="Place Order"/></a>

        </div>

        <?php
        echo form_close();
        ?>

    </div>
</div>


<?php
echo $this->load->view('footer');
?>
