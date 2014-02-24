
<script src="<?php echo base_url(); ?>public/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="<?php echo base_url(); ?>public/js/owl.carousel.js" ></script>
<script src="<?php echo base_url(); ?>public/js/jquery.customSelect.min.js" ></script>

<!--common script for all pages-->
<script src="<?php echo base_url(); ?>public/js/common-scripts.js"></script>

<!--script for this page-->
<script src="<?php echo base_url(); ?>public/js/sparkline-chart.js"></script>
<script src="<?php echo base_url(); ?>public/js/easy-pie-chart.js"></script>



<script>

    //owl carousel

    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

        });
    });

    //custom select box

    $(function() {
        $('select.styled').customSelect();
    });

</script>

</body>
</html>

