<template>
  <div class="min-h-screen bg-gray-50 flex items-center justify-center">
    <div class="w-full max-w-3xl bg-white rounded-lg shadow p-6">
      <h1 class="text-2xl font-bold mb-4 text-gray-700">Data Diri Siswa</h1>
      <div class="flex items-center mb-4">
        <span class="text-red-500">*</span>
        <p class="text-sm text-black ml-1">Yang bisa diganti hanya nomor hp dan alamat</p>
      </div>
      <div class="flex">
        <!-- Foto di sisi kiri -->
        <div class="w-1/3 flex justify-center items-start mt-5">
          <img
            src="/public/img/passfoto.png"
            alt="Foto siswa"
            class="w-32 h-32 object-cover border-2 bg-blue-500 border-blue-500"
          />
        </div>
        <!-- Bagian kanan: Form -->
        <div class="w-2/3 pl-6">
          <div class="mb-4">
            <label class="block text-black text-sm font-medium mb-1">Nama:</label>
            <input
              type="text"
              value="Arista Ghea"
              disabled
              class="w-full bg-gray-100 text-black border border-black rounded-lg py-1 px-2 focus:outline-none"
            />
          </div>

          <div class="mb-4">
            <label class="block text-black text-sm font-medium mb-1">Kelas:</label>
            <input
              type="text"
              value="X RPL"
              disabled
              class="w-full bg-gray-100 text-black border border-black rounded-lg py-1 px-2 focus:outline-none"
            />
          </div>

          <div class="mb-4">
            <label class="block text-black text-sm font-medium mb-1">NISN:</label>
            <input
              type="text"
              value="1234"
              disabled
              class="w-full bg-gray-100 text-black border border-black rounded-lg py-1 px-2 focus:outline-none"
            />
          </div>

          <div class="mb-4">
            <label class="block text-black text-sm font-medium mb-1">Nomor HP:</label>
            <input
              type="text"
              placeholder="0812345678"
              class="w-full bg-white text-black border border-black rounded-lg py-2 px-4 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            />
          </div>

          <div class="mb-6">
            <label class="block text-black text-sm font-medium mb-1">Alamat:</label>
            <textarea
              rows="3"
              placeholder="Rt 15 Rw 04 Ds Tanggaran Kec. Pule Kab. Trenggalek"
              class="w-full bg-white text-black border border-black rounded-lg py-2 px-4 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            ></textarea>
          </div>
        </div>
      </div>
      <div class="flex justify-end">
        <NuxtLink
          to="pengguna"
          class="bg-gray-200 text-black border border-black text-sm font-medium py-2 px-4 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-1"
        >
          Kembali
        </NuxtLink>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'FormSiswa',
};
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap');
</style>
