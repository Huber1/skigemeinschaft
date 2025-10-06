<?php
/** @var File $image
 * @var string|null $position
 */

use Kirby\Cms\File;

$pos = match ($position ?? null) {
  'left' => 'object-left',
  'right' => 'object-right',
  'top' => 'object-top',
  'bottom' => 'object-bottom',
  default => 'object-center',
};

$class = "rounded-lg absolute w-full h-full object-cover $pos";

$sizes = "(min-width: 1200px) 50vw,
        (min-width: 900px) 66vw,
        (min-width: 600px) 100vw,
        200vw";
?>

<div class="w-full h-full overflow-hidden relative">
  <picture>
    <source
      class="<?= $class ?>"
      srcset="<?= $image->srcset('avif') ?>"
      sizes="<?= $sizes ?>"
      type="image/avif"
    >
    <source
      class="<?= $class ?>"
      srcset="<?= $image->srcset('webp') ?>"
      sizes="<?= $sizes ?>"
      type="image/webp"
    >
    <img
      class="<?= $class ?>"
      alt="<?= $image->alt() ?>"
      src="<?= $image->resize(300)->url() ?>"
      srcset="<?= $image->srcset() ?>"
      sizes="<?= $sizes ?>"
      width="<?= $image->resize(1800)->width() ?>"
      height="<?= $image->resize(1800)->height() ?>"
    >
  </picture>
</div>