

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
        <h3>ici la liste complète des albums : </h3>
    </div>
    <div>
        <table>
            <?php foreach($albums as $album): ?>
                <tr>
                    <th><?=  htmlspecialchars($album['name']) ?></th>
                    <th><a href="index.php?controller=albums&action=delete&id=<?= $album['id'] ?>"> supprimer</a></th>
                    <th><a href="index.php?controller=albums&action=edit&id=<?= $album['id'] ?>">modifier</a></th>
                </tr>
            <?php endforeach; ?>
        </table>
        <button> <a href="index.php?controller=albums&action=new"> Ajouter un album</a></button>
    </div>
</div>