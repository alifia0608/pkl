<template>
  <div class="flex min-h-screen font-vietnam">
    <!-- Sidebar -->
    <div class="fixed w-1/5 bg-gray-800 text-white flex flex-col min-h-screen">
      <div class="flex items-center justify-center h-16 bg-[#00E6E6]">
        <img src="/public/img/ss.png" alt="Logo" class="h-7 w-7 mr-4" />
        <h2 class="mr-5 text-sm font-bold text-black">Sasana Pustaka</h2>
      </div>
      <nav class="mt-4">
        <NuxtLink to="/dasboard" class="flex items-center py-3 px-4">
          <img src="/public/img/Screenshot 2024-12-30 102715.png" alt="Logo" class="h-5 w-5 mr-2" />
          Dasboard
        </NuxtLink>
        <div class="flex items-center py-3 px-4 bg-gray-600">
          <img src="/public/img/kl.png" alt="Logo" class="h-7 w-7 mr-2" />
          Kelola Data
        </div>
        <NuxtLink to="/data_peminjaman" class="flex flex-col items-center py-3 px-4 hover:bg-gray-600">
          <span class="text-sm text-gray-400 mt-1">Data Pinjam Buku</span>
        </NuxtLink>
        <NuxtLink to="/data_pengembalian" class="flex flex-col items-center py-3 px-4 hover:bg-gray-600">
          <span class="text-sm text-gray-400 mt-1">Data Pengembalian Buku</span>
        </NuxtLink>
        <NuxtLink to="/pengguna" class="flex items-center py-3 px-4 hover:bg-gray-600">
          <img src="/public/img/prfl.png" alt="Logo" class="h-8 w-7 mr-2" />
          Pengguna
        </NuxtLink>

        <div class="flex-grow"></div>
        <NuxtLink to="/pengaturan" class="flex items-center py-3 px-4 hover:bg-gray-600 mt-40">
          <img src="/public/img/stln.png" alt="Logo" class="h-8 w-6 mr-2" /> Pengaturan
        </NuxtLink>
        <NuxtLink to="/" class="flex items-center py-3 px-4 hover:bg-gray-600">
          <img src="/public/img/pnh1.png" alt="Logo" class="h-7 w-7 mr-2" /> Log Out
        </NuxtLink>
      </nav>
    </div>

    <!-- Main Content -->
    <main class="ml-[20%] flex-1 p-6">
      <h1 class="text-3xl font-medium mb-4">Data Peminjaman Buku</h1>
      <div class="flex justify-end items-center mb-4 gap-2">
        <div class="relative">
          <input
            type="text"
            v-model="searchQuery"
            placeholder="Cari"
            class="border rounded-lg p-2 w-[120px] bg-gray-300 text-sm text-blue-800 placeholder-blue-800 pl-8"
          />
          <img src="/public/img/srch.png" alt="Search" class="absolute left-2 top-1/2 transform -translate-y-1/2 w-4 h-4" />
        </div>
        <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded text-xs">
          <NuxtLink to="tambahdataform">+ Tambah Data</NuxtLink>
        </button>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto">
        <table class="table-auto w-full bg-white shadow-md rounded text-sm">
          <thead class="bg-gray-200">
            <tr>
              <th class="px-4 py-2 text-left">No</th>
              <th class="px-4 py-2 text-left">Id Buku</th>
              <th class="px-4 py-2 text-left">Judul Buku</th>
              <th class="px-4 py-2 text-left">Penerbit</th>
              <th class="px-4 py-2 text-left">Waktu Kembali</th>
              <th class="px-4 py-2 text-left">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <tr
            v-for="(data, index) in paginatedBooks"
            :key="index"
            :class="index === 5 ? 'border-1 ' : 'border-1 odd:bg-gray-300 even:bg-white'"
          >
            <td class="border px-4 py-2">{{ (currentPage - 1) * itemsPerPage + index + 1 }}</td>
            <td class="border px-4 py-2">{{ data.idBuku }}</td>
            <td class="border px-4 py-2">{{ data.judulBuku }}</td>
            <td class="border px-4 py-2">{{ data.penerbit }}</td>
            <td class="border px-4 py-2">{{ data.waktuKembali }}</td>
            <td class="border px-4 py-2">
              <div class="flex gap-3">
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-2 rounded text-xs flex items-center justify-center">
                  <NuxtLink to="editdataform">
                    <img src="/public/img/pn.png" alt="" class="h-4 w-auto object-contain" />
                  </NuxtLink>
                </button>
                <button
                  @click="deleteBook(index)"
                  class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded text-xs flex items-center justify-center"
                >
                  <img src="/public/img/smph.png" alt="" class="h-4 w-auto object-contain" />
                </button>
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded text-xs">
                  <NuxtLink to="riwayatform"> &gt; </NuxtLink>
                </button>
              </div>
            </td>
          </tr>
        </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="grid grid-cols-3 items-center border border-gray-300 py-2 text-sm">
        <div class="flex items-center justify-start px-4">
          <span>Item per halaman</span>
          <span class="ml-2">: {{ itemsPerPage }}</span>
        </div>
        <div class="flex items-center justify-center border-l px-4 border-gray-300 h-full">
          <span>
            {{ (currentPage - 1) * itemsPerPage + 1 }}-
            {{ Math.min(currentPage * itemsPerPage, totalItems) }} dari {{ totalItems }} item
          </span>
        </div>
        <div class="flex items-center justify-end px-4 border-l border-gray-300">
          <span class="mr-2">{{ currentPage }} dari {{ totalPages }} halaman</span>
          <button
            :disabled="currentPage === 1"
            @click="changePage('prev')"
            class="px-3 py-1 mx-1 border border-gray-300 bg-gray-300 hover:bg-gray-400 text-gray-600 rounded disabled:bg-gray-200 disabled:cursor-not-allowed"
          >
            &lt;
          </button>
          <button
            :disabled="currentPage === totalPages"
            @click="changePage('next')"
            class="px-3 py-1 mx-1 border border-gray-300 bg-gray-300 hover:bg-gray-400 text-gray-600 rounded disabled:bg-gray-200 disabled:cursor-not-allowed"
          >
            &gt;
          </button>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
