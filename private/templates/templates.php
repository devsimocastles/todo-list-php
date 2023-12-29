<?php 

function mostrarHeader($titulo, $body_cls){
    $header = <<<_DOC
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>$titulo</title>
        <link rel="stylesheet" href="../../public/styles/main.css">
    </head>


    <body class="$body_cls">
    _DOC;

    echo $header;
}

?>

<?php 

function mostrarFooter(){
    $footer = <<<_DDD
        </body>
        </html>
    _DDD;

    echo $footer;
}

?>