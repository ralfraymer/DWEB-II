<?php
    require('../../autoload.php');
    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">';

    $body = new Body("bg-dark");

    $body->addElementBody("<h1>Título H1</h1>");
    echo $body->getBody();

?>