<?php
include './protect.php';
protect();


require_once '../Classes/Artigo.php';


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="style.css" type="text/css"> </head>

    <body class="">
        <nav class="navbar navbar-expand-md navbar-dark" id="nav">
            <div class="container">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent" aria-controls="navbar3SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse text-center justify-content-center" id="navbar3SupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="menu.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="write.php">Escrever Artigo</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link text-dark" target="_blank" href="imgs.php">UpLoad de Imagem</a>
                        </li>             
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        $artigo = new artigo();

        if (isset($_POST['ver'])) {
            $id = (int) $_POST['id'];
            $stmt = $artigo->find($id);
            ?>   
            <?php echo "<img src='img/" . $stmt->img . "' height='400' width='1348'>"; ?>        
            <div class="py-5 gradient-overlay text-center bg-success">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="text-light"><?php echo $stmt->titulo; ?></h2>
                                    <p class="text-light"><?php echo $stmt->subtitulo; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-justify">    
                            <?php echo $stmt->conteudo; ?>
                            <br>
                            <br>
                            <b>Autor:</b> <i><?php echo $stmt->autor; ?></i>
                            <br>          
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </body>

</html>