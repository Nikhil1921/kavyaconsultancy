<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form id="inquiry_form" class="inquiryForm validate-form" style="border: none;">
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row">
                <div class="col-lg-12">
                    <div class="selector">
                        <div class="selecotr-item">
                            <input type="radio" id="tp" value="T.P Only" name="ins_type" class="selector-item_radio" checked />
                            <label for="tp" class="selector-item_label">T.P Only</label>
                        </div>
                        <?php if(in_array($show, ['CAR', 'BIKE'])): ?>
                        <div class="selecotr-item">
                            <input type="radio" id="od" value="O.D Only" name="ins_type" class="selector-item_radio" />
                            <label for="od" class="selector-item_label">O.D Only</label>
                        </div>
                        <?php endif ?>
                        <div class="selecotr-item">
                            <input type="radio" id="cp" value="Comprehensive Plan " name="ins_type" class="selector-item_radio" />
                            <label for="cp" class="selector-item_label">Comprehensive Plan </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" id="reg_no">
                    <div class="ig">
                        <label>Vehicle Registration Number</label>
                        <input placeholder="Registration Number" maxlength="10" type="text" name="reg_no" maxlength="100" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ig">
                    <label>Vehicle Make</label>
                    <input type="text" name="veh_make" maxlength="100" placeholder="Vehicle Make" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ig">
                    <label>Vehicle Model</label>
                    <input type="text" name="veh_model" maxlength="100" placeholder="Vehicle Model" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ig">
                    <label>Mobile Number</label>
                    <input placeholder="10 Digit Mobile Number" type="text" name="mobile" maxlength="10" pattern="[0-9]{10}" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ig">
                    <label>Email Id</label>
                    <input type="email" name="email" placeholder="Email Id" maxlength="100" />
                    </div>
                </div>
                <div class="col-12">
                    <label for="yes_no_radio">Do you have existing policy?</label>
                    <div class="toggle_btn">
                        <button type="button" onclick="toggleClass('div1', 'show');" id="yes_no_btn_1">Yes</button>
                        <button type="button" onclick="toggleClass('div1', 'hide');" id="yes_no_btn_">No</button>
                    </div>
                    <div id="div1" style="display: none;" class="col-md-3">
                        <div class="top_yes_no pt-2">
                            <label for="yes_no_radio">Policy Expiry Date</label>
                            <input type="date" class="ignore" name="exp_date" class="col-md-3" id="date" placeholder="Date" />
                        </div>
                        <div class="pt-3">
                            <div id="wrapper">
                                <label for="yes_no_radio">Do you have any claim?</label>
                                <p class="yes_no_p">
                                    <label>
                                        <input id="ratio_id" type="radio" value="Yes" name="claim" />
                                        Yes
                                    </label>
                                </p>
                                <p class="yes_no_p">
                                    <label>
                                        <input id="ratio_id" type="radio" value="No" name="claim" checked />
                                        No
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="mt-2 mb-2">
                            <label class="mr-4" for="upload_policy">Upload Your Existing Policy Copy :</label>
                            <input class="uplod_rc ignore" id="upload_policy" type="file" accept="image/jpeg, image/jpg, image/png, application/pdf" name="ext_policy" style="border: none;padding: 0;outline: none;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ig">
                        <label>Name</label>
                        <input type="text" name="name" data-error="Please enter your name" placeholder="Name">
                    </div>
                </div>
                <div class="col-12">
                    <div class="ig">
                        <label>Your Message</label>
                        <textarea name="message" id="text_ins" cols="70" rows="6" placeholder="Your Message"></textarea>
                    </div>
                    <div class="mt-2 col-md-3">
                        <label class="mr-4" for="upload_rcbook">Upload Your Vehicle RC :</label>
                        <input class="uplod_rc" id="upload_rcbook" type="file" accept="image/jpeg, image/jpg, image/png, application/pdf" name="uplod_rc" style="border: none;padding: 0;outline: none;">
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <p class="privacy_p">By clicking on "SUBMIT", You Agree to our <?= anchor('privacy-policy', 'Privacy Policy', 'id="term_policy"'); ?> &amp; <?= anchor('terms-of-use', 'Terms of Use', 'id="term_policy"'); ?></p>
                </div>
                <div class="col-lg-12">
                    <div class="ig">
                        <button class="btn_car_submit" type="submit">Submit</button>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <p class="btn_down_p">
                    <a class="btn_a_down" href="javascript:;" onclick="newCar(this, '<?= $show ?>')">I HAVE NEW <?= $show ?></a></p>
                    <p class="btn_down_p">Need Help? Call Us at<a class="btn_a_down_last" href="tel:+91 <?= $this->config->item('mobile') ?>">+91<?= $this->config->item('mobile') ?></a></p>
                </div>
            </div>
        </div>
    </div>
</form>