<?php 

header('content-type:text/html;charset=utf-8'); 


$servidor = 'localhost'; 
$usuario = 'root'; 
$senha = '';
$banco = 'db_cad';


$conn = mysqli_connect($servidor,$usuario,$senha,$banco);
 
if(!$conn){
   echo 'Error ao conectar com banco';
}
else{
   //echo 'sucesso na conexão';
} //comentar para que a mensagem não fique aparecendo , somente utiliza para o teste


?>