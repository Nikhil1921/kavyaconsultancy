<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="contact_sec_detail">
    <div class="container">
        <div class="row con_sec_main">
            <div class="col-lg-5 con_sec_left">
                <?= img("assets/front/img/career5.png", '', 'class="career_img"'); ?>
            </div>
            <div class="col-lg-7 con_sec_right">
                <form class="validate-form">
                    <div class="row contact_input">
                        <div class="col-lg-6 contact_input_left">
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-lg-6 contact_input_right">
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="row contact_input">
                        <div class="col-lg-6 contact_input_left">
                            <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                        </div>
                        <div class="col-lg-6 contact_input_right">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" />
                        </div>
                    </div>
                    <div class="row contact_input">
                        <div class="col-lg-6 contact_input_left">
                            <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Your Phone" />
                        </div>
                        <div class="col-lg-6 contact_input_left">
                            <input type="text" name="location" id="location" class="form-control" placeholder="Location" />
                        </div>
                        <div class="col-12 input_contact_12">
                            <textarea name="message" class="form-control" id="message" cols="70" rows="6" placeholder="Your Message"></textarea>
                        </div>
                        <div class="cv_mt">
                            <label class="mr-4">Upload your CV:</label>
                            <input type="file" name="uplod_rc" accept="image/jpeg, image/jpg, image/png, application/pdf" />
                        </div>
                        <div class="col-12 input_contact_12">
                            <button class="about_btn_" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>