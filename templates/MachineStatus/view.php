<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $machineStatus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Machine Status'), ['action' => 'edit', $machineStatus->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Machine Status'), ['action' => 'delete', $machineStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machineStatus->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Machine Status'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Machine Status'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="machineStatus view content">
            <h3><?= h($machineStatus->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($machineStatus->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($machineStatus->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($machineStatus->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated By') ?></th>
                    <td><?= $machineStatus->updated_by === null ? '' : $this->Number->format($machineStatus->updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $this->Number->format($machineStatus->active) ?></td>
                </tr>
                <tr>
                    <th><?= __('Del Flag') ?></th>
                    <td><?= $this->Number->format($machineStatus->del_flag) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created On') ?></th>
                    <td><?= h($machineStatus->created_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated On') ?></th>
                    <td><?= h($machineStatus->updated_on) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
