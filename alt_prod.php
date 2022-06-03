<?php
    require("connect.php");

    $id = $_POST['check_cd'];
    $novo_nome = $_POST['c_novo_nome'];
    
    $sql_pesquisa_cd = "SELECT * FROM `item`";

    $resultado_pesquisa = mysqli_query($conexao,$sql_pesquisa_cd);

    $numero_resultado = mysqli_num_rows($resultado_pesquisa);

    if($numero_resultado == 0)
    {
        ?>
            <script>
                alert("Não existe o CD selecionado");
                javascript:history.back();
            </script>
        <?php
    }
    else
    {
        $sql_alterar_cd = "UPDATE `item` SET `album`='$novo_nome' WHERE id = $id";

        mysqli_query($conexao, $sql_alterar_cd);
        ?>
            <script>
                alert("Nome alterado!");
                window.location.replace("form_alt_prod.php");
            </script>
        <?php
    }
?>