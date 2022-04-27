<?php
declare(strict_types=1);


$var1 = 10;

app();


function app(): void
{
    // tady je moje aplikacni logika


    $content_iteraci = 3;
    init(1);
    for ($i = 0; $i < $content_iteraci; $i++) {
        content();
    }
    finish();

}


function init($var1): void
{

    logger('init');
    logger($var1);

}

function contentIterator(): int
{
    //https://www.php.net/manual/en/language.variables.superglobals.php
    //lze obejit pres session :) ktery je defacto superglobal - neresi scope
    //https://www.w3schools.com/php/php_variables_scope.asp

    if (!isset($_SESSION['content_iterator'])) {
        $_SESSION['content_iterator']=0;
    }
    $_SESSION['content_iterator']++;

    return $_SESSION['content_iterator'];
}

function content(): void
{
    // pocet zavolani teto funkce obejdu pres session
    //nebo pres static
    //nebo pres globals
    logger('content ' . contentIterator());

}


function finish(): void
{
    logger('finish');
}


function logger($message): void
{

    echo "logging {$message}  \n";

}
