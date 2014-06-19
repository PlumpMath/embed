<?php

class ClassRegistry
{
  static $class;

  static function start()
  {
    spl_autoload_register(get_called_class().'::autoload');
  }

  static function autoload($class)
  {
    static::$class = strtolower($class);
    static::lookIn(ROOT);
  }

  static function lookIn($dir)
  {
    $path = $dir.'/components/'.static::$class.'/app.php';

    if (file_exists($path)) {
      include $path;
    } else if (is_dir($dir.'/components/')) {
      $directories = scandir($dir.'/components/');

      foreach ($directories as $directory) {
        if (is_dir($dir.'/components/'.$directory) &&
            $directory !== '.' &&
            $directory !== '..')
          static::lookIn($dir.'/components/'.$directory);
      }
    }
  }
}
