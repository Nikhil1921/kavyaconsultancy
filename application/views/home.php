<section class="banner_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <div class="banner_content">
                <h2>Starting & Managing Your<br>Business has never been easier!</h2>
            </div>
            </div>
        </div>
        <div class="row banner_main">
            <div class="col-lg-3 col-md-3 col-6 res_card_main">
            <a id="hover_a" href="javascript:;">
                <div class="card crd_bg index_card responsive_card" style="width: 100%;">
                <i class="fas fa-award"></i>
                <div class="card-body crd_bdy_index">
                    <h5 class="card-title crd_tit_h5_">Home Protected</h5>
                </div>
                </div>
            </a>
            </div>
            <div class="col-lg-3 col-md-3 col-6 res_card_main">
            <a id="hover_a" href="javascript:;">
                <div class="card crd_bg index_card responsive_card" style="width: 100%;">
                <i class="fas fa-medal"></i>
                <div class="card-body crd_bdy_index">
                    <h5 class="card-title crd_tit_h5_">People Saved</h5>
                </div>
                </div>
            </a>
            </div>
            <div class="col-lg-3 col-md-3 col-6 res_card_main">
            <a id="hover_a" href="javascript:;">
                <div class="card crd_bg index_card responsive_card" style="width: 100%;">
                <i class="fas fa-trophy"></i>
                <div class="card-body crd_bdy_index">
                    <h5 class="card-title crd_tit_h5_">Money Saved</h5>
                </div>
                </div>
            </a>
            </div>
            <div class="col-lg-3 col-md-3 col-6 res_card_main">
            <a id="hover_a" href="javascript:;">
                <div class="card crd_bg index_card responsive_card" style="width: 100%;">
                <i class="fas fa-shield-alt"></i>
                <div class="card-body crd_bdy_index">
                    <h5 class="card-title crd_tit_h5_">Car Protected</h5>
                </div>
                </div>
            </a>
            </div>
        </div>
    </div>
