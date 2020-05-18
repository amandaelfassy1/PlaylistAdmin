<?php
function getArtists($label_id = false)
{
    $db = dbConnect();
    if($label_id) {
        $query = $db->prepare('
            SELECT a.name FROM artists a 
            INNER JOIN artists_labels al ON a.id=al.artist_id
            WHERE al.label_id=?
            ');

        $query->execute([
            $label_id
        ]);
    }
    else{
    }
    $result = $query ->fetchAll();
    return $result;
}




function getArtist($id){
    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM artists WHERE id = ?');
    $result = $query->execute([$id]);
    if($result){
        return $query->fetch();
    }
    else {
        return false;
    }
}
