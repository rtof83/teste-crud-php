<?php

include_once 'header.php';
include_once 'conn.php';

$id   = $_POST['id'];
$desc = $_POST['desc'];

if ($id && $desc) {

    $query_product = 'UPDATE tbTestes SET `desc` = :desc WHERE id = :id';
    $cad_product = $conn -> prepare($query_product);

    $cad_product -> bindParam(':id', $id);
    $cad_product -> bindParam(':desc', $desc);

    $cad_product -> execute();

    if ($cad_product -> rowCount()) {
        $response = [
            'error' => false,
            'message' => 'Item atualizado!'
        ];
    } else {
        $response = [
            'error' => true,
            'message' => 'Erro ao atualizar item.'
        ];
    }
} else {
    $response = [
        'error' => true,
        'message' => 'Erro ao atualizar item.'
    ];
}

http_response_code(200);
echo json_encode($response);

?>
