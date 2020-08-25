<?php
   include_once 'conexao.php';

   $id = $_GET['idproduto'];

   //criar uma query para deletar o registro/tupla
   $result = mysqli_query($conn,"DELETE FROM produtos where idproduto=$id" );

   if(!$result){
      echo "Erro ao eliminar o registro" .$id;
   }else{
      header("location:index.php");
   }
?>
