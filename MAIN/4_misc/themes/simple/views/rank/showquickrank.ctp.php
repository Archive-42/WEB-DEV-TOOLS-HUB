<?php echo showSectionHead($spTextTools['Quick Rank Checker']); ?>
<form id='search_form'>
<table width="60%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>				
		<th><?php echo $spText['common']['Website']?>: </th>
		<td>
			<textarea name="website_urls" cols="50" rows="8"></textarea>
		</td>
	</tr>
	<tr>
		<th>&nbsp;</th>
		<td style="padding-left: 9px;">
			<?php $actFun = SP_DEMO ? "alertDemoMsg()" : "scriptDoLoadPost('rank.php', 'search_form', 'subcontent', '&sec=quickrank')"; ?>
			<a href="javascript:void(0);" onclick="<?php echo $actFun?>" class="actionbut"><?php echo $spText['button']['Proceed']?></a>
		</td>
	</tr>
</table>
</form>
<div id='subcontent'>
	<p class='note'><?php echo $spTextRank['enterurlproceed']?></p>
	<?php
	// check MOZ api setup
	echo SettingsController::showCheckCategorySettings('moz', false);
	?>
</div>