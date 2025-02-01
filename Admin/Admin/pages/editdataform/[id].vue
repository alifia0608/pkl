<template>
  <div class="flex justify-center items-center h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white shadow rounded">
      <h2 class="text-2xl font-bold mb-6">Edit Data Buku</h2>
      <form @submit.prevent="updateBuku">
        <div class="mb-4">
          <label for="judul-buku" class="block text-sm font-medium text-gray-700">
            Judul Buku <span class="text-red-500">*</span>
          </label>
          <input
            id="judul-buku"
            type="text"
            v-model="bukuData.judul_buku"
            class="mt-1 block w-full rounded border border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
            :class="{'border-red-500': !bukuData.judul_buku}"
            required
          />
        </div>
        <div class="mb-4">
          <label for="penerbit" class="block text-sm font-medium text-gray-700">
            Penerbit <span class="text-red-500">*</span>
          </label>
          <input
            id="penerbit"
            type="text"
            v-model="bukuData.penerbit"
            class="mt-1 block w-full rounded border border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
            :class="{'border-red-500': !bukuData.penerbit}"
            required
          />
        </div>
        <div class="mb-4">
          <label for="tanggal-pinjam" class="block text-sm font-medium text-gray-700">
            Tanggal Pinjam <span class="text-red-500">*</span>
          </label>
          <input
            id="tanggal-pinjam"
            type="date"
            v-model="bukuData.tanggal_pinjam"
            class="mt-1 block w-full rounded border border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
            :class="{'border-red-500': !bukuData.tanggal_pinjam}"
            required />
        </div>
        <div class="flex justify-end gap-2">
          <button
            type="button"
            class="px-2 py-1 border rounded bg-white text-black hover:bg-gray-100">
            <NuxtLink to="/data_peminjaman">Kembali</NuxtLink>
          </button>
          <button
            type="submit"
            class="px-2 py-1 rounded bg-green-500 text-white hover:bg-green-600">
            Ubah
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script lang="ts" setup>
  import { ref, onMounted } from 'vue';
  import { useRouter } from 'vue-router';
  import axios from 'axios';

  const router = useRouter();
  const bukuId = ref<number>(0); // ID buku yang akan diperbarui

  const bukuData = ref<Record<string, any>>({
    judul_buku: '',
    penerbit: '',
    tanggal_pinjam: '',
  });

  // Ambil ID buku dari parameter URL
  onMounted(() => {
    bukuId.value = router.currentRoute.value.params.id;
    if (!bukuId.value) {
      console.error('ID buku tidak ditemukan di URL');
    }
  });

  // Proses pembaruan data buku
  const updateBuku = async () => {
    if (!bukuData.value.judul_buku || !bukuData.value.penerbit || !bukuData.value.tanggal_pinjam) {
      alert('Semua kolom harus diisi.');
      return;
    }

    try {
      const response = await axios.put(`http://127.0.0.1:8000/api/Buku/${bukuId.value}`, bukuData.value);

      if (response.status === 200) {
        alert('Data berhasil diperbarui.');
        router.push('/data_peminjaman');
      } else {
        alert('Terjadi kesalahan saat memperbarui data.');
      }
    } catch (error) {
      console.error('Error updating buku data:', error);
      alert(error.response?.data?.message || 'Terjadi kesalahan saat memperbarui data.');
    }
  };
</script>
