<?php

require 'components/classregistry/app.php';

define('ROOT', __DIR__);

ClassRegistry::start();
Config::load('validatortests');
Config::load('inputs');

$embed = new EmbedCode([
  'institution' => 12,
  'location'    => 1,
]);

echo $embed->build();
