<?php
include_once "conexao.php";

try{
    $consulta = $conectar->query("select * from login");

    echo "<a href='formCadastro.php'>Cadastrar Usuário</a>";
    echo "<br><br>";
    echo "Listagem de Usuários";

    echo "<br><br>";

    echo "
    <table border='1'>
    <tr>
        <td>Nome</td>
        <td>Login</td>
        <td>Ações</td>
    </tr>";

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
        // linha ["id"=>1, "login" => "matheus", "nome" => “matheus”]        
        echo "
        <tr>
            <td>$linha[nome]</td>
            <td>$linha[login]</td>
            <td><a href='formEditar.php?id=$linha[id]'>Editar</a> 
            - <a href='excluir.php?id=$linha[id]'> Excluir</a></td>
        </tr>        
        ";
    }

    echo "</table>";

    echo "<br>";

    echo $consulta->rowCount() . " Total de Registros";

} catch(PDOException $e){
    echo "Erro na página" . $e->getMessage();
}

?>