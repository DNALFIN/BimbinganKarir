<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Periksa Pasien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <header class="flex items-center justify-between">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Daftar Periksa Pasien') }}
                    </h2>
                </header>

                <table class="table mt-6 overflow-hidden rounded table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Keluhan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($janjiPeriksas as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->pasien->nama ?? "Tidak Diketahui" }}</td>
                                <td>{{ $item->keluhan }}</td>
                                <td>
                                    @if ($item->periksa)
                                        <span class="badge bg-success text-white fw-semibold">Sudah Diperiksa</span>
                                    @else
                                        <span class="badge bg-danger text-white fw-semibold">Belum Diperiksa</span>
                                    @endif
                                </td>
                                <td class="flex items-center gap-2">
                                    @if (!$item->periksa)
                                        <!-- Tampilkan tombol Periksa jika belum diperiksa -->
                                        <a href="{{ route('dokter.periksa.create', $item->id) }}" class="btn btn-primary btn-sm">Periksa</a>
                                    @endif

                                    @if ($item->periksa)
                                        <!-- Tampilkan tombol Edit jika sudah diperiksa -->
                                        <a href="{{ route('dokter.periksa.edit', $item->periksa->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
