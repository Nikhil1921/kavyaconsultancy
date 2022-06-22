<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <h5><?= $title ?> <?= $operation ?></h5>
</div>
<div class="card-body">
    <?= form_open_multipart('', '', ['image' => (isset($data['image']) ? $data['image'] : '')]) ?>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <?php foreach ($types as $type) $ins_type_id[e_id($type['id'])] = $type['ins_type']; ?>
                    <?= form_label('Insurance Type', 'ins_type_id', 'class="col-form-label"'); ?>
                    <?= form_dropdown('ins_type_id', $ins_type_id, set_value('ins_type_id') ? set_value('ins_type_id') : (isset($data['ins_type_id']) ? e_id($data['ins_type_id']) : ''),
                    'class="form-control" id="ins_type_id" required data-value="'.(set_value('ins_id') ? set_value('ins_id') : (isset($data['ins_id']) ? e_id($data['ins_id']) : '')).'"'); ?>
                    <?= form_error('ins_type_id') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Insurance', 'ins_id', 'class="col-form-label"'); ?>
                    <?= form_dropdown('ins_id', [], '', 'class="form-control" id="ins_id" required'); ?>
                    <?= form_error('ins_id') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?php $com_id = []; foreach ($companies as $company) $com_id[e_id($company['id'])] = $company['company_name']; ?>
                    <?= form_label('Insurance Company', 'com_id', 'class="col-form-label"'); ?>
                    <?= form_dropdown('com_id', $com_id, set_value('com_id') ? set_value('com_id') : (isset($data['com_id']) ? e_id($data['com_id']) : ''), 'class="form-control" required id="com_id"'); ?>
                    <?= form_error('com_id') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Plan Type', 'plan_type', 'class="col-form-label"'); ?>
                    <?= form_dropdown('plan_type', ['All Plan' => 'All Plan', 'Popular Plan' => 'Popular Plan', 'Suggested Plan' => 'Suggested Plan'], set_value('plan_type') ? set_value('plan_type') : (isset($data['plan_type']) ? $data['plan_type'] : ''), 'class="form-control" id="plan_type" required'); ?>
                    <?= form_error('plan_type') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Plan Title', 'title', 'class="col-form-label"'); ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "title",
                        'name' => "title",
                        'maxlength' => 100,
                        'required' => "",
                        'value' => set_value('title') ? set_value('title') : (isset($data['title']) ? $data['title'] : '')
                    ]); ?>
                    <?= form_error('title') ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <?= form_label('Plan PDF', 'image', 'class="col-form-label"'); ?>
                    <?= form_input([
                        'class' => "form-control",
                        'type' => "file",
                        'id' => "image",
                        'accept' => "application/pdf",
                        (!isset($data['image']) ? 'required' : '') => '',
                        'name' => "image"
                    ]); ?>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <?= form_label('Description', 'description', 'class="col-form-label"'); ?>
                    <?= form_textarea([
                        'class' => "form-control",
                        'type' => "text",
                        'id' => "description",
                        'name' => "description",
                        'required' => "",
                        'value' => set_value('description') ? set_value('description') : (isset($data['description']) ? $data['description'] : '')
                    ]); ?>
                    <?= form_error('description') ?>
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