</section>
<section class="protect_today_section">
    <div class="container">
        <div class="protect_today_sec_head">
            <h2>What would you like to protect today?</h2>
            <?= img("assets/front/img/title-bottom.png") ?>
        </div>
        <div class="row icon_content">
            <div class="col-12 icn_con">
                <h2 class="insurence">Motor Insurance</h2>
                <?= img("assets/front/img/title-bottom.png") ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('motor/car', '<div class="card" id="crd_icon" style="width: 100%;">
                <i id="icon_" class="fas fa-car-crash"></i>
                <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Car</h2>
                </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('motor/bike', '<div class="card" id="crd_icon" style="width: 100%;">
                <i id="icon_" class="fas fa-motorcycle"></i>
                <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Bike</h2>
                </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('motor/taxi', '<div class="card" id="crd_icon" style="width: 100%;">
                <i id="icon_" class="fas fa-taxi"></i>
                <div class="card-body crd_bdy">
                    <h2 class="icon_h2">PCV (Passenger Carrying Vehicle)</h2>
                </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('motor/truck', '<div class="card" id="crd_icon" style="width: 100%;">
                <i id="icon_" class="fas fa-truck"></i>
                <div class="card-body crd_bdy">
                    <h2 class="icon_h2">GCV (Goods Carrying Vehicle)</h2>
                </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('motor/misc', '<div class="card" id="crd_icon" style="width: 100%;">
                <i id="icon_" class="fas fa-truck-monster"></i>
                <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Misc D</h2>
                </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('motor/staff-buses', '<div class="card" id="crd_icon" style="width: 100%;">
                <i id="icon_" class="fas fa-bus-alt"></i>
                <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Staff Bus/School Bus</h2>
                </div>
                </div>', 'id="hover_a"'); ?>
            </div>
        </div>
        <div class="row justify-content-center icon_content">
            <div class="col-12 icn_con">
                <h2 class="insurence">Health Insurance</h2>
                <?= img("assets/front/img/title-bottom.png") ?>
            </div>
            <div class="col-lg-1 icon"></div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('health/mediclaim', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-hospital-user"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Mediclaim</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('health/covid', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-snowflake"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Covid-19</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('health/gpa', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-wheelchair"></i>
                    <i class="fas fa-hand-holding-medical"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Group Personal<br> Accident (GPA)</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('health/personal-accidents', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-procedures"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Personal <br>Accidents (PA)</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('health/gmc', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-ambulance"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Group Medical<br> Coverage (GMC)</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-1 icon"></div>
        </div>
        
        <div class="row justify-content-center icon_content">
            <div class="col-12 icn_con">
                <h2 class="insurence">Commercial</h2>
                <?= img("assets/front/img/title-bottom.png") ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('other/workmen-compensation', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-user-shield"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Workmen Compensation</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('other/cpm', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-microscope"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Plant and<br> Machinery (CPM)</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('other/fire-insurance', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-fire-extinguisher"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Fire Insurance</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('other/home-insurance', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-home"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Home Insurance</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('other/shopkeeper-insurance', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-store-alt"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Shopkeeper Insurance</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('other/office-package-policy', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-briefcase"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Office Package<br> Policy</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon paddi_top">
                <?= anchor('other/travel-insurance', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-globe-europe"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Travel Insurance</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon paddi_top">
                <?= anchor('other/marine-insurance', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-ship"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Marine Insurance</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
        </div>
        <div class="row justify-content-center icon_content">
            <div class="col-12 icn_con">
                <h2 class="insurence">Life Insurence</h2>
                <?= img("assets/front/img/title-bottom.png") ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('life/regular-income', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-user-shield"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Garenty Regular Income Solution</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('life/need-base-solution', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-microscope"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Need Base Solution</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('life/child-mrg', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-fire-extinguisher"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Child Mrg And Education Solution</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('life/family-protection', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-home"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Family Protection Solution</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('life/income-protection', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-store-alt"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Income Protection Solution</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-6 icon">
                <?= anchor('life/retirement-solution', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-briefcase"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Retirement Solution</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div id="middle" class="col-lg-2 col-md-3 col-6 mt-4 icon paddi_top">
                <?= anchor('life/tax-benifit', '<div class="card" id="crd_icon" style="width: 100%;">
                    <i id="icon_" class="fas fa-briefcase"></i>
                    <div class="card-body crd_bdy">
                    <h2 class="icon_h2">Tax Benifit 80-C And 10(10D)</h2>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
        </div>
    </div>
</section>
<section id="insurence_section">
    <div class="container">
        <div class="row insurence_main">
        <div class="col-12 insu_con">
            <div class="insurence_content">
            <h2>The Smarter Way to get Insurance.</h2>
            <?= img("assets/front/img/title-bottom.png") ?>
            <p>We at secure hub services offer you and your familly an urban and modern way to get insurance of your self or familly or your property assets or home or vehicles. All insurance at your finger tip. Single HUB for all your insurance needs.</p>
            <p class="padd_top_insu_con">We at SecureHub at large undertake social engagements useful for welfare & sustainable development of the community specifically the deprived, under privileged and differently abled persons. We firmly believe to give back to the society and contribute in their sustainable development.</p>
            <?= anchor('about-us', 'Know More About Us', 'class="insurence_btn"'); ?>
            </div>
        </div>
        </div>
    </div>
</section>
<section id="detail_section">
    <div class="container">
        <div class="row justify-content-center detail_sec_main">
        <div class="col-lg-3 col-md-3 col-6 detail_sec_content">
            <?= anchor('gallery', '<div class="card crd_bg" id="crd_detail" style="width: 100%;background:">
                <i id="icon_detail" class="fas fa-star"></i>
                <div class="card-body crd_detail_main">
                <h5 id="crd_deta_h5_" class="crd_detail_h5">Our Gallery</h5>
                </div>
            </div>', 'id="hover_a"'); ?>
        </div>
        <div class="col-lg-3 col-md-3 col-6 detail_sec_content">
            <?= anchor('achievements', '<div class="card crd_bg" id="crd_detail1" style="width: 100%;">
                <i id="icon_detail" class="fas fa-medal"></i>
                <div class="card-body crd_detail_main">
                <h5 id="crd_deta_h5_" class="crd_detail_h5">Our Achievements</h5>
                </div>
            </div>', 'id="hover_a"'); ?>
        </div>
        <div class="col-lg-3 col-md-3 col-6 detail_sec_content">
            <?= anchor('news-blog', '<div class="card crd_bg" id="crd_detail2" style="width: 100%;">
                <i id="icon_detail" class="fas fa-blog"></i>
                <div class="card-body crd_detail_main">
                <h5 id="crd_deta_h5_" class="crd_detail_h5">Lattest Blogs</h5>
                </div>
            </div>', 'id="hover_a"'); ?>
        </div>
        <div class="col-lg-3 col-md-3 col-6 detail_sec_content">
            <?= anchor('mission-vision', '<div class="card crd_bg" id="crd_detail3" style="width: 100%;">
                <i id="icon_detail" class="fas fa-bullseye"></i>
                <div class="card-body crd_detail_main">
                <h5 id="crd_deta_h5_" class="crd_detail_h5">Our Mission</h5>
                </div>
            </div>', 'id="hover_a"'); ?>
        </div>
        </div>
    </div>
</section>
<section id="download_resource_section">
    <div class="container">
        <div class="down_res_sec_head">
            <h2>Important Downloadable Resources</h2>
            <?= img("assets/front/img/title-bottom.png") ?>
        </div>
        <div class="row down_res_sec_main">
            <div class="col-lg-3 col-md-3 col-6 detail_sec_content">
                <?= anchor('proposal-forms', '<div id="crd_resorces_" class="card crd_bg resorces_card" style="width: 100%;">
                    <i id="icon_detail" class="fas fa-user-tie icn_de"></i>
                    <div class="card-body crd_detail_main">
                    <h5 class="crd_detail_h5 down_h5">Proposal Forms</h5>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-3 col-md-3 col-6 detail_sec_content">
                <?= anchor('claim-forms', '<div id="crd_resorces_" class="card crd_bg resorces_card" style="width: 100%;">
                    <i id="icon_detail" class="fas fa-clipboard-check icn_de"></i>
                    <div class="card-body crd_detail_main">
                    <h5 class="crd_detail_h5 down_h5">Claim Forms</h5>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-3 col-md-3 col-6 detail_sec_content">
                <?= anchor('brochures', '<div id="crd_resorces_" class="card crd_bg resorces_card" style="width: 100%;">
                    <i id="icon_detail" class="fas fa-paste icn_de"></i>
                    <div class="card-body crd_detail_main">
                    <h5 class="crd_detail_h5 down_h5">Brochures</h5>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
            <div class="col-lg-3 col-md-3 col-6 detail_sec_content">
                <?= anchor('others', '<div id="crd_resorces_" class="card crd_bg resorces_card" style="width: 100%;">
                    <i id="icon_detail" class="fas fa-paperclip icn_de"></i>
                    <div class="card-body crd_detail_main">
                    <h5 class="crd_detail_h5 down_h5">Others</h5>
                    </div>
                </div>', 'id="hover_a"'); ?>
            </div>
        </div>
    </div>
</section>
<section id="about_insurance_section">
    <div class="container">
        <div class="row about_insurance_main">
            <div class="col-12 about_insurance_content">
                <h2>What you must know about insurance?</h2>
                <div class="content_abt_insurence">
                <button id="abt_ins_btn">Zero Depreciation Car Insurance</button>
                <button id="abt_ins_btn">Individual Health Insurance</button>
                <button id="abt_ins_btn">Accidental Hospitalization</button>
                </div>
                <div class="content_abt_insurence">
                <button id="abt_ins_btn">Maternity and Infertility Related Expenses</button>
                <button id="abt_ins_btn">Critical Illness Benefit</button>
                <button id="abt_ins_btn">Daily Hospital Cash Cover</button>
                <button id="abt_ins_btn">Annual Health Checkup</button>
                </div>
                <div class="content_abt_insurence">
                <button id="abt_ins_btn">What is Third Party Insurance?</button>
                <button id="abt_ins_btn">Get a Higher Claim Amount</button>
                <button id="abt_ins_btn">Cost of Engine Oil</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>