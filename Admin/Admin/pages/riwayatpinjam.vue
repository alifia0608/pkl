<template>
    <div class="flex justify-center items-center h-screen bg-gray-100">
      <div class="w-full max-w-md p-8 bg-white shadow rounded">
        <h2 class="text-2xl font-bold mb-6">Riwayat Pinjam</h2>
        <form @submit.prevent="submitForm">
          <div class="mb-4">
            <label for="judul-buku" class="block text-sm font-medium text-black ">
              Judul Buku :
            </label>
            <input
              id="judul-buku"
              type="text"
              v-model="form.idBuku"
              class="mt-1 block w-full rounded border border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              required/>
          </div>
          <div class="mb-4">
            <label for="peminjaman" class="block text-sm font-medium text-black">
              Peminjaman : 
            </label>
            <input
              id="peminjaman"
              type="text"
              v-model="form.judulBuku"
              class="mt-1 block w-full rounded border border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              required
            />
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
              
              class="px-2 py-1 border border-black rounded bg-white text-black hover:bg-gray-100"  >
              <NuxtLink to="/data_pengembalian">Kembali</NuxtLink> 
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
          judulbuku: '',
          dipinjam: '',
          keterangan: '',
        },
      };
    },
  };
  </script>
  
  