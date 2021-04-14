<?php
/**
 *  Sprite Creator
 *
 *  @author Ivan Milincic <kreativan.dev@gmail.com>
 *  @copyright 2021 kraetivan.dev
 *  @link http://kraetivan.dev
 *
 *
*/

class SpriteCreator extends WireData implements Module {

  public static function getModuleInfo() {
    return array(
      'title' => 'Sprite Creator',
      'version' => 100,
      'summary' => 'Generate sprite from images',
      'icon' => 'image',
      'singular' => true,
      'autoload' => false
    );
  }


  public function __construct() {

    $this->tmpl_path = $this->config->paths->templates;
    $this->tmpl_url = $this->config->urls->templates;

    $this->srcDirectory = $this->tmpl_path . $this->src_directory;
    $this->spriteDirectory = !empty($this->sprite_directory) ? $this->tmpl_path . $this->sprite_directory : $this->tmpl_path . "sprite";

    $this->spriteFilepath = !empty($this->sprite_filepath) ? $this->tmpl_url . $this->sprite_filepath : $this->tmpl_url . "sprite";
    $this->spriteFilename = !empty($this->sprite_filename) ? $this->sprite_filename : "icon-sprite";

    $this->cssDirectory = !empty($this->css_directory) ? $this->tmpl_url . $this->css_directory : $this->tmpl_path . "sprite";

  }

  public function generate() {

    if(empty($this->src_directory) || $this->src_directory == "") return; 

    if(!is_dir($this->spriteDirectory)) $this->files->mkdir($this->spriteDirectory);
    if(!is_dir($this->cssDirectory)) $this->files->mkdir($this->cssDirectory);


    require_once __DIR__ . '/spriter/icon.class.php';
    require_once __DIR__ . '/spriter/spriter.class.php';

    $spriter_config = [
      "forceGenerate" => $this->force_generate == "1" ? true : false,

      "srcDirectory" => $this->tmpl_path . $this->src_directory,
      "spriteDirectory" => $this->spriteDirectory,

      "spriteFilepath" => $this->spriteFilepath,
      "spriteFilename" => $this->spriteFilename, 

      "tileMargin" => 0,  
      "retina" => array(1, 1), 
      "retinaDelimiter" => "@",
      "namespace" => !empty($this->icon_namespace) ? $this->icon_namespace : "icon-", 

      "ignoreHover" => true,

      "targets" => array(
        array(
          "cssDirectory" => $this->cssDirectory,
          "cssFilename" => !empty($this->css_filename) ? $this->css_filename : "icon-sprite.css",
        )
      )
    ];

    new Spriter($spriter_config);

  }

}