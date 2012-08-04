<div align="left">
	<ul class="tabs">
		<li><a id="a_title_1" onclick="SetCurrent(1);" class="current" href="#">Index</a></li>
		<li><a id="a_title_2" onclick="SetCurrent(2);" href="#">Logs</a></li>
		<li><a id="a_title_3" onclick="SetCurrent(3);" href="#">Server Information</a></li>
	</ul>
</div>
				
<div id="div_1">
	<table style="width:100%;">
		<tr>
			<td align="center"><a href="index.php?p=News"><img title="Edit news" src="images/icon/edit-icon.png"></a></td>
			<td align="center"><img title="Post messages" src="images/icon/floppy-icon.png"></td>
			<td align="center"><img title="Comments" src="images/icon/fav-b-add-icon.png"></td>
			<td align="center"><img title="Categories" src="images/icon/documents-or-copy-icon.png"></td>
		</tr>
		<tr>
			<td align="center"><a href="index.php?p=News">Edit news</a></td>
			<td align="center">
			<a href="postmgr.php">Archive</a></td>
			<td align="center"><a href="comment.php">Comments</a></td>
			<td align="center"><a href="cat.php">Categories</a></td>
		</tr>
		<tr>
			<td align="center" style="height: 8px"></td>
			<td align="center" style="height: 8px"></td>
			<td align="center" style="height: 8px"></td>
			<td align="center" style="height: 8px"></td>
		</tr>
				<tr>
			<td align="center"><img title="Links" longdesc="manage links" src="images/icon/web-search-icon.png"></td>
			<td align="center"><img title="Blocks" longdesc="blocks" src="images/icon/window-b-icon.png"></td>
			<td align="center"><img title="Additional pages" longdesc="Additional pages" src="images/icon/documents-or-copy-icon.png"></td>
			<td align="center"><img title="Members" longdesc="members" src="images/icon/group-of-users-icon.png"></td>
		</tr>

		<tr>
			<td align="center"><a href="simplelink.php">Links</a></td>
			<td align="center"><a href="block.php">Blocks</a></td>
			<td align="center"><a href="extra.php">Additional pages</a></td>
			<td align="center"><a href="member.php">Members</a></td>
		</tr>
		<tr>
			<td align="center" style="height: 8px"></td>
			<td align="center" style="height: 8px"></td>
			<td align="center" style="height: 8px"></td>
			<td align="center" style="height: 8px"></td>
		</tr>
				<tr>
			<td align="center"><img title="Messages" longdesc="messages" src="images/icon/mail-send-icon.png"></td>
			<td align="center"><img title="File explorer" longdesc="file explorer" src="images/icon/folder-open-icon.png"></td>
			<td align="center"><img title="Banned" longdesc="banned" src="images/icon/delete-user-icon.png"></td>
			<td align="center"><img title="Newsletter" longdesc="newsletter" src="images/icon/fav-add-icon.png"></td>
		</tr>

		<tr>
			<td align="center"><a href="inbox.php">Messages</a></td>
			<td align="center"><a href="uc.php">File explorer</a></td>
			<td align="center"><a href="banned.php">Banned</a></td>
			<td align="center"><a href="newsletter.php">Newsletter</a></td>
		</tr>
		<tr>
			<td align="center" style="height: 8px"></td>
			<td align="center" style="height: 8px"></td>
			<td align="center" style="height: 8px"></td>
			<td align="center" style="height: 8px"></td>
		</tr>
				<tr>
			<td align="center"><img title="Options" longdesc="Setting" src="images/icon/window-icon.png"></td>
			<td align="center"><img title="Theme" longdesc="Template" src="images/icon/paint-icon.png"></td>
			<td align="center"><img title="Backup" longdesc="backup" src="images/icon/refresh-icon.png"></td>
			<td align="center"><img title="Update" longdesc="update" src="images/icon/wizard-icon.png"></td>
		</tr>

		<tr>
			<td align="center"><a href="setting.php">Setting</a></td>
			<td align="center"><a href="template.php">Template</a></td>
			<td align="center"><a href="backup.php">Backup</a></td>
			<td align="center"><a href="update.php">Update</a></td>
		</tr>
		<tr>
			<td align="center" style="height: 8px"></td>
			<td align="center" style="height: 8px"></td>
			<td align="center" style="height: 8px"></td>
			<td align="center" style="height: 8px"></td>
		</tr>

		<tr>
			<td align="center"><a href="ymsgr:sendim?westehran"><img title="Support" src="images/icon/help-icon.png"></a></td>
			<td align="center"></td>
			<td align="center"><a href="<?php echo HOMEPAGE; ?>" target="_blank"><img title="View website" src="images/icon/web-icon.png"></a></td>
			<td align="center"><a href="?action=logout"><img title="Log-out" src="images/icon/close-icon.png"></a></td>
		</tr>

		<tr>
			<td align="center"><a href="ymsgr:sendim?trafian_ir">Support</a></td>
			<td align="center"></td>
			<td align="center"><a href="<?php echo HOMEPAGE; ?>" target="_blank">View website</a></td>
			<td align="center"><a href="?action=logout">Log-out</a></td>
		</tr>

	</table>
