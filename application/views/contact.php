<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="contact_us_section">
    <div class="container">
    <div class="row contact_us_main">
        <div class="col-lg-8 contact_us_left">
        <div class="brd_contact">
            <h2 class="head_clr"><span class="head_name_color">Talk To</span> Us</h2>
            <form class="validate-form">
                <div class="row contact_input">
                    <div class="col-lg-6 contact_input_left">
                        <input type="text" name="name" id="name" maxlength="100" class="form-control" placeholder="Name">
                    </div>
                    <div class="col-lg-6 contact_input_right">
                        <input type="email" name="email" id="email" maxlength="100" class="form-control" placeholder="Your Email">
                    </div>
                </div>
                <div class="row contact_input">
                    <div class="col-lg-6 contact_input_left">
                        <input type="text" name="mobile" id="mobile" maxlength="10" class="form-control" placeholder="Your Phone">
                    </div>
                    <div class="col-lg-6 contact_input_right">
                        <input type="text" name="subject" id="subject" maxlength="100" class="form-control" placeholder="Your Subject">
                    </div>
                </div>
                <div class="row contact_input">
                    <div class="col-12 input_contact_12">
                        <textarea name="message" class="form-control" maxlength="255" id="message" cols="70" rows="6" placeholder="Your Message"></textarea>
                    </div>
                    <div class="col-12 input_contact_12">
                        <button type="submit" class="about_btn_">Send Now</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
        <div class="col-lg-4 contact_us_right">
        <div class="brd_contact">
            <h2 class="head_clr"><span class="head_name_color">Our</span> Contacts</h2>
            <div class="top_con">
            <div class="row contact_us_contact">
                <div class="col-12 cont_main">
                <div class="row cont_rw">
                    <div class="col-lg-2 col-md-2 col-sm-2 left_cnt"><i id="add_con" class="fas fa-phone-alt"></i></i></div>
                    <div class="col-lg-10 col-md-10 col-sm-10 right_cnt">
                    <h5>Call</h5>
                    <p><a class="text_deco text-dark" href="tel:+91 <?= $this->config->item('mobile') ?>">+91 <?= $this->config->item('mobile') ?></a></p>
                    </div>
                </div>
                </div>
                <div class="col-12 cont_main">
                <div class="row cont_rw">
                    <div class="col-lg-2 col-md-2 col-sm-2 left_cnt">
                    <i id="add_con" class="fas fa-envelope"></i>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 right_cnt">
                    <h5>Email</h5>
                    <p><a href="mailto:<?= $this->config->item('email') ?>" class="text_deco text-dark"><?= $this->config->item('email') ?></a></p>
                    </div>
                </div>
                </div>
                
                <div class="col-12 cont_main">
                <div class="row cont_rw">
                    <div class="col-lg-2 col-md-2 col-sm-2 left_cnt"><i id="add_con" class="fas fa-clock"></i></div>
                    <div class="col-lg-10 col-md-10 col-sm-10 right_cnt">
                    <h5>Work Time</h5>
                    <p>Mon - Fri 8 AM - 7 PM</p>
                    </div>
                </div>
                </div>
                <div class="col-12 cont_main">
                <div class="row cont_rw">
                    <div class="col-lg-2 col-md-2 col-sm-2 left_cnt"><i id="add_con" class="fas fa-map-marker-alt"></i></div>
                    <div class="col-lg-10 col-md-10 col-sm-10 right_cnt">
                    <h5>Address</h5>
                    <p>10 - 11, Siddhi Vinayak Complex,<br>1st Floor, S.Kundla Bypass Road,<br>Rajula, Gujarat - 365560.<br></p>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
<section class="contact_map">
    <div class="container">
    <div class="row contact_map_main">
        <div class="col-12 contact_map_content">
        <iframe class="ifa_map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.2357338537513!2d71.43384081417926!3d21.02325168600134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be25d2cd8722c5f%3A0xe6bd6669d3e525dd!2sSecureHub%20Services!5e0!3m2!1sen!2sin!4v1642070680423!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    </div>
</section>