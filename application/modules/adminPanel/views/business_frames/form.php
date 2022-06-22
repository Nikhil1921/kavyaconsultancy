<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <h5><?= $title ?> <?= $operation ?></h5>
</div>
<div class="card-body">
    <?= form_open_multipart('', '', ['image' => (isset($data['image']) ? $data['image'] : '')]) ?>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <?php $c_type = [
                        'Business Visiting card' => 'Business Visiting card',
                        'Business letter head' => 'Business letter head',
                        'Business pamplates' => 'Business pamplates',
                        'Social media post' => 'Social media post'
                    ] ?>
                    <?= form_label('Category type', 'c_type', 'class="col-form-label"'); ?>
                    <?= form_dropdown('c_type', $c_type, set_value('c_type') ? set_value('c_type') : (isset($data['c_type']) ? $data['c_type'] : ''),
                    'class="form-control" id="c_type" required data-value="'.(set_value('c_id') ? set_value('c_id') : (isset($data['c_id']) ? e_id($data['c_id']) : '')).'"'); ?>
                    <?= form_error('c_type') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Category', 'c_id', 'class="col-form-label"'); ?>
                    <?= form_dropdown('c_id', [], '', 'class="form-control" id="c_id" required'); ?>
                    <?= form_error('c_id') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Frame', 'frame', 'class="col-form-label"'); ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "file",
                        'id' => "frame",
                        'accept' => "images/png, images/jpg, images/jpeg",
                        (!isset($data['image']) ? 'required' : '') => '',
                        'name' => "frame"
                    ]); ?>
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