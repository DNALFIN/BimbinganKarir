<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <?php echo e(__('Obat')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                <?php echo e(__('Edit Data Obat')); ?>

                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                <?php echo e(__('Silakan isi form di bawah ini untuk menambahkan data obat ke dalam sistem.')); ?>

                            </p>

                        </header>

                        <form class="mt-6" id="formObat" action="<?php echo e(route('dokter.obat.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="mb-3 form-group">
                                <label for="namaObat">Nama Obat</label>
                                <input type="text" class="rounded form-control" id="namaObat" name="nama_obat">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="kemasan">Kemasan</label>
                                <input type="text" class="rounded form-control" id="kemasan" name="kemasan">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="rounded form-control" id="harga" name="harga">
                            </div>

                            <a type="button" href="<?php echo e(route('dokter.obat.index')); ?>" class="btn btn-secondary">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /Users/dwinuralfin/Documents/Kuliah/Bimbingan Karir/wd-02/resources/views/dokter/obat/create.blade.php ENDPATH**/ ?>