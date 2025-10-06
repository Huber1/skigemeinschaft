<?php
/** @var File $image
 */

use Kirby\Cms\File;

$sizes = "(min-width: 1200px) 50vw,
        (min-width: 900px) 66vw,
        (min-width: 600px) 100vw,
        200vw";
?>

<picture>
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
    class="rounded-lg"
    alt="<?= $image->alt() ?>"
    src="<?= $image->resize(300)->url() ?>"
    srcset="<?= $image->srcset() ?>"
    sizes="<?= $sizes ?>"
    width="<?= $image->resize(1800)->width() ?>"
    height="<?= $image->resize(1800)->height() ?>"
  >
</picture>