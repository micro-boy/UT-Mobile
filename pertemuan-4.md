# 📱 MSIM4401 - Modul 4: Vue Lanjutan

> **Universitas Terbuka - 2025**

## 📋 Daftar Isi

- [Praktikum 4: Vue Lanjutan](#praktikum-4-vue-lanjutan)
  - [A. Routing dan Navigasi](#a-routing-dan-navigasi)
    - [1. Instalasi Vue Router](#1-instalasi-vue-router)
    - [2. Menggunakan Vue Router](#2-menggunakan-vue-router)

---

## ⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯
## 📘 Praktikum 4: Vue Lanjutan
## ⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯

### 🔶 A. Routing dan Navigasi

#### 1️⃣ Instalasi Vue Router

Instalasi bisa dilakukan dengan menggunakan CDN, npm, maupun npm pada SPA.

**⚡ Praktikkan** cara instalasi berikut:

1. Jika menggunakan CDN, konfigurasinya adalah menggunakan URL:
   ```
   https://unpkg.com/vue-router@4
   ```

2. Jika menggunakan npm:
   ```bash
   $ npm install vue-router@4
   ```
   atau
   ```bash
   $ npm install vue-router@next
   ```
   
   Setelah itu, file JS yang harus disertakan ada di:
   ```
   node_modules/vue-router/dist/vue-router/vue-router.global.js
   ```

3. Jika akan membangun SPA, gunakan:
   ```bash
   $ npm install vue-router@4 --save-dev
   ```
   atau
   ```bash
   $ npm install vue-router@next
   ```
   
   Perintah ini dijalankan di direktori proyek setelah membuat proyek menggunakan vue/cli. Argumen `--save-dev` digunakan supaya dependensi Vue Router dicatat di package.json.

#### 2️⃣ Menggunakan Vue Router

Gambar 4.1 adalah hasil yang akan dicapai pada modul praktik ini, yang memberikan contoh penggunaan Vue Router. Jika dijalankan, proyek ini akan menampilkan tampilan untuk Awal dan Tentang.

![Hasil Routing Menggunakan Vue Router](https://example.com/placeholder-image1.png)

**Gambar 4.1**: Hasil Routing Menggunakan Vue Router

Struktur folder/file yang akan dipraktikkan pada folder `src/` dapat dilihat pada Gambar 4.2.

![Struktur Direktori Proyek Yang Melibatkan Vue Router](https://example.com/placeholder-image2.png)

**Gambar 4.2**: Struktur Direktori Proyek Yang Melibatkan Vue Router

<div class="code-header">
<strong>Listing 4.1:</strong> Routing - main.js
</div>

```javascript
import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

createApp(App).use(router).mount('#app')
```

<div class="code-header">
<strong>Listing 4.2:</strong> Routing - router/index.js
</div>

```javascript
import { createWebHistory, createRouter } from "vue-router";
import Awal from "@/components/Awal.vue";
import Tentang from "@/components/Tentang.vue";

const routes = [
  {
    path: "/",
    name: "Awal",
    component: Awal,
  },
  {
    path: "/tentang",
    name: "Tentang",
    component: Tentang,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
```

<div class="code-explanation">
<strong>Penjelasan:</strong>
File router/index.js berfungsi untuk menetapkan nama serta jejak dari rute ("/" dan "/tentang") dan kemudian komponen yang akan digunakan untuk menangani jejak dari rute tersebut. Komponen tersebut didefinisikan di components/Awal.vue dan components/Tentang.vue.
</div>

<div class="code-header">
<strong>Listing 4.3:</strong> Routing - App.vue
</div>

```html
<template>
  <div id="nav">
    <router-link to="/awal">Awal</router-link> |
    <router-link to="/tentang">Tentang</router-link>
  </div>
  <router-view />
</template>
```

<div class="code-header">
<strong>Listing 4.4:</strong> Routing - components/Awal.vue
</div>

```html
<template>
  <p>Halaman <b>Awal</b></p>
</template>
```

<div class="code-header">
<strong>Listing 4.5:</strong> Routing - components/Tentang.vue
</div>

```html
<template>
  <p>Halaman <b>Tentang</b></p>
</template>
```

<div class="code-explanation">
<strong>Penjelasan:</strong>
Listing 4.4 dan 4.5 berfungsi untuk menetapkan komponen yang akan menangani jejak rute seperti yang telah didefisinikan di file router/index.js.
</div>

## 📚 Referensi

1. [Vue Router Documentation](https://router.vuejs.org/)
2. [Vue.js Official Documentation](https://v3.vuejs.org/)
3. [Vue CLI Documentation](https://cli.vuejs.org/)
4. [Vue.js Style Guide](https://vuejs.org/style-guide/)

## 🧩 Latihan

1. Buatlah sebuah aplikasi Vue dengan minimal 3 halaman yang terhubung menggunakan Vue Router.
2. Implementasikan nested routes dalam aplikasi Vue anda untuk menampilkan sub-halaman.
3. Buat aplikasi Vue dengan router guards untuk mengelola hak akses pengguna ke halaman tertentu.

## 🔍 Tips Pengembangan

- Gunakan named routes untuk memudahkan navigasi dan menghindari hardcoded URLs.
- Implementasikan router guards untuk logika navigasi kompleks seperti autentikasi.
- Manfaatkan nested routes untuk membuat UI yang hierarkis dan terstruktur.
- Pertimbangkan penggunaan lazy loading untuk meningkatkan performa aplikasi.
