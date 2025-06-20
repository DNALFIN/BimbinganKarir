<!-- FORMULIR CREATE -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Periksa Pasien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <section>
                    <header class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-medium text-gray-900">Form Pemeriksaan Pasien</h2>
                    </header>

                    <form action="{{ route('dokter.periksa.store', $janjiPeriksa->id) }}" method="POST">
                        @csrf
                        <div class="space-y-6">

                            <!-- Nama dan RM -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Pasien</label>
                                <input type="text" value="{{ $janjiPeriksa->pasien->nama }}" readonly class="mt-1 block w-full rounded-md bg-gray-100">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">No RM</label>
                                <input type="text" value="{{ $janjiPeriksa->pasien->no_rm }}" readonly class="mt-1 block w-full rounded-md bg-gray-100">
                            </div>

                            <!-- Tanggal dan Catatan -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tanggal Pemeriksaan</label>
                                <input type="date" name="tgl_periksa" required class="mt-1 block w-full rounded-md">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Catatan</label>
                                <textarea name="catatan" rows="3" required class="mt-1 block w-full rounded-md"></textarea>
                            </div>

                            <!-- Pilih Obat Multiple -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Pilih Obat</label>
                                <select name="obat[]" id="obat" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" onchange="updateHargaObat()">
                                    @foreach ($obats as $obat)
                                        <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}">
                                            {{ $obat->nama_obat }} - Rp{{ number_format($obat->harga, 0, ',', '.') }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-gray-500">Tekan Ctrl (Windows) / Cmd (Mac) untuk memilih lebih dari satu.</small>
                            </div>

                            <!-- Harga Obat Total -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Total Harga Obat</label>
                                <input type="number" name="harga_obat" id="harga_obat" readonly class="mt-1 block w-full rounded-md bg-gray-100">
                            </div>

                            <!-- Biaya Pemeriksaan -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Biaya Pemeriksaan</label>
                                <input type="number" name="biaya_periksa" value="150000" readonly class="mt-1 block w-full rounded-md bg-gray-100">
                            </div>

                            <!-- Tombol Simpan -->
                            <div class="pt-4">
                                <button type="submit" style="background: blue; color: white; padding: 10px;">Simpan Pemeriksaan</button>
                            </div>
                        </div>
                    </form>

                    <!-- JavaScript Hitung Total Harga Obat -->
                    <script>
                        function updateHargaObat() {
                            const select = document.getElementById('obat');
                            let total = 0;
                            for (let option of select.selectedOptions) {
                                total += parseInt(option.getAttribute('data-harga')) || 0;
                            }
                            document.getElementById('harga_obat').value = total;
                        }
                    </script>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
