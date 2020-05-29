<?php
require_once 'Classes/Artigo.php';
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
                            <a class="nav-link text-dark" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Sobre nós</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Serviços</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="write/">Escreva</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="py-5">
            <div class="container">
                <?php
                $artigo = new Artigo();
                 $consulta = $artigo->findAll();
                if ($consulta != null) {
                foreach ($artigo->findAll() as $key => $value):
                    ?>
                <form action="Artigos/artigo.php" method="POST" name="">
                    <div class="row mb-5">
                        <div class="col-md-7">
                            <h2 class="text-primary"><?php echo $value->titulo; ?> </h2>
                            <div class="" contenteditable="true">
                                <?php echo "<input type='hidden'  name='id' value='" . $value->idArtigo ."'/>"; ?>          
                                <?php echo $value->descricao; ?>                                
                            </div>
                            <?php echo "<input type='submit' class='btn btn-outline-primary' name='ler' value='Ler Artigo'/>"; ?>          
                        </div>
                        <div class="col-md-5 align-self-center">                
                            <?php echo "<img src='write/img/" . $value->img . "' width='500'>"; ?>
                        </div>
                    </div>  
                 </form>
                <?php endforeach;
                }else{
                    echo 'Não possui artigo escritos!';
                }
                
                ?>

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>

</html>