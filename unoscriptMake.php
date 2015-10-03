<?php
if (!isset($_SESSION['cmsuno'])) exit();
?>
<?php
if(file_exists('data/'.$Ubusy.'/unoscript.json'))
	{
	$q1 = file_get_contents('data/'.$Ubusy.'/unoscript.json');
	$a1 = json_decode($q1,true);
	$Ufoot .= '<script type="text/javascript">'."\r\n".stripslashes($a1['tex'])."\r\n".'</script>'."\r\n";
	}
?>
