<?php foreach($personGroups AS $personGroup){ ?>
<tr>
	<td><input type="checkbox" name="selected[]" value="<?php echo $personGroup["pgid"];?>"></td>
    <td><?php print $personGroup['name']; ?></td>
	<td><?php print $personGroup['oksuz']; ?></td>
    <td><?php print $personGroup['yetim']; ?></td>
	<td><a onclick="personGroupUpdateForm(<?php print $personGroup['pgid']; ?>)" data-toggle="modal" data-target="#duzenle"><i class="fas fa-edit"></i> Düzenle</a>  <a href="<?php print site_url(); ?>kisi?aile=<?php print $personGroup['pgid']; ?>" >
            <i class="fas fa-users"></i> Kişiler</a>
        <a href="<?php print site_url(); ?>yardim?aile=<?php print $personGroup['pgid']; ?>" >
            <i class="fas fa-hands-helping"></i> Yardımlar</a>

    </td>
</tr>
<?php } ?>