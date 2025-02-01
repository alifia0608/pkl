<template>
    <div class="flex justify-center items-center h-screen bg-gray-100">
      <div class="w-full max-w-md p-8 bg-white shadow rounded">
        <h2 class="text-2xl font-bold mb-6">Tambah data buku kembali</h2>
        <form @submit.prevent="submitFormK" method="post">

          <div class="mb-4">
            <label for="judul-buku" class="block text-sm font-medium text-black">
              Judul Buku <span class="text-red-500">*</span>
            </label>
            <input
              id="judul-buku"
              type="text"
              v-model="formData.judul_buku"
              class="mt-1 block w-full rounded border border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              required
            />
          </div>
          <div class="mb-4">
            <label for="penerbit" class="block text-sm font-medium text-black">
              Penerbit <span class="text-red-500">*</span>
            </label>
            <input
              id="penerbit"
              type="text"
              v-model="formData.penerbit"
              class="mt-1 block w-full rounded border border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              required
            />
          </div>
          <div class="mb-4">
            <label for="keterangan" class="block text-sm font-medium text-black">
              Keterangan  <span class="text-red-500">*</span>
            </label>
            <input
              id="keterangan"
              type="text"
              v-model="formData.keterangan"
              class="mt-1 block w-full rounded border border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              required
            />
          </div>
          <div class="flex justify-end gap-2">
            <button
              type="button"
              class="px-2 py-1 border border-black rounded bg-white text-black hover:bg-gray-100"  >
              <NuxtLink to="/data_pengembalian">Kembali</NuxtLink> 
            </button>
            <button
              type="submit"
              class="px-2 py-1 rounded bg-green-500 text-white hover:bg-green-600">
                Tambah
            </button>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script lang="ts" setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  import { useRouter } from 'vue-router';

  const router = useRouter();

  const formData = ref({
    judul_buku: '',
    penerbit: '',
    keterangan: '',
  })

  const submitFormK = async () => {
    try{
      const data = {
        judul_buku: formData.value.judul_buku,
        penerbit: formData.value.penerbit,
        keterangan: formData.value.keterangan
        // new Date(formData.value.tanggal_pinjam).toISOString().split('T')[0] : '',
      }
      console.log('Data yang dikirim:', data);

      const response = await axios.post('http://127.0.0.1:8000/api/BukuKembali', data, {
            headers: {
                'Content-Type': 'application/json',
            },
        });

        alert('Data berhasil ditambahkan');
        console.log('Response:', response.data);

      router.push('/data_pengembalian');
        } catch (error: any) {
            console.error('Error submitting form:', error.response ? error.response.data : error.message);
            alert('Terjadi kesalahan saat menyimpan data');
      }
  }
</script>
  
  