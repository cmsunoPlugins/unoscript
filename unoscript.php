<?php
session_start(); 
if(!isset($_POST['unox']) || $_POST['unox']!=$_SESSION['unox']) {sleep(2);exit;} // appel depuis uno.php
?>
<?php
include('../../config.php');
include('lang/lang.php');
$busy = (isset($_POST['ubusy'])?preg_replace("/[^A-Za-z0-9-_]/",'',$_POST['ubusy']):'index');
if(!file_exists('../../data/'.$busy.'/unoscript.json')) file_put_contents('../../data/'.$busy.'/unoscript.json', '{}');
// ********************* actions *************************************************************************
if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		// ********************************************************************************************
		case 'plugin': ?>
		<div class="blocForm">
			<h2><?php echo T_("Uno Script");?></h2>
			<p>
			<?php echo T_("This plugin allows you to add a script on the site without modifying the template.");?>
			<?php echo T_("You can use it to add the Google Analytics tracking code.");?>
			<?php echo T_("You can use this form to insert any JavaScript code.");?>
			</p>
			<p><?php echo T_("The code will be installed at the bottom of the page, in the end of /body/.");?></p>
			<table class="hForm">
				<tr>
					<td><label><?php echo T_("Uno Script");?></label></td>
					<td><textarea name="scri" id="scri" style="width:100%;"></textarea></td>
					<td><em><?php echo T_("Paste the code");?>&nbsp;<span style='text-decoration:underline;'><?php echo T_("without");?></span>&nbsp;<?php echo T_("script tags.");?></em></td>
				</tr>
			</table>
			<div class="bouton fr" onClick="f_save_unoscript();" title="<?php echo T_("Save settings");?>"><?php echo T_("Save");?></div>
			<div class="clear"></div>
		</div>
		<?php break;
		// ********************************************************************************************
		case 'save':
		$a = array();
		$a['tex'] = $_POST['s'];
		$out = json_encode($a);
		if (file_put_contents('../../data/'.$busy.'/unoscript.json', $out)) echo T_('Backup performed');
		else echo '!'.T_('Impossible backup');
		break;
		// ********************************************************************************************
	}
	clearstatcache();
	exit;
}
?>
