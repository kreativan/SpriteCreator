# SpriteCreator
ProcessWire icon sprite generator module. Used to create psrite image and css file, from images in specified folder.

This module is based on `php-spriter` https://github.com/namics/php-spriter.

- Install as any other processwire module.
- Setup the settings, **image folder** is required.
- To generate sprite use `$modules->get("SpriteCreator")->generate()` method.
- If folders are not specified in module config, module will create sprite related files in `/templates/sprite/`.
- CSS class for each icon will be ganerated, with defined namespace (default is: `icon-`), and icon name. Eg: `.icon-myicon`
- Include sprite css file on your website.
- Display icons by adding a class to the element: `<span class="icon icon-myicon"></span>`


