<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />
    <!-- font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Stylesheet CSS -->
    <?= link_tag('assets/front/css/style.css?v=1.0.1', 'stylesheet', 'text/css') ?>
    <!-- Responsive CSS -->
    <?= link_tag('assets/front/css/responsive.css', 'stylesheet', 'text/css') ?>
    <!-- favicon -->
    <?= link_tag('assets/front/favicon/apple-touch-icon.png', 'apple-touch-icon', '180x180') ?>
    <?= link_tag('assets/front/favicon/favicon-32x32.png', 'icon', '32x32') ?>
    <?= link_tag('assets/front/favicon/favicon-16x16.png', 'icon', '16x16') ?>
    <?= link_tag('assets/front/favicon/favicon.ico', 'icon', '16x16') ?>
    <title><?= APP_NAME ?></title>
  </head>
  <body>
    <section class="header_up">
      <div class="container-fluid">
        <div class="row header_main">
          <div class="col-lg-5 col-md-4 header_left">
            <div class="logo">
                <?= anchor('', img('assets/images/logo.png', '', 'class="header_logo"')); ?>
            </div>
          </div>
          <div class="col-lg-7 col-md-8 header_right">
            <div class="contact">
              <ul class="contact_ul">
                <li><a class="header_color" href="tel:+91 <?= $this->config->item('mobile') ?>"><span><i class="fas fa-phone-volume"></i>  +91 <?= $this->config->item('mobile') ?></span></a></li>
                <li><a class="header_color" href="mailto:<?= $this->config->item('email') ?>"><span><i class="fas fa-envelope"></i>  <?= $this->config->item('email') ?></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="header_middle">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Motor
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?= anchor('motor/car', 'Car', 'class="dropdown-item"'); ?>
                  <?= anchor('motor/bike', 'Bike', 'class="dropdown-item"'); ?>
                  <?= anchor('motor/taxi', 'PCV (Passenger Carrying Vehicle)', 'class="dropdown-item"'); ?>
                  <?= anchor('motor/truck', 'GCV (Goods Carrying Vehicle)', 'class="dropdown-item"'); ?>
                  <?= anchor('motor/misc', 'Misc D', 'class="dropdown-item"'); ?>
                  <?= anchor('motor/staff-buses', 'Staff Buses', 'class="dropdown-item"'); ?>
                  <?= anchor('motor/school-buses', 'School Buses', 'class="dropdown-item"'); ?>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Health
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?= anchor('health/mediclaim', 'Mediclaim', 'class="dropdown-item"'); ?>
                  <?= anchor('health/covid', 'Covid-19', 'class="dropdown-item"'); ?>
                  <?= anchor('health/gpa', 'Group Personal Accident (GPA)', 'class="dropdown-item"'); ?>
                  <?= anchor('health/personal-accidents', 'Personal Accidents)', 'class="dropdown-item"'); ?>
                  <?= anchor('health/gmc', 'Group Medical Coverage (GMC)', 'class="dropdown-item"'); ?>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Other
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?= anchor('other/workmen-compensation', 'Workmen Compensation', 'class="dropdown-item"'); ?>
                  <?= anchor('other/cpm', 'Plant and Machinery (CPM)', 'class="dropdown-item"'); ?>
                  <?= anchor('other/fire-insurance', 'Fire Insurance', 'class="dropdown-item"'); ?>
                  <?= anchor('other/home-insurance', 'Home Insurance', 'class="dropdown-item"'); ?>
                  <?= anchor('other/shopkeeper-insurance', 'Shopkeeper Insurance', 'class="dropdown-item"'); ?>
                  <?= anchor('other/office-package-policy', 'Office Package Policy', 'class="dropdown-item"'); ?>
                  <?= anchor('other/travel-insurance', 'Travel Insurance', 'class="dropdown-item"'); ?>
                  <?= anchor('other/marine-insurance', 'Marine Insurance', 'class="dropdown-item"'); ?>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Life
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?= anchor('life/regular-income', 'Guarantee Regular Income Solution', 'class="dropdown-item"'); ?>
                    <?= anchor('life/need-base-solution', 'Need Base Solution', 'class="dropdown-item"'); ?>
                    <?= anchor('life/child-mrg', 'Child Mrg And Education Solution', 'class="dropdown-item"'); ?>
                    <?= anchor('life/family-protection', 'Family Protection Solution', 'class="dropdown-item"'); ?>
                    <?= anchor('life/income-protection', 'Income Protection Solution', 'class="dropdown-item"'); ?>
                    <?= anchor('life/retirement-solution', 'Retirement Solution', 'class="dropdown-item"'); ?>
                    <?= anchor('life/tax-benifit', 'Tax Benifit 80-C And 10(10D)', 'class="dropdown-item"'); ?>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Company
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?= anchor('about-us', 'About us', 'class="dropdown-item"'); ?>
                  <?= anchor('mission-vision', 'Mission & Vision', 'class="dropdown-item"'); ?>
                  <?= anchor('gallery', 'Gallery', 'class="dropdown-item"'); ?>
                  <?= anchor('achievements', 'Achievements', 'class="dropdown-item"'); ?>
                  <?= anchor('news-blog', 'News & Blogs', 'class="dropdown-item"'); ?>
                  <?= anchor('contact-us', 'Contact us', 'class="dropdown-item"'); ?>
                </div>
              </li>
              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Members
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?= anchor('login', 'Login', 'class="dropdown-item"'); ?>
                  <?= anchor('new-user', 'New User', 'class="dropdown-item"'); ?>
                  <?= anchor('become-agent', 'Join Us', 'class="dropdown-item"'); ?>
                </div>
              </li> -->
              <li class="nav-item">
                  <?= anchor('become-partner', 'Become Partner', 'class="nav-link"'); ?>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </section>
    <?php if(isset($breads)): ?>
      <section id="about_us_section">
        <div class="container">
          <div class="row about_us_main">
            <div class="col-12 about_us_heading">
              <div class="about_us_content">
                <h2 class="page_heading_h2"><?= $heading ?></h2>
                <ul class="header_ul_contact">
                  <li><?= anchor('', 'Home |', 'class="a_clr_con"'); ?></li>
                  <?php foreach($breads as $k => $b): ?>
                  <?php if($k === array_key_last($breads)): ?>
                      <li><span class="active_color"><?= $b['title'] ?></span></li>
                  <?php else: ?>
                      <li><?= anchor($b['url'], $b['title'].' |', 'class="a_clr_con"'); ?></li>
                  <?php endif ?>
                  <?php endforeach ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php endif ?>
    <?= $contents ?>
    <section id="contact_section">
      <div class="container">
        <div class="row conatct_main">
          <div class="col-lg-4 contact_content">
            <div class="contact_cont">
              <h4>Call Us</h4>
              <p><a class="text_deco" href="tel:+91 <?= $this->config->item('mobile') ?>"><span><i class="fas fa-phone-volume con_icn"></i>  </span>+91 <?= $this->config->item('mobile') ?></a></p>
            </div>
          </div>
          <div class="col-lg-4 contact_content">
            <div class="contact_cont">
              <h4>Email Us</h4>
              <p><a class="text_deco" href="mailto:<?= $this->config->item('email') ?>"><span><i class="fas fa-envelope con_icn"></i> </span><?= $this->config->item('email') ?></a></p>
            </div>
          </div>
          <div class="col-lg-4 contact_content">
            <div class="contact_cont">
              <h4>CONNECT WITH US</h4>
              <div class="contact_social">
                <ul class="contact_padd">
                  <li><a href="<?= $this->config->item('facebook') ?>"><i id="social_con" class="fab fa-facebook-f"></i></a></li>
                  <li><a href="<?= $this->config->item('twitter') ?>"><i id="social_con" class="fab fa-twitter"></i></a></li>
                  <li><a href="<?= $this->config->item('instagram') ?>"><i id="social_con" class="fab fa-instagram"></i></a></li>
                  <li><a href="<?= $this->config->item('linkedin') ?>"><i id="social_con" class="fab fa-linkedin-in"></i></a></li>
                  <li><a href="<?= $this->config->item('youtube') ?>"><i id="social_con" class="fab fa-youtube"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="footer_section">
      <div class="container">
        <div class="row footer_main">
          <div class="col-lg-4 ftr_content">
            <div class="ftr_logo">
                <?= anchor('', img('assets/images/logo.png', '', 'class="ftr_logo_ mb-1"')); ?>
              <p>We believe insurance was always meant to protect what one loves. We are here to ‘Make Insurance Simple’.</p>
            </div>
          </div>
          <div class="col-lg-4 ftr_content">
            <h2 class="ftr_h2">Download</h2>
            <div class="footer_conten">
              <ul class="ftr_ul">
                <li><?= anchor('downloads/proposal-forms', '<span><i class="fas fa-angle-right"></i> Proposal Forms</span>', 'class="ftr_a"'); ?></li>
                <li><?= anchor('downloads/claim-forms', '<span><i class="fas fa-angle-right"></i> Claim Forms</span>', 'class="ftr_a"'); ?></li>
                <li><?= anchor('downloads/brochures', '<span><i class="fas fa-angle-right"></i> Brochures</span>', 'class="ftr_a"'); ?></li>
                <li><?= anchor('downloads/others', '<span><i class="fas fa-angle-right"></i> Others</span>', 'class="ftr_a"'); ?></li>
              </ul>
              <!-- <h3 class="widget-title mt-15">Visit Counter</h3>
              <span class="vcounter">3</span>
              <span class="vcounter">3</span>
              <span class="vcounter">3</span>
              <span class="vcounter">3</span>
              <span class="vcounter">3</span> -->
            </div>
          </div>
          <div class="col-lg-4 ftr_content">
            <h2 class="ftr_h2">Quick Links</h2>
            <div class="footer_conten">
              <ul class="ftr_ul">
                <li><?= anchor('contact-us', '<span><i class="fas fa-angle-right"></i> Contact us</span>', 'class="ftr_a"'); ?></li>
                <li><?= anchor('terms-of-use', '<span><i class="fas fa-angle-right"></i> Terms of use</span>', 'class="ftr_a"'); ?></li>
                <li><?= anchor('privacy-policy', '<span><i class="fas fa-angle-right"></i> Privacy policy</span>', 'class="ftr_a"'); ?></li>
                <li><?= anchor('refund-policy', '<span><i class="fas fa-angle-right"></i> Refund policy</span>', 'class="ftr_a"'); ?></li>
                <li><?= anchor('gallery', '<span><i class="fas fa-angle-right"></i> Gallery</span>', 'class="ftr_a"'); ?></li>
                <li><?= anchor('achievements', '<span><i class="fas fa-angle-right"></i> Achievements</span>', 'class="ftr_a"'); ?></li>
                <li><?= anchor('career', '<span><i class="fas fa-angle-right"></i> Career</span>', 'class="ftr_a"'); ?></li>
              </ul>
            </div>
          </div>
          <!-- <div class="col-lg-3 ftr_content">
            <div class="widget-contact-content">
              <h3>NEWSLETTER</h3>
              <div class="widget-about-content">
                <p>Enter your email address, and click "Subscribe"</p>
              </div>
              <div class="newslater">
                <form id="mc-form" class="mc-form form">
                  <input id="mc-email" type="email" autocomplete="off" placeholder="Email Address" name="EMAIL">
                  <button id="mc-submit" type="submit"><i class="fas fa-envelope"></i></button>
                </form>
                <div class="mailchimp-alerts text-centre">
                  <div class="mailchimp-submitting"></div>
                  <div class="mailchimp-success"></div>
                  <div class="mailchimp-error"></div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </section>
    <section class="last_footer_">
      <div class="container-fluid">
        <div class="row last_footer">
          <div class="col-12 ftr_last">
            <h4>© <?= date('Y') ?> | SecureHub Consultants Private Limited</h4>
          </div>
        </div>
      </div>
    </section>
      <div class='toast' style='display:none'></div>
    <!-- Back to Top -->
    <a href="javascript:;" id="back-to-top" title="Back to top" class="show"><i class="fas fa-arrow-up"></i></a>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <?php if(isset($validate)): ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
    <?php endif ?>
    <script src="<?= base_url('assets/front/js/script.js?v='.time()) ?>"></script>
  </body>
</html>