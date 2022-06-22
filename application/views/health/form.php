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
                            <div class="row head_mem">
                                <div class="form_header">
                                <h2 class="head_clr">Members</h2>
                                </div>
                                <div class="col-lg-6 mem_left">
                                    <div class="container">
                                        <label><?= img("assets/front/img/member/male.png") ?> Adult</label>
                                        <div class="quantity-control">
                                            <button type="button" class="quantity-btn" onclick="qtyMinus('adult_qty')">
                                                <svg viewBox="0 0 409.6 409.6"><g><g>
                                                        <path d="M392.533,187.733H17.067C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h375.467 c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z" />
                                                </g></g></svg>
                                            </button>
                                            <input type="number" class="quantity-input" value="1" name="adult_qty" readonly />
                                            <button type="button" class="quantity-btn" onclick="qtyPlus('adult_qty')">
                                                <svg viewBox="0 0 426.66667 426.66667">
                                                    <path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mem_right">
                                    <div class="container">
                                    <label><?= img("assets/front/img/member/child.png") ?> Child</label>
                                    <div class="quantity-control">
                                        <button type="button" class="quantity-btn" onclick="qtyMinus('child_qty')">
                                            <svg viewBox="0 0 409.6 409.6"><g><g>
                                                    <path d="M392.533,187.733H17.067C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h375.467 c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z" />
                                            </g></g></svg>
                                        </button>
                                        <input type="number" class="quantity-input" value="1" name="child_qty" />
                                        <button type="button" class="quantity-btn" onclick="qtyPlus('child_qty')">
                                            <svg viewBox="0 0 426.66667 426.66667">
                                                <path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0" />
                                            </svg>
                                        </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="age">Eldest Member Age</label>
                                        <select class="form-control select-control" id="age" name="age">
                                            <?php for ($i=18; $i <= 50; $i++): ?>
                                                <option><?= $i ?></option>
                                            <?php endfor ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="selector" id="male_female_btn">
                                        <div class="selecotr-item male_select">
                                            <input type="radio" id="male" value="Male" name="gender" class="selector-item_radio" checked="">
                                            <label for="male" class="selector-item_label"><?= img("assets/front/img/member/male.png") ?> Male</label>
                                        </div>
                                        <div class="selecotr-item">
                                            <input type="radio" id="female" value="Female" name="gender" class="selector-item_radio">
                                            <label for="female" class="selector-item_label"><?= img("assets/front/img/member/female.png") ?> Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ig">
                                        <label>Sum Insured</label>
                                        <input placeholder="2,00,000" type="text" maxlength="10" name="sum_insured" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ig">
                                        <label>Pincode</label>
                                        <input placeholder="380001" type="text" name="pincode" maxlength="6" />
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
                                        <label>Full Name</label>
                                        <input type="text" maxlength="100" name="name" placeholder="Name">
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