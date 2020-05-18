
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

    <div class="container">
        <h2>Artistes </h2>
        <form action="index.php?controller=artists&action=<?= isset($artist) || (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-25">
                    <label for="name">Nom :</label>
                </div>
                <div class="col-75">
                    <input  type="text" name="name" id="name" value="<?= isset($_SESSION[
                        'old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($artist) ? $artist['name']:''?>"
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="label_id">Label :</label>
                </div>
                <div class="col-75">
                    <select name ="label_id" id ="label_id">
                        <?php
                        foreach ($labels as $label):?>
                            <option value ="<?= $label['id'];?>"<?php if(isset($artist)&& $artist['label_id']==
                            $label['id']):?>selected="selected"<?php endif;?>><?= $label['name'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="biography">Bio :</label>
                </div>
                <div class="col-75">
                    <textarea name="biography" id="biography"><?= isset($_SESSION[
                    'old_inputs']) ? $_SESSION['old_inputs']['biography'] : '' ?><?= isset($artist) ? $artist['biography']:''?>
                    </textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="image">image :</label>
                </div>
                <div class="col-75">
                    <input type="file" name="image" id="image" /><br>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Enregistrer">
            </div>
        </form>
    </div>
</div>
</body>
</html>


