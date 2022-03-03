<main class = "shadow-lg py-3 px-md-5 mb-5 bg-white text-dark rounded border">

<?php
    if(isset($_POST['submit']))
        require_once "resultadoForms.php"
?>
<form action="#" method="post">
<form>

    <div class="form-row justify-content-center">
    
        <div class="form-group col-md-2">
            <a href="pessoafisica.php" class="text-decoration-none"><button type="button" name="btn" class="btn btn-warning btn-lg btn-block text-center">Pessoa Física</button></a>
        </div>
        <div class="form-group col-md-2">
            <a href="pessoajuridica.php" class="text-decoration-none"><button type="button" name="btn" class="btn btn-warning btn-lg btn-block text-center">Pessoa Jurídica</button></a>
        </div>
    </div>

</form>

</main>