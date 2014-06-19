<?php

require 'components/classregistry/app.php';

define('ROOT', __DIR__);

ClassRegistry::start();
Config::start();

$embed = new EmbedCode;

$embed->validate();
