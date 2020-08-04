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
    
    <title>Lista de produtos da tabela produtos</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">  

    <script src="https://kit.fontawesome.com/b8e772fbcf.js" crossorigin="anonymous"></script>  
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]--> 
    <style type="text/css">
      .margin-button15 { margin-bottom: 15px; }
    </style>     
  </head>

  <body>    

    <div class="container">

      <div class="row">
        

          <h1>Lista de produtos</h1>
        </div>
        <div class="col-sm-12">
          <a href="produtos/add" class="btn btn-success margin-button15">Novo Produto</a>
        </div>
        
    
        <table class="table table-bordered">
            
            <thead>
                <tr>
                  <th class="text-center">Produto</th>
                  <th class="text-right">Preço</th>
                  <th class="test-center">Status</th>
                  <th class="text-center">Açoes</th>
                </tr>
            </thead>

            <?php
                $contador = 0;
                foreach ($produtos as $produto)
                {        
                  //if($produto->preco > 50.00 && $produto->nome[0] == 'S')
                    //{
                    echo '<tr>';
                      echo '<td>'.$produto->nome.'</td>'; 
                      echo '<td class="text-right">'.$produto->preco.'</td>';
                      //Verificamos o status do produto
                      if ($produto->ativo == 1) {
                        //Se tiver == 1 está ATIVO
                        echo '<td><span class = "label-success"><a href="/crud/produtos/status/'.$produto->id.'" title="Deixar inativo">Ativo</a></span></td>';
                      } else {
                        //Se tiver == 0 está INATIVO
                        echo '<td><span class = "label-warning"><a href="/crud/produtos/status/'.$produto->id.'" title="Deixar ativo">Inativo</a></span></td>';
                      }  
                      echo '<td class="text-center">';
                        echo '<a href="/crud/produtos/editar/'.$produto->id.'" title="Editar cadastro" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
                        echo ' <a href="/crud/produtos/apagar/'.$produto->id.'" title="Apagar cadastro" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>';
                        echo ' <a href="/crud/produtos/visualiza/'.$produto->id.'" title="Detalhes" class="btn btn-info"><i class="fas fa-eye"></i></a>';
                      echo '</td>'; 
                    echo '</tr>';
                $contador++;
                 //}

              }
            ?>

        </table>

        <div class="row">
          <div class="col-md-12">
            Todal de Registro: <?php echo $contador ?>
          </div>
        </div>

      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>    
  </body>
</html>