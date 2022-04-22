<div class="copy-w3-agileits">
    <p>©<?php echo date("Y"); ?> SDIT ISLAM TERPADU AL-FATIH. All Rights Reserved</p>
    <div class="clearfix"></div>
</div>
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script src="js/main.js"></script>
<script src="js/responsiveslides.min.js"></script>
<script>
	$(function () {
	$("#slider4").responsiveSlides({
        auto: true,
        pager: true,
        nav: true,
        speed: 1000,
        namespace: "callbacks",
        before: function () { $('.events').append("<li>before event fired.</li>"); },
        after: function () { $('.events').append("<li>after event fired.</li>"); }}); });
</script>
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
<script src="js/easyResponsiveTabs.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
    $('#parentVerticalTab').easyResponsiveTabs({
        type: 'vertical', //Types: default, vertical, accordion
        width: 'auto', //auto or any width like 600px
        fit: true, // 100% fit in a container
        closed: 'accordion', // Start closed if in accordion view
        tabidentify: 'hor_1', // The tab groups identifier
        activate: function (event) { // Callback function if tab is switched
            var $tab = $(this);
            var $info = $('#nested-tabInfo2');
            var $name = $('span', $info);
                $name.text($tab.text());
				$info.show();
            }
        });
    });
</script>
<script src="js/datatables/jquery.dataTables.min.js"></script>
<script src="js/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
        });
    });
</script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
    $(".scroll").click(function (event) {
        event.preventDefault();
    $('html,body').animate({
        scrollTop: $(this.hash).offset().top
        }, 900);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
    $().UItoTop({ easingType: 'easeOutQuart' }); });
</script>
    <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>