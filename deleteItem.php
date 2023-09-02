<?php

include_once 'header.php';
include_once 'conn.php';

$data = $_POST['delete'];

if ($data) {
    $query = 'DELETE FROM tbTestes WHERE id = :id';
    $cad   = $conn -> prepare($query);
    
    $cad -> bindParam(':id', $data);
    $cad -> execute();

    if ($cad -> rowCount()) {
        $response = [
            'error' => false,
            'message' => 'Item excluído!'
        ];
    } else {
        $response = [
            'error' => true,
            'message' => 'Erro ao excluir item.'
        ];
    }
} else {
    $response = [
        'error' => true,
        'message' => 'Erro ao excluir item.'
    ];
}

http_response_code(200);
echo json_encode($response);

?>
