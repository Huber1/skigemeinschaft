<?php

use Kirby\Panel\Page;

/**
 * @var Page $page
 */

?>
<?php snippet('header') ?>

<div class="py-6">
  <h1 class="text-center text-3xl"><?= $page->title()->esc() ?></h1>
</div>

<!-- Content -->
<?php foreach ($page->layout()->toLayouts() as $layout): ?>
  <section class="mt-8 grid grid-cols-12 gap-12">
    <?php foreach ($layout->columns() as $column): ?>
      <div style="grid-column: span <?= $column->span() ?>">
        <div class="prose max-w-none">
          <?= $column->blocks() ?>
        </div>
      </div>
    <?php endforeach ?>
  </section>
<?php endforeach ?>

<?php snippet('footer') ?>
