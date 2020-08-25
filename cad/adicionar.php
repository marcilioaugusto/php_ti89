<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cadastro do Usuario</title>
   <style>
      body{
         display:flex;
         flex-direction:column;
         align-items: center;
      }

      a{
         display:flex;
         flex-direction:column;
         align-items: center;
      }

      fieldset{

         width : 50% ;
         margin: auto
      }

      form{
         display:flex;
         flex-direction:column;
         align-items: center;
      }

      #btn{
         position: relative;
         left: 50px;
      }

   </style>
</head>
<body>
  
   <!-- adicionar formulario -->
   <fieldset>
      <form action="" method="post">
         <table whidth="55%" border"8">
            <p>data da adição do produto é automaticamente preenchida</p>
            <tr>
               <td>Nome do novo produto</td>
               <td><input type="text" name="txtnome" maxlength="100"></td>
            </tr>   
            <tr>
               <td></td>
               <td><input id="btn" type="submit" name="submit" value="Adicionar"></td>
            </tr>   
       
         </table>
      </form>
      <hr>
      <a href="index.php">Ir para o index </a><br><br>
   </fieldset>

   <?php
     
      if(isset($_POST['submit'])){
         $nome = $_POST['txtnome'];
         
         include_once 'conexao.php';
     
         $result = mysqli_query($conn,"INSERT into produtos(idproduto,nomeproduto) VALUES(null,'$nome')");
         if($result){ 
            header ('location:index.php?sucesso na gravação de dados');
         }else{
            header ('location:index.php?erro na gravação de dados');
         }
      }
   ?>
</body>
</html>