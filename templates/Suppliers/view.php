<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Supplier'), ['action' => 'edit', $supplier->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Supplier'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Suppliers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Supplier'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="suppliers view content">
            <h3><?= h($supplier->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= $supplier->name ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($supplier->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($supplier->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated By') ?></th>
                    <td><?= $supplier->updated_by === null ? '' : $this->Number->format($supplier->updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Del Flag') ?></th>
                    <td><?= $this->Number->format($supplier->del_flag) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created On') ?></th>
                    <td><?= h($supplier->created_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated On') ?></th>
                    <td><?= h($supplier->updated_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $supplier->active ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($supplier->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Device') ?></h4>
                <?php if (!empty($supplier->device)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Serial') ?></th>
                                <th><?= __('Code') ?></th>
                                <th><?= __('Property Type') ?></th>
                                <th><?= __('Device Type') ?></th>
                                <th><?= __('Supplier Id') ?></th>
                                <th><?= __('Model') ?></th>
                                <th><?= __('Price') ?></th>
                                <th><?= __('Created Buy') ?></th>
                                <th><?= __('Warranty Time') ?></th>
                                <th><?= __('Machine Status Id') ?></th>
                                <th><?= __('Description') ?></th>
                                <th><?= __('Status') ?></th>
                                <th><?= __('Created On') ?></th>
                                <th><?= __('Created By') ?></th>
                                <th><?= __('Updated On') ?></th>
                                <th><?= __('Updated By') ?></th>
                                <th><?= __('Del Flag') ?></th>
                                <th><?= __('Active') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($supplier->device as $device) : ?>
                                <tr>
                                    <td><?= h($device->id) ?></td>
                                    <td><?= h($device->serial) ?></td>
                                    <td><?= h($device->code) ?></td>
                                    <td><?= h($device->property_type) ?></td>
                                    <td><?= h($device->device_type) ?></td>
                                    <td><?= h($device->supplier_id) ?></td>
                                    <td><?= h($device->model) ?></td>
                                    <td><?= h($device->price) ?></td>
                                    <td><?= h($device->created_buy) ?></td>
                                    <td><?= h($device->warranty_time) ?></td>
                                    <td><?= h($device->machine_status_id) ?></td>
                                    <td><?= h($device->description) ?></td>
                                    <td><?= h($device->status) ?></td>
                                    <td><?= h($device->created_on) ?></td>
                                    <td><?= h($device->created_by) ?></td>
                                    <td><?= h($device->updated_on) ?></td>
                                    <td><?= h($device->updated_by) ?></td>
                                    <td><?= h($device->del_flag) ?></td>
                                    <td><?= h($device->active) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Device', 'action' => 'view', $device->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Device', 'action' => 'edit', $device->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Device', 'action' => 'delete', $device->id], ['confirm' => __('Are you sure you want to delete # {0}?', $device->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>