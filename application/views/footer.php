<!-- Recent posts CarouFredSel Starts -->

<div class="recent-posts blocky">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section title -->
                <div class="section-title">
                    <h4><i class="icon-thumbs-up color"></i> &nbsp;ITEMS WITH <strong>DISCOUNT</strong></h4>
                </div>    

                <div class="row">
                    <div class="col-md-12">
                        <div class="my_carousel">

                            <div class="carousel_nav pull-right">
                                <!-- Carousel navigation -->
                                <a class="prev" id="car_prev" href="#"><i class="icon-chevron-left"></i></a>
                                <a class="next" id="car_next" href="#"><i class="icon-chevron-right"></i></a>
                            </div>

                            <ul id="carousel_container">
                                <!-- Carousel item -->

                                <?php
                                $dis_items = kanakata_discount_list();
                                foreach ($dis_items as $aDiscount) {                                    
                                    ?>

                                    <li>  

                                        

                                        <a href="#"><img src="<?php echo base_url() . "upload/" . $aDiscount->item_image; ?>" alt="" class="img-responsive"/></a>
                                        <div class="carousel_caption">
                                            <h5><a href="#"><?php echo $aDiscount->item_name; ?></a></h5>
                                            <p>Something about the product goes here. Not More than 2 lines.</p>
                                            <a href="#" class="btn btn-info btn-sm"><i class="icon-shopping-cart"></i> <?php echo $aDiscount->disprice . " TK"; ?></a>
                                            <input type="hidden" name="item_price" value="<?php echo $aDiscount->disprice; ?>"/>
                                        </div>
                                    </li>
                                <?php                                    
                                }
                                ?>

                                <li>
                                    <a href="#"><img src="img/items/7.png" alt="" class="img-responsive"/></a>
                                    <div class="carousel_caption">
                                        <h5><a href="#">Praesent estsum etium</a></h5>
                                        <p>Something about the product goes here. Not More than 2 lines.</p>
                                        <a href="#" class="btn btn-info btn-sm"><i class="icon-shopping-cart"></i> Buy for $199</a>
                                    </div>
                                </li>
                                <li>
                                    <a href="#"><img src="img/items/7.png" alt="" class="img-responsive"/></a>
                                    <div class="carousel_caption">
                                        <h5><a href="#">Praesent estsum etium</a></h5>
                                        <p>Something about the product goes here. Not More than 2 lines.</p>
                                        <a href="#" class="btn btn-info btn-sm"><i class="icon-shopping-cart"></i> Buy for $199</a>
                                    </div>
                                </li>
                                <li>
                                    <a href="#"><img src="img/items/7.png" alt="" class="img-responsive"/></a>
                                    <div class="carousel_caption">
                                        <h5><a href="#">Praesent estsum etium</a></h5>
                                        <p>Something about the product goes here. Not More than 2 lines.</p>
                                        <a href="#" class="btn btn-info btn-sm"><i class="icon-shopping-cart"></i> Buy for $199</a>
                                    </div>
                                </li>
                                <li>
                                    <a href="#"><img src="img/items/7.png" alt="" class="img-responsive"/></a>
                                    <div class="carousel_caption">
                                        <h5><a href="#">Praesent estsum etium</a></h5>
                                        <p>Something about the product goes here. Not More than 2 lines.</p>
                                        <a href="#" class="btn btn-info btn-sm"><i class="icon-shopping-cart"></i> Buy for $199</a>
                                    </div>
                                </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent posts Ends -->


</div>


<!-- Footer starts -->
<footer>
    <div class="container">

        <div class="row">

            <div class="col-md-4 col-sm-4">
                <div class="fwidget">

                    <h4>Find us on<span class="color"> </span> Below Links</h4>
                    <hr />                            

                    <div class="social">
                        <a href="#" class="facebook"><i class="icon-facebook"></i></a>
                        <a href="#" class="twitter"><i class="icon-twitter"></i></a>
                        <a href="#" class="google-plus"><i class="icon-google-plus"></i></a>
                        <a href="#" class="linkedin"><i class="icon-linkedin"></i></a>
                        <a href="#" class="pinterest"><i class="icon-pinterest"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="fwidget">
                    <h4>About US</h4>
                    <hr />
                    <ul>
                        <li>Kenakata is a online shopping source/center</li>
                        <li>where you can buy some sort of necessary things,</li>
                        <li>and we also provide you the best service for </li>
                        <li>shipping facilities. So owned your best product</li>
                        <li>from here and make life easier.</li>
                    </ul>
                </div>
            </div>        



            <div class="col-md-4 col-sm-4">
                <div class="fwidget">

                    <h4>Get In Touch</h4>
                    <hr />
                    <div class="address">
                        <p><i class="icon-home color contact-icon"></i> Rimjhim, 2nd floor, </p>
                        <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 13A/7A Babor road,</p>
                        <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Mohammadpur Dhaka, Bangladesh</p>
                        <p><i class="icon-phone color contact-icon"></i> +8801790129179</p>
                        <p><i class="icon-envelope color contact-icon"></i> <a href="mailto:info@nerdcastlebd.com">info@nerdcastlebd.com</a></p>
                    </div>

                </div>
            </div>

        </div>



        <hr />

        <div class="copy text-center">
            Copyright 2013 &copy; - <a href="http://www.nerdcastlebd.com/" target="_blank">Nerd Castle</a>
        </div>
    </div>
</footer>
<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 

<!-- Javascript files -->
<!-- jQuery -->

<!-- Bootstrap JS -->
<script src="<?php echo base_url(); ?>main/js/bootstrap.min.js"></script>
<!-- Dropdown menu -->
<script src="<?php echo base_url(); ?>main/js/ddlevelsmenu.js"></script>      
<!-- CaroFredSel -->
<script src="<?php echo base_url(); ?>main/js/jquery.carouFredSel-6.2.1-packed.js"></script> 
<!-- Countdown -->
<script src="<?php echo base_url(); ?>main/js/jquery.countdown.min.js"></script>    
<!-- jQuery Navco -->
<script src="<?php echo base_url(); ?>main/js/jquery.navgoco.min.js"></script>
<!-- Filter for support page -->
<script src="<?php echo base_url(); ?>main/js/filter.js"></script>         
<!-- Respond JS for IE8 -->
<script src="<?php echo base_url(); ?>main/js/respond.min.js"></script>
<!-- HTML5 Support for IE -->
<script src="<?php echo base_url(); ?>main/js/html5shiv.js"></script>
<!-- Custom JS -->
<script src="<?php echo base_url(); ?>main/js/custom.js"></script>
</body>	
</html>