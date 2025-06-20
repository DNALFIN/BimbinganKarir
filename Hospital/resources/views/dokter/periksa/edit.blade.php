<!-- FORMULIR EDIT -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Pemeriksaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded shadow-sm">
                <form action="{{ route('dokter.periksa.update', $periksa->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <!-- Nama dan RM -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Pasien</label>
                            <input type="text" value="{{ $periksa->janjiPeriksa->pasien->nama }}" readonly class="mt-1 block w-full rounded-md bg-gray-100">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">No RM</label>
                            <input type="text" value="{{ $periksa->janjiPeriksa->pasien->no_rm }}" readonly class="mt-1 block w-full rounded-md bg-gray-100">
                        </div>

                        <!-- Tanggal dan Catatan -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Pemeriksaan</label>
                            <input type="date" name="tgl_periksa" value="{{ $periksa->tgl_periksa }}" required class="mt-1 block w-full rounded-md">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Catatan</label>
                            <textarea name="catatan" rows="3" required class="mt-1 block w-full rounded-md">{{ $periksa->catatan }}</textarea>
                        </div>

                        <!-- Pilih Obat Multiple -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pilih Obat</label>
                            <select name="obat[]" id="obat" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" onchange="updateHargaObat()">
                                @foreach ($obats as $obat)
                                    <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}"
                                        @if ($periksa->obats->contains('id', $obat->id)) selected @endif>
                                        {{ $obat->nama_obat }} - Rp{{ number_format($obat->harga, 0, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-gray-500">Tekan Ctrl (Windows) / Cmd (Mac) untuk memilih lebih dari satu.</small>
                        </div>

                        <!-- Harga Obat Total -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Total Harga Obat</label>
                            <input type="number" name="harga_obat" id="harga_obat" value="{{ $periksa->harga_obat }}" readonly class="mt-1 block w-full rounded-md bg-gray-100">
                        </div>

                        <!-- Biaya Pemeriksaan -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Biaya Pemeriksaan</label>
                            <input type="number" name="biaya_periksa" value="150000" readonly class="mt-1 block w-full rounded-md bg-gray-100">
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="pt-4">
                            <button type="submit" style="background: blue; color: white; padding: 10px;">Edit Pemeriksaan</button>
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

                    // Hitung ulang saat halaman dimuat
                    window.onload = updateHargaObat;
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
