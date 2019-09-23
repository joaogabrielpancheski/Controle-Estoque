<?php

require_once 'global.php';

$numero_de_roupas = 15;
$categoria_id = 11;

$tipo_roupa = ['Blusa', 'Camisa', 'Camiseta', 'Bermuda', 'Calça', 'Jaqueta'];
$sexo_roupa = ['Masculina', 'Feminina'];
$cor_roupa = ['Preta', 'Vermelha', 'Azul', 'Amarela', 'Verde', 'Branca', 'Marrom', 'Rosa'];

$query = "INSERT INTO produtos (nome, preco, quantidade, categoria_id) VALUES (:nome, :preco, :quantidade, :categoria_id)";
$conexao = Conexao::pegarConexao();

for ($x = 1; $x <= $numero_de_roupas; $x++) {
    $tipo_index = rand(0, 5);
    $sexo_index = rand(0, 1);
    $cor_index = rand(0, 7);
    $nome = $tipo_roupa[$tipo_index] . ' ' . $sexo_roupa[$sexo_index] . ' ' . $cor_roupa[$cor_index];
    $preco = rand(1, 100);;
    $quantidade = rand(1, 50);

    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':preco', $preco);
    $stmt->bindValue(':quantidade', $quantidade);
    $stmt->bindValue(':categoria_id', $categoria_id);
    $stmt->execute();
    echo $nome . 'cadastrada com sucesso!';
}