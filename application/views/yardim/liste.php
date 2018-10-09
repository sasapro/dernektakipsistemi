<?php foreach($donations AS $donation){ ?>
<tr>
    <td><input type="checkbox" name="selected[]" value="<?php echo $donation["did"];?>"></td>
	<td><?php print $donation['donation_date']; ?></td>
	<td><?php print $donation['donor']; ?></td>
    <td><?php print $donation['description']; ?></td>
	<td><a onclick="donationUpdateForm(<?php print $donation['did']; ?>)" data-toggle="modal" data-target="#duzenle"><i class="fas fa-edit"></i> Düzenle</a> </td>
</tr>
<?php } ?>