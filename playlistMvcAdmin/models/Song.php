<?php
function getSongs($SongId = false){

    $db = dbConnect();
    if($SongId != false){
        $query = $db->prepare('SELECT * FROM songs WHERE id = ?');
        $query->execute([$SongId]);
        $selectedSongs = $query->fetchAll();
    }
    else{
        $query = $db->query('SELECT * FROM songs ');
        $selectedSongs = $query->fetchAll();
    }
    return $selectedSongs;
}

function getSong($id){
    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM songs WHERE id = ?');
    $result = $query->execute([$id]);
    if($result){
        return $query->fetch();
    }
    else {
        return false;
    }
}