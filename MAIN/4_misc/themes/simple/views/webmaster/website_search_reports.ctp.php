<?php echo showSectionHead($spTextTools['Website Search Reports']); ?>
<form id='search_form'>
<table width="100%" class="search">
	<tr>
		<th><?php echo $spText['common']['Website']?>: </th>
		<td>
			<select name="website_id" id="website_id" style='width:190px;' onchange="scriptDoLoadPost('webmaster-tools.php', 'search_form', 'content', '&sec=viewWebsiteSearchReports')">
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
		<td colspan="2">
			<a href="javascript:void(0);" onclick="scriptDoLoadPost('webmaster-tools.php', 'search_form', 'content', '&sec=viewWebsiteSearchReports')" class="actionbut">
				<?php echo $spText['button']['Show Records']?>
			</a>
		</td>
	</tr>
</table>
</form>

<br><br>
<div id='subcontent'>
<table id="cust_tab">
	<tr>
		<th><?php echo $spText['common']['Date']?></th>
		<th><?php echo $spText['label']['Clicks']?></th>
		<th><?php echo $spText['label']['Impressions']?></th>
		<th><?php echo "CTR"?></th>
		<th><?php echo $spTextWB['Average Position']?></th>
	</tr>
	<?php
	foreach($list as $listInfo){
		?>
		<tr class="<?php echo $class?>">
			<td><?php echo $listInfo['report_date']; ?></td>
			<td><b><?php echo $listInfo['clicks'].'</b> '. $listInfo['rank_diff_clicks']?></td>
			<td><b><?php echo $listInfo['impressions'].'</b> '. $listInfo['rank_diff_impressions']?></td>
			<td><b><?php echo $listInfo['ctr'].'</b> '. $listInfo['rank_diff_ctr']?></td>
			<td><b><?php echo $listInfo['average_position'].'</b> '. $listInfo['rank_diff_average_position']?></td>
		</tr>
		<?php		
	} 
	?>
</table>
</div>