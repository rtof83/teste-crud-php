<?php

include_once 'header.php';
include_once 'conn.php';

$data = $_POST['desc'];

if ($data) {
    $query = 'INSERT INTO tbTestes (`desc`) VALUES (:desc)';
    $cad   = $conn -> prepare($query);

    $cad -> bindParam(':desc', $data);
    $cad -> execute();

    if ($cad -> rowCount()) {
        $response = [
            'error' => false,
            'message' => 'Item cadastrado com sucesso!'
        ];
    } else {
        $response = [
            'error' => true,
            'message' => 'Erro ao cadastrar item.'
        ];
    };
} else {
    $response = [
        'error'   => true,
        'message' => 'Erro ao cadastrar item.'
    ];
};

http_response_code(200);
echo json_encode($response);

?>