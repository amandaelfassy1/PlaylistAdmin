ici nom du label

nom du label: <?= $label['name']?>
<br><br>

Liste des artistes liés au label:<br><br>

<?php foreach ($artists as $artist):?>
 <?= $artist['name'];?><br>
<?php endforeach; ?>




