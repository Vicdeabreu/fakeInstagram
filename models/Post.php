<?php 

include_once "Conexao.php";

class Post extends Conexao{

  public function criarPost($image, $descricao){
    $db = parent::criarConexao(); /* -- Heredando solo el método /la funcion/ del padre --- Armazenando a conexao na variavel $db: */ 
    $query = $db->prepare("INSERT INTO post (img,descricao) values(?,?)");
    return $query->execute([$image, $descricao]); // retorna true o false. Para pra o controller analizar
  }
  public function listarPosts(){
    $db = parent::criarConexao();
    $query = $db->query('SELECT * FROM post ORDER BY id DESC'); // para trazer em orden descendente
    $resultado = $query->fetchAll(PDO::FETCH_OBJ); /* Traduzindo tudo que recebe para um formato que o php entenda. Nesse caso escolhemos receber objeto.
    return */
    return $resultado;
  }
}
  

?>