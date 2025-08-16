<?php
/**
 * @var Site $site
 */

use Kirby\Panel\Site;

?>
</main>
<footer class="bg-primary py-4 text-white text-sm">
  <div class="max-w-7xl m-auto px-4 flex flex-col items-center">
    <div class="text-center">
      <?= $site->footertext() ?>
    </div>
    <!-- Partner -->
    <div class="py-4 flex flex-wrap items-center justify-center gap-4">
      <?php foreach ($site->sponsors()->toStructure() as $sponsor): ?>
        <img class="h-12" src="<?= $sponsor->logo()->toFile()->url() ?>" alt="<?= $sponsor->name() ?>">
      <?php endforeach ?>
    </div>
    <div>
      <a href="#">Teilnahmebedingungen</a> /
      <a href="#">Datenschutzerklärung</a> /
      <a href="#">Impressum</a>
    </div>
  </div>
</footer>

<?= js([
  'assets/js/index.js',
  '@auto'
]) ?>

</body>
</html>
