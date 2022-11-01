<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device $device
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Device'), ['action' => 'edit', $device->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Device'), ['action' => 'delete', $device->id], ['confirm' => __('Are you sure you want to delete # {0}?', $device->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Device'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Device'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="device view content">
            <h3><?= h($device->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Serial') ?></th>
                    <td><?= h($device->serial) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($device->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($device->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Type') ?></th>
                    <td><?= h($device->property_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Supplier') ?></th>
                    <td><?= $device->has('supplier') ? $this->Html->link($device->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $device->supplier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Model') ?></th>
                    <td><?= h($device->model) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($device->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Device Type') ?></th>
                    <td><?= $this->Number->format($device->device_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($device->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Warranty Time') ?></th>
                    <td><?= $device->warranty_time === null ? '' : $this->Number->format($device->warranty_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Machine Status Id') ?></th>
                    <td><?= $this->Number->format($device->machine_status_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($device->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($device->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated By') ?></th>
                    <td><?= $device->updated_by === null ? '' : $this->Number->format($device->updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Buy') ?></th>
                    <td><?= h($device->created_buy) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created On') ?></th>
                    <td><?= h($device->created_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated On') ?></th>
                    <td><?= h($device->updated_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Del Flag') ?></th>
                    <td><?= $device->del_flag ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $device->active ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($device->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Assign') ?></h4>
                <?php if (!empty($device->assign)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Device Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('User Transfer') ?></th>
                            <th><?= __('Machine Status Id') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Created On') ?></th>
                            <th><?= __('Updated By') ?></th>
                            <th><?= __('Updated On') ?></th>
                            <th><?= __('Active') ?></th>
                            <th><?= __('Del Flag') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($device->assign as $assign) : ?>
                        <tr>
                            <td><?= h($assign->id) ?></td>
                            <td><?= h($assign->device_id) ?></td>
                            <td><?= h($assign->user_id) ?></td>
                            <td><?= h($assign->description) ?></td>
                            <td><?= h($assign->user_transfer) ?></td>
                            <td><?= h($assign->machine_status_id) ?></td>
                            <td><?= h($assign->status) ?></td>
                            <td><?= h($assign->created_by) ?></td>
                            <td><?= h($assign->created_on) ?></td>
                            <td><?= h($assign->updated_by) ?></td>
                            <td><?= h($assign->updated_on) ?></td>
                            <td><?= h($assign->active) ?></td>
                            <td><?= h($assign->del_flag) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Assign', 'action' => 'view', $assign->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Assign', 'action' => 'edit', $assign->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Assign', 'action' => 'delete', $assign->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assign->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Attached Image') ?></h4>
                <?php if (!empty($device->attached_image)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Url Image') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Device Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Created On') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Updated On') ?></th>
                            <th><?= __('Updated By') ?></th>
                            <th><?= __('Active') ?></th>
                            <th><?= __('Del Flag') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($device->attached_image as $attachedImage) : ?>
                        <tr>
                            <td><?= h($attachedImage->id) ?></td>
                            <td><?= h($attachedImage->url_image) ?></td>
                            <td><?= h($attachedImage->type) ?></td>
                            <td><?= h($attachedImage->device_id) ?></td>
                            <td><?= h($attachedImage->description) ?></td>
                            <td><?= h($attachedImage->created_on) ?></td>
                            <td><?= h($attachedImage->created_by) ?></td>
                            <td><?= h($attachedImage->updated_on) ?></td>
                            <td><?= h($attachedImage->updated_by) ?></td>
                            <td><?= h($attachedImage->active) ?></td>
                            <td><?= h($attachedImage->del_flag) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'AttachedImage', 'action' => 'view', $attachedImage->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'AttachedImage', 'action' => 'edit', $attachedImage->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'AttachedImage', 'action' => 'delete', $attachedImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachedImage->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related History') ?></h4>
                <?php if (!empty($device->history)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Device Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('User Transfer') ?></th>
                            <th><?= __('Machine Status Id') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Created On') ?></th>
                            <th><?= __('Updated By') ?></th>
                            <th><?= __('Updated On') ?></th>
                            <th><?= __('Type Assign') ?></th>
                            <th><?= __('Active') ?></th>
                            <th><?= __('Del Flag') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($device->history as $history) : ?>
                        <tr>
                            <td><?= h($history->id) ?></td>
                            <td><?= h($history->device_id) ?></td>
                            <td><?= h($history->user_id) ?></td>
                            <td><?= h($history->description) ?></td>
                            <td><?= h($history->user_transfer) ?></td>
                            <td><?= h($history->machine_status_id) ?></td>
                            <td><?= h($history->created_by) ?></td>
                            <td><?= h($history->created_on) ?></td>
                            <td><?= h($history->updated_by) ?></td>
                            <td><?= h($history->updated_on) ?></td>
                            <td><?= h($history->type_assign) ?></td>
                            <td><?= h($history->active) ?></td>
                            <td><?= h($history->del_flag) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'History', 'action' => 'view', $history->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'History', 'action' => 'edit', $history->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'History', 'action' => 'delete', $history->id], ['confirm' => __('Are you sure you want to delete # {0}?', $history->id)]) ?>
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
