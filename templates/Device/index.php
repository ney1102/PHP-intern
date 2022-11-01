<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Device> $device
 */
?>
<div class="device index content">
    <?= $this->Html->link(__('New Device'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Device') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <!-- <th><?= $this->Paginator->sort('id') ?></th> -->

                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('serial') ?></th>
                    <th><?= $this->Paginator->sort('device_type') ?></th>
                    <th><?= $this->Paginator->sort('supplier_id') ?></th>
                    <th><?= $this->Paginator->sort('model') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <!-- <th><?= $this->Paginator->sort('created_buy') ?></th> -->
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
                        <!-- <td><?= h($device->created_buy) ?></td> -->
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
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>