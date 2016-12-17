<?php
require_once 'Twig/vendor/autoload.php';
$tplDir   = 'templates';
$domain   = 'app';
$loader   = new Twig_Loader_Filesystem($tplDir);
$tmpDir   = 'cache';
$twig     = new Twig_Environment($loader,
    array(
    'cache' => $tmpDir,
    'auto_reload' => true
    ));
$twig->addExtension(new Twig_Extensions_Extension_I18n());
$mydomain = 'app';
$lang     = 'ru_RU';
putenv('LC_ALL='.$lang);
setlocale(LC_ALL, $lang);
bindtextdomain($mydomain, 'locale');
bind_textdomain_codeset($mydomain, 'UTF-8');
textdomain($mydomain);
echo $twig->render('index.html.twig', array('user' => 'John Doe'));
