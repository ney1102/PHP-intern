<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Device> $device
 */
?>
<style>
    tbody tr:hover {

        background-color: #aaa !important;
    }
</style>
<h1 class="text-center">Device</h1>
<div class="col-lg-12 grid-margin stretch-card">

    <div class="card">
        <div class="card-body">
            <?= $this->Html->link(__('New Device'), ['action' => 'add'], ['class' => 'btn btn-primary mr-2button float-right']) ?>
            <h4 class="card-title">Bordered table</h4>
            <p class="card-description"> Add class </p>
            <div class="col-12">
                <form class="row g-2 form-filter" method="get">
                    <div class="col-6 col-lg-3 mb-4">
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0" id="icon-search">
                                <span class="material-symbols-outlined" style="color: #FFF; font-size: 18px;border: none">
                                    search
                                </span>
                            </span>

                            <input type="text" class="form-control border-start-0" aria-label="Search" aria-describedby="icon-search" name="key_search" placeholder="Search" value="<?php echo !empty($param['key_search']) ? $param['key_search'] : ''; ?>">
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 mb-4">
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <span class="material-symbols-outlined" style="color: #FFF; font-size: 18px;">
                                    calendar_month
                                </span>
                            </span>
                            <input type="date" class="form-control border-start-0" aria-label="Search" aria-describedby="icon-calendar" id="fromDate" name="fromDate" placeholder="From Date " value="<?php echo isset($param['fromDate']) ? $param['fromDate'] : ''; ?>">
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 mb-4">
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <span class="material-symbols-outlined" style="color: #FFF; font-size: 18px;">
                                    calendar_month
                                </span>
                            </span>
                            <input type="date" class="form-control border-start-0" aria-label="Search" aria-describedby="icon-calendar" id="toDate" name="toDate" placeholder="To Date" value="<?php echo isset($param['toDate']) ? $param['toDate'] : ''; ?>" />
                        </div>
                    </div>
                    <div class="col-6 col-lg-1">
                        <button class="btn btn-success " style="height: 38px;" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <div class="table-responsive" style="font-size: 2rem !important ;">
                <table class="table table-bordered table-hover border-top">
                    <thead class="text-info">
                        <tr class="text-end">
                            <th>Name</th>
                            <th>Code</th>
                            <th>Device type</th>
                            <th>Price</th>
                            <th>Assign user</th>
                            <th>Updated on</th>

                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($devices as $device) : ?>
                            <tr>
                                <td><?= h($device->name) ?></td>
                                <td><?= h($device->code) ?></td>
                                <td><?= isset($device->type->name) ? $device->type->name : ''  ?></td>
                                <td><?= number_format($device->price);
                                    echo ' VNĐ'; ?></td>
                                <td>temp</td>
                                <td>temp</td>

                                <!-- <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $supplier->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplier->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?>
                                </td> -->
                                <td class="text-end" style="width: 40px;">
                                    <div class="dropdown ">
                                        <button class="btn btn-sm" type="button" id="dropdownMenuOutlineButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            ...
                                        </button>
                                        <div class="dropdown-menu " aria-labelledby="dropdownMenuOutlineButton2" x-placement="bottom-start" style="width: 10px;">
                                            <?= $this->Html->link(
                                                __('Edit'),
                                                ['action' => 'edit', $device->id],
                                                ['class' => 'dropdown-item text-center']
                                            ) ?>
                                            <?= $this->Form->create(null, [
                                                'url' => [
                                                    'controller' => 'Device',
                                                    'action' => 'delete', $device->id
                                                ],
                                                'method' => 'post',
                                                'id' => 'del' . $device->id
                                            ]); ?>
                                            <a class="dropdown-item text-center test_sub" href="javascript:void(0)" data-id="<?= $device->id ?>" data-name="<?= $device->name ?>">Delete</a>
                                            <?= $this->Form->end() ?>

                                        </div>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('a.test_sub').click(function() {
            let name = $(this).attr('data-name')
            if (confirm('Are you sure you want to delete "' + name + '"?')) {
                $('#del' + $(this).data('id')).submit()
            }
        })

        $('#fromDate').change(function() {
            let fromDate = $(this).val();
            let toDay = $('#toDate');
            toDay.attr('min', `${fromDate}`);
            toDay.val() == '' ? toDay.val(`${fromDate}`) : toDay.val();
        })

        $('#toDate').change(function() {
            let toDay = $(this).val();
            let fromDate = $('#fromDate');
            fromDate.attr('max', `${toDay}`);
            fromDate.val() == '' ? fromDate.val(`${toDay}`) : fromDate.val();
        })
    })
</script>
<!-- <div class="device index content">
    <?= $this->Html->link(__('New Device'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Device') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>

                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('serial') ?></th>
                    <th><?= $this->Paginator->sort('device_type') ?></th>
                    <th><?= $this->Paginator->sort('supplier_id') ?></th>
                    <th><?= $this->Paginator->sort('model') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('warranty_time') ?></th>
                    <th><?= $this->Paginator->sort('machine_status_id') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created_on') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($device as $device) : ?>
                    <tr>
                        <td><?= h($device->name) ?></td>
                        <td><?= h($device->serial) ?></td>
                        <td><?= $this->Number->format($device->device_type) ?></td>
                        <td><?= $device->has('supplier') ? $this->Html->link($device->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $device->supplier->id]) : '' ?></td>
                        <td><?= h($device->model) ?></td>
                        <td><?= $this->Number->format($device->price) ?></td>
                        <td><?= $device->warranty_time === null ? '' : $this->Number->format($device->warranty_time) ?></td>
                        <td><?= $this->Number->format($device->machine_status_id) ?></td>
                        <td><?= $this->Number->format($device->status) ?></td>
                        <td><?= h($device->created_on) ?></td>

                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $device->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $device->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $device->id], ['confirm' => __('Are you sure you want to delete # {0}?', $device->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">

    </div>
</div> -->