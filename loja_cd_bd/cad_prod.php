<?php
    require("connect.php");

    $ano_lanc = $_POST["c_ano_lanc"];  
    $album = $_POST["c_album"]; 
    $quant_faixas = $_POST["c_quant_faixas"];

    $pesquisar_nome = "SELECT * FROM `item` WHERE album = '$album'";

    $resultado_nome = mysqli_query($conexao, $pesquisar_nome);

    $numero_retorno = mysqli_num_rows($resultado_nome);
       
    if($numero_retorno == 0)
    {
        $sql_cadastrar = "INSERT INTO `item`(`ano_lanc`,`album`,`quant_faixas`) VALUES ('$ano_lanc','$album','$quant_faixas')";
        mysqli_query($conexao, $sql_cadastrar);        
        ?>
            <script>
                alert("CD cadastrado!");
                window.location.replace("index.html");
            </script>
        <?php
    }else{
        ?>
            <script>
                alert("CD já cadastrado...");
                javascript:history.back();
            </script>
        <?php
    }     
?>