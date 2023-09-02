<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- MDB -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
      rel="stylesheet"
    />
    
    <!-- MDB -->
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
    ></script>
    
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>

  <?php

    include_once "conn.php";

    $print = "";

    $stmt = $conn -> query("SELECT * FROM tbTestes");
    $stmt -> setFetchMode(PDO::FETCH_OBJ);

    $print .= '<table class="table table-striped">';
    $print .= '<tr><th>ID</th>';
    $print .= '<th>Descrição</th></tr>';

    while ($names = $stmt->fetch()) {
        $print .= '<tr>';
        $print .= "<td>".htmlspecialchars($names -> id)."</td>";
        $print .= "<td>".htmlspecialchars($names -> desc)."</td>";
        $print .= '</tr>';
    }

    $print .= "</table>";
    echo $print;

  ?>

  <!-- Tabs navs -->
  <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a
        class="nav-link active"
        id="ex3-tab-1"
        data-mdb-toggle="tab"
        href="#ex3-tabs-1"
        role="tab"
        aria-controls="ex3-tabs-1"
        aria-selected="true"
        >Inserir registro</a
      >
    </li>
    <li class="nav-item" role="presentation">
      <a
        class="nav-link"
        id="ex3-tab-2"
        data-mdb-toggle="tab"
        href="#ex3-tabs-2"
        role="tab"
        aria-controls="ex3-tabs-2"
        aria-selected="false"
        >Excluir Registro</a
      >
    </li>
    <li class="nav-item" role="presentation">
      <a
        class="nav-link"
        id="ex3-tab-3"
        data-mdb-toggle="tab"
        href="#ex3-tabs-3"
        role="tab"
        aria-controls="ex3-tabs-3"
        aria-selected="false"
        >Atualizar Registro</a
      >
    </li>
  </ul>
  <!-- Tabs navs -->

  <!-- Tabs content -->
  <div class="tab-content" id="ex2-content">
    <div
      class="tab-pane fade show active"
      id="ex3-tabs-1"
      role="tabpanel"
      aria-labelledby="ex3-tab-1"
    >
      <div class="form">
      <form id="salvar"
            action="newItem.php"
            method="POST"
            onSubmit="afterSubmit()"
            target="_blank"
      >
        <div>
          <textarea placeholder="insira a descrição..." type="text" name="desc" id="desc" rows="5" cols="30" class="afterSubmit"></textarea>
        </div>

        <input type="submit" value="inserir">
      </form>
    </div>
    </div>
    <div
      class="tab-pane fade"
      id="ex3-tabs-2"
      role="tabpanel"
      aria-labelledby="ex3-tab-2"
    >
      <div class="form">
      <form action="deleteItem.php"
            method="POST"
            id="excluir"
            target="_blank"
            onSubmit="afterSubmit()"
      >
        <div>
        <input placeholder="insira o ID" type="number" name="delete" id="delete" class="afterSubmit">
        </div>
        <input type="submit" value="excluir">
      </form>
    </div>
    </div>
    <div
      class="tab-pane fade"
      id="ex3-tabs-3"
      role="tabpanel"
      aria-labelledby="ex3-tab-3"
    >
      <div class="form">
      <form action="updateItem.php"
            method="POST"
            id="atualizar"
            target="_blank"
            onSubmit="afterSubmit()"
      >
        <div>
          <input placeholder="insira o ID" type="number" name="id" id="idUpdate" class="afterSubmit">
        </div>

        <div>
        <textarea placeholder="insira a descrição..." type="text" name="desc" id="desc" rows="5" cols="30" id="textUpdate" class="afterSubmit"></textarea>
        </div>
        <input type="submit" value="atualizar">
      </form>
  </div>
    </div>
  </div>
  <!-- Tabs content -->

  <hr>

  <div class="form">
    <button onclick="location.reload()">
      recarregar página
    </button>
  </div>
</body>

<script src="script.js"></script>

</html>
