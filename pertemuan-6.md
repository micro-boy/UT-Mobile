# ⚙️ MSIM4401 - Modul 6: Instalasi Ionic & Lingkungan Pengembangan

> **Universitas Terbuka - 2025**

## 📋 Daftar Isi

- [A. Instalasi Ionic CLI](#a-instalasi-ionic-cli)
  - [1. Perintah Instalasi](#1-perintah-instalasi)
  - [2. Perintah `ionic start`](#2-perintah-ionic-start)
  - [3. Perintah `ionic serve`](#3-perintah-ionic-serve)
- [B. Instalasi VS Code & Plugin untuk Ionic](#b-instalasi-vs-code--plugin-untuk-ionic)
- [C. Tools dan Software Pendukung Ionic](#c-tools-dan-software-pendukung-ionic)

---

## 🔶 A. Instalasi Ionic CLI

### 1️⃣ Perintah Instalasi

Gunakan perintah berikut untuk menginstal Ionic CLI secara global:

```bash
$ npm install -g @ionic/cli
```

📌 **Listing 6.1** – Perintah Instalasi Ionic CLI

Jika berhasil, perintah `ionic` akan tersedia di terminal dan bisa digunakan untuk mengelola proyek Ionic.

---

### 2️⃣ Perintah `ionic start`

Gunakan untuk memulai proyek baru:

```bash
$ ionic start <name> <template> [options]
```

- `<name>`: nama proyek
- `<template>`: template seperti `tabs`, `sidemenu`, `blank`, `list`
- `--list`: untuk melihat daftar template
- `--type`: untuk menentukan framework (vue, angular, react)

📌 **Listing 6.2** – Menampilkan starter yang tersedia:
```bash
$ ionic start --list
```

---

### 3️⃣ Perintah `ionic serve`

Langkah-langkah membuat dan menjalankan proyek Ionic:

```bash
$ ionic start maskaApp tabs --type vue
$ cd maskaApp
$ ionic serve
```

📌 **Listing 6.3 & 6.4** – Membuat proyek dan menjalankannya

Output:
```
Local: http://localhost:8100
Network: http://172.xx.xx.xx:8100
```

> 💡 Jika proyek berhasil ditampilkan di browser, berarti instalasi berhasil.

---

## 🧰 B. Instalasi VS Code & Plugin untuk Ionic

Untuk mendukung pengembangan Ionic di VS Code, kamu dapat memasang ekstensi berikut:

### 1️⃣ JavaScript / TypeScript
- ESLint: [🔗 Link](https://marketplace.visualstudio.com/items?itemName=dbaeumer.vscode-eslint)
- npm Support: [🔗 Link](https://marketplace.visualstudio.com/items?itemName=eg2.vscode-npm-script)

### 2️⃣ Vue
- Vetur: [🔗 Link](https://marketplace.visualstudio.com/items?itemName=octref.vetur)
- Vue VSCode Snippets: [🔗 Link](https://marketplace.visualstudio.com/items?itemName=sdras.vue-vscode-snippets)

### 3️⃣ Ionic
- Ionic Snippets: [🔗 Link](https://marketplace.visualstudio.com/items?itemName=fivethree.vscode-ionic-snippets)
- Cordova Tools: [🔗 Link](https://marketplace.visualstudio.com/items?itemName=Msjsdiag.cordova-tools)
- Ionic Vue Snippets: [🔗 Link](https://marketplace.visualstudio.com/items?itemName=dlodeprojuicer.ionicvuesnippets)
- Ionic Preview: [🔗 Link](https://marketplace.visualstudio.com/items?itemName=ionic-preview.ionic-preview)

### 4️⃣ Lain-lain
- Prettier: [🔗 Link](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode)
- IntelliCode: [🔗 Link](https://marketplace.visualstudio.com/items?itemName=visualstudioexptteam.vscodeintellicode)

---

## 🧪 C. Tools dan Software Pendukung Ionic

Berikut beberapa tools dan library penting untuk pengembangan aplikasi Ionic:

1. **Starter Templates**  
   🔗 [Ionic Starters](https://market.ionicframework.com/starters)

2. **Apache Cordova**  
   🔗 [cordova.apache.org](https://cordova.apache.org/)  
   Digunakan untuk akses API native device.

3. **Capacitor**  
   🔗 [capacitorjs.com](https://capacitorjs.com/)  
   Komponen resmi dari Ionic untuk akses native API.

4. **Appflow**  
   🔗 [Appflow](https://ionicframework.com/appflow)  
   Platform DevOps untuk aplikasi Ionic.

5. **Stencil**  
   🔗 [stenciljs.com](https://stenciljs.com/)  
   Compiler untuk Web Components.

6. **Typedoc**  
   🔗 [typedoc.org](https://typedoc.org/)  
   Untuk dokumentasi proyek TypeScript.

7. **Ionic Lab**  
   Jalankan:
   ```bash
   $ npm install -g @ionic/lab
   ```
   Tampilkan hasil build Android & iOS secara bersamaan di browser.

---

## 📚 Referensi

- [Ionic Framework Docs](https://ionicframework.com/docs/)
- [VSCode Extensions Marketplace](https://marketplace.visualstudio.com/)
- [Capacitor Documentation](https://capacitorjs.com/docs)
- [Cordova Plugins](https://cordova.apache.org/plugins/)

## 📝 Latihan

1. Buat proyek baru dengan nama `myIonicApp` menggunakan starter `blank`.
2. Jalankan aplikasi dan amati perbedaan output antara `tabs` dan `blank`.
3. Install dan uji salah satu extension VSCode untuk Vue.
4. Install Ionic Lab dan uji tampilan Android vs iOS.
