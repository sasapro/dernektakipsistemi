<?php foreach($persons AS $person){ ?>
<tr>
	<td><?php print $person['name']; ?></td>
	<td><?php print $person['surname']; ?></td>
	<td></td>
	<td><a href="<?php print site_url(); ?>kisi/detay/<?php print $person['pid']; ?>">Detay</a></td>
</tr>
<?php } ?>