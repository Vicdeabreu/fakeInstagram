<?php 

  // Si no tiene nada para registrar, se manda a la lista de Posts// 
  $rotas = key($_GET)?key($_GET):"posts";

  // se decide aquí cuál es el controller a utilizar //
  switch($rotas){
    case "posts":
      include "controllers/PostController.php";
      $controller = new PostController();
      $controller->acao($rotas);
    break;
    
    case "formulario-post":
      include "controllers/PostController.php";
      $controller = new PostController();
      $controller->acao($rotas);
    break;

    // Ruta para el programador //
    case "cadastrar-post":
      
      include "controllers/PostController.php";
      $controller = new PostController();
      $controller->acao($rotas);
    break;
  }



?>