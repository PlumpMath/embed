<?php

class EmbedCode extends Model
{
  public $includes = [];

  public function view ($view) {
    return __DIR__."/components/views/$view.php";
  }

  public function __construct($options=null)
  {
    parent::__construct();

    if (is_array($options))
      $options = array_merge($this->defaults(), $options);
    else
      $options = $this->defaults();

    foreach ($options as $property => $value) {
      $this->$property = $value;
    }

    $main = 'http'.$ssl.'://'.$_SERVER['SERVER_NAME'].'/';

    $ssl = (isset($_SERVER['HTTPS'])) ? 's' : '';

    $this->includes['link'] = [
      'main'    => $main,
      'script'  => $main.'tour/Embed/js2',
    ];
  }

  public function build()
  {
    $passes = $this->validate();

    if ($passes === true) {
      ob_start();

      extract($this->getData());

      include $this->view('main');

      return ob_get_clean();
    } else {
      ob_start();

      extract(['error' => $passes]);

      include $this->view('error');

      return ob_get_clean();
    }
  }

  public function getData()
  {
    $data = [];

    foreach ($this->propertybin as $name => $property) {
      if ($property->value)
        $data[NameRater::forMachines($name)] = "\tdata-$name=\"{$property->value}\"\n";
    }

    foreach ($this->includes as $name => $value)
      $data[$name] = $value;

    return $data;
  }

  protected function defaults()
  {
    return [];
  }

  protected function inputs()
  {
    return [
      'institution',
      'location',
      'embed-type',
      'platform',
      'third-party',
      'link-type',
      'module',
      'include-op-id',
      'hover-width',
      'hover-width-units',
      'hover-height',
      'hover-height-units',
      'icon-options-mode',
      'icon-size',
      'icon-color',
      'icon-mode',
      'icon-alignment',
      'padding',
      'icon-padding',
      'image-width',
      'image-height',
      'image-quality'
    ];
  }
}
