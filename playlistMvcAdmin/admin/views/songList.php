
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
        <h3>ici la liste complète des chansons : </h3>
    </div>
    <div>
        <table>
            <?php foreach($songs as $song): ?>
                <tr>
                    <th><?=  htmlspecialchars($song['title']) ?></th>
                    <th><a href="index.php?controller=songs&action=delete&id=<?= $song['id'] ?>"> supprimer</a></th>
                    <th><a href="index.php?controller=songs&action=edit&id=<?= $song['id'] ?>">modifier</a></th>
                </tr>
            <?php endforeach; ?>
        </table>
        <button><a href="index.php?controller=songs&action=new"> Ajouter une chanson</a></button><br><br>
    </div>
</div>