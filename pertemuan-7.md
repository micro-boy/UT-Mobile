# 📱 MSIM4401 - Modul 7: Praktikum Ionic Berbasis Vue

> **Universitas Terbuka - 2025**

## 📋 Daftar Isi

- [A. Memulai Proyek Ionic](#a-memulai-proyek-ionic)
- [B. Menjalankan Aplikasi](#b-menjalankan-aplikasi)
- [C. Struktur Aplikasi](#c-struktur-aplikasi)
- [D. Praktik Menambah Halaman](#d-praktik-menambah-halaman)
- [E. Generate Halaman dengan CLI](#e-generate-halaman-dengan-cli)
- [F. Praktik Penanganan Error](#f-praktik-penanganan-error)
- [G. Mengatur Halaman Awal](#g-mengatur-halaman-awal)
- [H. Penggunaan JavaScript / TypeScript](#h-penggunaan-javascript--typescript)

---

## 🔶 A. Memulai Proyek Ionic

Gunakan sintaks berikut:

```bash
$ ionic start <name> <template> [options]
```

Contoh:
- `ionic start mobileApp1 tabs --type=vue`
- `ionic start "aplikasi mobile 1" tabs --type=vue`
- `ionic start mobileApp1 https://github.com/ionic-team/ionic-vue-conference-app`

📌 Spasi akan diubah jadi `-` dalam nama folder.

---

## 🚀 B. Menjalankan Aplikasi

### 1️⃣ Di Browser
```bash
$ ionic serve
```

Akses melalui:
```
http://localhost:8100/
```

### 2️⃣ Simulasi Android/iOS di Browser
```bash
$ npm install -g @ionic/lab semver
$ ionic serve --lab
```

Akses:
```
http://localhost:8200/
```

---

## 🧱 C. Struktur Aplikasi

Folder `src/` berisi:
- `router/`: konfigurasi routing
- `components/`: komponen-komponen yang digunakan
- `theme/`: konfigurasi tema
- `views/`: halaman-halaman tampilan

---

## 🛠️ D. Praktik Menambah Halaman

Tambahkan file baru: `src/views/Tab4.vue`

```vue
<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Tab 4</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <ExploreContainer name="Tab 4 page" />
    </ion-content>
  </ion-page>
</template>

<script lang="ts">
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent } from '@ionic/vue';
import ExploreContainer from '@/components/ExploreContainer.vue';

export default {
  name: 'Tab4',
  components: { ExploreContainer, IonPage, IonHeader, IonToolbar, IonTitle, IonContent }
}
</script>
```

### Ubah Tabs.vue
Tambahkan tab baru:
```vue
<ion-tab-button tab="tab4" href="/tabs/tab4">
  <ion-icon :icon="star" />
  <ion-label>Tab 4</ion-label>
</ion-tab-button>
```

Aktifkan ikon baru:
```ts
import { star } from 'ionicons/icons';
```

### Tambahkan Routing di `src/router/index.ts`
```ts
{
  path: 'tab4',
  component: () => import('@/views/Tab4.vue')
}
```

---

## ⚙️ E. Generate Halaman dengan CLI

> ⚠️ Fitur ini hanya tersedia untuk proyek Angular, **bukan Vue**.

---

## 🛡️ F. Praktik Penanganan Error

### Tambahkan error handler di `src/main.ts`:
```ts
app.config.errorHandler = (err, vm, info) => {
  alert(err + "\nVM: " + JSON.stringify(vm) + "\nInfo: " + info);
}
```

### Tambahkan tombol di `Tab1.vue`:
```vue
<ion-button color="danger" @click="dontClick">Danger</ion-button>
```

```ts
methods: {
  dontClick() {
    throw new Error("Jangan diklik");
  }
}
```

---

## 🧭 G. Mengatur Halaman Awal

### File `src/main.ts`
```ts
createApp(App)
  .use(IonicVue)
  .use(router)
```

### File `src/App.vue`
```vue
<ion-app>
  <ion-router-outlet />
</ion-app>
```

### File `src/router/index.ts`
```ts
{
  path: '',
  redirect: '/tabs/tab1'
}
```
> Ganti `tab1` ke tab lain jika ingin mengubah halaman awal.

---

## 🔄 H. Penggunaan JavaScript / TypeScript

Jika ingin tetap menggunakan JavaScript:

1. Di `tsconfig.json` tambahkan:
   ```json
   "allowJs": true
   ```

2. Nonaktifkan strict typing:
   ```json
   "strict": false
   ```

---

## 📚 Referensi

- [Ionic Vue Docs](https://ionicframework.com/docs/vue)
- [Ionicons](https://ionic.io/ionicons)
- [Vue Router Docs](https://router.vuejs.org/)

## 📝 Latihan

1. Tambahkan halaman baru `Profile.vue` dan integrasikan ke tab.
2. Buat error handler khusus untuk tab tertentu saja.
3. Ubah halaman awal aplikasi menjadi tab keempat.
