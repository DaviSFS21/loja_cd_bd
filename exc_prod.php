<?php   
    //Importando o banco
    require("connect.php");

    //Obtendo o ID da categoria do formulário
    $id = $_POST['check_cd'];
    
    //Verificando se existe a categoria
    $sql_pesquisa_cd = "SELECT * FROM `item`";

    //Executando a pesquisa de categorias
    $resultado_pesquisa = mysqli_query($conexao,$sql_pesquisa_cd);

    //Obtendo o numero de linhas retornadas na pesquisa
    $numero_resultado = mysqli_num_rows($resultado_pesquisa);

    if($numero_resultado == 0)
    {
        ?>
            <!-- Aqui tem Javascript!-->
            <script>
                alert("Não existe o CD selecionado");
                javascript:history.back();
            </script>
        <?php
    }
    else
    {
        //Categoria encontrada! Criando a SQL de exclusao da categoria
        $sql_excluir_cd = "DELETE FROM `item` WHERE id = $id";

        //Executando a SQL
        mysqli_query($conexao, $sql_excluir_cd);
        ?>
            <!-- Aqui tem Javascript!-->
            <script>
                alert("CD excluido!");
                window.location.replace("form_exc_prod.php");
            </script>
        <?php
    }
?>