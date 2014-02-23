<?php
$this->load->view('header');
?>
<script>
    $(document).ready(function() {
        $(".use-address").click(function() {
             var mm = $(this).closest("tr");
            var cart_id = $(this).attr('id');
            var pqty = $(this).closest("tr").find("input[name=quantity]").val();


            $.ajax(
                    {
                        type: "POST",
                        url: "<?php echo base_url(); ?>cart/updateCarts",
                        data: "id=" + cart_id + "&qty=" + pqty,
                        success: function(data)
                        {
                            if (data.message == true) {

                                mm.find(".unit").text(data.unit);
                                mm.find(".grand").text(data.sub);
                                $("#fulltotal").text(data.total);
                                $("#noOfItems").val(data.totalItem);

                            }

                        }, dataType: 'json'
                    });

        });

        $('.deleteItem').click(function() {
        var mm = $(this).closest("tr");
            var result = confirm('Are you sure want to clear all bookings?');
            if (result) {
                
                var cart_id = $(this).attr('id');
                var pqty = 0;
                $.ajax(
                        {
                            type: "POST",
                            url: "<?php echo base_url(); ?>cart/updateCarts",
                            data: "id=" + cart_id + "&qty=" + pqty,
                            success: function(data)
                            {
                                if (data.message == true) {

                                   mm.hide(1000);
                                   $("#fulltotal").text(data.total);
                                   $("#noOfItems").val(data.totalItem);

                                }

                            }, dataType: 'json'
                        });

            }
            else {
                return false;
            }

        });
    });
</script>
<div class="view-cart blocky">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                No of Items <input type="text" name="noOfItems" id="noOfItems" value="<?php echo $this->cart->total_items(); ?>" readonly/>
                <!-- Table -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($this->cart->contents() as $items): ?>
                            <tr >
                                <!-- Index -->
                                <td><?php echo $i++; ?></td>
                                <!-- Product  name -->
                                <td><a href="single-item.html"><?php echo $items['name']; ?></a></td>
                                <!-- Product image -->
                                <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                    <td><a href="single-item.html"><img src="<?php echo base_url(); ?>upload/<?php echo $option_value; ?>" alt="" class="img-responsive"/></a></td>
                                <?php endforeach; ?>
                                <!-- Quantity with refresh and remove button -->
                                <td >


                                    <div class="input-group">
                                        <input type="text" class="form-control"  placeholder="1" name="quantity" value="<?php echo $items['qty']; ?>">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info use-address" id="<?php echo $items['rowid']; ?>" type="button"><i class="icon-refresh"></i></button>
                                            <button class="btn btn-danger deleteItem" id="<?php echo $items['rowid']; ?>" type="button"><i class="icon-remove"></i></button>
                                        </span>
                                    </div>
                                </td>
                                <!-- Unit price -->
                                <td class="unit"> <?php echo $items['price']; ?></td>
                                <!-- Total cost -->
                                <td class="grand">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th id="fulltotal">$<?php echo $this->cart->format_number($this->cart->total()); ?></th>
                        </tr>
                    </tbody>
                </table>

                <div class="sep-bor"></div>




                <!-- Button s-->
                <div class="row">
                    <div class="span4 offset8">
                        <div class="pull-right">
                            <a href="index.html" class="btn btn-info">Continue Shopping</a>
                            <a href="checkout.html" class="btn btn-danger">CheckOut</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="sep-bor"></div>
    </div>
</div>

</div></div>    
<?php
$this->load->view('footer');
?>