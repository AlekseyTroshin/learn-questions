<?php

use core\View;

/**
 * @var View $this
 */


?>

<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>learn-questions</title>


    <link href="/resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="/resources/css/style.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">


<header class="blog-header py-3 bg-dark navbar-dark mb-3">
    <div class="container">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4">
                <a class="link-secondary link-underline-opacity-0" href="/"><h3>Learn-Questions</h3></a>
            </div>
            <?php $this->getPart('parts/user/head_auth'); ?>
        </div>
    </div>
</header>

