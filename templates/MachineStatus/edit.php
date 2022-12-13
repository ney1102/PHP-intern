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
                'controller' => 'MachineStatus',
                'action' => 'edit', $machineStatus->id
            ],
            'method' => 'post',
            'id' => 'del' . $machineStatus->id,
            'novalidate'
        ]); ?>
        <h1 class="text-center">Create New Machine Status</h1>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <h4 class="heading"><?= __('Actions') ?></h4>
                        <?= $this->Html->link(__('List Machine Status'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>

                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Name</label>
                            <input type="text" class="form-control <?= isset($error['title']) ? 'is-invalid' : ''  ?>" name="title" value="<?php echo $machineStatus['title'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?php if (!empty($error['title']))
                                    foreach ($error['name'] as $msg) {
                                        echo $msg . '<br>';
                                    }  ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-block text-center mt-5">
                        <a href="/machine-status/index" class="btn btn-outline-secondary btn-fw" type="button">Cancel</a>
                        <a class="btn btn-secondary btn-fw test_sub" href="javascript:void(0)" data-id="<?= $machineStatus->id ?>" data-action="Edit" data-name="<?= $machineStatus->title ?>" type="button">Save</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
</div>

<script>
    $(document).ready(function() {
        $.validator.setDefaults({
            highlight: function(element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            },
            errorElement: 'div',
            errorClass: 'invalid-feedback',
            errorPlacement: function(error, element) {
                if (element.parent().length) {
                    element.parent().append(error)
                } else {
                    error.insertAfter(element);
                }
            }
        });
        $("form").validate({
            rules: {
                name: {
                    required: true
                }
            },
            submitHandler: function(form) {
                $('form button[type="submit"]').attr("disabled", true);
                form.submit();
            }
        });
    });
    $(document).ready(function() {
        $('a.test_sub').click(function(e) {
            let acction = $(this).attr('data-action')
            let name = $(this).attr('data-name')
            if (confirm('Are you sure you want to ' + acction + ' "' + name + '"?')) {
                $('#del' + $(this).data('id')).submit()

            }
        })
    });
</script>