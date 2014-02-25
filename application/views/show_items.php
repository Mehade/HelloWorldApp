<?php
$this->load->view('header');
?>


<!-- Page title -->
<div class="page-title">
    <div class="container">
        <h2><i class="icon-desktop color"></i> <?php echo $catName->category_name; ?></h2>
        <hr />
    </div>
</div>
<!-- Page title -->


<!-- Page content -->

<div class="shop-items">
    <div class="container">

        <div class="row">

            <div class="col-md-9 col-md-push-3">


                <!-- Items List starts -->

                <div class="row">
                    <?php
                    foreach ($itemlist as $aitem) {

                        $attribute = array(
                            'id' => 'addCartForm',
                            'role' => 'form'
                        );
                        echo form_open('cart/add_to_cart', $attribute)
                        ?>

                        <!-- Item #1 -->
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="item">

                                <input type="hidden" name="item_id" value="<?php echo $aitem->item_id; ?>"/>
                                <input type="hidden" name="quantity" value="1"/>
                                <input type="hidden" name="item_name" value="<?php echo $aitem->item_name; ?>"/>
                                <input type="hidden" name="item_image" value="<?php echo $aitem->item_image; ?>"/>


                                <!-- Item image -->
                                <div class="item-image">
                                    <a href="<?php echo base_url() ?>item/detailsOfAnItem/<?php echo $aitem->item_id; ?>"><img src="<?php echo base_url() . "upload/" . $aitem->item_image; ?>" alt="" class="img-responsive"/></a>
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
                                    <div class="item-price pull-left" style="width: 100px;"><?php echo $aitem->item_unit_price . " TK"; ?></div>
                                    <!-- Add to cart -->                                    
                                    <div class="pull-right"><input type="submit" class="btn btn-danger btn-sm" value="Add to Cart"/></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <?php
                        echo form_close();
                    }
                    ?>                  


                </div>

                <!-- Items List ends -->


                <div class="row">
                    <div class="col-md-12 text-center">
                        <!-- Pagination -->
                        <ul class="pagination">
                            <?php echo $this->pagination->create_links();  ?>
                        </ul> 
                    </div>
                </div>

            </div>


            <div class="col-md-3 col-md-pull-9">
                <div class="sidey">
                    <ul class="nav">
                        <li><a href="index.html"><i class="icon-home"></i> &nbsp;Category</a></li>
                        <?php $categoryList = kanakata_category_list(); ?>
                        <?php
                        foreach ($categoryList as $aCategory) {
                            echo '<li>';
                            echo '<a href=' . base_url() . "item/show/" . $aCategory->category_id . '/>';
                            echo '&nbsp;' . $aCategory->category_name;
                            echo '</a>';
                            echo '</li>';
                        }
                        ?>



                    </ul>
                </div>

                <!-- Sidebar items (featured items)-->

                <div class="sidebar-items">

                    <h5>Featured Items</h5>

                    <!-- Item #1 -->
                    <div class="sitem">
                        <div class="onethree-left">
                            <!-- Image -->
                            <a href="single-item.html"><img src="img/items/2.png" alt="" class="img-responsive"/></a>
                        </div>
                        <div class="onethree-right">
                            <!-- Title -->
                            <a href="single-item.html">HTC One V</a>
                            <!-- Para -->
                            <p>Aenean ullamcorper justo tincidunt justo aliquet.</p>
                            <!-- Price -->
                            <p class="bold">$199</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="sitem">
                        <div class="onethree-left">
                            <a href="single-item.html"><img src="img/items/3.png" alt="" class="img-responsive"/></a>
                        </div>
                        <div class="onethree-right">
                            <a href="single-item.html">Sony One V</a>
                            <p>Aenean ullamcorper justo tincidunt justo aliquet.</p>
                            <p class="bold">$399</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="sitem">
                        <div class="onethree-left">
                            <a href="single-item.html"><img src="img/items/4.png" alt="" class="img-responsive"/></a>
                        </div>
                        <div class="onethree-right">
                            <a href="single-item.html">Nokia One V</a>
                            <p>Aenean ullamcorper justo tincidunt justo aliquet.</p>
                            <p class="bold">$159</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="sitem">
                        <div class="onethree-left">
                            <a href="single-item.html"><img src="img/items/5.png" alt="" class="img-responsive"/></a>
                        </div>
                        <div class="onethree-right">
                            <a href="single-item.html">Samsung One V</a>
                            <p>Aenean ullamcorper justo tincidunt justo aliquet.</p>
                            <p class="bold">$299</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="sep-bor"></div>
    </div>
</div>


<?php
$this->load->view('footer');
?>
