# 🚦 MSIM4401 - Modul 4: Routing dan Navigasi dengan Vue Router

> **Universitas Terbuka - 2025**

## 📋 Daftar Isi

- [Praktikum 4: Vue Lanjutan - Routing](#praktikum-4-vue-lanjutan---routing)
  - [A. Routing dan Navigasi](#a-routing-dan-navigasi)
    - [1. Instalasi Vue Router](#1-instalasi-vue-router)
    - [2. Menggunakan Vue Router](#2-menggunakan-vue-router)
  - [B. Struktur Proyek Vue Router](#b-struktur-proyek-vue-router)
    - [1. main.js](#1-mainjs)
    - [2. router/index.js](#2-routerindexjs)
    - [3. App.vue](#3-appvue)
    - [4. Komponen Awal.vue dan Tentang.vue](#4-komponen-awalvue-dan-tentangvue)

---

## 🧩 Praktikum 4: Vue Lanjutan - Routing

### 🔶 A. Routing dan Navigasi

#### 1️⃣ Instalasi Vue Router

Vue Router dapat dipasang menggunakan beberapa metode:

- **Menggunakan CDN**  
  Sertakan URL berikut:  
  `https://unpkg.com/vue-router@4`

- **Menggunakan npm**  
  ```bash
  npm install vue-router@4
  ```
  atau
  ```bash
  npm install vue-router@next
  ```

- **Untuk SPA (Single Page Application)**  
  Jalankan perintah berikut setelah membuat proyek Vue CLI:
  ```bash
  npm install vue-router@4 --save-dev
  ```
  Argumen `--save-dev` menandai bahwa dependensi router hanya untuk pengembangan dan akan dicatat di `package.json`.

#### 2️⃣ Menggunakan Vue Router

> 💡 Gambar 4.1 menggambarkan tampilan antarmuka hasil routing dengan tautan ke halaman *Awal* dan *Tentang*.

---

### 📁 B. Struktur Proyek Vue Router

Struktur direktori pada folder `src/` ditampilkan seperti pada **Gambar 4.2**, dengan file utama berikut:

#### 📄 1. main.js

```javascript
import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

createApp(App).use(router).mount('#app')
```

📌 **Listing 4.1** – Routing: main.js

---

#### 📄 2. router/index.js

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

📌 **Listing 4.2** – Routing: router/index.js  
File ini menetapkan jalur (route) `"/"` dan `"/tentang"` beserta komponen yang ditampilkan.

---

#### 📄 3. App.vue

```vue
<template>
  <div id="nav">
      <router-link to="/awal">Awal</router-link> |
      <router-link to="/tentang">Tentang</router-link>
  </div>
  <router-view />
</template>
```

📌 **Listing 4.3** – Routing: App.vue  
Menampilkan navigasi antarkomponen dan menggunakan `<router-view />` untuk menampilkan konten sesuai rute.

---

#### 📄 4. Komponen Awal.vue dan Tentang.vue

**Awal.vue**
```vue
<template>
  <p>Halaman <b>Awal</b></p>
</template>
```

📌 **Listing 4.4** – Routing: components/Awal.vue

**Tentang.vue**
```vue
<template>
  <p>Halaman <b>Tentang</b></p>
</template>
```

📌 **Listing 4.5** – Routing: components/Tentang.vue

---

## 📚 Referensi

1. [Vue Router Documentation](https://router.vuejs.org/)
2. [Vue 3 Official Guide](https://vuejs.org/guide/)
3. [Vue CLI](https://cli.vuejs.org/)

## 📝 Latihan

1. Tambahkan satu rute baru dengan path `/kontak` dan tampilkan halaman sederhana "Ini Halaman Kontak".
2. Gunakan parameter dinamis seperti `/detail/:id` dan tampilkan nilai parameter di halaman.
3. Ubah navigasi menjadi horizontal menu menggunakan `<nav>` dan gaya CSS dasar.

