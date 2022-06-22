<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('health/form', ['show' => 'Group Medical</span> Coverage (GMC) Policy']); ?>
<section id="car_section_content">
    <div class="container">
    <div class="row car_ins_main">
        <div class="car_insu_head_">
        <h2 class="head_clr"><span class="head_name_color">What is Group </span>Health Insurance?</h2>
        </div>
        <div class="col-lg-6 car_ins_cont">
        <div class="car_insu_content_">
            <?= img("assets/front/img/insurence image/ghii.png", '', 'class="max_widt"'); ?>
        </div>
        </div>
        <div class="col-lg-6 car_ins_cont">
        <div class="car_insu_content_">
            <p><span><i class="far fa-hand-point-right"></i>  Group Health Insurance is a type of plan that provides insurance coverage to a group of members, usually a group of employees of a company or members of an organization. These plans are usually offered by banks, business groups, organisations, employers to their employees, housing societies etc., and the amount of premium is borne by the organisation itself.</p>
        </div>
        </div>
    </div>
    <div class="row car_ins_main fire_rw">
        <div class="car_insu_head_">
        <h2 class="head_clr"><span class="head_name_color">Why Should I Buy a</span> Group Health Insurance?</h2>
        </div>
        
        <div class="col-12 car_ins_cont">
        <div class="car_insu_content_">
            <p><span><i class="far fa-hand-point-right"></i>  Group Health Insurance is also referred to as Corporate Health Insurance. The primary benefit provided by employers under a Group Health Insurance policy is that the employees often get an option to include their family members namely spouse, children, and in some cases parents too.</p>
            <p><span><i class="far fa-hand-point-right"></i>  Group Health Insurance proves to be a beneficial plan for both employers as well as employees. A Group Health Insurance plan provides employers with benefits like low cost, tax benefits, motivated employees, and increased employee retention.</p>
        </div>
        </div>
    </div>
    <div class="row car_ins_main fire_rw">
        <div class="car_insu_head_">
        <h2 class="head_clr"><span class="head_name_color">What is Covered Under a</span> Group Health Insurance Policy?</h2>
        </div>
        <div class="col-12 car_ins_cont">
        <div class="car_insu_content_">
            <p><span><i class="far fa-hand-point-right"></i>  A group health insurance plan usually covers you for the following:</p>
            <ul class="gmc_ins_ul">
            <li>In-patient hospitalisation expenses</li>
            <li>Pre-hospitalisation and post-hospitalisation expenses</li>
            <li>Daycare procedures</li>
            <li>Chronic illnesses like arthritis, diabetes, etc.</li>
            <li>Cover for pre-existing diseases</li>
            <li>Option to include spouse or kids, etc.</li>
            <li>Emergency ambulance expenses</li>
            <li>Cashless hospitalisation benefit at network hospitals</li>
            <li>Some insurers also cover maternity expenses</li>
            <li>No requirement of medical screening</li>
            </ul>
        </div>
        </div>
    </div>
    <div class="row car_ins_main fire_rw">
        <div class="car_insu_head_">
        <h2 class="head_clr"><span class="head_name_color">What is Not Covered Under</span> Group Health Insurance Plans?</h2>
        </div>
        
        <div class="col-12 car_ins_cont">
        <div class="car_insu_content_">
            <p><span><i class="far fa-hand-point-right"></i>  Group health insurance plans do not cover you for the following expenses:</p>
            <ul class="gmc_ins_ul">
            <li>Pre-existing diseases are not covered during the waiting period</li>
            <li>Injuries arising due to war or warlike situations</li>
            <li>Expenses related to external durable items</li>
            <li>Dental treatments</li>
            <li>Maternity expenses during waiting periods</li>
            <li>Cosmetic surgeries</li>
            <li>Any treatment required due to self harm including attempt of suicide</li>
            </ul>
        </div>
        </div>
    </div>
    </div>
</section>
<?php $this->load->view('health/why-choose', ['show' => 'Group Health Insurance']) ?>