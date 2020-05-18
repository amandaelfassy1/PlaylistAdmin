
<?php require ('partials/header.php'); ?>
<?php require 'partials/head_assets.php'; ?>

<?php require ('partials/menu.php'); ?>

<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <?= $message ?><br>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<div class="content">
    <div>
        <h3>ici la liste complète des artistes : </h3>
    </div>
    <div>
        <table>
            <?php foreach($artists as $artist): ?>
                <tr>
                    <th><?=  htmlspecialchars($artist['name']) ?> </th>
                    <th><a href="index.php?controller=artists&action=delete&id=<?= $artist['id'] ?>"> Supprimer</a></th>
                    <th><a href="index.php?controller=artists&action=edit&id=<?= $artist['id'] ?>"> Modifier</a></th>
                </tr>
            <?php endforeach; ?>
        </table>
        <button><a href="index.php?controller=artists&action=new"> Ajouter un artiste</a></button><br><br>
    </div>
</div>

