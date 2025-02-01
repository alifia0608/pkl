<template>
    <div class="flex min-h-screen font-vietnam">
      <!-- Sidebar -->
      <div class="fixed w-1/5 bg-gray-800 text-white flex flex-col  min-h-screen">
        <div class="flex items-center justify-center h-16 bg-[#00E6E6] ">
          <img src="/public/img/ss.png" alt="Logo" class="h-7 w-7 mr-4 " />
          <h2 class="mr-5 text-sm font-bold text-black">Sasana Pustaka</h2>
        </div>
        <nav class="mt-4">
          <NuxtLink to="/dasboard" class="flex items-center py-3 px-4 bg-gray-600">
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
          <NuxtLink to="/pengaturan" class="flex items-center py-3 px-4 hover:bg-gray-600 mt-40">
            <img src="/public/img/stln.png" alt="Logo" class="h-8 w-6 mr-2" /> Pengaturan
          </NuxtLink>
          <NuxtLink to="/" class="flex items-center py-3 px-4 hover:bg-gray-600 ">
            <img src="/public/img/pnh1.png" alt="Logo" class="h-7 w-7 mr-2" /> Log Out
          </NuxtLink>
        </nav>
      </div>

      <!-- Main Content -->
      <div class="ml-[20%] w-4/5 bg-gray-50 p-6">
        <h1 class="text-3xl font-medium mb-4">Rekap Data Hari Ini</h1>
        <div class="flex  justify-between mb-4 items-center ">
        <p class="text-sm">*Diagram batang data jumlah pengunjung</p>
        <p class="text-sm mr-auto ml-auto">*Diagram lingkaran data buku favorit</p>
      </div>
        <!-- Diagrams -->
        <div class="flex gap-4 mb-6">
          <!-- Bar Chart -->
          <div class="w-1/2 bg-white p-4 rounded-md shadow-md">
            <canvas id="barChart"></canvas>
          </div>
          <!-- Pie Chart -->
          <div class="w-1/2 bg-white p-4 rounded-md shadow-md">
            <canvas id="pieChart"></canvas>
          </div>
        </div>
  
        <!-- Tables -->
        <div class="bg-[#2D8BBA] p-2 rounded-lg shadow-md">
        <div class="flex gap-9 ">
          <!-- Table 1 -->
          <div class=" bg-[#2D8BBA] p-4 w-1/2 ml-2">
            <h3 class="text-white mb-2">Buku Dipinjam</h3>
            <table class="table-auto w-full text-xs border-collapse">
              <thead>
                <tr class="bg-gray-300 text-black border-2 ">
                  <th class="border px-4 py-2">No</th>
                  <th class="border px-4 py-2">ID Buku</th>
                  <th class="border px-4 py-2">Judul Buku</th>
                  <th class="border px-4 py-2">Penerbit</th>
                </tr>
              </thead>
              <tbody>
                <tr class="bg-white text-black border-2">
                  <td class="border px-4 py-2 text-center">1</td>
                  <td class="border px-4 py-2 text-center">226</td>
                  <td class="border px-4 py-2">Malin Kundang</td>
                  <td class="border px-4 py-2">Elex Media Komputindo</td>
                </tr>
                <!-- Add rows as needed -->
              </tbody>
            </table>
            <div class="flex justify-center mt-2">
              <NuxtLink to="/data_peminjaman" class="mt-2 text-white hover:underline ">Lihat Selengkapnya >
            </NuxtLink>
            </div>
          </div>
          <!-- Table 2 -->
          <div class=" bg-[#2D8BBA] p-4  ml-2 w-1/2">
            <h3 class=" mb-2 text-white">Buku Kembali</h3>
            <table class="table-auto w-full text-xs border-collapse">
              <thead>
                <tr class="bg-gray-300 text-black border-2">
                  <th class="border px-4 py-2">No</th>
                  <th class="border px-4 py-2">ID Buku</th>
                  <th class="border px-4 py-2">Judul Buku</th>
                  <th class="border px-4 py-2">Penerbit</th>
                </tr>
              </thead>
              <tbody>
                <tr class="bg-white text-black border-2">
                  <td class="border px-4 py-2 text-center">1</td>
                  <td class="border px-4 py-2 text-center">442</td>
                  <td class="border px-4 py-2 ">Timun Emas</td>
                  <td class="border px-4 py-2 ">Gramedia</td>
                </tr>
                <!-- Add rows as needed -->
              </tbody>
            </table>
            <div class="flex justify-center mt-2">
              <NuxtLink to="/data_pengembalian" class="mt-2 text-white hover:underline ">Lihat Selengkapnya >
              </NuxtLink>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </template>
<script>
import { ref, onMounted } from 'vue';
import { Chart } from 'chart.js';

export default {
  setup() {
    const barChart = ref(null);
    const pieChart = ref(null);

    onMounted(() => {
      // Data untuk diagram batang
      const ctxBar = document.getElementById('barChart').getContext('2d');
      barChart.value = new Chart(ctxBar, {
        type: 'bar',
        data: {
          labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
          datasets: [
            {
              label: 'Kelas 10',
              data: [10, 8, 5, 7, 3],
              backgroundColor: 'rgba(102, 204, 255, 0.8)', // Biru muda
            },
            {
              label: 'Kelas 11',
              data: [15, 13, 8, 10, 6],
              backgroundColor: 'rgba(77, 180, 255, 0.8)', // Biru medium
            },
            {
              label: 'Kelas 12',
              data: [15, 12, 7, 11, 4],
              backgroundColor: 'rgba(51, 153, 255, 0.8)', // Biru gelap
            },
          ],
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
          },
          scales: {
            x: {
              stacked: true,
            },
            y: {
              beginAtZero: true,
              stacked: true,
              ticks: {
                stepSize: 10,
              },
            },
          },
        },
      });

      // Data untuk diagram lingkaran
      const ctxPie = document.getElementById('pieChart').getContext('2d');
      pieChart.value = new Chart(ctxPie, {
        type: 'doughnut', // Tipe doughnut agar lingkaran berlubang
        data: {
          labels: ['Cerpen', 'Novel', 'Sejarah', 'Matpel'],
          datasets: [
            {
              data: [15.8, 10.5, 21.1, 52.6], // Data sesuai gambar
              backgroundColor: [
                '#1A284C', // Warna cerpen
                '#3B8E98', // Warna novel
                '#88D2F3', // Warna sejarah
                '#4CB5F5', // Warna matpel
              ],
            },
          ],
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'right',
            },
          },
        },
      });
    });

    return { barChart, pieChart };
  },
};
</script>

