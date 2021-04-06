<form name="listform" id="listform" onsubmit="return false;">
<?php echo showSectionHead($spTextPanel['Search Engine Manager']); ?>
<table width="88%" border="0" cellspacing="0" cellpadding="0" class="search">
	<?php $submitLink = "scriptDoLoadPost('searchengine.php', 'listform', 'content')";?>
	<tr>
		<th><?php echo $spText['common']['Search Engine']?>: </th>
		<td width="100px">
			<input type="text" name="se_name" value="<?php echo htmlentities($info['se_name'], ENT_QUOTES)?>">
		</td>
		<th><?php echo $spText['common']['Status']?>: </th>
		<td width="100px">
			<select name="stscheck">
				<?php foreach($statusList as $key => $val){?>
					<?php if($info['stscheck'] == $val){?>
						<option value="<?php echo $val?>" selected><?php echo $key?></option>
					<?php }else{?>
						<option value="<?php echo $val?>"><?php echo $key?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
		<td style="text-align: center;">
			<a href="javascript:void(0);" onclick="<?php echo $submitLink; ?>" class="actionbut">
				<?php echo $spText['button']['Search']?>
			</a>
		</td>
	</tr>
</table>
<br>
<?php echo $pagingDiv?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="leftid"><input type="checkbox" id="checkall" onclick="checkList('checkall')"></td>
		<td><?php echo $spText['common']['Id']?></td>
		<td><?php echo $spText['common']['Name']?></td>
		<td><?php echo $spTextSE['no_of_results_page']?></td>
		<td><?php echo $spTextSE['max_results']?></td>
		<td><?php echo $spText['common']['Status']?></td>
		<td class="right"><?php echo $spText['common']['Action']?></td>
	</tr>
	<?php
	$colCount = 7; 
	if(count($seList) > 0){
		$catCount = count($seList);
		foreach($seList as $i => $seInfo){
			$class = ($i % 2) ? "blue_row" : "white_row";
            if($catCount == ($i + 1)){
                $leftBotClass = "tab_left_bot";
                $rightBotClass = "tab_right_bot";
            }else{
                $leftBotClass = "td_left_border td_br_right";
                $rightBotClass = "td_br_right";
            }
			?>
			<tr class="<?php echo $class?>">				
				<td class="<?php echo $leftBotClass?>"><input type="checkbox" name="ids[]" value="<?php echo $seInfo['id']?>"></td>
				<td class="td_br_right"><?php echo $seInfo['id']?></td>
				<td class="td_br_right left"><?php echo $seInfo['domain']?></td>
				<td class="td_br_right"><?php echo $seInfo['no_of_results_page']?></td>
				<td class="td_br_right"><?php echo $seInfo['max_results']?></td>
				<td class="td_br_right"><?php echo $seInfo['status'] ? $spText['common']["Active"] : $spText['common']["Inactive"];	?></td>
				<td class="<?php echo $rightBotClass?>" width="100px">
					<?php
						if($seInfo['status']){
							$statVal = "Inactivate";
							$statLabel = $spText['common']["Inactivate"];
						}else{
							$statVal = "Activate";
							$statLabel = $spText['common']["Activate"];
						} 
					?>
					<select name="action" id="action<?php echo $seInfo['id']?>" onchange="doAction('<?php echo $pageScriptPath?>', 'content', 'seId=<?php echo $seInfo['id']?>&pageno=<?php echo $pageNo?>', 'action<?php echo $seInfo['id']?>')">
						<option value="select">-- <?php echo $spText['common']['Select']?> --</option>
						<option value="<?php echo $statVal?>"><?php echo $statLabel?></option>
						<option value="delete"><?php echo $spText['common']['Delete']?></option>
					</select>
				</td>
			</tr>
			<?php
		}
	}else{	 
		echo showNoRecordsList($colCount-2);		
	} 
	?>
	<tr class="listBot">
		<td class="left" colspan="<?php echo ($colCount-1)?>"></td>
		<td class="right"></td>
	</tr>
</table>
<?php
if (SP_DEMO) {
    $actFun = $inactFun = $delFun = "alertDemoMsg()";
} else {
    $actFun = "confirmSubmit('searchengine.php', 'listform', 'content', '&sec=activateall&pageno=$pageNo')";
    $inactFun = "confirmSubmit('searchengine.php', 'listform', 'content', '&sec=inactivateall&pageno=$pageNo')";
    $delFun = "confirmSubmit('searchengine.php', 'listform', 'content', '&sec=deleteall&pageno=$pageNo')";
}   
?>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;">
         	<a onclick="<?php echo $actFun?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['common']["Activate"]?>
         	</a>&nbsp;&nbsp;
         	<a onclick="<?php echo $inactFun?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['common']["Inactivate"]?>
         	</a>&nbsp;&nbsp;
         	<a onclick="<?php echo $delFun?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['common']['Delete']?>
         	</a>
    	</td>
	</tr>
</table>
</form>