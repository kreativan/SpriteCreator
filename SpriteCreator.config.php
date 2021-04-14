<?php
/**
 *  SpriteCreator Config
 *
 *  @author Ivan Milincic <kreativan@outlook.com>
 *  @copyright 2021 kraetivan.dev
 *  @link http://kraetivan.dev
 *
 *
*/
class SpriteCreatorConfig extends ModuleConfig {

	public function getInputfields() {
		$inputfields = parent::getInputfields();

    $wrapper = new InputfieldWrapper();

    // enable
		$f = $this->wire('modules')->get("InputfieldRadios");
		$f->attr('name', 'force_generate');
		$f->label = 'Force CSS and sprite generation';
		$f->options = array(
			'1' => "Enable",
			'2' => "Disable",
		);
		$f->required = true;
		$f->defaultValue = "1";
		$f->optionColumns = 1;
		$inputfields->add($f);

    $f = $this->wire('modules')->get("InputfieldText");
    $f->attr('name', 'src_directory');
    $f->label = 'Image Folder';
    $f->placeholder = "sprite";
    $f->columnWidth = "100%";
    $f->required = true;
    $f->description = __("Folder that contains the source pictures for the sprite.");
    $f->notes = __("Relative to templates folder eg: `assets/images`");
    $inputfields->add($f);

    $f = $this->wire('modules')->get("InputfieldText");
    $f->attr('name', 'sprite_directory');
    $f->label = 'Sprite Folder';
    $f->placeholder = "sprite";
    $f->columnWidth = "100%";
    $f->description = __("Folder where you want the sprite image file to be saved (folder has to be writable by your webserver");
    $f->notes = __("Relative to templates folder eg: `assets/sprite`");
    $inputfields->add($f);

    $f = $this->wire('modules')->get("InputfieldText");
    $f->attr('name', 'sprite_filepath');
    $f->label = 'Css Image path';
    $f->placeholder = "sprite";
    $f->columnWidth = "100%";
    $f->description = __("Path to the sprite image for CSS rule.");
    $f->notes = __("Relative to templates folder eg: `assets/sprite`");
    $inputfields->add($f);

    $f = $this->wire('modules')->get("InputfieldText");
    $f->attr('name', 'sprite_filename');
    $f->label = 'Sprite Filename';
    $f->placeholder = "icon-sprite";
    $f->columnWidth = "100%";
    $f->description = __("Name of the generated CSS and PNG file.");
    $f->notes = __("default: `icon-sprite`");
    $inputfields->add($f);

    $f = $this->wire('modules')->get("InputfieldText");
    $f->attr('name', 'icon_namespace');
    $f->label = 'Icons Namespace';
    $f->placeholder = "icon-";
    $f->columnWidth = "100%";
    $f->description = __("Namespace for your icon CSS classes");
    $f->notes = __("default: `icon-`");
    $inputfields->add($f);

    $f = $this->wire('modules')->get("InputfieldText");
    $f->attr('name', 'css_directory');
    $f->label = 'CSS Directory';
    $f->placeholder = "sprite";
    $f->columnWidth = "100%";
    $f->description = __("Folder where you want the sprite CSS to be saved (folder has to be writable, too)");
    $f->notes = __("Relative to templates folder eg: `assets/css`");
    $inputfields->add($f);

    $f = $this->wire('modules')->get("InputfieldText");
    $f->attr('name', 'css_filename');
    $f->label = 'CSS Filename';
    $f->placeholder = "icon-sprite.css";
    $f->columnWidth = "100%";
    $f->description = __("Your CSS/Less/Sass target file");
    $f->notes = __("default: `icon-sprite.css`");
    $inputfields->add($f);

		// render fields
		return $inputfields;

	}

}
