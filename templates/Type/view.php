<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Type $type
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Type'), ['action' => 'edit', $type->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Type'), ['action' => 'delete', $type->id], ['confirm' => __('Are you sure you want to delete # {0}?', $type->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Type'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="type view content">
            <h3><?= h($type->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($type->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($type->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($type->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated By') ?></th>
                    <td><?= $type->updated_by === null ? '' : $this->Number->format($type->updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $this->Number->format($type->active) ?></td>
                </tr>
                <tr>
                    <th><?= __('Del Flag') ?></th>
                    <td><?= $this->Number->format($type->del_flag) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created On') ?></th>
                    <td><?= h($type->created_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated On') ?></th>
                    <td><?= h($type->updated_on) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($type->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
