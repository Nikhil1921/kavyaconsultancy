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
                    <th>Partner : <span id="partner"></span></th>
                </tr>
            </thead>
        </table>
        <br />
        <?= form_open_multipart() ?>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <?= form_label('Insurance Plan', 'plan_id', 'class="col-form-label"') ?>
                        <select name="plan_id" id="plan_id" class="form-control js-example-basic-single" required>
                            <option value="" selected disabled>Select Plan</option>
                            <?php foreach($plans as $plan): ?>
                                <option value="<?= e_id($plan['id']) ?>"<?= set_select('plan_id', e_id($plan['id'])) ?>><?= $plan['title'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('plan_id') ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <?= form_label('Policy No.', 'policy_no', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'type' => "text",
                            'id' => "policy_no",
                            'name' => "policy_no",
                            'maxlength' => 255,
                            'required' => "",
                            'value' => set_value('policy_no')
                        ]); ?>
                        <?= form_error('policy_no') ?>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <?= form_label('Net Policy premium', 'premium', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'type' => "text",
                            'id' => "premium",
                            'name' => "premium",
                            'maxlength' => 10,
                            'required' => "",
                            'value' => set_value('premium')
                        ]); ?>
                        <?= form_error('premium') ?>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <?= form_label('OD Policy premium', 'od_premium', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'type' => "text",
                            'id' => "od_premium",
                            'name' => "od_premium",
                            'maxlength' => 10,
                            'required' => "",
                            'value' => set_value('od_premium')
                        ]); ?>
                        <?= form_error('od_premium') ?>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <?= form_label('Total Policy premium', 'total_premium', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'type' => "text",
                            'id' => "total_premium",
                            'name' => "total_premium",
                            'maxlength' => 10,
                            'required' => "",
                            'value' => set_value('total_premium')
                        ]); ?>
                        <?= form_error('total_premium') ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <?= form_label('Purchase date', 'purchase_date', 'class="col-form-label"') ?>
                        <div class="input-group">
                            <input class="datepicker-here form-control digits" name="purchase_date" id="purchase_date" type="text" data-language="en" required />
                        </div>
                        <?= form_error('purchase_date') ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <?= form_label('Expiry date', 'expiry_date', 'class="col-form-label"') ?>
                        <div class="input-group">
                            <input class="datepicker-here form-control digits" name="expiry_date" id="expiry_date" type="text" data-language="en" required />
                        </div>
                        <?= form_error('expiry_date') ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <?= form_label('Policy document (pdf only)', 'image', 'class="col-form-label"') ?>
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
                <div class="col-6">
                    <div class="form-group">
                        <?php $partner = 'NA' ?>
                        <?= form_label('Partner (if any)', 'user_id', 'class="col-form-label"') ?>
                        <select name="user_id" id="user_id" class="form-control js-example-basic-single">
                            <option value="" selected disabled>Select Partner (if any)</option>
                            <?php foreach($users as $user): if($user['id'] == $data['partner_id']) $partner = $user['name'] ?>
                                <option value="<?= e_id($user['id']) ?>"<?= set_select('user_id', e_id($user['id'])) ?>><?= $user['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('user_id') ?>
                        <script>document.getElementById('partner').innerHTML = "<?= $partner ?>"</script>
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
    </div>
</div>