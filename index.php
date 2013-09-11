<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Memory Usage</title>
</head>

<body>
<h2>Memory Usage</h2>
<?php
$md = file_get_contents('memdata.csv');
$md = preg_replace('/(\s+|\n)/', '', $md);
$md = explode(',', $md);
array_shift($md);

$md = array_slice($md, -48);

$max = 0;
$min = 0;
foreach ($md as $v) {
	if ($v > $max) {
		$max = $v;
	}
}
$base = 0;
if ($max > 0) {
	$base = (122880 / $max) * 1;
	$base = round($base, 2);
}
?>
<p><img src="http://chart.apis.google.com/chart?cht=lc&chd=t:<?php echo implode(',', $md); ?>&chs=550x400&chxt=y,r&chxr=0,<?php echo $min; ?>,<?php 
echo $max; ?>|1,<?php echo $min; ?>,<?php echo $max; ?>&chds=<?php echo $min; ?>,<?php echo $max; ?>&chm=r,FF0000,0,<?php echo $base; ?>,<?php echo 
$base+0.005; ?>" /></p>
</body>
</html>