export default {
  data() {
    return {
      books: [
        { idBuku: 226, judulBuku: "Malin Kundang", penerbit: "Elex Media Komputindo", waktuKembali: "12.30/01/10/2024" },
        { idBuku: 227, judulBuku: "Dilan 1990", penerbit: "Airlangga Media", waktuKembali: "10.30/01/10/2024" },
      ],
      itemsPerPage: 10,
      currentPage: 1,
      searchQuery: "", // Query pencarian
    };
  },
  computed: {
    totalItems() {
      return this.books.filter((book) =>
        book.judulBuku.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
        book.idBuku.toString().includes(this.searchQuery) ||
        book.penerbit.toLowerCase().includes(this.searchQuery.toLowerCase())
      ).length;
    },
    totalPages() {
      return Math.ceil(this.totalItems / this.itemsPerPage);
    },
    paginatedBooks() {
      const start = (this.currentPage - 1) * this.itemsPerPage;
      const filteredBooks = this.books.filter((book) =>
        book.judulBuku.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
        book.idBuku.toString().includes(this.searchQuery) ||
        book.penerbit.toLowerCase().includes(this.searchQuery.toLowerCase())
      );
      return filteredBooks.slice(start, start + this.itemsPerPage);
    },
  },
  methods: {
    deleteBook(index) {
      const actualIndex = (this.currentPage - 1) * this.itemsPerPage + index;
      this.books.splice(actualIndex, 1);
    },
    changePage(direction) {
      if (direction === "prev" && this.currentPage > 1) {
        this.currentPage--;
      } else if (direction === "next" && this.currentPage < this.totalPages) {
        this.currentPage++;
      }
    },
  },
};
</script>
