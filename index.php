<?php
    //Essa regex aceita um email com letras maiúsculas e minúsculas.
    $regexEmail = '/^[_aA-zA0-9-]+(\.[_a-z0-9-]+)*@[aA-zA0-9-]+(\.[aA-zA0-9-]{2,4}+)*(\.[aA-zA]{2,3})$/'; 
    $regexRg = '/^[\d]{2}+\.[\d]{3}+\.[\d]{3}+-+[\d]{2}/'; 
    $header="";
    if(isset($_GET['Enviar'])){
        if(preg_match($regexEmail, $_GET['email'])){
            $header="msg1=2";
        }else{
            $header="msg1=1";
        }
        if(preg_match($regexRg, $_GET['rg'])){
            $header=$header."&msg2=4";
        }else{
            $header=$header."&msg2=3";
        }
        header("location: index.php?".$header);
    }
?>
<!DOCTYPE HTML>
<HTML>
    <META CHARSET="UTF-8">
    <META name="author" content = "Rodrigo Lima dos Santos">
</HTML>
<style>
    span{
        font-size: 14pt;
        font-weight: 600;
    }
    span#s1,span#s3{
        color: red;
    }
    span#s2,span#s4{
        color: green;
    }
</style>

<body>
    <h2>Teste Regex</h2>
    <p>'/^[_aA-zA0-9-]+(\.[_a-z0-9-]+)*@[aA-zA0-9-]+(\.[aA-zA0-9-]{2,4}+)*(\.[aA-zA]{2,3})$/'<br>
    ^[\d]{2}+\.[\d]{3}+\.[\d]{3}+-+[\d]{2}</p>
    <?php
        if(isset($_GET['msg1'])){
            if($_GET['msg1']==1){
                ?>
                    <span id="s1">Digite um email válido</span>
                <?php
            }
            if($_GET['msg1']==2){
                ?>
                    <span id="s2">Email válido</span>
                <?php
            }
        }
        ?><br><?php
        if(isset($_GET['msg2'])){
            if($_GET['msg2']==3){
                ?>
                    <span id="s3">Digite um RG válido</span>
                <?php
            }
            if($_GET['msg2']==4){
                ?>
                    <span id="s4">RG válido</span>
                <?php
            }
        }

    ?>
    <form method="GET">
        <label for="text">Digite seu Email: </label>
        <input type="text" name = "email" autofocus/><br><br>
        <label for="text">Digite seu RG: </label>
        <input type="text" name = "rg" autofocus/>
        <input type="submit" name = "Enviar">
    </form>
</body>