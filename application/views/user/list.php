<?php foreach($users AS $user){ ?>
<tr>
    <td><input type="checkbox" name="selected[]" value="<?php echo $user["uid"];?>"></td>
	<td><?php print $user['username']; ?></td>
    <td><?php print $user['name'].' '.$user['surname']; ?></td>
	<td><?php print $user['mail']; ?></td>
    <td><?php print $user['rid']; ?></td>
	<td><a onclick="updateForm(<?php print $user['uid']; ?>)" data-toggle="modal" data-target="#duzenle"><i class="fas fa-edit"></i> Düzenle</a> </td>
</tr>
<?php } ?>