# 🗂️ MSIM4401 - Modul 8: Struktur Direktori dan Elemen Ionic dengan Vue

> **Universitas Terbuka - 2025**

## 📋 Daftar Isi

- [A. Struktur Direktori dan File](#a-struktur-direktori-dan-file)
- [B. Praktik: Tampilan dan Logic](#b-praktik-tampilan-dan-logic)
- [C. Router dan Navigasi](#c-router-dan-navigasi)

---

## 🔶 A. Struktur Direktori dan File

Secara umum struktur proyek Ionic berbasis Vue terbagi menjadi:

1. **Root Directory** (bukan source code):
   - `babel.config.js`: konfigurasi Babel
   - `.browserlistrc`: target browser
   - `capacitor.config.json`: konfigurasi akses native
   - `cypress.json`: konfigurasi testing
   - `.eslintrc.js`, `.gitignore`, `ionic.config.json`, `jest.config.js`
   - `package.json`, `package-lock.json`, `tsconfig.json`

2. **`src/` Directory** (kode sumber utama):
   - `main.ts`: entry point TypeScript
   - `App.vue`: komponen utama
   - `components/`: komponen Vue (.vue)
   - `router/`: konfigurasi navigasi
   - `theme/`: styling CSS
   - `views/`: halaman tampilan
   - `services/`: (opsional) untuk akses API eksternal

---

## 🛠️ B. Praktik: Tampilan dan Logic

### 🎯 Tujuan

Menampilkan daftar user dari endpoint:

```
https://jsonplaceholder.typicode.com/users
```

### 1️⃣ Definisikan Kelas Akses API

**File:** `src/services/EndPointAccess/index.ts`

```ts
import axios from 'axios';

export default class EndPointAccess {
  theUrl: string;
  constructor(url: string) {
    this.theUrl = url;
  }

  async getRes() {
    const response = await axios.get(this.theUrl);
    return response;
  }
}
```

🧩 **Install dependencies:**
```bash
npm install --save-dev axios @types/axios
```

---

### 2️⃣ Gunakan di Komponen Vue

**File:** `src/views/Home.vue`

```vue
<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Blank</ion-title>
      </ion-toolbar>
    </ion-header>

    <ion-content :fullscreen="true">
      <div id="container">
        <p>Daftar User</p>
        <ion-button @click="ambilData">Ambil data</ion-button>
        <table class="center">
          <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Company</th>
          </tr>
          <tr v-for="user in dataUsers" :key="user.id">
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.company.name }}</td>
          </tr>
        </table>
      </div>
    </ion-content>
  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonHeader, IonPage, IonTitle, IonToolbar, IonButton } from '@ionic/vue';
import { defineComponent } from 'vue';
import EndPointAccess from '@/services/EndPointAccess';

let resData: any;

export default defineComponent({
  name: 'Home',
  data() {
    return {
      dataUsers: null
    };
  },
  methods: {
    ambilData() {
      resData = new EndPointAccess('https://jsonplaceholder.typicode.com/users');
      resData.getRes().then((response: any) => (this.dataUsers = response.data));
    }
  },
  components: {
    IonContent,
    IonHeader,
    IonPage,
    IonTitle,
    IonToolbar,
    IonButton
  }
});
</script>

<style scoped>
#container {
  text-align: center;
  position: absolute;
  left: 0;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
}
.center {
  margin-left: auto;
  margin-right: auto;
}
</style>
```

---

## 🌐 C. Router dan Navigasi

**File:** `src/router/index.ts`

```ts
import { createRouter, createWebHistory } from '@ionic/vue-router';
import { RouteRecordRaw } from 'vue-router';
import Home from '../views/Home.vue';

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    redirect: '/home'
  },
  {
    path: '/home',
    name: 'Home',
    component: Home
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});

export default router;
```

📌 Jika pengguna mengakses `/`, maka diarahkan ke `/home` dan ditangani oleh komponen `Home.vue`.

---

## 📚 Referensi

- [Vue + TypeScript Guide](https://vuejs.org/guide/typescript/overview.html)
- [Axios Docs](https://axios-http.com/)
- [Ionic Framework Vue](https://ionicframework.com/docs/vue)

## 📝 Latihan

1. Tambahkan fitur POST untuk menambah user baru ke endpoint dummy.
2. Tampilkan data `address.city` di kolom baru.
3. Ubah tombol menjadi floating action button (FAB) menggunakan komponen Ionic.
