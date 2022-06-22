<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <h5><?= $title ?> <?= $operation ?></h5>
</div>
<div class="card-body">
    <?= form_open() ?>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Branch name', 'b_name', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "b_name",
                        'name' => "b_name",
                        'maxlength' => 255,
                        'required' => "",
                        'value' => set_value('b_name') ? set_value('b_name') : (isset($data['b_name']) ? $data['b_name'] : '')
                    ]); ?>
                    <?= form_error('b_name') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Branch owner', 'owner', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "owner",
                        'name' => "owner",
                        'maxlength' => 100,
                        'required' => "",
                        'value' => set_value('owner') ? set_value('owner') : (isset($data['owner']) ? $data['owner'] : '')
                    ]); ?>
                    <?= form_error('owner') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Contact person no.', 'mobile', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "mobile",
                        'name' => "mobile",
                        'maxlength' => 10,
                        'required' => "",
                        'value' => set_value('mobile') ? set_value('mobile') : (isset($data['mobile']) ? $data['mobile'] : '')
                    ]); ?>
                    <?= form_error('mobile') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Email', 'email', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "email",
                        'name' => "email",
                        'maxlength' => 100,
                        'required' => "",
                        'value' => set_value('email') ? set_value('email') : (isset($data['email']) ? $data['email'] : '')
                    ]); ?>
                    <?= form_error('email') ?>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <?= form_label('Address', 'address', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "address",
                        'name' => "address",
                        'maxlength' => 255,
                        'required' => "",
                        'value' => set_value('address') ? set_value('address') : (isset($data['address']) ? $data['address'] : '')
                    ]); ?>
                    <?= form_error('address') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('City', 'city', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "city",
                        'name' => "city",
                        'maxlength' => 255,
                        'required' => "",
                        'value' => set_value('city') ? set_value('city') : (isset($data['city']) ? $data['city'] : '')
                    ]); ?>
                    <?= form_error('city') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('State', 'state', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "state",
                        'name' => "state",
                        'maxlength' => 255,
                        'required' => "",
                        'value' => set_value('state') ? set_value('state') : (isset($data['state']) ? $data['state'] : '')
                    ]); ?>
                    <?= form_error('state') ?>
                </div>
            </div>
            <div class="col-12"></div>
            <div class="col-3">
                <?= form_button([
                    'type'    => 'submit',
                    'class'   => 'btn btn-outline-primary btn-block col-12',
                    'content' => 'SAVE'
                ]); ?>
            </div>
            <div class="col-3">
                <?= anchor("$url", 'CANCEL', 'class="btn btn-outline-danger col-12"'); ?>
            </div>
        </div>
    <?= form_close() ?>
</div>