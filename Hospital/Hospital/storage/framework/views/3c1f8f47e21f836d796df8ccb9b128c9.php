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
            <?php echo e(__('Jadwal Periksa')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <!-- Header untuk menampilkan judul dan tombol untuk menambah jadwal -->
                <header class="flex items-center justify-between">
                    <h2 class="text-lg font-medium text-gray-900">
                        <?php echo e(__('Daftar Jadwal Periksa')); ?>

                    </h2>

                    <div class="flex-col items-center justify-center text-center">
                        <!-- Tombol untuk menambah jadwal baru -->
                        <a href="<?php echo e(route('dokter.jadwal.create')); ?>" class="btn btn-primary">Tambah Jadwal</a>

                        <!-- Menampilkan pesan sukses jika status session adalah 'jadwal-created' -->
                        <?php if(session('status') === 'jadwal-created'): ?>
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                                <?php echo e(__('Jadwal berhasil dibuat.')); ?>

                            </p>
                        <?php endif; ?>
                    </div>
                </header>

                <!-- Menampilkan alert menggunakan JavaScript jika ada session 'success' -->
                <?php if(session('success')): ?>
                    <script type="text/javascript">
                        alert("<?php echo e(session('success')); ?>");
                    </script>
                <?php endif; ?>

                <!-- Tabel untuk menampilkan daftar jadwal pemeriksaan -->
                <table class="table mt-6 overflow-hidden rounded table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Jam Mulai</th>
                            <th scope="col">Jam Selesai</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop untuk menampilkan semua jadwal -->
                        <?php $__currentLoopData = $jadwals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jadwal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <!-- Menampilkan nomor urut jadwal -->
                                <th scope="row" class="align-middle text-start"><?php echo e($loop->iteration); ?></th>
                                <!-- Menampilkan hari jadwal -->
                                <td class="align-middle text-start"><?php echo e($jadwal->hari); ?></td>
                                <!-- Menampilkan jam mulai jadwal -->
                                <td class="align-middle text-start"><?php echo e($jadwal->jam_mulai); ?></td>
                                <!-- Menampilkan jam selesai jadwal -->
                                <td class="align-middle text-start"><?php echo e($jadwal->jam_selesai); ?></td>
                               <td class="align-middle text-start">
                                <!-- Menampilkan badge dengan status 'aktif' atau 'nonaktif' -->
                                <span class="badge <?php echo e($jadwal->status == 'aktif' ? 'bg-success' : 'bg-danger'); ?> text-white fw-bold fs-5">
                                    <?php echo e(ucfirst($jadwal->status)); ?>

                                </span>
                            </td>

                                <td class="flex items-center gap-3">
                                   
                                    <form action="<?php echo e(route('dokter.jadwal.status', $jadwal->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('POST'); ?>

                                        <!-- Tombol untuk mengaktifkan atau menonaktifkan jadwal -->
                                        <button type="submit" class="btn <?php echo e($jadwal->status == 'aktif' ? 'btn-warning' : 'btn-success'); ?> btn-sm">
                                            <?php echo e($jadwal->status == 'aktif' ? 'Nonaktifkan' : 'Aktifkan'); ?>

                                        </button>
                                    </form>

                                    
                                    <form action="<?php echo e(route('dokter.jadwal.destroy', $jadwal->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <!-- Tombol untuk menghapus jadwal -->
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
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
<?php endif; ?><?php /**PATH /Users/dwinuralfin/Documents/Kuliah/Bimbingan Karir/wd-02/resources/views/dokter/jadwal/index.blade.php ENDPATH**/ ?>