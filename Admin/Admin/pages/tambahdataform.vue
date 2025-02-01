<template>
    <div class="flex justify-center items-center h-screen bg-gray-100">
      <div class="w-full max-w-md p-8 bg-white shadow rounded">
        <h2 class="text-2xl font-bold mb-6">Tambah data</h2>
        <form @submit.prevent="handleSubmit">
          <div class="mb-4">
            <label for="id-buku" class="block text-sm font-medium text-black ">
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
            <label for="judul-buku" class="block text-sm font-medium text-black">
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
            <label for="penerbit" class="block text-sm font-medium text-black">
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
            <label for="tanggal-pinjam" class="block text-sm font-medium text-black">
              Tanggal Pinjam <span class="text-red-500">*</span>
            </label>
            <input
              id="tanggal-pinjam"
              type="date"
              v-model="form.tanggalPinjam"
              class="mt-1 block w-full rounded border border-black shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
              required />
          </div>
          <div class="flex justify-end gap-2">
            <button
              type="button"
            
              class="px-2 py-1 border border-black rounded bg-white text-black hover:bg-gray-100"  >
              <NuxtLink to="/data_peminjaman">Kembali</NuxtLink> 
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
  
  <script>
  import axios from 'axios';
  export default {
    data() {
      return {
        form: {
          idBuku: '',
          judulBuku: '',
          penerbit: '',
          tanggalPinjam: '',
        },
      };
    },
    methods: {
    async handleSubmit() {
      try {
        const response = await axios.post('http://127.0.0.1:8000/api/Buku', this.form);
        console.log('Response:', response.data);
        alert('Data buku berhasil ditambahkan!');
        this.$router.push('/data_peminjaman');
      } catch (error) {
        const errorMessage = error.response?.data?.message || 'Data buku gagal ditambahkan!';
        alert(errorMessage);
      }
    },
  },
};
  </script>
  
  