<?php

function GetHeader() {
    $str = <<<EOD
<html lang="en">

<head>
    <!-- Force latest IE rendering engine or ChromeFrame if installed -->
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta charset="utf-8">

    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="/steven/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Generic page styles -->
    <link rel="stylesheet" href="/steven/css/style.css">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="/steven/css/jquery.fileupload.css">
    <link rel="stylesheet" href="/steven/css/cookieconsent.min.css">
    <link rel="shortcut icon" href="#" />
</head>

<body>
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-fixed-top .navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Home</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="./index.php">Upload</a></li>
                    <li><a href="./downloadpage.php">Download</a></li>
                    <li><a href="./about.php">About</a></li>
                </ul>
            </div>
        </div>
    </div>
EOD;
    
    return $str;
}