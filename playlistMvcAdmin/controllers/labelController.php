<?php
require ('models/Label.php');
require ('models/Artist.php');

if(isset($_GET['id'])){

    $label = getLabels($_GET['id']);

    if($label == false){
        header('Location:index.php');
        exit;
    }

    $artists = getArtists($_GET['id']);
    include('views/label.php');
}

else{

}