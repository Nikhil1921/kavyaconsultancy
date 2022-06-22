<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <div class="row">
        <div class="col-md-6"><h5><?= $title ?> <?= $operation ?></h5></div>
        <div class="col-md-3">
            <input class="form-control digits" type="text" name="daterange" />
        </div>
    </div>
</div>
<div class="card-body">
    <div class="row">
        <?php foreach($types as $type): ?>
            <div class="col-md-3">
                <?= form_button([
                    'data-value' => e_id($type['id']),
                    'class'   => 'btn btn-outline-primary btn-block ins_type',
                    'content' => $type['ins_type']
                ]); ?></div>
        <?php endforeach ?>
    </div>
    <br>
    <div class="table-responsive">
        <table class="datatable table table-striped table-bordered nowrap">
            <thead>
                <th class="target clr_head">Sr.</th>
                <th class="clr_head">Insuarance Plan</th>
                <th class="clr_head">Policy no</th>
                <th class="clr_head">Premium</th>
                <th class="clr_head">Purchase date</th>
                <th class="clr_head">Expiry</th>
                <th class="clr_head">Client Name</th>
                <?php if(in_array($this->user->role, ['Admin', 'Accountant'])): ?>
                <th class="clr_head">Partner Name</th>
                <th class="clr_head">Rewards</th>
                <th class="clr_head">Rewards status</th>
                <?php endif ?>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<input type="hidden" name="ins_type" value="<?= e_id(reset($types)['id']) ?>">
<input type="hidden" name="start" value="" />
<input type="hidden" name="end" value="" />