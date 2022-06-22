<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="car_section">
  <div class="container">
    <div class="row car_main">
      <div id="car_sec_right_" class="col-lg-12 car_right">
        <div>
          <h2 class="head_clr"><span class="head_name_color">Run your</span> own business</h2>
          <h3>without spending anything!</h3>
          <h4>Partner with SecureHub Consultants Private Limited</h4>
        </div>
		<?= form_open('api/become_partners', 'id="inquiry_form" class="inquiryForm validate-form" style="border: none;"') ?>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="row">
                <div class="col-lg-6">
                  <div class="ig">
                    <label>Full Name</label>
                    <input type="text" name="name" placeholder="Name" maxlength="100" />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="ig">
                    <label>Mobile Number</label>
                    <input placeholder="10 Digit Mobile Number" type="phone" maxlength="10" name="mobile" />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="ig">
                    <label>Email Id</label>
                    <input type="email" name="email" placeholder="abc@gmail.com" maxlength="100" />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="ig">
                    <label>Location</label>
                    <input type="text" name="location" placeholder="Location" maxlength="50" />
                  </div>
                </div>
                <div class="col-12">
                  <div class="ig">
                    <label>Your Message</label>
                    <textarea name="p_message" id="text_ins" cols="70" rows="6" maxlength="255" placeholder="Your Message"></textarea>
                  </div>
                </div>
                <div class="col-12 mt-4">
                  <p class="privacy_p">By clicking on "SUBMIT", You Agree to our 
                      <?= anchor('privacy-policy', 'Privacy Policy', 'id="term_policy"'); ?> &amp; 
                      <?= anchor('terms-of-use', 'Terms of Use', 'id="term_policy"'); ?></p>
                </div>
                <div class="col-lg-12">
                  <div class="ig">
                    <button class="btn_car_submit" type="submit" name="inquirySubmit">Submit</button>
                  </div>
                </div>
                <div class="col-12 mt-2">
                  <p class="btn_down_p">Need Help? Call Us at<a class="btn_a_down_last" href="tel:+91 <?= $this->config->item('mobile') ?>"> +91<?= $this->config->item('mobile') ?></a></p>
                </div>
              </div>
            </div>
          </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</section>
