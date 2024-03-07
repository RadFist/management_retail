<?php

function getTotalCount($connect, $table, $column) {
    $query = "SELECT COUNT($column) as total FROM $table";
    $sql = mysqli_query($connect, $query);
    $result = mysqli_fetch_assoc($sql);

    return $result['total'];
}

 function getAllData($connect,$table){
    $query = "SELECT * FROM $table";
    $sql = mysqli_query($connect,$query);
    $result = array();

    while ($row = mysqli_fetch_assoc($sql)) {
        $result[] = $row;
    }

    return $result;
}
?>