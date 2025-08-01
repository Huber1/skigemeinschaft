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
    <div class="py-4">PARTNER</div>
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
