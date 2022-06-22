<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card">
    <div class="card-header">
        <h5><?= $title ?> <?= $operation ?></h5>
    </div>
    <div class="card-body">
        <?php if(! isset($commissions)): ?>
        <?= form_open() ?>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <?= form_label('Enter Password to see rewards details', 'password', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'type' => "password",
                            'id' => "password",
                            'name' => "password",
                            'maxlength' => 255
                        ]); ?>
                        <?= form_error('password') ?>
                    </div>
                </div>
                <div class="col-12"></div>
                <div class="col-3">
                    <?= form_button([
                        'type'    => 'submit',
                        'class'   => 'btn btn-outline-primary btn-block',
                        'content' => 'CHECK'
                    ]); ?>
                </div>
                <div class="col-3">
                    <?= anchor("$url", 'CANCEL', 'class="btn btn-outline-danger col-12"'); ?>
                </div>
            </div>
        <?= form_close() ?>
        <?php else: ?>
            <table class="table">
                <thead>
                    <th>SR NO.</th>
                    <th>Insurance</th>
                    <th>Rewards</th>
                </thead>
                <tbody>
                    <?php if(! $commissions): ?>
                        <tr>
                            <td colspan="3" class="text-center">No rewards available</td>
                        </tr>
                    <?php else: ?>
                    <?php foreach($commissions as $k => $com): ?>
                    <tr>
                        <td><?= ++$k ?></td>
                        <td><?= $com->ins_type ?></td>
                        <td><?= $com->commission ?></td>
                    </tr>
                    <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>
        <?php endif ?>
    </div>
</div>