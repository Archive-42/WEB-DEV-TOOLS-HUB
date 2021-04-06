<?php echo showSectionHead($spTextTools['Detailed Reports']); ?>
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
		<td colspan="2">
			<a href="javascript:void(0);" onclick="scriptDoLoadPost('analytics.php', 'search_form', 'content', '&sec=viewAnalyticsReports')" class="actionbut"><?php echo $spText['button']['Show Records']?></a>
		</td>
	</tr>
</table>
</form>

<?php
if(empty($sourceId)){
	?>
	<p class='note error'><?php echo $spText['common']['No Records Found']?>!</p>
	<?php
	exit;
}
?>
<br><br>
<div id='subcontent'>
<table id="cust_tab">	
	<tr>
		<th><?php echo $spText['common']['Date']?></th>
		<?php foreach ($metricColList as $colName => $colVal) {?>
			<th><?php echo $colVal?></th>
		<?php }?>
	</tr>
	<?php
	if (!empty($list)) {
    	foreach($list as $listInfo){            
    		?>
    		<tr>
    			<td><?php echo $listInfo['report_date']; ?></td>
    			<?php foreach ($metricColList as $colName => $colVal) {?>
    				<td><?php echo $listInfo[$colName].'</b> '. $listInfo['rank_diff_' . $colName]?></td>
    			<?php }?>
    		</tr>
    		<?php	
    	}
	} else {
	    ?>
	    <tr><td colspan="7"><b><?php echo $_SESSION['text']['common']['No Records Found']?></b></tr>
	    <?php
	}
	?>
</table>
</div>