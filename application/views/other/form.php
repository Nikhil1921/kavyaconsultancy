<section id="car_section">
    <div class="container">
        <div class="row car_main">
        <div id="car_sec_right_" class="col-lg-12 car_right">
            <div>
            <h2 class="head_clr"><span class="head_name_color"><?= $show ?></h2>
            </div>
            <form id="inquiry_form" class="inquiryForm validate-form" style="border: none;">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="ig">
                                        <label>Full Name</label>
                                        <input type="text" maxlength="100" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ig">
                                        <label>Mobile Number</label>
                                        <input maxlength="10" placeholder="10 Digit Mobile Number" type="phone" name="mobile" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ig">
                                        <label>Email Id</label>
                                        <input type="email" maxlength="100" name="email" required="" placeholder="abc@gmail.com" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ig">
                                        <label>Location</label>
                                        <input type="text" name="location" maxlength="50" placeholder="Location" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="ig">
                                        <label>Your Message</label>
                                        <textarea name="message" id="text_ins" cols="70" rows="6" placeholder="Your Message"></textarea>
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
                                    <p class="btn_down_p">Need Help? Call Us at<a class="btn_a_down_last" href="tel:+91 9512137878"> +919512137878</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>