</div>
<div id="div_2" style="display:none;">
    <table id="member" border="1" cellpadding="3"> 
        <tr>
            <td><b>Log ID</b></td>
            <td><b>Admin</b></td>
            <td><b>Log info</b></td> 
            <td><b>Date / Time</b></td>
            <td><b>Delete</b></td>
        </tr>
    <?php
    
    $sql = mysql_query("SELECT * FROM ".TB_PREFIX."admin_log ORDER BY id DESC LIMIT 10");
    $query = count($sql);
        if($query>0){
            while($row = mysql_fetch_array($sql)){
                $admid = $row['user'];
                $user = $database->getUserField($admid,"username",0);
                if($user == 'Multihunter') {
                    $admin = '<b>Control Panel</b>';
                } else {
                    $admin = '<a href="admin.php?p=player&uid='.$admid.'">'.$user.'</a>';
                }
                echo '
                <tr id="log'.$row['id'].'">
                    <td>'.$row['id'].'</td>
                    <td>'.$admin.'</td>
                    <td>'.$row['log'].'</td>
                    <td>'. date("d.m.Y H:i:s",$row['time']+3600*2).'</td>
                    <td><a onclick="dellog('.$row['id'].')" href="javascript:void(0)"><img border="0" src="../img/admin/delete.png"></a></td>
                </tr>
                ';
            }
        }
    ?>
    </table>
