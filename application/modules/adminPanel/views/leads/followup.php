<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card">
    <div class="card-header">
        <h5><?= $title ?> <?= $operation ?></h5>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Name : <?= $data['name']; ?></th>
                    <th>Mobile : <?= $data['mobile']; ?></th>
                    <th>Email : <?= $data['email']; ?></th>
                </tr>
                <tr>
                    <th>Remarks</th>
                    <th>Status</th>
                    <th>Created AT</th>
                </tr>
            </thead>
            <tbody>
                <?php $hide = false; if($followups): ?>
                <?php foreach($followups as $follow): if (in_array($follow['status'], ['Not interested', 'Plan purchased'])) $hide = true; ?>
                    <tr>
                        <td><?= $follow['remarks'] ?></td>
                        <td><?= $follow['status'] ?></td>
                        <td><?= date('d-m-Y h:i A', strtotime($follow['created_at'])) ?></td>
                    </tr>
                <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center"><h6>No followup found</h6></td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
        <?php if($hide === false && $this->user->role == 'Sales person'): ?>
        <?= form_open() ?>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <?php $status = ['Followup' => 'Followup', 'Not interested' => 'Not interested', 'Plan purchased' => 'Plan purchased'] ?>
                        <?= form_label('Status', 'status', 'class="col-form-label"'); ?>
                        <?= form_dropdown('status', $status, set_value('status'), 'class="form-control" required id="status"'); ?>
                        <?= form_error('status') ?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <?= form_label('Remarks', 'remarks', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'type' => "text",
                            'id' => "remarks",
                            'name' => "remarks",
                            'maxlength' => 255,
                            'value' => set_value('remarks')
                        ]); ?>
                        <?= form_error('remarks') ?>
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
                    <?= anchor("$url", 'GO Back', 'class="btn btn-outline-danger col-12"'); ?>
                </div>
            </div>
        <?= form_close() ?>
        <?php else: ?>
            <br>
            <div class="col-3">
                <?= anchor("$url", 'GO Back', 'class="btn btn-outline-danger col-12"'); ?>
            </div>
        <?php endif ?>
    </div>
</div>