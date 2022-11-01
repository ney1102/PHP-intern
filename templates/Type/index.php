<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Type> $type
 */
?>
<div class="type index content">
    <?= $this->Html->link(__('New Type'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Type') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created Date</th>
                    <!-- <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created_on') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('updated_on') ?></th>
                    <th><?= $this->Paginator->sort('updated_by') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th><?= $this->Paginator->sort('del_flag') ?></th> -->
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($types as $type) : ?>
                    <tr>
                        <!-- <td><?= $this->Number->format($type->id) ?></td> -->
                        <td><?= h($type->name) ?></td>
                        <td><?= h($type->description) ?></td>
                        <td><?= h($type->created_on) ?></td>
                        <!-- <td><?= $this->Number->format($type->created_by) ?></td>
                        <td><?= h($type->updated_on) ?></td>
                        <td><?= $type->updated_by === null ? '' : $this->Number->format($type->updated_by) ?></td>
                        <td><?= $this->Number->format($type->active) ?></td>
                        <td><?= $this->Number->format($type->del_flag) ?></td> -->
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $type->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $type->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $type->id], ['confirm' => __('Are you sure you want to delete # {0}?', $type->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
        </ul>
    </div>
</div>