<?php
require('models/Label.php');

if($_GET['action'] == 'list'){
    $labels = getAllLabels();
    require('views/labelList.php');
}
elseif($_GET['action'] == 'new'){
    $labels = getAllLabels();
    require('views/labelForm.php');
}
elseif($_GET['action'] == 'add'){

    if(empty($_POST['name'])){

        if(empty($_POST['name'])){
            $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
        }

        $_SESSION['old_inputs'] = $_POST;
        header('Location:index.php?controller=labels&action=new');
        exit;
    }
    else{
        $resultAdd = addLabel($_POST);
        if($resultAdd){
            $_SESSION['messages'][] = 'Label enregistré !';
        }
        else{
            $_SESSION['messages'][] = "Erreur lors de l'enregistrement du label... :(";
        }
        header('Location:index.php?controller=labels&action=list');
        exit;
    }
}

elseif($_GET['action'] == 'edit'){

    if(!empty($_POST))

        if(empty($_POST['name'])){

            if(empty($_POST['name'])){
                $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
            }


            $_SESSION['old_inputs'] = $_POST;
            header('Location:index.php?controller=labels&action=edit&id='.$_GET['id']);
            exit;
        }
        else{

            $result = updateLabel($_GET['id'], $_POST);
            if($result){
                $_SESSION['messages'][] = 'Label mis à jour !';
            }
            else{
                $_SESSION['messages'][] = 'Erreur lors de la mise à jour... :(';
            }
            header('Location:index.php?controller=labels&action=list');
            exit;
        }
    else{
        if(!isset($_SESSION['old_inputs'])){
            $label = getLabel($_GET['id']);
        }
        require('views/labelForm.php');


    }
}
elseif($_GET['action'] == 'delete'){
    if(isset($_GET['id'])){
        $result = deleteLabel(   $_GET['id']    );
        header('Location:index.php?controller=labels&action=list');

    }
    else{
        header('Location:index.php?controller=labels&action=list');
        exit;
    }
}