<?php

use Kirby\Cms\File;
use Kirby\Cms\Page;

/**
 * @var Page $page
 * @var File|null $backgroundFile
 */

$backgroundFile = $page->content()->background()->toFile();
?>

<?php snippet('header', ['padding' => false], slots: true) ?>
<?php if ($backgroundFile !== null): ?>
  <link rel="preload" fetchpriority="high" as="image" href="<?= $backgroundFile->url() ?>">
<?php endif; ?>
<?php endsnippet() ?>


<!-- Hero section -->
<div
  class="h-128 p-8 flex flex-col justify-center gap-16 items-center bg-cover bg-bottom lg:rounded-lg"
  <?php if ($backgroundFile !== null): ?>
    style="background-image: url('<?= $backgroundFile->url() ?>')"
  <?php endif; ?>
>
</div>

<div class="px-8 mt-16">
  <!-- Content -->
  <?php foreach ($page->layout()->toLayouts() as $layout): ?>
    <section class="mt-8 grid grid-cols-[1fr] lg:grid-cols-12 gap-4 md:gap-12">
      <?php foreach ($layout->columns() as $column): ?>
        <div class="grid-column mb-8" style="--columns:<?= $column->span() ?>">
          <div class="prose">
            <?= $column->blocks() ?>
          </div>
        </div>
      <?php endforeach ?>
    </section>
  <?php endforeach ?>
</div>

<?php snippet('footer') ?>
