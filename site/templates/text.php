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
<article class="prose max-w-none">
  <?= $page->text()->kt() ?>
</article>

<?php snippet('footer') ?>
