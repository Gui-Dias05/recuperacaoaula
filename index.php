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
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    </style>
</head>
<body class="">
<?php
    
    
    ?>

<form action="processa.php" method="post">
       <input type="color" class="form-control" required type="text" name="cor" id="cor" placeholder="Digite a cor"><br>

       <input type="text" class="form-control" required type="text" name="lado" id="lado" placeholder="Digite o tamanho do lado"  value="<?php if ($buscar=="buscar"){echo $lado;}?>">

       <button type="submit" class="btn btn-dark" id="buscar" value="ENVIAR">Enviar</button>
</form><br>

<div>
        <table>
            <thead>
                <tr>
                    <th scope="col"> | #ID | </th>
                    <th scope="col"> | Lado | </th>
                    <th scope="col"> | Cor | </th>
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
                    
            <?php } ?> 
            </tbody>
        </table>
    </div>
    <button><a target="_blank" href='listar.php'>Listar</a> </button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    
</body>
</html>