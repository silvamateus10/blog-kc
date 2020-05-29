<?php
include './protect.php';
protect();

require_once '../Classes/Artigo.php';
require_once '../Classes/Config.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css">
        <link rel="stylesheet" href="style.css" type="text/css"> 
        <script src="js/tinymce/jquery.tinymce.min.js"></script>
        <script src="js/tinymce/tinymce.js"></script>
        <script src="js/tinymce/tinymce.min.js"></script>

        <script>tinymce.init({selector: 'textarea',
                plugins: 'image imagetools table preview codesample link textcolor media textpattern visualchars',
                language: 'pt_BR'

            });</script>

    </head>
    <body>
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
        <br/>
        <div class="container">            
            <div class="form-group">
                <form class="" method="POST" enctype="multipart/form-data">
                    <b>Título:</b><br/><input type="text" required="required" name="titulo" value="" class="form-control" /><br/><br/>            
                    <b>Subtítulo:</b><br/><input type="text" required="required" name="subtitulo" value="" class="form-control"/><br/><br/>                                             
                    <b>Breve Descrição: </b>(Exibira na página principal do Blog, e não no conteúdo)
                    <br/><textarea name="descricao" rows="4"  cols="20"></textarea><br/><br/>                                             
                    <b>Imagem:</b> (Recomendado: 400 x 1348)
                    <br/><input type="file" name="img" value="" required="required"/>
                    <br/> <br/> 
                    <b>Conteúdo:</b>
                    <br/> 
                    <i>Caso queira inserir alguma imagem, é necessário realizar o 
                        <a href="imgs.php" target="_blank">UpLoad</a> 
                        da mesma e 
                        <a href="imgs.php" target="_blank">Consultar o Caminho da Imagem</a>.</i>                      
                    <textarea name="conteudo" rows="4"  cols="20"></textarea><br/><br/>
                    <b>Autor:</b><br/><input type="text" required="required" name="autor" value="" class="form-control"/><br/><br/>
                    <input type="submit" class="btn btn-success" name="criar" value="Salvar" />
                </form>     
            </div>             
        </div>                
        <?php
        $artigo = new Artigo();

        if (isset($_POST['criar'])) {
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $descricao = $_POST['descricao'];
            $img = $_FILES['img']['name'];
            $temp = $_FILES['img'] ['tmp_name'];
            $conteudo = $_POST['conteudo'];
            $autor = $_POST['autor'];

            $artigo->setTitulo($titulo);
            $artigo->setSubtitulo($subtitulo);
            $artigo->setDescricao($descricao);
            $artigo->setImg($img);
            $artigo->setConteudo($conteudo);
            $artigo->setAutor($autor);
            move_uploaded_file($temp, PASTA_IMG . $img);

            if ($artigo->insert()) {
                echo "<script>alert('Inserido com Sucesso!');</script>";
                echo "<script>window.location.replace('menu.php');</script>";
            }
        }
        ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
    </body>
</html>



