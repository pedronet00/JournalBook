<?php 

    include('../conn/conn.php');

    $data = date('Y-m-d H:i:s');

     if(isset($_POST['acao'])){

        
        $main_pub = mysqli_real_escape_string($conn, $_POST['main_pub']);

        $query_inserir = "INSERT INTO 
        publicacoes
        (main_pub, data_pub, user) 
        VALUES 
        ('$main_pub', '$data', 'Pedro Stabile Neto')";
        
        $result_inserir = mysqli_query($conn, $query_inserir);
     }

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>JournalBook</title>
</head>
a
<body style='background-color: #849fad;'> 
    <header>
        <div id="title">
            <h1 style='font-size: 30px; text-align: center; color: white;'>JournalBook</h1>
        </div>

        <ul>
            <a href="#"><li><i style="font-size: 15px; display: inline; text-align: center;" class="fa fa-home" aria-hidden="true">&nbsp&nbsp</i>Início</li></a>
            <a href="#"><li><i style="font-size: 15px; display: inline; text-align: center;" class="fa fa-search" aria-hidden="true">&nbsp&nbsp</i>Descobrir</li></a>
            <a href="#"><li><i style="font-size: 15px; display: inline; text-align: center;" class="fa fa-bell" aria-hidden="true">&nbsp&nbsp</i>Notificações</li></a>
            <a href="#"><li><i style="font-size: 15px; display: inline; text-align: center;" class="fa fa-comments" aria-hidden="true">&nbsp&nbsp</i>Mensagens</li></a>
            <a href="#"><li>Publicações Salvas</li></a>
            <a href="#"><li>Perfil</li></a>
            <a href="#"><li>O que está acontecendo?</li></a>
            <a href="#"><li>Destaques</li></a>
            <a href="#"><li>Mais</li></a>
            <a href="#" id="inscreva-se-btn"><li>Ajuda</li></a>
        </ul>
    </header>

    <main>
        <aside>
            <form method="POST" action="index.php">
                <input type='hidden' name='acao'>
                <textarea class='text_area' name="main_pub"placeholder="Todos estão ansiosos por sua publicação! :)" style="float:left; clear:left;" cols="23" rows="4" wrap="hard"></textarea>
                <button name="enviar" type="submit" id="enviar">Enviar</button>
        </aside> 
    </main>

    <?php 

    $query_selecionar = "SELECT * FROM publicacoes";
    $result_selecionar = mysqli_query($conn, $query_selecionar);
    
    while($array_pub = mysqli_fetch_assoc($result_selecionar)){
        echo "<div class='publicacoes'>";
        echo "<i>Autor</i>: <strong>" .$array_pub['user']. "</strong><br/>";
        echo "<div class='main_pub'>" .$array_pub['main_pub'];
        echo "<img src='../medias/variola.webp' style='max-width: 90%;'></div>";
        echo "<i>Publicado em: " .$array_pub['data_pub']. "</i><br/>";
        echo "</div>";
    }

    
    ?>
    
</body>
</html>