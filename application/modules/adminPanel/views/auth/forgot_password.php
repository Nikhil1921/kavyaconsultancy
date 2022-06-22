<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-body">
    <div class="text-center">
        <h4><?= ucwords($title) ?></h4>
        <h6>Enter your Mobile to get OTP</h6>
    </div>
    <?= form_open('', '', 'class="theme-form"') ?>
    <div class="form-group">
        <?= form_label('Your Mobile', 'mobile', 'class="col-form-label pt-0"') ?>
        <?= form_input([
            'class' => "form-control",
            'type' => "text",
            'id' => "mobile",
            'name' => "mobile",
            'maxlength' => 10,
            'required' => "",
            'value' => set_value('mobile')
        ]); ?>
        <?= form_error('mobile') ?>
    </div>
    <div class="checkbox">
        <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
            <?php foreach($this->main->roles() as $k => $role): ?>
                <div class="radio radio-danger">
                    <?= form_radio('role', $role, $k == 0 ? true : (set_value('role') == 'Staff' ? true : false), 'id="'.$role.'"') ?>
                    <?= form_label($role, $role, 'class="mb-0"') ?>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="col-12">
        <div class="text-right mt-3"><?= anchor(admin('login'), 'click here', 'class="btn-link text-capitalize"') ?> to login</div>
    </div>
    <div class="form-group form-row mt-3 mb-0">
        <?= form_button([
            'type'    => 'submit',
            'class'   => 'btn btn-outline-danger btn-block',
            'content' => 'Get OTP'
        ]); ?>
    </div>
    <?= form_close() ?>
</div>