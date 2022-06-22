<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="news_and_blogs_section">
    <div class="container">
        <div class="row news_and_blogs_main">
            <?php foreach($news as $n): ?>
            <div class="col-lg-4 col-md-6 col-sm-6 news_and_blogs_content">
                <a class="blg_nws" href="<?= current_url().'/'.$n['slug'] ?>">
                    <div class="card crd_bg crd_blg_nws" id="crd_blg_nws_respo" style="width: 100% !important;">
                        <?= img($n['image'], '', 'class="card-img-top"') ?>
                        <div class="card-body">
                            <h5 class="card-title h5_blg_nws"><?= $n['title'] ?></h5>
                            <p class="news_blog_p">Created On</p>
                            <p class="news_blog_p_"><?= date("jS F Y", $n['created_at']) ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>