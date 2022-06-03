<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir categoria</title>
</head>
<body>
    <h2>Pesquisar CDs</h2>
    <table border="1">
            <tr>
                <td>ID do CD</td>
                <td>CD</td>
                <td>Selecionar</td>
            </tr>
            <?php

                $ano_lanc = $_POST['c_ano_lanc'];

                //Conexão com o banco
                require("connect.php");

                //Gerando a SQL de PESQUISA das categorias existentes no BD
				$pesquisar_cd = "SELECT * FROM `item` WHERE `ano_lanc` = $ano_lanc";

                //Executando a SQL e armazenando o resultado em uma variavel
				$resultado_cd = mysqli_query($conexao, $pesquisar_cd);

                //Obtendo o numero de linhas retornadas na pesquisa
				$numero_resultado = mysqli_num_rows($resultado_cd);

                if($numero_resultado == 0)
                {
                    ?>
                        <!-- Aqui tem Javascript!-->
                        <script>
                            alert("Não existe CDs cadastrados");
                            window.location.replace("index.html");
                        </script>
                    <?php
                }
                else
                {
                    //Existe categorias cadastradas!
                    for($i = 0  ; $i < $numero_resultado; $i++)
                    {
                        //Gerando um vetor com as categorias
					    $vetor_cd = mysqli_fetch_array($resultado_cd);
                        echo"
                            <tr>
                                <td>$vetor_cd[0]</td>
                                <td>$vetor_cd[1]</td>
                                <td>$vetor_cd[2]</td>
                            </tr>
                            ";
                    }
                }
            ?>
    </table>
</body>
</html>