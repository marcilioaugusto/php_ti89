<?php
   
   include_once 'conexao.php';
   $result =mysqli_query($conn,"SELECT * FROM produtos");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


   <title>Sistema CAD</title>
   <style>
      body{
         display:flex;
         flex-direction : column;
         align-items: center;
        
      }  
   </style>
</head>

<body>
   <?php
      include_once 'conexao.php';
      $parametro = filter_input(INPUT_GET,'parametro');
      if ($parametro){
      $result =mysqli_query($conn,"SELECT * FROM produtos where nomeproduto like '%$parametro%'");
      }else{
         $result =mysqli_query($conn,"SELECT * FROM produtos ");
      }
   ?>
   <p>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?> ">
         <input type="text" name="parametro">
         <input type="submit" value="Busca">
      </form>
   </p>

   <a href="adicionar.php">Adicionar novo produto</a>
   <br>
   <!-- Adicionar uma tabela -->
   <table border="1" width="80%">
      <tr>
         <td>Codigo</td>
         <td>Nome do Produto</td>
         <td>Data da Adição do Produto</td>
         <td colspan="2" align="center">Ação</td>
      </tr>
      <!-- Listar os dados da tabela-->
      <?php
         while($dados = mysqli_fetch_array($result)){
            //segunda linha da tabela
            echo "<tr>";
            echo "<td>" .$dados['idproduto'] ."</td>";
            echo "<td>" .$dados['nomeproduto'] ."</td>";
            echo "<td>" .$dados['dataproduto'] ."</td>";
            echo "<td> <a href='alterar.php?idproduto=$dados[idproduto]'><i class='fa fa-pencil-square-o fa-1x ' aria-hidden='true '></i>Alterar</a>"   ."</td>";
            echo "<td> <a href='delete.php?idproduto=$dados[idproduto]'><i class='fa fa-trash fa-1x' aria-hidden='true'></i> Excluir</a>"   ."</td>";
            echo "</tr>";
         }; 
      ?>
   </table>
   <br>
   <a id='home' href="index.php">Voltar para pagina inicial</a>

</body>

</html>