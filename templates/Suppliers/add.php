<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>
<div class="row">

    <div class="col-md-6 col-md-offset-6 mb-3 mb-lg-0" style="margin: 0 auto;">
        <?= $this->Form->create(null, [
            'url' => [
                'controller' => 'Suppliers',
                'action' => 'add'
            ],
            'method' => 'post',
            'novalidate'
        ]); ?>
        <h1 class="text-center">Create New Supplier</h1>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <h4 class="heading"><?= __('Actions') ?></h4>
                        <?= $this->Html->link(__('List Suppliers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>

                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Name</label>
                            <input type="text" class="form-control <?= isset($error['name']) ? 'is-invalid' : ''  ?>" name="name" value="<?php echo $supplier['name'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?php if (!empty($error['name']))
                                    foreach ($error['name'] as $msg) {
                                        echo $msg . '<br>';
                                    }  ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Description</label>
                            <textarea type="text" class="form-control <?= isset($error['description']) ? 'is-invalid' : ''  ?>" name="description"><?php echo $supplier['description'] ?? ''; ?></textarea>
                            <div class="invalid-feedback">
                                <?php if (!empty($error['description']))
                                    foreach ($error['description'] as $msg) {
                                        echo $msg . '<br>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-block text-center mt-5">
                        <?= $this->Form->button(__('Submit'), [
                            'class' => 'btn btn-outline-success btn-fw',
                            'type' => 'submit'
                        ]) ?>
                        <a href="/suppliers/index" class="btn btn-outline-secondary btn-fw" type="button">Cancel</a>


                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>