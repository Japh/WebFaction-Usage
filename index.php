<?php
include_once( 'config.php' );
include_once( 'class-wf-memory-usage.php' );

$mem = new WF_Memory_Usage('memdata.csv');
$mem->set_base( PLAN_MEMORY_LIMIT );

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Memory Usage</title>
</head>

<body>
<h2>Memory Usage</h2>
<p><img src="http://chart.apis.google.com/chart?cht=lc&chd=t:<?php echo $mem->get_recent_string(); ?>&chs=550x400&chxt=y,r&chxr=0,<?php echo $mem->min; ?>,<?php 
echo $mem->max; ?>|1,<?php echo $mem->min; ?>,<?php echo $mem->max; ?>&chds=<?php echo $mem->min; ?>,<?php echo $mem->max; ?>&chm=r,FF0000,0,<?php echo $mem->base; ?>,<?php echo 
$mem->base+0.005; ?>" /></p>
</body>
</html>
