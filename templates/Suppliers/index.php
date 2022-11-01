<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Supplier> $suppliers
 */
?>
<style>
    tbody tr:hover {

        background-color: #aaa !important;
    }
</style>
<h1 class="text-center">Supplier</h1>
<div class="col-lg-12 grid-margin stretch-card">

    <div class="card">
        <div class="card-body">
            <?= $this->Html->link(__('New Supplier'), ['action' => 'add'], ['class' => 'btn btn-primary mr-2button float-right']) ?>
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
                        <button class="btn btn-success w-100" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <div class="table-responsive" style="font-size: 2rem !important ;">
                <table class="table table-bordered table-hover border-top">
                    <thead>
                        <tr class="text-end">
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created Date</th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($suppliers as $supplier) : ?>
                            <tr>
                                <td><?= h($supplier->name) ?></td>
                                <td><?= h($supplier->description) ?></td>
                                <td><?= h($supplier->created_on) ?></td>
                                <!-- <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $supplier->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplier->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?>
                                </td> -->
                                <td class="text-end" style="width: 30px;">
                                    <div class="dropdown ">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuOutlineButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="/img/default/icon-option.svg">
                                        </button>
                                        <div class="dropdown-menu " aria-labelledby="dropdownMenuOutlineButton2" x-placement="bottom-start" style="width: 30px;">
                                            <?= $this->Html->link(
                                                __('View'),
                                                ['action' => 'view', $supplier->id],
                                                ['class' => 'dropdown-item text-center']
                                            ) ?>
                                            <?= $this->Html->link(
                                                __('Edit'),
                                                ['action' => 'edit', $supplier->id],
                                                ['class' => 'dropdown-item text-center']
                                            ) ?>
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

<!-- <div class="suppliers index content">
    <?= $this->Html->link(__('New Supplier'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Suppliers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created Date</th>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created_on') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('updated_on') ?></th>
                    <th><?= $this->Paginator->sort('updated_by') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th><?= $this->Paginator->sort('del_flag') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($suppliers as $supplier) : ?>
                    <tr>
                        <td><?= h($supplier->name) ?></td>
                        <td><?= h($supplier->description) ?></td>
                        <td><?= h($supplier->created_on) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $supplier->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplier->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div> -->