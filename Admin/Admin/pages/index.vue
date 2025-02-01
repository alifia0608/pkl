<template>
  <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50 font-vietnam">
    <!-- Card Wrapper -->
    <div class="w-full max-w-md bg-white rounded-lg p-6 shadow-md">
      <!-- Logo -->
      <div class="flex justify-center mb-4 display: block;">
        <img src="/public/img/lg.png" alt="SMK Negeri 2 Logo" class="h-20 w-20" />
      </div>

      <h1 class="text-2xl font-bold text-center text-black-800 mb-6 ">
        Sasana Pustaka SMK Negeri 2 Trenggalek
      </h1>
      <!-- Form Login -->
      <div class="border-2 border-black flex fle-flex gap-3 p-1 rounded-lg">
      <form @submit.prevent="handleSubmit"> 
        <p class="text-2xl mr-2 flex flex-col justify-center items-center mt-2 ml-3  ">Admin Login</p>
        <!-- Input Email -->
        <div class="mb-4">
          <label for="email" class="ml-16 text-sm font-normal text-black-600 ">Email</label>
          <div class="form-group">
            <input 
            id="email" type="email" placeholder="User@gmail.com"  v-model="form.email" class="mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 ml-16 w-full max-w-[400px] p-1 text-sm required ">
            </div>
        </div>
        <!-- Input Sandi -->
        <div class="mb-4">
        <div class="flex items-center gap-20 ">
          <label for="password" class="ml-16 flex flex-col items-center text-sm font-normal text-black-600 ">Sandi</label>
          <a href="#" class="text-sm text-blue-500 hover:underline float-right mt-1">Lupa sandi?</a>
        </div>
      <div class="form-group">
          <input
            id="password"
            type="password"
            placeholder="********"
            v-model="form.password" class="mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 ml-16 p-1 w-full max-w-[400px] text-sm required"/>
        </div>
      </div>
        <!-- Tombol Login -->
        <button
        type="submit" class=" ml-16 p-1 w-full max-w-[400px] mb-5 bg-[#00E6E6] hover:bg-[#00b3b3] text-black font-normal py-1 rounded-md shadow-md block text-center text-sm">
          Masuk
        </button>
      </form>
    </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';
  export default {
    data() {
    return {
      form: {
        email: '',
        password: '',
      },
    };
  },
  methods: {
    async handleSubmit() {
      if (!this.form.email || !this.form.password) {
        alert('Harap isi email dan sandi.');
        return;
      }
      try {
        const response = await axios.post('http://127.0.0.1:8000/api/auth/login-or-register', this.form);
        console.log('Response:', response.data);
        alert('Login berhasil!');
        this.$router.push('/dasboard');
      } catch (error) {
        const errorMessage = error.response?.data?.message || 'Login gagal. Coba lagi!';
        alert(errorMessage);
      }
    },
  },
};
  </script>