<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device $device
 * @var string[]|\Cake\Collection\CollectionInterface $suppliers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $device->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $device->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Device'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="device form content">
            <?= $this->Form->create($device) ?>
            <fieldset>
                <legend><?= __('Edit Device') ?></legend>
                <?php
                    echo $this->Form->control('serial');
                    echo $this->Form->control('name');
                    echo $this->Form->control('code');
                    echo $this->Form->control('property_type');
                    echo $this->Form->control('device_type');
                    echo $this->Form->control('supplier_id', ['options' => $suppliers]);
                    echo $this->Form->control('model');
                    echo $this->Form->control('price');
                    echo $this->Form->control('created_buy');
                    echo $this->Form->control('warranty_time');
                    echo $this->Form->control('machine_status_id');
                    echo $this->Form->control('description');
                    echo $this->Form->control('status');
                    echo $this->Form->control('created_on');
                    echo $this->Form->control('created_by');
                    echo $this->Form->control('updated_on');
                    echo $this->Form->control('updated_by');
                    echo $this->Form->control('del_flag');
                    echo $this->Form->control('active');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
