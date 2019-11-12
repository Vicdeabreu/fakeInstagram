<?php 
include_once "models/Post.php";


class PostController{
  public function acao($rotas){
    // Qué hacer con la información que el usuario escribió en la URL://
    switch($rotas){
      case "posts":
        $this->listarPosts();
      break;
      case "formulario-post":
        $this->viewFormularioPost();
      break;
      case "cadastrar-post":
        $this->cadastroPost();
        break;  
    }
  }

  private function viewFormularioPost(){
    include "views/newPost.php";
  }

  private function viewPost(){
    include "views/posts.php";
  }

  private function listarPosts(){
    $post = new Post(); /* Solo tiene una clase Post, pero es necesario crear el objeto */
    $listarPosts = $post->listarPosts();
    $_REQUEST['posts'] = $listarPosts; // Request tiene todo lo que tiene en el post y lo que tiene en el GET. Colocándolo dentro de una superglobal
    $this->viewPost(); // llama a view
  }

  private function cadastroPost(){
    $descricao = $_POST['descricao'];
    $nomeArquivo = $_FILES['img']['name'];
    $linkTemp = $_FILES['img']['tmp_name'];
    $caminhoSalvar = "views/img/$nomeArquivo";
    move_uploaded_file($linkTemp, $caminhoSalvar);
    $post = new Post();
    $resultado = $post->criarPost($caminhoSalvar, $descricao); // Va a estar analizando un true o false //
    if($resultado){
      header('Location:/fakeInstagram/posts'); // Mandando para la rota para decidir a donde ir
    }else{
      echo "Deu errado meu irmao";
    }
  }
}


?>