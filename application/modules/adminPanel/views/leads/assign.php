<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card">
    <div class="card-header">
        <h5><?= $title ?> <?= $operation ?></h5>
    </div>
    <div class="card-body">
        <?= form_open() ?>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <?php $staff_id[0] = 'Select Staff'; foreach ($users as $user) $staff_id[e_id($user['id'])] = $user['name']; ?>
                        <?= form_label('Staff', 'staff_id', 'class="col-form-label"'); ?>
                        <?= form_dropdown('staff_id', $staff_id, set_value('staff_id') ? set_value('staff_id') : (isset($data['staff_id']) ? e_id($data['staff_id']) : ''), 'class="form-control" required id="staff_id"'); ?>
                        <?= form_error('staff_id') ?>
                    </div>
                </div>
                <div class="col-12"></div>
                <div class="col-3">
                    <?= form_button([
                        'type'    => 'submit',
                        'class'   => 'btn btn-outline-primary btn-block',
                        'content' => 'SAVE'
                    ]); ?>
                </div>
                <div class="col-3">
                    <?= anchor("$url", 'CANCEL', 'class="btn btn-outline-danger col-12"'); ?>
                </div>
            </div>
        <?= form_close() ?>
    </div>
</div>