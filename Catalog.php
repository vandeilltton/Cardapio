<?php
class Catalog {
    // Lista de produtos
    var $items;
    // Inicializar catálogo
    function Catalog() {
        $this->items = array (
            1 => array ("id" => 1, "nome" => " Baião de Dois ", "preco" => 20),
            2 => array ("id" => 2, "nome" => " Picadinho Filé/porção", "preco" => 40),
            3 => array ("id" => 3, "nome" => "Fejão Mulatinho", "preco" => 27),
            4 => array ("id" => 4, "nome" => "Carne de sol", "preco" => 30),
            5 => array ("id" => 5, "nome" => " Costela de Porco", "preco" => 70)
        );
    }
    // Obtenha todos os produtos
    function getAll() {
       
        return $this-> items;

    }
    // Obtenha os detalhes de qualquer produto
    function getItem($id, $order=1) {
        $item = $this->items[$id];
        $item["pedido"] = $order;
        return $item;
    }
}