<?php
$this->load->view('header');
?>

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

                          <div class="item-image">
                              <img src="<?php echo base_url()."upload/". $alist->item_image; ?>" alt="" class="img-responsive" height="400" width="400" />
                          </div>
                              

                        </div>
                        <div class="col-md-5 col-xs-7">
                          <!-- Title -->
                            <h4><?php echo $alist->item_name; ?></h4>
                            <h5><strong>Price : <?php echo $alist->item_unit_price." TK"; ?></strong></h5>
                            <p><strong>Availability</strong> : In Stock</p><br />
                                 

                                    
                                     <!-- Quantity and add to cart button -->
                                    <?php echo form_open('cart/add_to_cart'); ?>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="1" name="quantity">
                                        <input type="hidden" class="form-control"  name="item_id" value="<?php echo $alist->item_id; ?>">
                                        <input type="hidden" class="form-control"  name="item_image" value="<?php echo $alist->item_image ; ?>">
                                        <input type="hidden" class="form-control" name="item_name" value="<?php echo $alist->item_name; ?>">
                                        <input type="hidden" class="form-control"  name="item_price" value="<?php echo $alist->item_unit_price; ?>">
                                       <span class="input-group-btn">
                                           <button class="btn btn-info" type="submit">Add</button>
                                       </span>
                                     </div><!-- /input-group -->

                                    <!-- Add to wish list -->
                                    <a href="wishlist.html">+ Add to Wish List</a>

                                    <!-- Share button -->
                            
                        </div>
                      </div>
                    </div>

            <br />
                    
                    <!-- Description, specs and review -->

                    <ul id="myTab" class="nav nav-tabs">
                      <!-- Use uniqe name for "href" in below anchor tags -->
                      <li class="active"><a href="#tab1" data-toggle="tab">Description</a></li>
                      <li><a href="#tab2" data-toggle="tab">Specs</a></li>
                      <li><a href="#tab3" data-toggle="tab">Review (5)</a></li>
                    </ul>

                    <!-- Tab Content -->
                    <div id="myTabContent" class="tab-content">
                      <!-- Description -->
                      <div class="tab-pane fade in active" id="tab1">
                        <h5><strong>Apple iPhone 5G</strong></h5>
                        <p>Nulla facilisi. Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Morbi auctor adipiscing tempor. Phasellus condimentum rutrum aliquet. Quisque eu consectetur erat. Proin rutrum, erat eget posuere semper, <em>arcu mauris posuere tortor</em>, in commodo enim magna id massa. Suspendisse potenti. Aliquam erat volutpat. Maecenas quis tristique turpis. Nulla facilisi. Duis sed velit at <a href="#">magna sollicitudin cursus</a> ac ultrices magna. Aliquam consequat, purus vitae auctor ullamcorper, sem velit convallis quam, a pharetra justo nunc et mauris. Vivamus diam diam, fermentum sed dapibus eget, egestas sed eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <h6><strong>Features</strong></h6>
                        <ul>
                        <li>Etiam adipiscing posuere justo, nec iaculis justo dictum non</li>
                        <li>Cras tincidunt mi non arcu hendrerit eleifend</li>
                        <li>Aenean ullamcorper justo tincidunt justo aliquet et lobortis diam faucibus</li>
                        <li>Maecenas hendrerit neque id ante dictum mattis</li>
                        <li>Vivamus non neque lacus, et cursus tortor</li>
                        </ul>
                      </div>

                      <!-- Sepcs -->
                      <div class="tab-pane fade" id="tab2">
                        
                        <h5><strong>Product Specs:</strong></h5>
                        <table class="table table-striped">
                          <tbody>
                            <tr>
                              <td><strong>Name</strong></td>
                              <td>Apple iPhone 5G</td>
                            </tr>
                            <tr>
                              <td><strong>Brand</strong></td>
                              <td>Apple</td>
                            </tr>
                            <tr>
                              <td><strong>Modal</strong></td>
                              <td>Fifth Generation</td>
                            </tr>
                            <tr>
                              <td><strong>Memory</strong></td>
                              <td>2GB RAM</td>
                            </tr>
                            <tr>
                              <td><strong>Storage</strong></td>
                              <td>16GB, 32GB, 64GB</td>
                            </tr>
                            <tr>
                              <td><strong>Camera</strong></td>
                              <td>Front VGA, Read 8MP</td>
                            </tr>
                            <tr>
                              <td><strong>Processor</strong></td>
                              <td>Apple 1.25GHz Processor</td>
                            </tr>
                            <tr>
                              <td><strong>Battery</strong></td>
                              <td>30 Hours Standby</td>
                            </tr>                                                                                                
                          </tbody>
                        </table>

                      </div>

                      <!-- Review -->
                      <div class="tab-pane fade" id="tab3">
                        <h5><strong>Product Reviews :</strong></h5>
                        <hr />
                        <div class="item-review">
                          <h5>Ravi Kumar - <span class="color">4/5</span></h5>
                          <p class="rmeta">27/1/2012</p>
                          <p>Suspendisse potenti. Morbi ac felis nec mauris imperdiet fermentum. Aenean sodales augue ac lacus hendrerit sed rhoncus erat hendrerit. Vivamus vel ultricies elit. Curabitur lacinia nulla vel tellus elementum non mollis justo aliquam.</p>
                        </div>

                        <hr />
                        <h5><strong>Write a Review</strong></h5>
                        <hr />
                                              <form role="form">
                                               <div class="form-group">
                                                 <label for="name">Your Name</label>
                                                 <input type="text" class="form-control" id="name" placeholder="Enter Name">
                                               </div>                                    
                                               <div class="form-group">
                                                 <label for="exampleInputEmail1">Email address</label>
                                                 <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                               </div>
                                               <div class="form-group">
                                                   <label for="rating">Rating</label>
                                                   <!-- Dropdown menu -->
                                                   <select class="form-control">
                                                     <option>Rating</option>
                                                     <option>1</option>
                                                     <option>2</option>
                                                     <option>3</option>
                                                     <option>4</option>
                                                     <option>5</option>
                                                   </select>
                                                </div>
                                               <div class="form-group">
                                                 <label for="exampleInputEmail1">Review</label>
                                                 <textarea class="form-control" rows="3"></textarea>
                                               </div>  
                                               <button type="submit" class="btn btn-info">Send</button>
                                               <button type="reset" class="btn btn-default">Reset</button>
                                             </form>

                      </div>

                    </div>
               
               </div>
               
               <div class="col-md-3 col-md-pull-9">
                  <div class="sidey">
                     <ul class="nav">
                         <li><a href="index.html"><i class="icon-home"></i> &nbsp;Home</a>
                         <li><a href="#"><i class="icon-mobile-phone"></i> &nbsp;Smartphones</a>
                             <ul>
                                 <li><a href="items.html">Apple</a></li>
                                 <li><a href="items.html">Samsung</a></li>
                                 <li><a href="items.html">Motorola</a></li>
                                 <li><a href="items.html">Nokia</a></li>
                             </ul>
                         </li>
                         <li><a href="#"><i class="icon-laptop"></i> &nbsp;Laptops</a>
                             <ul>
                                 <li><a href="items.html">Apple</a></li>
                                 <li><a href="items.html">Samsung</a></li>
                                 <li><a href="items.html">Motorola</a></li>
                                 <li><a href="items.html">Nokia</a></li>
                             </ul>
                         </li>
                         <li><a href="#"><i class="icon-briefcase"></i> &nbsp;Office Items</a>
                             <ul>
                                 <li><a href="items.html">Apple</a></li>
                                 <li><a href="items.html">Samsung</a></li>
                                 <li><a href="items.html">Motorola</a></li>
                                 <li><a href="items.html">Nokia</a></li>
                             </ul>
                         </li>
                         <li><a href="#"><i class="icon-camera"></i> &nbsp;Camera</a>
                             <ul>
                                 <li><a href="items.html">Apple</a></li>
                                 <li><a href="items.html">Samsung</a></li>
                                 <li><a href="items.html">Motorola</a></li>
                                 <li><a href="items.html">Nokia</a></li>
                             </ul>
                         </li>
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