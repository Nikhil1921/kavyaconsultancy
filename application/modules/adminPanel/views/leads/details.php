<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-header">
    <div class="row">
        <div class="col-6">
            <h5><?= $title ?> <?= $operation ?></h5>
        </div>
    </div>
</div>
<div class="card-body">
    <?php if($details['motor']): ?>
        <h4>Motor Insurance</h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Insurance</th>
                        <th>Insurance type</th>
                        <th>Reg. No.</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Message</th>
                        <th>RC</th>
                        <th>OLD Policy</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($details['motor'] as $motor): ?>
                    <tr>
                        <td><?= $motor['name'] ?></td>
                        <td><?= $motor['mobile'] ?></td>
                        <td><?= $motor['email'] ?></td>
                        <td><?= $motor['ins_list'] ?> insurance</td>
                        <td><?= $motor['ins_type'] ?></td>
                        <td><?= $motor['reg_no'] ?></td>
                        <td><?= $motor['veh_make'] ?></td>
                        <td><?= $motor['veh_model'] ?></td>
                        <td><?= $motor['message'] ?></td>
                        <td><?= anchor($this->config->item('document').$motor['uplod_rc'], '<i class="fa fa-eye"></i>', 'class="btn btn-pill btn-xs btn-outline-danger" target="_blank"') ?></td>
                        <?php if($motor['ext_policy']): ?>
                            <td><?= anchor($this->config->item('document').$motor['ext_policy'], '<i class="fa fa-eye"></i>', 'class="btn btn-pill btn-xs btn-outline-danger" target="_blank"') ?></td>
                        <?php else: ?>
                            <td>NA</td>
                        <?php endif ?>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php endif ?>
    <?php if($details['life']): ?>
        <br />
        <h4>Life Insurance</h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Insurance</th>
                        <th>Location</th>
                        <th>Occupation</th>
                        <th>Income</th>
                        <th>Education</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($details['life'] as $life): ?>
                    <tr>
                        <td><?= $life['name'] ?></td>
                        <td><?= $life['mobile'] ?></td>
                        <td><?= $life['email'] ?></td>
                        <td><?= $life['ins_list'] ?> insurance</td>
                        <td><?= $life['location'] ?></td>
                        <td><?= $life['occupation'] ?></td>
                        <td><?= $life['income'] ?></td>
                        <td><?= $life['education'] ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php endif ?>
    <?php if($details['health']): ?>
        <br />
        <h4>Health Insurance</h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Insurance</th>
                        <th>Gender</th>
                        <th>Sum assured</th>
                        <th>Adults</th>
                        <th>Children</th>
                        <th>Age</th>
                        <th>Pincode</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($details['health'] as $health): ?>
                    <tr>
                        <td><?= $health['name'] ?></td>
                        <td><?= $health['mobile'] ?></td>
                        <td><?= $health['email'] ?></td>
                        <td><?= $health['ins_list'] ?> insurance</td>
                        <td><?= $health['gender'] ?></td>
                        <td><?= $health['sum_insured'] ?></td>
                        <td><?= $health['adult_qty'] ?></td>
                        <td><?= $health['child_qty'] ?></td>
                        <td><?= $health['age'] ?></td>
                        <td><?= $health['pincode'] ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php endif ?>
    <?php if($details['other']): ?>
        <br />
        <h4>Other Insurance</h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Insurance</th>
                        <th>Location</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($details['other'] as $other): ?>
                    <tr>
                        <td><?= $other['name'] ?></td>
                        <td><?= $other['mobile'] ?></td>
                        <td><?= $other['email'] ?></td>
                        <td><?= $other['ins_list'] ?> insurance</td>
                        <td><?= $other['location'] ?></td>
                        <td><?= $other['message'] ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php endif ?>
    <?php if($details['misc']): ?>
        <br />
        <h4>Misc Insurance</h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Insurance</th>
                        <th>Reg No.</th>
                        <th>Location</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($details['misc'] as $misc): ?>
                    <tr>
                        <td><?= $misc['name'] ?></td>
                        <td><?= $misc['mobile'] ?></td>
                        <td><?= $misc['email'] ?></td>
                        <td><?= $misc['ins_list'] ?> insurance</td>
                        <td><?= $misc['reg_no'] ?></td>
                        <td><?= $misc['location'] ?></td>
                        <td><?= $misc['message'] ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php endif ?>
</div>

