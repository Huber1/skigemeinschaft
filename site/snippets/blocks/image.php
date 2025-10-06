<?php

/** @var \Kirby\Cms\Block $block */
$alt = $block->alt();
$caption = $block->caption();
$crop = $block->crop()->isTrue();
$link = $block->link();
$ratio = $block->ratio()->or('auto');
$src = null;

if ($block->location() == 'web') {
  $src = $block->src()->esc();
} elseif ($image = $block->image()->toFile()) {
  $alt = $alt->or($image->alt());
  $src = $image->url();
}

$sizes = "(min-width: 1200px) 50vw,
        (min-width: 900px) 66vw,
        (min-width: 600px) 100vw,
        200vw";

?>

<?php if ($src): ?>
  <figure<?= Html::attr(['data-ratio' => $ratio, 'data-crop' => $crop], null, ' ') ?>>
    <?php if ($link->isNotEmpty()): ?>
    <a href="<?= Str::esc($link->toUrl()) ?>">
      <?php endif ?>
      <?php if (isset($image) && $image): ?>
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
            alt="<?= $image->alt() ?>"
            src="<?= $image->resize(300)->url() ?>"
            srcset="<?= $image->srcset() ?>"
            sizes="<?= $sizes ?>"
            width="<?= $image->resize(1800)->width() ?>"
            height="<?= $image->resize(1800)->height() ?>"
          >
        </picture>
      <?php else: ?>
        <img src="<?= $src ?>" alt="<?= $alt->esc() ?>">
      <?php endif ?>
      <?php if ($link->isNotEmpty()): ?>
    </a>
  <?php endif ?>

    <?php if ($caption->isNotEmpty()): ?>
      <figcaption>
        <?= $caption ?>
      </figcaption>
    <?php endif ?>
  </figure>
<?php endif ?>