</div>
<div id="div_3" style="display:none;">
	<?php
    $tribe1 = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE tribe = 1 and id>3");
    $tribe2 = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE tribe = 2 and id>3");
    $tribe3 = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE tribe = 3 and id>3");
    $tribes = array(mysql_num_rows($tribe1),mysql_num_rows($tribe2),mysql_num_rows($tribe3));
    $users = mysql_num_rows(mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id>3"));
    $actives = mysql_num_rows(mysql_query("SELECT * FROM ".TB_PREFIX."active"));
    $onlines = mysql_num_rows(mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE ".time()." - timestamp < 300"));
    $banned = mysql_num_rows(mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE access = 0"));
    $villages = mysql_num_rows(mysql_query("SELECT * FROM ".TB_PREFIX."vdata"));
    $alliances = mysql_num_rows(mysql_query("SELECT * FROM ".TB_PREFIX."alidata"));
    $adventures = mysql_num_rows(mysql_query("SELECT * FROM ".TB_PREFIX."adventure"));
    $auctions = mysql_num_rows(mysql_query("SELECT * FROM ".TB_PREFIX."auction WHERE finish = 0"));
    $notices = mysql_num_rows(mysql_query("SELECT * FROM ".TB_PREFIX."ndata"));
    $movements = mysql_num_rows(mysql_query("SELECT * FROM ".TB_PREFIX."movement WHERE proc = 0"));
    $allvillages = mysql_num_rows(mysql_query("SELECT * FROM ".TB_PREFIX."wdata WHERE oasistype = 0"));
    $alloasis = mysql_num_rows(mysql_query("SELECT * FROM ".TB_PREFIX."wdata WHERE fieldtype = 0"));
    $occoasis = mysql_num_rows(mysql_query("SELECT * FROM ".TB_PREFIX."wdata WHERE fieldtype = 0 and occupied!=0"));
    ?><br />
    <table id="server_info" width="170" border="1" bgcolor="#E5E5E5" cellpadding="2">
            <tbody>
                <tr>
                    <td align="center" colspan="2"><b>Server information</b><br /><br /></td>
                </tr>
                <tr>
                    <td>Players registered:</td>
                    <td><?php echo $users; ?></td>
                </tr>
                <tr>
                    <td>Players active:</td>
                    <td><?php echo $actives; ?></td>
                </tr>
                <tr>
                    <td>Players online:</td>
                    <td><?php echo $onlines; ?></td>
                </tr>
                <tr>
                    <td>Banned players:</td>
                    <td><?php echo $banned; ?></td>
                </tr>
                <tr>
                    <td>Alliances:</td>
                    <td><?php echo $alliances; ?></td>
                </tr>
                <tr>
                    <td>Adventures:</td>
                    <td><?php echo $adventures; ?></td>
                </tr>
                <tr>
                    <td>Auctions:</td>
                    <td><?php echo $auctions; ?></td>
                </tr>
                <tr>
                    <td>Reports:</td>
                    <td><?php echo $notices; ?></td>
                </tr>
                <tr>
                    <td>Movements:</td>
                    <td><?php echo $movements; ?></td>
                </tr>
            </tbody>
    </table>
    <br /><br />
    <div style="margin-left:200px;margin-top:-234px;">
    <table id="server_info" width="170" border="1" bgcolor="#E5E5E5" cellpadding="2">
        <thead align="center">
            <tr>
                <td colspan="3" align="center"><b>Game info</b><br><br></td>
            </tr>
            <tr>
                <td><b>Rank</b></td>
                <td><b>Total</b></td>
                <td><b>Percent</b></td>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td>Romans:</td>
                <td><?php echo $tribes[0]; ?></td>
                <td><?php $percents = 100*($tribes[0] / $users); echo round($percents,1); ?>%</td>
            </tr>
            <tr>
                <td>Teutons:</td>
                <td><?php echo $tribes[1]; ?></td>
                <td><?php $percents = 100*($tribes[1] / $users); echo round($percents,1); ?>%</td>
            </tr>
            <tr>
                <td width="60">Gauls:</td>
                <td width="20"><?php echo $tribes[2]; ?></td>
                <td><?php $percents = 100*($tribes[2] / $users); echo round($percents,1); ?>%</td>
            </tr>
        </tbody>
    </table>
    </div>
    
    <div style="margin-left:400px;margin-top:-110px;">
    <table id="server_info" width="170" border="1" bgcolor="#E5E5E5" cellpadding="2">
        <thead align="center">
            <tr>
                <td colspan="2" align="center"><b>Map information</b><br><br></td>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td>Empty villages:</td>
                <td><?php echo $allvillages; ?></td>
            </tr>
            <tr>
                <td>Captive villages:</td>
                <td><?php echo $villages; ?></td>
            </tr>
            <tr>
                <td>Entire oasis:</td>
                <td><?php echo $alloasis; ?></td>
            </tr>
            <tr>
                <td>Populated oasis:</td>
                <td><?php echo $occoasis; ?></td>
            </tr>
            <tr>
                <td>Maximum world map:</td>
                <td><?php echo WORLD_MAX."x".WORLD_MAX; ?></td>
            </tr>
        </tbody>
    </table>
    </div>
</div>