
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
    <h2>Chansons </h2>
    <form action="index.php?controller=songs&action=<?= isset($song) || (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-25">
                <label for="title">Titre :</label>
            </div>
            <div class="col-75">
                <input  type="text" name="title" id="title" value="<?= isset($_SESSION[
                    'old_inputs']) ? $_SESSION['old_inputs']['title'] : '' ?><?= isset($song) ? $song['title']:''?>"
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="artist_id">Artiste :</label>
            </div>
            <div class="col-75">
                <select name ="artist_id" id ="artist_id">
                    <?php
                    foreach ($artists as $artist):?>
                        <option value ="<?= $artist['id'];?>"<?php if(isset($song)&& $song['artist_id']==
                        $artist['id']):?>selected="selected"<?php endif;?>><?= $artist['name'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="album_id">Album :</label>
            </div>
            <div class="col-75">
                <select name ="album_id" id ="album_id">
                    <?php
                    foreach ($albums as $album):?>
                        <option value ="<?= $album['id'];?>"<?php if(isset($song)&& $song['album_id']==
                        $album['id']):?>selected="selected"<?php endif;?>><?= $album['name'];?></option>
                    <?php endforeach;?>
                </select>
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


