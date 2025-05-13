# ⚙️ MSIM4401 - Modul 9: Instalasi dan Integrasi Ionic dengan Vue

> **Universitas Terbuka - 2025**

## 📋 Daftar Isi

- [A. Persyaratan Pemahaman](#a-persyaratan-pemahaman)
- [B. Spesifikasi Perangkat Keras](#b-spesifikasi-perangkat-keras)
- [C. Hasil Akhir Praktikum](#c-hasil-akhir-praktikum)
- [D. Instalasi Persyaratan Ionic](#d-instalasi-persyaratan-ionic)
- [E. Instalasi Ionic CLI dan Pendukung](#e-instalasi-ionic-cli-dan-pendukung)
- [F. Pembuatan Rerangka Aplikasi](#f-pembuatan-rerangka-aplikasi)
- [G. Pengujian di Browser](#g-pengujian-di-browser)
- [H. Memahami dan Memodifikasi Starter](#h-memahami-dan-memodifikasi-starter)

---

## 🧠 A. Persyaratan Pemahaman

Mahasiswa diharapkan menguasai:
- Dasar penggunaan command line
- Pengelolaan npm
- Dasar TypeScript dan Vue
- Dasar penggunaan VS Code dan extensions

---

## 💻 B. Spesifikasi Perangkat Keras

- OS: Windows, Linux, atau Mac
- Node.js (versi LTS)
- Visual Studio Code terbaru
- Ionic CLI
- Web browser (Chrome/Firefox)
- Koneksi internet

---

## 🎯 C. Hasil Akhir Praktikum

Mahasiswa dapat:
- Menggunakan Ionic CLI
- Membuat aplikasi dengan starter template Vue
- Memodifikasi dan menjalankan aplikasi di browser

---

## ⚙️ D. Instalasi Persyaratan Ionic

1. Unduh Node.js versi LTS: [https://nodejs.org](https://nodejs.org)
2. Setelah itu, instal Ionic CLI dan pendukungnya:

```bash
$ npm install -g @ionic/cli
$ npm install -g semver
$ npm install -g @ionic/lab
```

---

## 🧩 E. Instalasi Ionic CLI dan Pendukung

Tambahkan ekstensi berikut di VS Code:

- Auto Close Tag  
  🔗 [Link](https://marketplace.visualstudio.com/items?itemName=formulahendry.auto-close-tag)
- Auto Rename Tag  
  🔗 [Link](https://marketplace.visualstudio.com/items?itemName=formulahendry.auto-rename-tag)

---

## 🚀 F. Pembuatan Rerangka Aplikasi

```bash
$ ionic start myBlankApp blank --type=vue
$ ionic start mySidemenuApp sidemenu --type=vue
$ ionic start myTabsApp tabs --type=vue
$ ionic start myListApp list --type=vue
```

---

## 🌐 G. Pengujian di Browser

```bash
$ ionic serve
# atau
$ ionic serve --lab
```

- `--lab` akan menampilkan tampilan Android & iOS di browser

---

## 🛠️ H. Memahami dan Memodifikasi Starter

### 1️⃣ Blank Template
- Terdiri dari 1 halaman (`Home.vue`)
- Modifikasi: Tambahkan halaman **About** dengan navigasi di `<ion-footer>`

### 2️⃣ Tabs Template
- Terdapat 3 tab (`Tab1`, `Tab2`, `Tab3`)
- Modifikasi: Tambahkan **Tab 4** (`Tab4.vue`)
  - Tambahkan route
  - Tambahkan icon `people` dari `ionicons`

### 3️⃣ SideMenu Template
- Navigasi menggunakan menu samping
- Modifikasi:
  - Tambahkan item menu: **Drafts**
  - Gunakan icon `copy` dari `ionicons`
  - Tidak perlu ubah `Folder.vue`, hanya tambahkan item pada `appPages`

### 4️⃣ List Template
- Menampilkan daftar pesan (inbox)
- Komponen utama: `MessageListItem`, `ViewMessage`
- Modifikasi:
  - Tambahkan halaman **About.vue**
  - Tambahkan footer di `Home.vue` berisi nama aplikasi dan link ke **About**
  - **About.vue** berisi back button ke `/home`

---

## 📚 Referensi

- [Ionic Framework Vue Docs](https://ionicframework.com/docs/vue)
- [Ionicons](https://ionic.io/ionicons)
- [Vue Router](https://router.vuejs.org/)

## 📝 Latihan

1. Tambahkan fitur navigasi tambahan ke halaman FAQ.
2. Gunakan tab ke-5 untuk menampilkan data dari REST API.
3. Tambahkan dark mode toggle pada `Tabs.vue` dengan `ion-toggle`.
