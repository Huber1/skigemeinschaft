<?php

use Kirby\Cms\Page;

/**
 * @var Page $page
 */

?>
<?php snippet('header') ?>

<div class="py-6">
  <h1 class="text-center text-3xl"><?= $page->title()->esc() ?></h1>
</div>

<!-- Angebote Cards -->
<div class="grid grid-cols-2 gap-8">
  <?php foreach ($page->children() as $child): ?>
    <a href="<?= $child->url() ?>" class="block cursor-pointer group">
      <div class="bg-salmon-50 flex p-2">
        <div>IMAGE</div>
        <div class="flex flex-col gap-4">
          <h2 class="text-xl font-medium group-hover:text-salmon">
            <?= $child->title() ?>
          </h2>
          <div class="text-primary">
            <?= $child->termin() ?>
          </div>
          <div class="line-clamp-3 text-gray-600">
            <?= $child->text() ?>
          </div>
        </div>
      </div>
    </a>
  <?php endforeach ?>
</div>

<?php snippet('footer') ?>
