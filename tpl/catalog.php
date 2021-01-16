<h1>Cardapio</h1>
<form action="<?= ""; ?>" method="post">
    <table>
        <tr>
            <th> Nome do produto</th>
            <th> Preço</th>
            <th></th>
        </tr>
        
        <?php foreach ($items as $id => $item) { ?>
          <tr>
                <td> <?= $item["nome"]?> </td>
                <td> R$ <?= $item["preco"] ?></td>
                <td><input type="radio" name="id" value="<?= $item["id"] ?>"> incluir esse item</td>
            </tr>

        <?php } ?>
    </table>
    <input type="hidden" name="act" value="add">
    <input type="submit" value="Adicionar">
</form>
<p> <a href="?act=cart"> <input type="submit" value="Verifique o conteúdo do carrinho"> </a> </p>