<form action="" method="post">
    <table>
        <tr>
            <th>Nome do produto</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Total</th>
            <td></td>

        </tr>
        <?php foreach ($items as $id => $item) { ?>
            <tr>
                <td><?= $item["nome"] ?></td>
                <td>R$ <?= $item["preco"] ?></td>
                <td><?= $item["pedido"] ?></td>
                <td>R$ <?= $item["pedido"] * $item["preco"] ?></td>
                <td><input type="radio" name="id" value="<?= $item["id"] ?>">Retirar Item</td>
             </tr>

        <?php } ?></table>
    <input type="hidden" name="act" value="remove">
    <input type="submit" value="excluir">

</form>
<p>
    <a href="?act=order"><input type="submit" value="Confirma pedido" ></a>   <a href="?act=catalog"> <input type="submit" value="Retornar ao Catalogo" > </a>
</p>

