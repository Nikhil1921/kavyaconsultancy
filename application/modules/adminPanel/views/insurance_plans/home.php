<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <div class="row">
        <div class="col-6">
            <h5><?= $title ?> <?= $operation ?></h5>
        </div>
        <?php if(verify_access($name, 'add')): ?>
        <div class="col-6">
            <?= anchor("$url/add", '<span class="fa fa-plus"></span> Add new', 'class="btn btn-outline-success btn-sm float-right"'); ?>
        </div>
        <?php endif ?>
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
                <th class="clr_head">Plan Title</th>
                <th class="clr_head">Insurance</th>
                <th class="clr_head">Plan Type</th>
                <th class="clr_head">Company</th>
                <th class="target clr_head">Action</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<input type="hidden" name="ins_type" value="<?= e_id(reset($types)['id']) ?>">