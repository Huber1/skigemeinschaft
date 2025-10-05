<?php
/**
 * @var Block $block
 */

use Kirby\Cms\Block;

?>

<a href="<?= $block->link()->toUrl() ?>" class="btn"><?= $block->text() ?></a>
