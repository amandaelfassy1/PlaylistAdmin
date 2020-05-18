<?php
require('models/Artist.php');
require('models/Label.php');

if($_GET['action'] == 'list'){
    $artists = getAllArtists();
    require('views/artistList.php');
}
elseif($_GET['action'] == 'new'){
    $labels = getAllLabels();
    require('views/artistForm.php');
}
elseif($_GET['action'] == 'add'){

    if(empty($_POST['name']) || empty($_POST['label_id'])){

        if(empty($_POST['name'])){
            $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
        }
        if(empty($_POST['label_id'])){
            $_SESSION['messages'][] = 'Le champ label est obligatoire !';
        }

        $_SESSION['old_inputs'] = $_POST;
        header('Location:index.php?controller=artists&action=new');
        exit;
    }
    else{
        $resultAdd = addArtist($_POST);
        if($resultAdd){
            $_SESSION['messages'][] = 'Artiste enregistré !';
        }
        else{
            $_SESSION['messages'][] = "Erreur lors de l'enregistreent de l'artiste... :(";
        }
        header('Location:index.php?controller=artists&action=list');
        exit;
    }
}

elseif($_GET['action'] == 'edit'){

    if(!empty($_POST))

        if(empty($_POST['name']) || empty($_POST['label_id'])){

            if(empty($_POST['name'])){
                $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
            }
            if(empty($_POST['label_id'])){
                $_SESSION['messages'][] = 'Le champ label est obligatoire !';
            }

            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=artists&action=edit&id='.$_GET['id']);
            exit;
        }
        else{

            $result = updateArtist($_GET['id'], $_POST);
            if($result){

                $_SESSION['messages'][] = 'Artiste mis à jour !';
            }
            else{
                $_SESSION['messages'][] = 'Erreur lors de la mise à jour... :(';
            }
            header('Location:index.php?controller=artists&action=list');
            exit;
        }
    else{
        if(!isset($_SESSION['old_inputs'])){
            $artist = getArtist($_GET['id']);
        }
        $labels = getAllLabels();
        require('views/artistForm.php');
    }
}
elseif($_GET['action'] == 'delete'){
    if(isset($_GET['id'])){
        $result = deleteArtist(   $_GET['id']    );
        header('Location:index.php?controller=artists&action=list');
        unlink ( $_GET['image']  );
    }
    else{
        header('Location:index.php?controller=artists&action=list');
        exit;
    }
}