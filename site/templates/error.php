<?php

use Kirby\Panel\Page;

/**
 * @var Page $page
 */

?>
<?php snippet('header') ?>

<div class="py-6">
  <h1><?= $page->title()->esc() ?></h1>
</div>

<!-- Content -->
<div class="flex flex-col items-center">
  <?php if ($page->content()->image()->toFile() != null): ?>
    <img
      src="<?= $page->content()->image()->toFile()->url() ?>"
      class="mb-8 rounded-lg">
  <?php endif ?>
  <div class="prose text-center max-w-xl">
    <?= $page->content()->text()->kirbytext() ?>
  </div>
</div>

<?php snippet('footer') ?>
