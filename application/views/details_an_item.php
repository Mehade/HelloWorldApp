<?php
$this->load->view('header');
?>


<script type="text/javascript" src="<?php echo base_url(); ?>main/js/jquery.elevatezoom.js"></script>
<script>

    $('#zoom_image').elevateZoom({
        zoomType: "inner",
        cursor: "crosshair",
        zoomWindowFadeIn: 500,
        zoomWindowFadeOut: 750
    });

</script>

<div class="row">

    <div class="col-md-9 col-md-push-3">

        <!-- Breadcrumb -->
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider"></span></li>
            <li><a href="items.html">Smartphone</a> <span class="divider"></span></li>
            <li class="active">Apple</li>
        </ul>

        <div class="single-item">
            <div class="row">
                <div class="col-md-4 col-xs-5">

                    <div class=""></div>
                    <div class="item-image" >
                        <img id="zoom_image" src="<?php echo base_url() . "upload/" . $alist->item_image; ?>" alt="" class="img-responsive" height="500" width="500" />
                    </div>


                </div>
                <div class="col-md-5 col-xs-7">
                    <!-- Title -->
                    <h4><?php echo $alist->item_name; ?></h4>
                    <h5><strong>Price : <?php echo $alist->item_unit_price . " TK"; ?></strong></h5>
                    <p><strong>Availability</strong> : <?php echo $alist->item_present_qty; ?></p><br />



                    <!-- Quantity and add to cart button -->
                    <?php echo form_open('cart/add_to_cart'); ?>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="1" name="quantity">
                        <input type="hidden" class="form-control"  name="item_id" value="<?php echo $alist->item_id; ?>">
                        <input type="hidden" class="form-control"  name="item_image" value="<?php echo $alist->item_image; ?>">
                        <input type="hidden" class="form-control" name="item_name" value="<?php echo $alist->item_name; ?>">
                        <input type="hidden" class="form-control"  name="item_price" value="<?php echo $alist->item_unit_price; ?>">
                        <span class="input-group-btn">
                            <button class="btn btn-info" type="submit">Add</button>
                        </span>
                    </div><!-- /input-group -->
                    <br/>
                    <div class="social">
                        <h4>Shear in</h4>
                        <a href="https://www.facebook.com/NerdCastle" class="facebook"><i class="icon-facebook"></i></a>
                        <a href="https://twitter.com/" class="twitter"><i class="icon-twitter"></i></a>                        
                    </div>
                    <!-- Share button -->

                </div>
            </div>
        </div>

        <br />

        <!-- Description, specs and review -->

        <ul id="myTab" class="nav nav-tabs">
            <!-- Use uniqe name for "href" in below anchor tags -->
            <li class="active"><a href="#tab1" data-toggle="tab">Description</a></li>            
        </ul>

        <!-- Tab Content -->
        <div id="myTabContent" class="tab-content">
            <!-- Description -->
            <div class="tab-pane fade in active" id="tab1">
                <h5><strong><?php echo $alist->item_name; ?></strong></h5>
                <p><?php echo $alist->item_description; ?></p>
            </div>


        </div>

    </div>

    <div class="col-md-3 col-md-pull-9">
        <div class="sidey">
            <ul class="nav">
                <li><a href="index.html"><i class="icon-home"></i> &nbsp;Category</a>
                    <?php $categoryList = kanakata_category_list(); ?>
                    <?php
                    foreach ($categoryList as $aCategory) {
                        echo '<li>';
                        echo '<a href=' . base_url() . "category/show/" . $aCategory->category_id . '/>';
                        echo '&nbsp;' . $aCategory->category_name;
                        echo '</a>';
                        echo '</li>';
                    }
                    ?>                               
            </ul>
        </div>

        <!-- Sidebar items (featured items)-->

    </div>
</div>

<div class="sep-bor"></div>
</div>
</div>



<?php
$this->load->view('footer');
?>
