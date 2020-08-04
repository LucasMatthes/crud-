<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta name="description" content="Lista de produtos da tabela produtos">
    <meta name="author" content="blog.ismweb.com.br">
    
    <title>Detalhes do cadastro</title>

    <!-- Bootstrap core CSS -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">    
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->       
  </head>

  <body>    

    <div class="container">

      <div class="row">
        <div class="col-md-8">       
        <h1>Detalhes do produto</h1> 
        </div>

        <div class="col-md-12">
        <ol class="breadcrumb">
              <li><a href="../..">Inicio</a></li> 
              <li>/</li>          
              <li class="active">Detalhes do produto</li>
        </ol>      
        </div>

        <!-- Formulário de novo cadastro  -->
        <div class="col-md-12">
        <form action="../../produtos/visualiza" name="form_add" method="post">

          <input type="HIDDEN" name="id" value="<?php echo $produto->id ?>">
          
          <!-- Input text nome do produtos -->
          <div class="row">
            <div class="col-md-8">
              <label>Nome</label>
              <input type="text" name="nome" value="<?php echo $produto->nome ?>" class="form-control" disabled>
            </div>
          </div> <!-- fim input text nome produtos -->

          <!-- Input text preço do produtos -->
          <div class="row">
            <div class="col-md-8">
              <label>Preço</label>
              <input type="text" name="preco" value="<?php echo $produto->preco ?>" class="form-control" disabled>
            </div>
          </div><!-- fim input text preco produtos -->

          <!-- Select produtos ativo ou inativo -->
          <div class="row">
            <div class="col-md-2">
              <label>Ativo</label>
              <select name="ativo" class="form-control" disabled>
                <option value="1"<?php echo ($produto->ativo == 1 ? 'selected="selected"' : '') ?> >Sim</option>
                <option value="0"<?php echo ($produto->ativo == 0 ? 'selected="selected"' : '') ?> >Não</option>
              </select>
            </div>
          </div><!-- fim select produtos ativo ou inativo -->

          

        </form><!--Fim formulário de novo cadastro  -->

      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>    
  </body>
</html>