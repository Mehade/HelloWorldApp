<?php
$this->load->view('admin/header');
?>


<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">

            <div class="col-lg-2"></div>

            <?php
            $attributes = array('class' => 'form-horizontal', 'id' => 'viewSearchItemsForm', 'role' => 'form');
            echo form_open('item/search_view', $attributes);
            ?>
            <aside class="profile-info col-lg-8">
                <section class="panel">
                    <div class="bio-graph-heading">
                        Create Categories for KENAKATA online shopping center
                    </div>
                    <div class="panel-body bio-graph-info">
                        <?php
                        if ($this->session->flashdata('user_insert_msg')) {
                            echo '<div class="alert alert-block alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-ok-sign"></i></button><strong>SUCCESS! </strong>' . $this->session->flashdata('user_insert_msg') . '</div>';
                        }
                        ?>
                        <h1> Category Information</h1>

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
                                <input type="radio" name="radio"  value="itemName"/> Search By Name
                            </div>

                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="item_name" value="" id="item_name" placeholder="Search by items name ">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-info" style="margin-left: 105px;">Search</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </div>
                </section> 
            </aside>


            <?php
            echo form_close();
            ?>
            <div class="col-lg-2"></div>
        </div>


        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            foreach ($ItemViewList as $aItemView) {
                                ?>
                                <tr>
                                    <td class="hidden-phone"><?php echo $aItemView->name; ?></td>
                                    <td class="hidden-phone"><?php echo $aItemView->price; ?></td>
                                    <td class="hidden-phone"><img src="<?php echo base_url() . "upload/" . $aItemView->image; ?>"/></td>
                                    <td class="hidden-phone"><?php echo $aItemView->catName; ?></td>  
                                </tr> 
                            <?php } ?>
                        </tbody>
                    </table>
                </section>

                <div class="text-center">

                    <?php echo $this->pagination->create_links(); ?>

                </div>

            </div>
            <div class="col-lg-2"></div>
        </div>
        <!-- page end-->            

    </section>
</section>
<!--main content end-->


<?php
$this->load->view('admin/footer');
?>