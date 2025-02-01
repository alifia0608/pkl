<template>
    <div class="flex justify-center items-center h-screen bg-gray-100">
      <div class="w-full max-w-md p-8 bg-white shadow rounded">
        <h2 class="text-2xl font-bold mb-6">Edit Data Kembali</h2>
        <form @submit.prevent="submitForm">
          <div class="mb-4">
            <label for="id-buku" class="block text-sm font-medium text-gray-700 ">
              Id Buku <span class="text-red-500">*</span>
            </label>
            <input
              id="id-buku"
              type="text"
              v-model="form.idBuku"
              class="mt-1 block w-full rounded border border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              required/>
          </div>
          <div class="mb-4">
            <label for="judul-buku" class="block text-sm font-medium text-gray-700">
              Judul Buku <span class="text-red-500">*</span>
            </label>
            <input
              id="judul-buku"
              type="text"
              v-model="form.judulBuku"
              class="mt-1 block w-full rounded border border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
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
              v-model="form.penerbit"
              class="mt-1 block w-full rounded border border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
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
              v-model="form.tanggalPinjam"
              class="mt-1 block w-full rounded border border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              required />
          </div>
          <div class="mb-4">
            <label for="keterangan" class="block text-sm font-medium text-black">
             Keterangan :
            </label>
            <input
              id="keterangan"
              type="text"
              v-model="form.keterangan"
              class="mt-1 block w-full rounded border border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              required/>
          </div>
          <div class="flex justify-end gap-2">
            <button
              type="button"
              class="px-2 py-1 border rounded bg-white text-black hover:bg-gray-100"  >
              <NuxtLink to="/data_pengembalian">Kembali</NuxtLink> 
            </button>
            <button
              type="submit"
              class="px-2 py-1 rounded bg-green-500 text-white hover:bg-green-600">
              <NuxtLink to="/data_pengembalian">Ubah</NuxtLink> 
            </button>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        form: {
          idBuku: '',
          judulBuku: '',
          penerbit: '',
          tanggalPinjam: '',
          keterangan:'',
        },
      };
    },
    methods: {
      submitForm() {
        alert('Data berhasil diubah');
        console.log(this.form);
      },
    },
  };
  </script>
  
  