
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
        <h3>ici la liste complète des Labels : </h3>
    </div>
    <div>
        <table>
            <?php foreach($labels as $label): ?>
                <tr>
                    <th><?=  htmlspecialchars($label['name']) ?></th>
                    <th><a href="index.php?controller=labels&action=delete&id=<?= $label['id'] ?>"> supprimer</a></th>
                    <th><a href="index.php?controller=labels&action=edit&id=<?= $label['id'] ?>">modifier</a></th>
                </tr>
            <?php endforeach; ?>
        </table>
        <button><a href="index.php?controller=labels&action=new"> Ajouter un label</a></button><br><br>
    </div>
</div>