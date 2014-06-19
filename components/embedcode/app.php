<?php

class EmbedCode extends Model
{
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
  }

  public function get()
  {
    
  }

  protected function defaults()
  {
    return [];
  }

  protected function inputs()
  {
    return [
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
