<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <h5><?= $title ?> <?= $operation ?></h5>
</div>
<div class="card-body">
    <?= form_open() ?>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <?= form_label('Plan name', 'planname', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "planname",
                        'name' => "planname",
                        'maxlength' => 255,
                        'required' => "",
                        'value' => set_value('planname') ? set_value('planname') : (isset($data['planname']) ? $data['planname'] : '')
                    ]); ?>
                    <?= form_error('planname') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Price', 'price', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "price",
                        'name' => "price",
                        'maxlength' => 10,
                        'required' => "",
                        'value' => set_value('price') ? set_value('price') : (isset($data['price']) ? $data['price'] : '')
                    ]); ?>
                    <?= form_error('price') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Validity (in months)', 'validity', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "validity",
                        'name' => "validity",
                        'maxlength' => 2,
                        'required' => "",
                        'value' => set_value('validity') ? set_value('validity') : (isset($data['validity']) ? $data['validity'] : '')
                    ]); ?>
                    <?= form_error('validity') ?>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <?= form_label('Plan feature', 'features[]', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "features",
                        'name' => "features[]",
                        'maxlength' => 255,
                    ]); ?>
                    <?= form_error('features[]') ?>
                </div>
            </div>
            <div class="col-2 mt-4">
                <?= form_button([
                    'type'    => 'button',
                    'onclick' => 'addFeature()',
                    'class'   => 'btn btn-pill btn-outline-danger btn-air-danger btn-sm',
                    'content' => 'Add new'
                ]); ?>
            </div>
            <div class="col-12">
                <div class="row" id="show-features">
                    <?php if(set_value('features') || isset($data['features'])): $features = set_value('features') ? set_value('features') : (isset($data['features']) && $data['features'] ? explode(', ', $data['features']) : []); ?>
                    <?php foreach($features as $k => $feature): ?>
                        <div class="col-10 features_<?= ($k+1) ?>">
                            <div class="form-group">
                                <?= form_label('Plan feature', 'features[]', 'class="col-form-label"') ?>
                                <?= form_input([
                                    'class' => "form-control",
                                    'type' => "text",
                                    'id' => "features",
                                    'name' => "features[]",
                                    'maxlength' => 255,
                                    'required' => "",
                                    'value' => $feature
                                ]); ?>
                            </div>
                        </div>
                        <div class="col-2 mt-4 features_<?= ($k+1) ?>">
                            <?= form_button([
                                'type'    => 'button',
                                'onclick' => "removeFeature('features_".($k+1)."');",
                                'class'   => 'btn btn-pill btn-outline-danger btn-air-danger btn-sm',
                                'content' => 'Remove'
                            ]); ?>
                        </div>
                    <?php endforeach ?>
                    <?php endif ?>
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