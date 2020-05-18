<?php

require('models/Song.php');
require('models/Artist.php');
require('models/Album.php');

if ($_GET['action'] == 'list') {
    $songs = getAllSongs();
    require('views/songList.php');
} elseif ($_GET['action'] == 'new') {
    $albums = getAllAlbums();
    $artists = getAllArtists();
    require('views/songForm.php');
} elseif ($_GET['action'] == 'add') {

    if (empty($_POST['title']) || empty($_POST['album_id'])) {

        if (empty($_POST['title'])) {
            $_SESSION['messages'][] = 'Le champ titre est obligatoire !';
        }
        if (empty($_POST['album_id'])) {
            $_SESSION['messages'][] = 'Le champ album est obligatoire !';
        }

        $_SESSION['old_inputs'] = $_POST;
        header('Location:index.php?controller=songs&action=new');
        exit;
    } else {
        $resultAdd = add($_POST);
        if ($resultAdd) {
            $_SESSION['messages'][] = 'Chanson enregistré !';
        } else {
            $_SESSION['messages'][] = "Erreur lors de l'enregistrement de la chanson... :(";
        }
        header('Location:index.php?controller=songs&action=list');
        exit;
    }
} elseif ($_GET['action'] == 'edit') {

    if (!empty($_POST))

        if (empty($_POST['title']) || empty($_POST['album_id'])) {

            if (empty($_POST['title'])) {
                $_SESSION['messages'][] = 'Le champ titre est obligatoire !';
            }
            if (empty($_POST['album_id'])) {
                $_SESSION['messages'][] = 'Le champ album est obligatoire !';
            }

            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=songs&action=edit&id=' . $_GET['id']);
            exit;
        } else {

            $result = update($_GET['id'], $_POST);
            if ($result) {
                $_SESSION['messages'][] = 'Chanson mise à jour !';
            } else {
                $_SESSION['messages'][] = 'Erreur lors de la mise à jour... :(';
            }
            header('Location:index.php?controller=songs&action=list');
            exit;
        }
    else {
        if (!isset($_SESSION['old_inputs'])) {
            $song = getSong($_GET['id']);
        }
        $albums = getAllAlbums();
        $artists = getAllArtists();

        require('views/songForm.php');
    }
} elseif ($_GET['action'] == 'delete') {
    if (isset($_GET['id'])) {
        $result = delete($_GET['id']);
        header('Location:index.php?controller=songs&action=list');

    } else {
        header('Location:index.php?controller=songs&action=list');
        exit;
    }
}