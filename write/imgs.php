<?php
include './protect.php';
protect();


require_once '../Classes/Imagem.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css" type="text/css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">       
        <link rel="stylesheet" href="css/bootstrap.min.css">        
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">


        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>     
        <nav class="navbar navbar-expand-md navbar-dark" id="nav">
            <div class="container">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent" aria-controls="navbar3SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse text-center justify-content-center" id="navbar3SupportedContent">

                </div>
            </div>
        </nav>
        <br/><br/>
        <div class="container">   
            <form name="addFoto" action=""  method="POST"  enctype="multipart/form-data">                                                          
                <input type="file" required="required" name="caminho" value="" size="10"/><br/><br/>
                <input type="submit" name="add" class="btn btn-success" value="Adicionar"/>
            </form>
        </div> 
        <br/>
        <?php
        $imgs = new Imagem();

        if (isset($_POST['add'])) {

            $caminho = $_FILES['caminho']['name'];
            $temp = $_FILES['caminho'] ['tmp_name'];

            $imgs->setCaminho($caminho);

            move_uploaded_file($temp, PASTA_IMG . $caminho);
            $imgs->insert();
            header('Location:imgs.php');
        }
        ?>

        <?php foreach ($imgs->findAll() as $key => $value): ?>            
            <div class="col-md-2">      
                <p><img src="img/<?php echo $value->caminho; ?>" width="200" alt="200"/><br/>
                    Copie Aqui: <br/> <b><?php echo 'img/' . $value->caminho; ?></b>   
                </p>                   
                <p>                       
                    <?php echo "<a class='btn btn-danger' href='imgs.php?acao=deletar&id=" . $value->idImagem . "' onClick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
                </p>                            
            </div>     
        <?php endforeach; ?>


        <?php
        if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
            if (is_numeric($_GET['id'])) {
                $id = (int) $_GET['id'];
                $stmt = $imgs->find($id);
                unlink(PASTA_IMG . $stmt->caminho);
                if ($imgs->delete($id)) {
                    echo "<script>alert('Deletado com Sucesso!');</script>";
                }
                header('Location:imgs.php');
            } else {
                die("Dados Inválidoos");
            }
        endif;
        ?>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>

    </div>
</body>
</html>

