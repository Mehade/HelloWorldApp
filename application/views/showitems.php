<?php
$this->load->view('header');
?>



<div class="shop-items">
         <div class="container">

<div class="row">
    <div class="col-md-9 col-md-push-3">                
        <!--Pagination Start-->
        <div class="row">
            <?php  ?>
                <div class="col-md-6">
                    <h2><i class="icon-desktop color" style="padding-right: 10px;"></i><b><?php echo $aCategory->category_name; ?></b></h2>
                </div>

                <div class="col-md-6">
                    <!-- Pagination -->
                    <ul class="pagination" style="float: right;">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul> 
                </div>
            </div>


            <!--Pagination End-->


            <div class="col-md-3 col-md-pull-9">
                <div class="sidey">
                    <ul class="nav" >
                        <li><a href="index.html"><i class="icon-th-list"></i> &nbsp;Category</a>                        
                            <?php
                            foreach ($categoryList as $aCategory) {
                            echo '<li>';
                            echo '<a href=' . base_url() . "item/show/" . $aCategory->category_id . '/>';

                            echo '<i class="icon-ok"></i>';
                            echo '&nbsp;' . $aCategory->category_name;
                            echo '</a>';
                            echo '</li>';
                        }
                        ?>                            
                </ul>
            </div>
        </div>


        <div class="row">
            <?php
            foreach ($itemlist as $aitem) {

                $attribute = array(
                    'id' => 'addCartForm',
                    'role' => 'form'
                );
                echo form_open('cart/add_to_cart', $attribute)
                ?>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="item">
                        <input type="hidden" name="item_id" value="<?php echo $aitem->item_id; ?>"/>
                        <input type="hidden" name="quantity" value="1"/>
                        <input type="hidden" name="item_name" value="<?php echo $aitem->item_name; ?>"/>
                        <input type="hidden" name="item_image" value="<?php echo $aitem->item_image; ?>"/>

                        <!-- Item image -->
                        <div class="item-image">
                            <a href="<?php echo base_url() ?>item/detailsOfAnItem/<?php echo $aitem->item_id; ?>" ><img name="item_image" src="<?php echo base_url() . "upload/" . $aitem->item_image; ?>" alt="" class="img-responsive"/></a>
                        </div>
                        <!-- Item details -->
                        <div class="item-details">
                            <!-- Name -->
                            <h5><a href="<?php echo base_url() ?>item/detailsOfAnItem" name="item_name"><?php echo $aitem->item_name; ?></a></h5>
                            <div class="clearfix"></div>
                            <!-- Para. Note more than 2 lines. -->
                            <p>Something about the product goes here. Not More than 2 lines.</p>
                            <hr />
                            <!-- Price -->
                            <div class="item-price pull-left" style="width: 100%;"><?php echo $aitem->item_unit_price . " TK"; ?></div>
                            <input type="hidden" name="item_price" value="<?php echo $aitem->item_unit_price; ?>"/>
                            <!-- Add to cart -->
                            <button type="submit"><div class="item-price pull-left" style="width: 100%; background-color:#D9534F; border-color:#D43F3A; color:#FFFFFF;">Add to Cart</div></a></button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <?php
                echo form_close();
            }
            ?>                  
        </div>                                    

    </div>

</div>

<div class="sep-bor"></div>
</div>
</div>


<?php
$this->load->view('footer');
?>
