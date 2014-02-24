<?php
$this->load->view('admin/header');
?>


<section id="main-content">
    <section class="wrapper">
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
                    <table class="table table-striped table-advance table-hover">
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
