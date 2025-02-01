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

          <NuxtLink to="/pengguna" class="flex items-center py-3 px-4 hover:bg-gray-600">
            <img src="/public/img/prfl.png"  alt="Logo" class="h-8 w-7 mr-2"> Pengguna
          </NuxtLink>

          <div class="flex-grow "></div>
          <NuxtLink to="/pengaturan" class="flex items-center py-3 px-4 bg-gray-600 mt-40">
            <img src="/public/img/stln.png" alt="Logo" class="h-8 w-6 mr-2" /> Pengaturan
          </NuxtLink>
          <NuxtLink to="/" class="flex items-center py-3 px-4 hover:bg-gray-600 ">
            <img src="/public/img/pnh1.png" alt="Logo" class="h-7 w-7 mr-2" /> Log Out
          </NuxtLink>
        </nav>
      </div>
      <!-- Main Content -->
      <div class="ml-[20%] flex-1 p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
        </div>
        <!-- Form Ganti Password -->
        <h1 class="text-3xl font-medium mb-4">Ganti Password</h1>
        <div class="max-w-md mx-auto bg-white border-black border p-6 shadow rounded mt-16 ml-25">
          <h2 class="text-xl text-black mb-4 text-left">Ubah Password</h2>
          <form>
            <div class="mb-4">
              <label for="currentPassword" class="block text-sm font-medium text-gray-800">Sandi Lama</label>
              <input
                type="password" id="currentPassword"
                class="mt-1 block w-full rounded-md border-black border shadow-sm focus:border-teal-500 focus:ring-teal-500"required/>
            </div>
            <div class="mb-4">
              <label for="newPassword" class="block text-sm font-medium text-gray-800">Sandi Baru</label>
              <input
                type="password" id="newPassword"
                class="mt-1 block w-full rounded-md border-black border shadow-sm focus:border-teal-500 focus:ring-teal-500" required />
            </div>
            <div class="mb-6">
              <label for="confirmPassword" class="block text-sm font-medium text-gray-800">Ulang Sandi Baru</label>
              <input type="password" id="confirmPassword" 
                class="mt-1 block w-full rounded-md border-black border shadow-sm focus:border-teal-500 focus:ring-teal-500" required/>
            </div>
          <button class="block w-full  bg-[#00E6E6]  text-white py-2 rounded-md text-center hover:bg-[#00CFCF]" >
            Ubah
          </button>
          </form>
        </div>
      </div>
    </div>
  </template>
  