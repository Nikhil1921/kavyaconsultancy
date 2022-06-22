<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <h5><?= $title ?> <?= $operation ?></h5>
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
                <th class="clr_head">Insuarance Type</th>
                <th class="target clr_head">Image</th>
                <!-- <th class="target">Action</th> -->
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<input type="hidden" name="ins_type" value="<?= e_id(reset($types)['id']) ?>">