<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device $device
 * @var string[]|\Cake\Collection\CollectionInterface $suppliers
 * @var string[]|\Cake\Collection\CollectionInterface $machine_status
 */
?>
<style>
    .form-control[readonly],
    input[type="date"].form-control {
        background-color: #2A3038;
        color: #6C7293;
    }

    input.form-control {
        color: #6C7293;
    }

    input:focus {
        color: #C0B9C0;
    }

    #select2 #select2-container #select2-container--default #select2-container--below {
        /* width: 100%; */
        background-color: #2A3038;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #6C7293;
        line-height: 15px;
    }

    .upload-text,
    .image-uploader .uploaded {
        background-color: #2A3038;
    }

    .select2-container--default .select2-selection--single {
        background: #2A3038;
        height: 38px;
    }
</style>
<div class="row">
    <?= $this->Form->create(null, [
        'url' => [
            'controller' => 'Device',
            'action' => 'edit', $device->id
        ],
        'method' => 'post',
        'enctype' => 'multipart/form-data',
    ]); ?>
    <div class="col-md-12 col-md-offset-0 mb-3 mb-lg-0" style="margin: 0 auto;     color: #6C7293;">
        <h1 class="text-center" style="color: #87b0ff;">Edit Device: <?= $device->name ?></h1>
        <div class="px-4 py-5" style="  border-radius: 40px;
                                        background-color: #0e1016;">
            <div class="row mb-3">
                <div class="col-md-4 col-sm-4 col-12 form-group required">
                    <label class="control-label" for="">Serial</label>
                    <input type="hidden" class="device_id" value="<?php echo isset($device->id) ? $device->id : '' ?>">
                    <input type="text" class="form-control <?= isset($error['serial']) ? 'is-invalid' : ''  ?>" name="serial" value="<?php echo isset($device->serial) ? $device->serial : '' ?>">
                    <div class="invalid-feedback">
                        <?php if (!empty($error['serial']))
                            foreach ($error['serial'] as $msg) {
                                echo $msg . '<br>';
                            }  ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12 form-group required">
                    <label class="control-label" for="">Name</label>
                    <input type="text" class="form-control <?= isset($error['name']) ? 'is-invalid' : ''  ?>" name="name" value="<?php echo isset($device->name) ? $device->name : '' ?>">
                    <div class="invalid-feedback">
                        <?php if (!empty($error['name']))
                            foreach ($error['name'] as $msg) {
                                echo $msg . '<br>';
                            }  ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12 form-group required">
                    <label class="control-label" for="">Code</label>
                    <input type="text" readOnly class="device_code form-control <?= isset($error['code']) ? 'is-invalid' : ''  ?>" name="code" value="<?php echo isset($device->code) ? $device->code : '' ?>">
                    <div class="invalid-feedback">
                        <?php if (!empty($error['code']))
                            foreach ($error['code'] as $msg) {
                                echo $msg . '<br>';
                            }  ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12 form-group required">
                    <label class="control-label" for="">Property Type</label>
                    <input type="text" class="form-control <?= isset($error['property_type']) ? 'is-invalid' : ''  ?>" name="property_type" value="<?php echo isset($device->property_type) ? $device->property_type : '' ?>">
                    <div class="invalid-feedback">
                        <?php if (!empty($error['property_type']))
                            foreach ($error['property_type'] as $msg) {
                                echo $msg . '<br>';
                            }  ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12 form-group required">
                    <label class="control-label" for="">Price</label>
                    <input min="0" placeholder="VNĐ" step="1" type="number" class="form-control <?= isset($error['price']) ? 'is-invalid' : ''  ?>" name="price" value="<?php echo isset($device->price) ? $device->price : '' ?>">
                    <div class="invalid-feedback">
                        <?php if (!empty($error['price']))
                            foreach ($error['price'] as $msg) {
                                echo $msg . '<br>';
                            }  ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12 form-group required">
                    <label class="control-label" for="">Date Buy</label>
                    <input type="date" class="form-control <?= isset($error['created_buy']) ? 'is-invalid' : ''  ?>" name="created_buy" value="<?php echo isset($device->created_buy) ? $device->created_buy : '' ?>">
                    <div class="invalid-feedback">
                        <?php if (!empty($error['created_buy']))
                            foreach ($error['created_buy'] as $msg) {
                                echo $msg . '<br>';
                            }  ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12 form-group required">
                    <label class="control-label" for="">Model</label>
                    <input type="text" class="form-control <?= isset($error['model']) ? 'is-invalid' : ''  ?>" name="model" value="<?php echo isset($device->model) ? $device->model : '' ?>">
                    <div class="invalid-feedback">
                        <?php if (!empty($error['model']))
                            foreach ($error['model'] as $msg) {
                                echo $msg . '<br>';
                            }  ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12 form-group required">
                    <label for="">Warranty Time</label>
                    <input placeholder="Enter the warranty time of device (months)" min="0" step="1" type="number" class="form-control <?= isset($error['warranty_time']) ? 'is-invalid' : ''  ?>" name="warranty_time" value="<?php echo isset($device->warranty_time) ? $device->warranty_time : '' ?>">
                    <div class="invalid-feedback">
                        <?php if (!empty($error['warranty_time']))
                            foreach ($error['warranty_time'] as $msg) {
                                echo $msg . '<br>';
                            }  ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12 form-group required">
                    <label class="control-label" for="">Status</label>
                    <select type="text" class="form-control select2 <?= isset($error['status']) ? 'is-invalid' : ''  ?>" name="status" value="<?php echo $team['status'] ?? '' ?>">
                        <option value="">Select One</option>
                        <?php if (!empty(STATUS_DEVICE)) {
                            foreach (STATUS_DEVICE as $status_k => $status) { ?>
                                <option <?= !empty($dataRequest) && $status_k == $dataRequest['status'] ? 'selected'  : '' ?> value="<?= $status_k ?>"><?= $status ?></option>
                        <?php }
                        } ?>
                    </select>
                    <div class="invalid-feedback">
                        <?php if (!empty($error['status']))
                            foreach ($error['status'] as $msg) {
                                echo $msg . '<br>';
                            }  ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12 form-group required">
                    <label class="control-label" for="">Device Type</label>
                    <select type="text" class="device_type_id form-control select2 <?= isset($error['device_type']) ? 'is-invalid' : ''  ?>" name="device_type">
                        <option value="">Select One</option>
                        <?php if (!empty($listType)) {
                            foreach ($listType as $v_type) { ?>
                                <option <?= !empty($dataRequest) && $v_type->id == $dataRequest['device_type'] ? 'selected'  : '' ?> value="<?= isset($v_type->id) ? $v_type->id : '' ?>"><?= isset($v_type->name) ? $v_type->name : '' ?></option>
                        <?php }
                        } ?>
                    </select>

                    <div class="invalid-feedback">
                        <?php if (!empty($error['device_type']))
                            foreach ($error['device_type'] as $msg) {
                                echo $msg . '<br>';
                            }  ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12 form-group required">
                    <label class="control-label" for="">Supplier</label>
                    <select type="text" class="supplier_id form-control select2 <?= isset($error['device_type']) ? 'is-invalid' : ''  ?>" name="supplier_id" value="<?php echo isset($dataRequest) ? $team['device_type'] : '' ?>">
                        <option value="">Select One</option>
                        <?php if (!empty($listSuppliers)) {
                            foreach ($listSuppliers as $supplier) { ?>
                                <!-- <option <?= !empty($dataRequest) && $supplier->id == $dataRequest['supplier_id'] ? 'selected'  : '' ?> value="<?= isset($supplier->id) ? $supplier->id : '' ?>">
                                    <?= isset($supplier->id) ? $supplier->name : '' ?>
                                </option> -->
                                <option <?= !empty($dataRequest) && $supplier->id == $dataRequest['supplier_id'] ? 'selected' : '' ?> value="<?= isset($supplier->id) ? $supplier->id : '' ?>"><?= isset($supplier->id) ?  $supplier->name : '' ?>
                                </option>
                        <?php }
                        } ?>
                    </select>

                    <div class="invalid-feedback">
                        <?php if (!empty($error['device_type']))
                            foreach ($error['device_type'] as $msg) {
                                echo $msg . '<br>';
                            }  ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12 form-group required">
                    <label class="control-label" for="">Machine Status</label>
                    <select type="text" class="form-control select2 <?= isset($error['machine_status_id']) ? 'is-invalid' : ''  ?>" name="machine_status_id" value="<?php echo isset($dataRequest) ? $team['machine_status_id'] : '' ?>">
                        <option value="">Select One</option>
                        <?php if (!empty($listMachineStatus)) {
                            foreach ($listMachineStatus as $v_machineStatus) { ?>
                                <option <?= !empty($dataRequest) && $v_machineStatus->id == $dataRequest['device_type'] ? 'selected'  : '' ?> value="<?= isset($v_machineStatus->id) ? $v_machineStatus->id : '' ?>"><?= isset($v_machineStatus->title) ? $v_machineStatus->title : '' ?></option>
                        <?php }
                        } ?>
                    </select>

                    <div class="invalid-feedback">
                        <?php if (!empty($error['machine_status_id']))
                            foreach ($error['machine_status_id'] as $msg) {
                                echo $msg . '<br>';
                            }  ?>
                    </div>
                </div>


            </div>
            <div class="row mb-3">
                <div class="col-md-12 col-sm-12 col-12">
                    <label for="">Description</label>
                    <textarea type="text" class="form-control <?= isset($error['description']) ? 'is-invalid' : ''  ?>" name="description" value=""><?php echo isset($dataRequest) ? $dataRequest['description'] : '' ?></textarea>
                    <div class="invalid-feedback">
                        <?php if (!empty($error['description']))
                            foreach ($error['description'] as $msg) {
                                echo $msg . '<br>';
                            }  ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="input-field">
                        <label class="active">Photos</label>
                        <div class="input-images" name="images" value="" style="padding-top: .5rem;"></div>
                    </div>
                </div>
            </div>
            <!-- <div class="row mb-3 form-group required">
                <label class="control-label" class="active">Photos</label>
                <div class="input-field">
                    <div class="input-images form-control <?= isset($error['images']) ? 'is-invalid' : ''  ?>" name='images' value="<?php echo $team['images'] ?? '' ?>" style="padding-top: .5rem;"></div>
                </div>
                <div class="invalid-feedback">
                    <?php if (!empty($error['images']))
                        foreach ($error['images'] as $msg) {
                            echo $msg . '<br>';
                        }  ?>
                </div>
            </div> -->
        </div>
    </div>
    <hr class="d-none d-lg-block">
    <div class="d-grid gap-2 d-md-block text-center">
        <a href="/device/index" class="btn btn-outline-secondary" type="button">Cancel</a>
        <?= $this->Form->button(
            'Save',
            [
                'class' => " btn btn-secondary",
                'type' => 'submit',
            ]
        );
        ?>
    </div>

    <?= $this->Form->end() ?>
