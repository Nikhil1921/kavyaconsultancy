<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <h5><?= $title ?> <?= $operation ?></h5>
</div>
<div class="card-body">
    <?= form_open() ?>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Category name', 'c_name', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "c_name",
                        'name' => "c_name",
                        'maxlength' => 255,
                        'required' => "",
                        'value' => set_value('c_name') ? set_value('c_name') : (isset($data['c_name']) ? $data['c_name'] : '')
                    ]); ?>
                    <?= form_error('c_name') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Category type', 'c_type', 'class="col-form-label"') ?>
                    <select name="c_type" id="c_type" class="form-control" required>
                        <option value="Business Visiting card">Business Visiting card</option>
                        <option value="Business letter head">Business letter head</option>
                        <option value="Business pamplates">Business pamplates</option>
                        <option value="Social media post">Social media post</option>
                    </select>
                    <?= form_error('c_type') ?>
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