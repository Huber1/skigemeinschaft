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
<article class="prose max-w-none">
  <?= $page->text()->kt() ?>
</article>

<?php snippet('footer') ?>
