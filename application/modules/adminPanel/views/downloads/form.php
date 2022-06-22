<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <h5><?= $title ?> <?= $operation ?></h5>
</div>
<div class="card-body">
    <?= form_open_multipart('', '', ['image' => (isset($data['d_file']) ? $data['d_file'] : '')]) ?>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Title', 'title', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "title",
                        'name' => "title",
                        'maxlength' => 255,
                        'required' => "",
                        'value' => set_value('title') ? set_value('title') : (isset($data['title']) ? $data['title'] : '')
                    ]); ?>
                    <?= form_error('title') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group m-checkbox-inline mb-0 custom-radio-ml">
                    <?= form_label('Download Type', '', 'class="col-form-label"') ?>
                    <br>
                    <div class="radio radio-primary">
                        <?= form_radio([
                            'value' => 'Proposal Forms',
                            'id' => "proposal",
                            'name' => "d_type",
                            'checked' => set_value('d_type') ? set_radio('d_type', 'Proposal Forms') : (isset($data['d_type']) && $data['d_type'] == 'Proposal Forms' ? 'checked' : TRUE)
                        ]); ?>
                        <?= form_label('Proposal Forms', 'proposal') ?>
                    </div>
                    <div class="radio radio-primary">
                        <?= form_radio([
                            'value' => 'Claim Forms',
                            'id' => "claim",
                            'name' => "d_type",
                            'checked' => set_value('d_type') ? set_radio('d_type', 'Claim Forms') : (isset($data['d_type']) && $data['d_type'] == 'Claim Forms' ? 'checked' : FALSE)
                        ]); ?>
                        <?= form_label('Claim Forms', 'claim') ?>
                    </div>
                    <div class="radio radio-primary">
                        <?= form_radio([
                            'value' => 'Brochures',
                            'id' => "brochures",
                            'name' => "d_type",
                            'checked' => set_value('d_type') ? set_radio('d_type', 'Brochures') : (isset($data['d_type']) && $data['d_type'] == 'Brochures' ? 'checked' : FALSE)
                        ]); ?>
                        <?= form_label('Brochures', 'brochures') ?>
                    </div>
                    <div class="radio radio-primary">
                        <?= form_radio([
                            'value' => 'Others',
                            'id' => "others",
                            'name' => "d_type",
                            'checked' => set_value('d_type') ? set_radio('d_type', 'Others') : (isset($data['d_type']) && $data['d_type'] == 'Others' ? 'checked' : FALSE)
                        ]); ?>
                        <?= form_label('Others', 'others') ?>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Image', 'image', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "file",
                        'id' => "image",
                        (!isset($data['d_file']) ? 'required' : '') => '',
                        'name' => "image"
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