<!DOCTYPE html>
<?php   

   require_once "classe/ClassQuadrado.php";
   $title = "Recuperação";
   $lado = isset($_POST["lado"]) ? $_POST["lado"] : 0;
   $cor = isset($_POST["cor"]) ? $_POST["cor"] : "Verde";
   $buscar = isset($_POST["buscar"]) ? $_POST["buscar"] : "";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    </style>
</head>
<body class="">

<?php
 
    ?>

<div>
        <table>
            <thead>
                <tr>
                    <th scope="col"> | #ID | </th>
                    <th scope="col"> | Lado | </th>
                    <th scope="col"> | Cor | </th>
                    <th scope="col"> | Mostrar quadrado | </th>
                    <th scope="col"> | Editar | </th>
                    <th scope="col"> | Excluir | </th>

                </tr>
            </thead>
            <tbody>
            <?php
                $pdo = Conexao::getInstance();
                $consulta = $pdo->query("SELECT * FROM quadrado ORDER BY id");
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $linha['id'];?></th>
                    <th scope="row"><?php echo $linha['lado'];?></th>
                    <td scope="row"><?php echo $linha['cor'];?></td>
                    <td scope="row"><a href="mostrar.php?lado=<?php echo $linha['lado'];?>&cor=<?php echo str_replace('#', '%23',  $linha['cor']);?>">Quadrado</a></td> 
                    <td><a href='index.php?acao=editar&id=<?php echo $linha['id'];?>'> <img src="img/edit.svg" style="width: 1.8vw;"></a></td>
                    <td><?php echo " <a href=javascript:excluirRegistro('processa.php?acao=excluir&id={$linha['id']}')>";?><img src="img/excluir.png" style="width: 1.5vw;"></a></td>
                    
                </tr>
            <?php } ?> 
            
            </tbody>
        </table>
    </div>
    <button><a target="_blank" href='index.php'>Voltar</a> </button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    
</body>
</html>