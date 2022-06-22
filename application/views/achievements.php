<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="gallery">
  <div class="container">
    <div id="image-gallery">
      <div class="row">
        <?php foreach(array_diff(scandir('assets/front/img/achievements/'), ['..', '.']) as $img): ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
          <div class="img-wrapper">
            <a href="<?= base_url('assets/front/img/achievements/'.$img) ?>">
              <img id="gall_img_11" src="<?= base_url('assets/front/img/achievements/'.$img) ?>" class="img-responsive">
            </a>
            <div class="img-overlay">
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </div>
          </div>
        </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</section>