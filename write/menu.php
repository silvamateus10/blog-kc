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
        <link rel="stylesheet" href="style.css" type="text/css"> 
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<!--    <script>   
        function acao(valor){
           document.form.action = valor + '.php'; 
           document.form.submit();
        }
                
    </script>    -->

    </head>
    <body class="">
        <nav class="navbar navbar-expand-md navbar-dark" id="nav">
            <div class="container">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent" aria-controls="navbar3SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse text-center justify-content-center" id="navbar3SupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark"  href="menu.php">Inicio</a>
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
            <?php
            $artigo = new Artigo();
            foreach ($artigo->findAll() as $key => $value):
                ?>
            <form name="form" action="" method="POST">
                <div class="row mb-5">
                    <div class="col-md-7">
                        <h2 class="text-primary"><?php echo $value->titulo; ?></h2>
                        <p class="" contenteditable="true"><?php echo $value->subtitulo; ?>
                            <br/><br/>        
                            <?php echo $value->autor; ?>
                        </p>
                        
                        <?php echo "<input type='hidden' id='idArtigo' value='" . $value->idArtigo . "' name='idArtigo' />"; ?>
                        
<!--                        <?php// echo "<input type='button' class='btn btn-outline-primary' id='" . $value->idArtigo . "' name='ver' value='Visualizar' onClick='Ver(this);'>"; ?>                        
                        <?php// echo "<input type='button' class='btn btn-outline-success' id='" . $value->idArtigo . "' name='editar' value='Editar' onClick='Editar(this);'>"; ?>                       --> 
                        <input type="button" class="btn btn-outline-primary" id="btnVer" name="ver" onClick="Ver(this);" value="Visualizar"/>
                        <input type="button" class="btn btn-outline-success" id="btnEditar" name="editar" onClick="Editar(this);" value="Editar"/>
                                                                  
                        <?php echo "<a class='btn btn-outline-danger' href='menu.php?acao=deletar&id=" . $value->idArtigo . "' onClick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
                    </div>
                    <div class="col-md-5 align-self-center">
                        <?php echo "<img src='img/" . $value->img . "' width='250'>"; ?>
                    </div>
                </div> 
             </form>
            <?php endforeach; ?>

        </div>
<script type="text/javascript">
   $(document).ready( function(){
    //associar o evento de click ao botão
    function Ver(botao){ 
      var id = botao.getAttribute("id");    
      $.ajax({
       url: 'ver.php',
       method: 'post',
       data: {"idArtigo" : id },
       success: function(data){
        alert(data);
        console.log(data);        
      }
    });
    }
  });
</script>

        
        <?php
        if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
            $id = (int) $_GET['id'];
            $stmt = $artigo->find($id);
            unlink(PASTA_IMG . $stmt->img);
            if ($artigo->delete($id)) {
                echo "<script>alert('Deletado com Sucesso!');</script>";
                echo "<script>window.location.replace('menu.php');</script>";
            }
        endif;
        ?>		

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>

</html>