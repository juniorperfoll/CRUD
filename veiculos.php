<div class="box_titulo_interno">
    <H2><i class="fa fa-car fa-1x"></i> Lista de Veículos</H2>
</div>
<br>
<div class="box_link">
    <a href="?pg=addVeiculo">Adicionar</a>
</div>
<br>
<hr>
<br>
<?php
require_once 'dao/DaoVeiculo.php';
$DaoVeiculo = DaoVeiculo::getInstance();
$dados = $DaoVeiculo->listar();
?>
<table>
    <tr>
        <th>Código</th>
        <th>Descrição</th>
        <th>Marca</th>
        <th>Preço</th>
        <th>Imagem</th>
        <th>Destaque</th>
        <th>Ações</th>
    </tr>
    <?php
    foreach ($dados as $row) {
        $id = $row["id"];
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["descricao"] . "</td>";
        echo "<td>" . $row["marca"] . "</td>";
        echo "<td>" . $row["preco"] . "</td>";
        echo "<td><img src='fotos/{$row["imagem"]}'/></td>";
        $destaque = ($row["destaque"]==1)?"Sim":"Não";
        echo "<td>" . $destaque . "</td>";
        echo "<td><a href='?pg=editVeiculo&id=$id' title='Editar'><i class='fa fa-pencil fa-lg'></i></a>"
        . " <a href='?pg=delVeiculo&id=$id' title='Excluir' onclick='return confirm(\"Deseja excluir?\")'><i class='fa fa-trash fa-lg'></i></a></td>";
        echo "</tr>";
    }
    ?>
</table>