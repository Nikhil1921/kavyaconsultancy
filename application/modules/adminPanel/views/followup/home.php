<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <h5><?= $title ?> <?= $operation ?></h5>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-4">
            <?= form_button([
                'data-value' => 'Followup',
                'class'   => 'btn btn-outline-primary btn-block ins_type',
                'content' => 'Followup'
            ]); ?>
        </div>
        <div class="col-md-4">
            <?= form_button([
                'data-value' => 'Not interested',
                'class'   => 'btn btn-outline-primary btn-block ins_type',
                'content' => 'Not interested'
            ]); ?>
        </div>
        <div class="col-md-4">
            <?= form_button([
                'data-value' => 'Plan purchased',
                'class'   => 'btn btn-outline-primary btn-block ins_type',
                'content' => 'Plan purchased'
            ]); ?>
        </div>
    </div>
    <br>
    <div class="table-responsive">
        <table class="datatable table table-striped table-bordered nowrap">
            <thead>
                <th class="target clr_head">Sr.</th>
                <th class="clr_head">Name</th>
                <th class="clr_head">Mobile</th>
                <th class="clr_head">Remark</th>
                <th class="clr_head">Created AT</th>
                <?php if (in_array($this->user->role, ['Admin', 'Branch manager'])): ?>
                <th class="clr_head">User</th>
                <?php endif ?>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<input type="hidden" name="ins_type" value="Followup" />