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
            <?php echo e(__('Tambah Jadwal Periksa')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <section>
                    <!-- Header untuk form tambah jadwal -->
                    <header class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">
                            <?php echo e(__('Form Tambah Jadwal Periksa')); ?>

                        </h2>
                    </header>

                    <!-- Form untuk menambahkan jadwal baru -->
                    <form action="<?php echo e(route('dokter.jadwal.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?> <!-- Token CSRF untuk melindungi form dari serangan CSRF -->

                        <div class="space-y-6">
                            <!-- Input untuk memilih hari jadwal -->
                            <div>
                                <label for="hari" class="block text-sm font-medium text-gray-700">Hari</label>
                                <!-- Dropdown untuk memilih hari (Senin - Minggu) -->
                                <select name="hari" id="hari" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>

                            <!-- Input untuk memilih jam mulai jadwal -->
                            <div>
                                <label for="jam_mulai" class="block text-sm font-medium text-gray-700">Jam Mulai</label>
                                <!-- Input tipe time untuk memilih jam mulai -->
                                <input type="time" name="jam_mulai" id="jam_mulai" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>

                            <!-- Input untuk memilih jam selesai jadwal -->
                            <div>
                                <label for="jam_selesai" class="block text-sm font-medium text-gray-700">Jam Selesai</label>
                                <!-- Input tipe time untuk memilih jam selesai -->
                                <input type="time" name="jam_selesai" id="jam_selesai" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>

                            <!-- Tombol untuk menyimpan jadwal yang baru -->
                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                        </div>
                    </form>
                </section>
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
<?php endif; ?><?php /**PATH /Users/dwinuralfin/Documents/Kuliah/Bimbingan Karir/wd-02/resources/views/dokter/jadwal/create.blade.php ENDPATH**/ ?>