<?php echo showSectionHead($spTextTools['Graphical Reports']); ?>
<form id='search_form'>
<table class="search">
	<tr>
		<th><?php echo $spText['common']['Website']?>: </th>
		<td>
			<select name="website_id" id="website_id" onchange="doLoad('website_id', 'analytics.php', 'source_area', 'sec=source_box')">
				<?php foreach($websiteList as $websiteInfo){?>
					<?php if($websiteInfo['id'] == $websiteId){?>
						<option value="<?php echo $websiteInfo['id']?>" selected><?php echo $websiteInfo['name']?></option>
					<?php }else{?>
						<option value="<?php echo $websiteInfo['id']?>"><?php echo $websiteInfo['name']?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
		<th><?php echo $spText['common']['Period']?>:</th>
		<td>
			<input type="text" value="<?php echo $fromTime?>" name="from_time"/> 
			<input type="text" value="<?php echo $toTime?>" name="to_time"/>
			<script type="text/javascript">
			$(function() {
				$( "input[name='from_time'], input[name='to_time']").datepicker({dateFormat: "yy-mm-dd"});
			});
		  	</script>
		</td>
	</tr>
	<tr>
		<th><?php echo $spText['common']['Source']?>: </th>
		<td id="source_area">
			<?php echo $this->render('analytics/source_select_box', 'ajax'); ?>
		</td>
		<th><?php echo $spText['label']['Report Type']?>: </th>
		<td>
			<select name="attr_type">
				<option value="">-- <?php echo $spText['common']['Select']?> --</option>
				<?php foreach($colList as $key => $label){?>
					<?php if($key == $searchInfo['attr_type']){?>
						<option value="<?php echo $key?>" selected><?php echo $label?></option>
					<?php }else{?>
						<option value="<?php echo $key?>"><?php echo $label?></option>
					<?php }?>
				<?php }?>
			</select>
			<a href="javascript:void(0);" onclick="scriptDoLoadPost('analytics.php', 'search_form', 'content', '&sec=viewAnalyticsGraphReports')" class="actionbut"><?php echo $spText['button']['Show Records']?></a>
		</td>
	</tr>
</table>
</form>

<div id='subcontent'>
	<?php echo $graphContent; ?>
</div>