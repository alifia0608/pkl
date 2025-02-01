<template>
    <div class="flex min-h-screen font-vietnam">
      <!-- Sidebar -->
      <div class="fixed w-1/5 bg-gray-800 text-white flex flex-col  min-h-screen">
        <div class="flex items-center justify-center h-16 bg-[#00E6E6] ">
          <img src="/public/img/ss.png" alt="Logo" class="h-7 w-7 mr-4 " />
          <h2 class="mr-5 text-sm font-bold text-black">Sasana Pustaka</h2>
        </div>
        <nav class="mt-4">
          <NuxtLink to="/dasboard" class="flex items-center py-3 px-4 ">
            <img src="/public/img/Screenshot 2024-12-30 102715.png" alt="Logo" class="h-5 w-5 mr-2" />Dasboard
          </NuxtLink>

          <div class="flex items-center ml-4 ">
            <img src="/public/img/kl.png" alt="Logo" class="h-7 w-7 mr-2"/>Kelola Data
          </div>
          <NuxtLink to="/data_peminjaman" class="flex flex-col items-center py-3 px-4 hover:bg-gray-600">
          <span class="text-sm text-gray-400 mt-1">Data Pinjam Buku</span>
          </NuxtLink>
          <NuxtLink to="/data_pengembalian" class="flex flex-col items-center py-3 px-4 hover:bg-gray-600">
          <span class="text-sm text-gray-400 mt-1">Data Pengembailan Buku</span>
          </NuxtLink>

          <NuxtLink to="/pengguna" class="flex items-center py-3 px-4 bg-gray-600">
            <img src="/public/img/prfl.png"  alt="Logo" class="h-8 w-7 mr-2"> Pengguna
          </NuxtLink>

          <div class="flex-grow "></div>
          <NuxtLink to="/pengaturan" class="flex items-center py-3 px-4 hover:bg-gray-600 mt-40">
            <img src="/public/img/stln.png" alt="Logo" class="h-8 w-6 mr-2" /> Pengaturan
          </NuxtLink>
          <NuxtLink to="/" class="flex items-center py-3 px-4 hover:bg-gray-600 ">
            <img src="/public/img/pnh1.png" alt="Logo" class="h-7 w-7 mr-2" /> Log Out
          </NuxtLink>
        </nav>
      </div>
  
      <!-- Main Content -->
      <div class="ml-[20%] flex-1 p-6">
        <h1 class="text-3xl font-medium mb-4">Data Pengguna</h1>
        <table class="w-full mt-4 border border-gray-200 text-sm">
          <thead class="bg-gray-100">
            <tr>
              <th class="border border-gray-300 px-4 py-2">No</th>
              <th class="border border-gray-300 px-4 py-2">NISN</th>
              <th class="border border-gray-300 px-4 py-2">Nama</th>
              <th class="border border-gray-300 px-4 py-2">Kelas</th>
              <th class="border border-gray-300 px-4 py-2">Jurusan</th>
              <th class="border border-gray-300 px-4 py-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users" :key="user.id" class="hover:bg-gray-50">
              <td class="border border-gray-300 px-4 py-2 text-center">{{ user.no }}</td>
              <td class="border border-gray-300 px-4 py-2 text-center">{{ user.nisn }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ user.nama }}</td>
              <td class="border border-gray-300 px-4 py-2 text-center">{{ user.kelas }}</td>
              <td class="border border-gray-300 px-4 py-2 text-center">{{ user.jurusan }}</td>
              <td class="border border-gray-300 px-4 py-2 text-center">
                <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                  <NuxtLink to="datadiri"> &gt; </NuxtLink> 
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        users: [
          { no: 1, nisn: '1234', nama: 'Arista Ghea', kelas: 10, jurusan: 'RPL' },
        ],
      };
    },
  };
  </script>
  