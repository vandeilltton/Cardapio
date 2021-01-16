<?php
ini_set("display_errors", "on");

require_once("Cart.php");
require_once("Catalog.php");
// Obtenha os parâmetros de solicitação especificados
function getRequest($key, $default = null)
{
    if (isset ($_REQUEST[$key])) {
        // retorna os parâmetros da solicitação se eles existirem
        return $_REQUEST[$key];
    } else {
        // Retorna o valor padrão se não existir
        return $default;
    }
}

$cart = new Cart(); // Instanciação do carrinho
$catalog = new Catalog(); // Instanciação do catálogo
$act = getRequest("act", "catalog"); // Obter ação
// Muda o comportamento dependendo do valor da variável $ act
switch ($act) {
    case "catalog": // Ver catálogo
        $title = "Tela da lista de produtos";
        $items = $catalog->getAll();
        $tpl = "catalog";
        break;
    case "add": // Adicionar produto
        $id = getRequest("id");
        if (!is_null($id)) {
            $item = $catalog->getItem($id);
            $cart->addItem($item);
            $title = "Tela de registro do carrinho";
            $tpl = "add";
        } else {
            $items = $catalog->getAll();
            $tpl = "catalog";
        }
        break;
    case "cart": // Listar itens do carrinho
        $title = "Tela de confirmação do carrinho";
        $items = $cart->getAll();
        $tpl = "cart";
        break;
    case "remove": // Remover item do carrinho
        $id = getRequest("id");
        if (!is_null($id)) {
            $cart->removeItem($id);
        }
        $items = $cart->getAll();
        $tpl = "cart";
        break;
    case "order": // Pedido
        $title = "Tela de pedido";
        $cart->removeAll();
        $tpl = "order";
        break;
    default:
        echo "Opção não encontrada";
        exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
 <meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

<header>

  <img src="images/img4.png" alt="some text" width=300 height=80>

</header>

<section>
  <nav>
    <img src="images/prato.jpg" alt="some text" width=600 height=400>
  </nav>
  
  <article>

     <?php require("tpl/{$tpl}.php"); ?>

  </article>
</section>

<footer>
  <p>Copyright © 2000-2021 Tempero de Casa - Todos os direitos reservados</p>
</footer>

</body>
</html>
