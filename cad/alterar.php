<?php
   //adicionar o arquivo de conexão
   include_once 'conexao.php';

   // testar o button update 
   if (isset($_POST['update'])){
      $id = $_POST['idproduto'];
      $nome = $_POST['txtnome'];

      // nomes dos registros da tabela ,adicionando dados com as var, que são input do formulario
      // nomes dos registros da tabela do BD = '$var que é o input do formulario' 
      //update
      $result = mysqli_query($conn,"UPDATE produtos set nomeproduto='$nome' where idproduto=$id ");
      if($result){
         header ('location:index.php?');
      }
   }
?>

<?php
   //retornar a linha de uma registro especifico
   $id = $_GET['idproduto'];
   //pegando o id pelo url graças ao get
   $result = mysqli_query($conn,"SELECT * from produtos where idproduto ='$id'");
   //trabalhar o resultado em forma de array
   while ($dados = mysqli_fetch_array($result)){
      $nome = $dados['nomeproduto'];
   }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <style>
      input{
         display:flex;
         margin : 0 auto;
      }

      table{
         border: 5px; solid black
      }
   </style>
</head>

<body>
   <br>
   <br>
   <form border"5" action="alterar.php" method="POST">
      <p>Data da Alteração é atualizada automaticamente</p>
      <table>
         <tr>
            <td>nome</td>
            <td><input type="text" name="txtnome" value=<?php echo $nome; ?>></td>
         </tr>

         <tr>
            <td><input type="hidden" name="idproduto" value=<?php echo $_GET['idproduto']; ?>></td>
            <td><input type="submit" name="update" value="Alterar"></td>
         </tr>
      </table>
   </form>
</body>

</html>


