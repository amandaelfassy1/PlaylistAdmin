<?php
require('models/Album.php');
require('models/Artist.php');

if($_GET['action'] == 'list'){
    $albums = getAllAlbums();
    require('views/albumList.php');
}
elseif($_GET['action'] == 'new'){
    $artists = getAllArtists();
    require('views/albumForm.php');
}
elseif($_GET['action'] == 'add'){

    if(empty($_POST['name']) || empty($_POST['artist_id'])){

        if(empty($_POST['name'])){
            $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
        }
        if(empty($_POST['artist_id'])){
            $_SESSION['messages'][] = 'Le champ artiste est obligatoire !';
        }

        $_SESSION['old_inputs'] = $_POST;
        header('Location:index.php?controller=albums&action=new');
        exit;
    }
    else{
        $resultAdd = addAlbum($_POST);
        if($resultAdd){
            $_SESSION['messages'][] = 'Album enregistré !';
        }
        else{
            $_SESSION['messages'][] = "Erreur lors de l'enregistreent de l'album... :(";
        }
        header('Location:index.php?controller=albums&action=list');
        exit;
    }
}

elseif($_GET['action'] == 'edit'){

    if(!empty($_POST))

        if(empty($_POST['name']) || empty($_POST['artist_id'])){

            if(empty($_POST['name'])){
                $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
            }
            if(empty($_POST['label_id'])){
                $_SESSION['messages'][] = 'Le champ artist est obligatoire !';
            }

            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=albums&action=edit&id='.$_GET['id']);
            exit;
        }
        else{

            $result = updateAlbum($_GET['id'], $_POST);
            if($result){
                $_SESSION['messages'][] = 'Album mis à jour !';
            }
            else{
                $_SESSION['messages'][] = 'Erreur lors de la mise à jour... :(';
            }
            header('Location:index.php?controller=albums&action=list');
            exit;
        }
    else{
        if(!isset($_SESSION['old_inputs'])){
            $album = getAlbum($_GET['id']);
        }
        $artists = getAllArtists();
        require('views/albumForm.php');
    }



}
elseif($_GET['action'] == 'delete'){
    if(isset($_GET['id'])){
        $result = deleteAlbum(   $_GET['id']    );
        header('Location:index.php?controller=albums&action=list');

    }
    else{
        header('Location:index.php?controller=albums&action=list');
        exit;
    }
}