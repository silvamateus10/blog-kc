<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css" type="text/css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">

        <style>
            form {
                padding-top: 50px;
                padding-left: 20px;
                padding-bottom: 20px;                               
            }

        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>



    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark" id="nav">
            <div class="container">


            </div>

        </nav>
        <div class="container" id="caixa"> 
            <div class="row">
                <form class="form-horizontal" method="POST">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-md-5 control-label">Usuário</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="login" id="" placeholder="Usuário">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-md-5 control-label">Senha</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="senha" id="" placeholder="Senha">
                            </div>
                        </div>  
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-default" name="acessar" value="Acessar" />
                            </div>
                        </div>


                    </div>            
                </form>  

            </div>     
        </div>
        <footer>
            <nav class="navbar navbar-expand-md navbar-dark" id="nav">
                <div class="container">
                </div>
            </nav>
        </footer>
        <?php
        session_start();
        if (isset($_POST['acessar'])) {

            if ($_POST['login'] == 'escritor' && $_POST['senha'] == 'koalas@blog') {
                $_SESSION['logado'] = 1;
                header('location: menu.php');
            } else {
                echo 'Login ou Senha incorretas';
            }
        }
        ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
    </body>
</html>


