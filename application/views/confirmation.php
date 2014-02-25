<?php
$this->load->view('header');
?>


<!-- Page title -->
<div class="page-title">
    <div class="container">
        <h2><i class="icon-shopping-cart color"></i> We received payment Successfully...</h2>
        <hr />
        <h5>Thanks for buying from Kenakata!!!</h5>
        <h5>Your Order #id is <span class="color"><?php echo $this->session->userdata('order_number'); ?></span>. Use this for further communication.</h5>
        <div class="sep-bor"></div>
</div>
<!-- Page title -->


<?php
$this->load->view('footer');
?>