<section id="why_choose_car_section">
	<div class="container">
		<div class="row car_ins_main">
				<div class="car_insu_head_ partnership_head">
					<h2 class="head_clr"><span class="head_name_color">Benefits of becoming</span> a partner with us</h2>
				</div>
				<div class="row partnership_main">
				<div class="col-lg-3 col-md-3 col-sm-6 partnership_content">
					<div class="card crd_partnership" style="width: 100%;">
						<?= img('assets/front/img/partner/boss-2.png', '', 'class="card-img-top"') ?>
						<div class="card-body crd_bdy_partnership">
							<h5 class="card-title crd_title_partnership">Become your own Boss</h5>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 partnership_content">
					<div class="card crd_partnership" style="width: 100%;">
                        <?= img('assets/front/img/partner/flexible.png', '', 'class="card-img-top flexible_img"') ?>
						<div class="card-body crd_bdy_partnership">
							<h5 class="card-title crd_title_partnership">Flexible working hours</h5>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 partnership_content">
					<div class="card crd_partnership" style="width: 100%;">
					    <?= img('assets/front/img/partner/training-1.png', '', 'class="card-img-top training_img"') ?>
						<div class="card-body crd_bdy_partnership">
							<h5 class="card-title crd_title_partnership">Training</h5>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 partnership_content">
					<div class="card crd_partnership" style="width: 100%;">
					    <?= img('assets/front/img/partner/work with us.png', '', 'class="card-img-top work_with_us_img"') ?>
						<div class="card-body crd_bdy_partnership">
							<h5 class="card-title crd_title_partnership">Work directly with us</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="row partnership_main">
				<div class="col-lg-3 col-md-3 col-sm-6 partnership_content">
					<div class="card crd_partnership" style="width: 100%;">
					    <?= img('assets/front/img/partner/no paper claim.png', '', 'class="card-img-top no_paper_claim_img"') ?>
						<div class="card-body crd_bdy_partnership">
							<h5 class="card-title crd_title_partnership">No Paperwork</h5>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 partnership_content">
					<div class="card crd_partnership" style="width: 100%;">
					    <?= img('assets/front/img/partner/lead-generation.png', '', 'class="card-img-top lead-generation_img"') ?>
						<div class="card-body crd_bdy_partnership">
							<h5 class="card-title crd_title_partnership">Generated leads</h5>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 partnership_content">
					<div class="card crd_partnership" style="width: 100%;">
					    <?= img('assets/front/img/partner/data.png', '', 'class="card-img-top data_img"') ?>
						<div class="card-body crd_bdy_partnership">
							<h5 class="card-title crd_title_partnership">Data management support</h5>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 partnership_content">
					<div class="card crd_partnership" style="width: 100%;">
					    <?= img('assets/front/img/partner/support-2.png', '', 'class="card-img-top support_img"') ?>
						<div class="card-body crd_bdy_partnership">
							<h5 class="card-title crd_title_partnership">Company portal support</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="row partnership_main">
				<div class="col-lg-3 col-md-3 col-sm-6 partnership_content">
					<div class="card crd_partnership" style="width: 100%;">
					    <?= img('assets/front/img/partner/branding_kit-1.png', '', 'class="card-img-top branding_kit_img"') ?>
						<div class="card-body crd_bdy_partnership">
							<h5 class="card-title crd_title_partnership">Branding kit</h5>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 partnership_content">
					<div class="card crd_partnership" style="width: 100%;">
					    <?= img('assets/front/img/partner/office-1.png', '', 'class="card-img-top office_img"') ?>
						<div class="card-body crd_bdy_partnership">
							<h5 class="card-title crd_title_partnership">Corporate office design</h5>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 partnership_content">
					<div class="card crd_partnership" style="width: 100%;">
					    <?= img('assets/front/img/partner/digital claim-1.png', '', 'class="card-img-top digital_claim_img"') ?>
						<div class="card-body crd_bdy_partnership">
							<h5 class="card-title crd_title_partnership">Easy Digital claims</h5>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 partnership_content">
					<div class="card crd_partnership" style="width: 100%;">
					    <?= img('assets/front/img/partner/full_support.png', '', 'class="card-img-top full_support_img"') ?>
						<div class="card-body crd_bdy_partnership">
							<h5 class="card-title crd_title_partnership">Full support</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row car_ins_main mt-5">
			<div class="car_insu_head_">
				<h2 class="head_clr"><span class="head_name_color">Crit</span>eria</h2>
			</div>
			<div class="col-12">
				<div class="car_insu_content_">
					<p><span><i class="far fa-hand-point-right"></i>  Anyone with the age of <strong>18+</strong> has a minimum qualification of <strong>10th</strong> pass with a valid <strong>Aadhar card</strong> and <strong>PAN card</strong> can become a partner.</span></p>
					<p><span><i class="far fa-hand-point-right"></i>  The person should have convincing power and basic knowledge of <strong>insurance</strong>.</span></p>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="car_section_content">
	<div class="container">
		<div class="row car_ins_main_ rw_fire">
			<div class="covered_car_insurence_head">
				<h2 class="head_clr"><span class="head_name_color"></span>Note</h2>
			</div>
			<div class="col-12 car_ins_cont">
				<div class="car_insu_content_">
					<p><span><i class="far fa-hand-point-right"></i>  The partner shall not, either directly or indirectly, act as an insurance agent for, or be connected with an employee, consultant, agent or otherwise, any other insurance company or become or remain a director or partner of any insurance company.</span></p>
				</div>
			</div>
		</div>
		<div class="row car_ins_main_ rw_fire">
			<div class="car_insu_head_">
				<h2 class="head_clr"><span class="head_name_color">Terms & </span>Conditions</h2>
			</div>
			<div class="col-12">
				<div class="car_insu_content_">
					<ul class="gmc_ins_ul">
						<li>The partner will work under the name of SecureHub Consultants Private Limited and is subject to show his validate identity if asked.</li>
						<li>The partner shall not, either directly or indirectly, act as an insurance agent for, or be connected with an employee, consultant, agent or otherwise, any other insurance company or become or remain a director or partner of any insurance company.</li>
						<li>Any lead generated by SecureHub Consultants Private Limited is strictly confidential and cannot be shared with any other insurance company, agent, partner, employee, or third party. If the partner is accused of doing the same, we'll begin an investigation. The contract will be put on hold while we investigate. The contract will be terminated if we find him/her guilty of doing this.</li>
						<li>The partner has to work on the partner portal only. He/She is subject to give constant follow-ups of everything.</li>
						<li>Without the permission or approval of SecureHub Consultants Private Limited, the partner cannot appoint any agent.</li>
						<li>Any violation of the code of conduct may result in the termination of the contract.</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>