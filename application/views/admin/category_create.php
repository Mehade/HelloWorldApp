<?php
$this->load->view('admin/header');
?>

<style>
    label.error{
        color: red;
        font-weight: bold;
    }
</style>
<script src="<?php echo base_url(); ?>public/js/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $("#categoryEntryForm").validate({
            rules: {
                category_name: "required"
            },
            messages: {
                category_name: "Please enter category name"
            }
        });

    });
</script>


<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            
            <div class="col-lg-2"></div>
            
            <?php
            $attributes = array('class' => 'form-horizontal', 'id' => 'categoryEntryForm', 'role' => 'form');
            echo form_open('category/insert_category', $attributes);
            ?>
            <aside class="profile-info col-lg-8">
                <section class="panel">
                    <div class="bio-graph-heading">
                        Create Categories for KENAKATA online shopping center
                    </div>
                    <div class="panel-body bio-graph-info">
                        <?php
                        if ($this->session->flashdata('msg')) {
                            echo '<div class="alert alert-block alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-ok-sign"></i></button><strong>SUCCESS! </strong>' . $this->session->flashdata('msg') . '</div>';
                        }
                        ?>
                        <h1> Category Information</h1>

                        <div class="form-group">
                            <label  for="category_name" class="col-lg-2 control-label">Category Name</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="category_name" value="" id="category_name" placeholder="Enter category name ">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-info" style="margin-left: 10px;">Save</button>
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
                        Show All Categories
                    </header>
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                            <tr>
                                <th><i class="icon-bullhorn"></i> SL</th>
                                <th><i class="icon-bookmark"></i> First Name</th>                                                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            foreach ($categoryList as $aCategory) {
                                ?>
                                <tr>
                                    <td class="hidden-phone"><?php echo $sn++; ?></td>
                                    <td class="hidden-phone"><?php echo $aCategory->category_name; ?></td>                                                                        
                                </tr> 
                            <?php } ?>
                        </tbody>
                    </table>
                </section>
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