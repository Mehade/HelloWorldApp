<?php
$this->load->view('admin/header');
?>



<script>
    $(document).ready(function() {
        $("#munna tbody tr").click(function() {
            var id = $(this).attr('id');
            $.ajax(
                    {
                        type: "POST",
                        url: "<?php echo base_url(); ?>order/getdataFromOrder",
                        data: "id=" + id,
                        success: function(data)
                        {
                            $("#orderId").val(data.msg.id);
                            $("#orderNumber").val(data.msg.order_number);
                            $("#itemQty").val(data.msg.qty);
                            $("#orderDate").val(data.msg.date);
                            $("#orderUser").val(data.msg.user_id);
                            $("#orderChangeStatus").val(data.msg.delivery_status);
                            $("#shippingAdd").val(data.msg.shipping_address);
                            $("#billingAdd").val(data.msg.billing_address);



                            var mySelect = $('#popUpform tbody');
                            $('#popUpform tbody tr').remove();
                            $.each(data.info, function(v, k) {
                                mySelect.append("<tr><td>" + k.name + "</td><td>" + k.price + "</td><td>" + k.quantity + "</td><td>" + k.subtotal + "</td></tr>");
                            });


                        }, dataType: 'json'
                    });
            $("#myModal").modal('show');
        });
        $("#updateProfile").submit(function(e) {

            e.preventDefault();
            $.ajax(
                    {
                        type: "POST",
                        url: "<?php echo base_url(); ?>order/updateStatus",
                        data: $("#updateProfile").serialize(),
                        success: function(data)
                        {
                            alert(data.msg);
                            $("#myModal").modal('hide');

                        }, dataType: 'json'
                    });

        });

    });
</script>


<section id="main-content">
    <section class="wrapper">



        <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">View Order Details and Change Status</h4>
                    </div>
                    <div class="modal-body">

                        <section class="panel">

                            <div class="panel-body">
                                <div class=" form">
                                    <?php
                                    $attributes = array('class' => 'form-horizontal', 'id' => 'updateProfile', 'role' => 'form');
                                    echo form_open('order/updateStatus', $attributes);
                                    ?>


                                    <div class="row">

                                        <div class="col-lg-6">


                                            <div class="form-group ">
                                                <label for="orderNumber" class="control-label col-lg-3">Number</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control " id="orderNumber" type="text" name="orderNumber"/>
                                                    <input class="form-control " id="orderId" type="hidden" name="orderId"/>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="itemQty" class="control-label col-lg-3">Quantity</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control " id="itemQty" type="text" name="itemQty"/>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="orderDate" class="control-label col-lg-3">Date</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control " id="orderDate" type="text" name="orderDate"/>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="orderUser" class="control-label col-lg-4">Order By</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control " id="orderUser" type="text" name="orderUser"/>
                                                </div>
                                            </div>                                            
                                            <div class="form-group ">
                                                <label for="shippingAdd" class="control-label col-lg-4">Delivery Address</label>
                                                <div class="col-lg-8">
                                                    <textarea class="form-control" rows="3" cols="20" id="shippingAdd"></textarea>                    
                                                </div>
                                            </div>


                                        </div>

                                        <div class="col-lg-6">
                                            <section class="panel">

                                                <div class="form-group ">
                                                    <label for="billingAdd" class="control-label col-lg-4">Payment Address</label>
                                                    <div class="col-lg-8">
                                                        <textarea class="form-control" rows="3" cols="20" id="billingAdd"></textarea>                    
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="orderChangeStatus" class="control-label col-lg-4">Change Status</label>
                                                    <div class="col-lg-8">
                                                        <select class="form-control" name="orderChangeStatus" id="orderChangeStatus">
                                                            <option value="1">Pending </option>
                                                            <option value="2">Delivered </option>
                                                            <option value="0">Cancelled </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-lg-offset-3 col-lg-10">
                                                        <input style="margin-left: 24px;" class="btn btn-success" name="submit"value="Save" type="submit">
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-striped table-advance table-hover" id="popUpform">
                                                <thead>
                                                    <tr>
                                                        <th><i class="icon-bookmark"></i> Item Name</th>
                                                        <th><i class="icon-bookmark"></i> Unit Price</th>
                                                        <th><i class="icon-bookmark"></i> Quantity</th> 
                                                        <th><i class="icon-bookmark"></i> Sub Total</th>                                              
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                </div>



                                <?php
                                echo form_close();
                                ?>


                            </div>
                        </section>
                    </div>


                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                    </div>

                </div>

            </div>            

        </div>




        <?php
        $attributes = array('class' => 'form-horizontal', 'id' => 'view_order_details_form', 'role' => 'form');
        echo form_open('order/search_orders', $attributes);
        ?>

        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <section class="panel-primary">
                    <header class="panel-heading">
                        View Orders
                    </header>
                    <section class="panel-body">

                        <div class="form-group">                                               
                            <label class="checkbox-inline">
                                <input id="radio-01" type="radio"  value="1" name="radio">
                                Pending
                            </label>
                            <label class="checkbox-inline">
                                <input id="radio-01" type="radio" " value="2" name="radio">
                                Delivered
                            </label>
                            <label class="checkbox-inline">
                                <input name="radio" id="radio-03" value="0" type="radio" />
                                Cancelled
                            </label>
                            <label class="checkbox-inline">
                                <button type="submit" class="btn btn-info"><i class="icon-search"> Search</i></button>
                            </label>

                        </div>                        
                    </section>
                </section>   
            </div>
            <div class="col-lg-2"></div>


        </div>


        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <section class="panel-primary">
                    <header class="panel-heading">
                        Show All Order
                    </header>
                    <table class="table table-striped table-advance table-hover" id="munna">
                        <thead>
                            <tr>
                                <th><i class="icon-bullhorn"></i> Order Number</th>
                                <th><i class="icon-bookmark"></i> Item Quantity</th>
                                <th><i class="icon-bookmark"></i> Date</th> 
                                <th><i class="icon-bookmark"></i> Order By</th> 
                                <th><i class="icon-bookmark"></i> Shipping Address</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($orderViewList as $aList) {
                                ?>
                                <tr id="<?php echo $aList->id ?>">                               
                                    <td><?php echo $aList->number; ?></td>
                                    <td><?php echo $aList->qty; ?></td>
                                    <td><?php echo $aList->date; ?></td>
                                    <td><?php echo $aList->user; ?></td>
                                    <td><?php echo $aList->address; ?></td>                               
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>

                    <div class="text-center">
                        <div class="pagination pagination-lg">
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>

                </section>
            </div>
            <div class="col-lg-2"></div>            

        </div>
        <?php echo form_close(); ?>




    </section>
</section>






<?php
$this->load->view('admin/footer');
?>