</div>

<script>
    $(document).ready(function() {
        $('.input-images').imageUploader({
            label: 'Upload image of this device',
        });
        $('select.device_type_id').change(function() {
            var selectedDeviceType = $('select.device_type_id').children("option:selected").val();
            var selectedDeivceId = $('input.device_id').val();
            // console.log(selectedDeivceId);
            var selectedSupplier = $('select.supplier_id').children("option:selected").val();
            getCombineCode(selectedDeviceType, selectedSupplier, selectedDeivceId);
        })
        $('select.supplier_id').change(function() {
            var selectedDeviceType = $('select.device_type_id').children("option:selected").val();
            var selectedSupplier = $('select.supplier_id').children("option:selected").val();
            var selectedDeivceId = $('input.device_id').val();
            // console.log(selectedSupplier);
            getCombineCode(selectedDeviceType, selectedSupplier, selectedDeivceId);
        })

        function getCombineCode(selectedDeviceType, selectedSupplier, selectedDeivceId) {
            $.ajax({
                url: '<?= $this->Url->build(['controller' => 'Device', 'action' => 'autoFillDeviceCodeWhileEdit']) ?>',
                method: 'post',
                dataType: 'json',
                data: {
                    device_type: selectedDeviceType ?? '',
                    supplier: selectedSupplier ?? '',
                    device_id: selectedDeivceId ?? '',
                },
                headers: {
                    'X-CSRF-Token': <?= json_encode($this->request->getAttribute('csrfToken')); ?>
                },
                success: function(response) {
                    console.log(response.code);
                    $('.device_code').val(response.code);
                }
            })
        }
        $('.select2').select2();




    });
</script>

<!-- <div class="row">
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
                echo $this->Form->control('machine_status_id', ['options' => $machine_status]);
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
</div> -->