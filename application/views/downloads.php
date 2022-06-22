<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="car_section_content">
	<div class="container">
		<div class="row car_ins_main_ rw_fire">
			<div class="col-12 car_ins_cont">
				<div class="car_insu_content_">
                    <?php foreach ($forms as $v): ?>
					    <p><?= anchor($v['d_file'], '<span><i class="far fa-hand-point-right"></i> '.$v['title'].'</span>', 'class="text-dark text_decor" download=""') ?></p>
                    <?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</section>