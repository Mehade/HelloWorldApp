<?php
$this->load->view('admin/header');
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">

            <div class="col-lg-1"></div>

            <?php
            $attributes = array('class' => 'form-horizontal', 'id' => 'stockInfoForm', 'role' => 'form');
            echo form_open('stock/search_item_view', $attributes);
            ?>
            <aside class="profile-info col-lg-10">
                <section class="panel">
                    <div class="bio-graph-heading">
                        Search Stock Itmes 
                    </div>
                    <div class="panel-body bio-graph-info">                        
                        <h1> Stock Information</h1>

                        <div class="form-group">
                            <div class="col-lg-3" style="margin-left: 40px;">
                                <input type="radio" name="radio"  value="category"/> Search By Category
                            </div>

                            <div class="col-lg-6">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select a Category</option>
                                    <?php
                                    $categoryList = kanakata_category_list();
                                    foreach ($categoryList as $list) {
                                        echo '<option value=' . $list->category_id . '> ' . $list->category_name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3" style="margin-left: 40px;">
                                <input type="radio" name="radio"  value="item"/> Search By Name
                            </div>

                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="item_name" value="" id="item_name" placeholder="Search by items name ">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-info" style="margin-left: 120px;">Search</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </div>
                </section> 
            </aside>


            <?php
            echo form_close();
            ?>
            <div class="col-lg-1"></div>
        </div>


        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <section class="panel-primary">
                    <header class="panel-heading">
                        View/Search Items
                    </header>
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                            <tr>
                                <th><i class="icon-bookmark"></i> Name</th>
                                <th><i class="icon-bookmark"></i> Unit Price</th>
                                <th><i class="icon-picture"></i> Image</th>
                                <th><i class="icon-list"></i> Category Name</th>
                                <th><i class="icon-tags"></i> Present Quantity</th>
                                <th><i class="icon-edit"></i> New Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $this->load->helper('html');
                            if (isset($ItemViewList)) {
                                $sn = 1;
                                foreach ($ItemViewList as $aList) {

                                    $image_properties = array(
                                        'src' => 'upload/' . $aList->image,
                                        'alt' => 'Me, demonstrating how to eat 4 slices of pizza at one time',
                                        'class' => 'post_images',
                                        'width' => '100',
                                        'height' => '100',
                                        'title' => 'That was quite a night',
                                        'rel' => 'lightbox',
                                    );
                                    ?>
                                    <tr>
                                        <td class="hidden-phone"><?php echo $aList->name; ?></td>
                                        <td class="hidden-phone"><?php echo $aList->price; ?></td>
                                        <td class="hidden-phone"><?php echo img($image_properties); ?></td>
                                        <td class="hidden-phone"><?php echo $aList->catName; ?></td>
                                        <td class="hidden-phone"><?php echo $aList->qty; ?></td>
                                        <td>

                                            <?php
                                            $attribute = array(
                                                'role' => 'form',
                                                'id' => 'viewSearchItem'
                                            );
                                            echo form_open('stock/updateStock', $attribute);
                                            ?>

                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="nqty" value="" id="nqty" placeholder="Add Quantity">
                                                <input type="hidden" name="prductId" value="<?php echo $aList->item_id; ?>">
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <input type="submit" class="btn btn-info" value="Add"/>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </td>
                                    </tr> 
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </section>                

            </div>
            <div class="col-lg-1"></div>
        </div>
        <!-- page end-->            

    </section>
</section>
<!--main content end-->

<?php
$this->load->view('admin/footer');
?>
