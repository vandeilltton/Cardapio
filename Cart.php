<?php
class Cart {
    // Inicializar carrinho
    function Cart() {
        session_start ();
        if (!array_key_exists ("carrinho", $_SESSION)) {
            $_SESSION["carrinho"] = array();
        }
    }
    // Pega o conteúdo do carrinho
    function getAll() {
        return $_SESSION["carrinho"];
    }
    // Adicionar itens ao carrinho
    function addItem($item) {
        $id = $item["id"];
        if (isset($_SESSION["carrinho"][$id])) {
            // aumenta o número de pedidos
            $_SESSION["carrinho"][$id]["pedido"] += $item["pedido"];
            print("Ola");
        }else{
            // Nova ordem
            $_SESSION["carrinho"][$id] = $item;
       }
    }
    // Remova o item do carrinho
    function removeItem ($id) {
        unset($_SESSION["carrinho"][$id]);
    }
    // Esvazie o carrinho
    function removeAll() {
        $_SESSION["carrinho"] = array();
    }
}