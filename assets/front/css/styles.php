<?php
header("Content-type: text/css; charset: UTF-8");
if(isset($_GET['color']))
{
  $color = '#'.$_GET['color'];
}
else {
  $color = '#FF9900';
}
?>


.footer-flex .prt-view {
  background: <?php echo $color?>;
}

.lp-content-right .lp-property-view {
  background: <?php echo $color?>;
}

.property-listing.property-1 .listing-detail-btn .more-btn {
  border: 1px solid <?php echo $color?> !important;
  background: <?php echo $color?> !important;
}
