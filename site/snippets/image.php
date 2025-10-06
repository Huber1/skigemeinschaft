<?php
/** @var \Kirby\Cms\File $image */

$sizes = "(min-width: 1200px) 25vw,
        (min-width: 900px) 33vw,
        (min-width: 600px) 50vw,
        100vw";
?>

<div class="w-full h-full overflow-hidden relative">
  <picture class="absolute w-full h-full object-cover top-0 left-0">
    <source
      srcset="<?= $image->srcset('avif') ?>"
      sizes="<?= $sizes ?>"
      type="image/avif"
    >
    <source
      srcset="<?= $image->srcset('webp') ?>"
      sizes="<?= $sizes ?>"
      type="image/webp"
    >
    <img
      class="rounded-lg absolute w-full h-full object-cover top-0 left-0"
      alt="<?= $image->alt() ?>"
      src="<?= $image->resize(300)->url() ?>"
      srcset="<?= $image->srcset() ?>"
      sizes="<?= $sizes ?>"
      width="<?= $image->resize(1800)->width() ?>"
      height="<?= $image->resize(1800)->height() ?>"
    >
  </picture>
</div>