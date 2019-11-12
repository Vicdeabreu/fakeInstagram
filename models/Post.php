<?php 

include_once "Conexao.php";

class Post extends Conexao{

  public function criarPost($image, $descricao){
    $db = parent::criarConexao(); /* -- Heredando solo el método del padre /la función/ --- */ 
    $query = $db->prepare("INSERT INTO post (img,descricao) values(?,?)");
    return $query->execute([$image, $descricao]);
  }
  public function listarPosts(){
    $db = parent::criarConexao();
    $query = $db->query('SELECT * FROM post ORDER BY id DESC');
    $resultado = $query->fetchAll(PDO::FETCH_OBJ); /* Traduzindo tudo que recebe para um formato que o php entenda. Nesse caso escolhemos receber objeto.
    return $resultado. */
    return $resultado;
  }
}
  

?>