<?php
/**
 * @var Page $page
 */

use Kirby\Panel\Page;

?>
<?php snippet('header') ?>

<div class="py-6">
  <h1><?= $page->title()->esc() ?></h1>
</div>

<!-- Content -->
<?php foreach ($page->layout()->toLayouts() as $layout): ?>
  <section class="mt-8 grid grid-cols-[1fr] lg:grid-cols-12 gap-12">
    <?php foreach ($layout->columns() as $column): ?>
      <div class="grid-column" style="--columns:<?= $column->span() ?>">
        <div class="prose max-w-none">
          <?= $column->blocks() ?>
        </div>
      </div>
    <?php endforeach ?>
  </section>
<?php endforeach ?>

<?php snippet('footer') ?>
