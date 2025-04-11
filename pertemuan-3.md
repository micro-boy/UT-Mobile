# 📱 MSIM4401 - Modul 3: Dasar-Dasar Vue

> **Universitas Terbuka - 2025**

## 📋 Daftar Isi

- [Praktikum 3: Dasar-Dasar Vue](#praktikum-3-dasar-dasar-vue)
  - [A. Instalasi, Konfigurasi, dan Memulai Vue](#a-instalasi-konfigurasi-dan-memulai-vue)
    - [1. Instalasi menggunakan CLI](#1-instalasi-menggunakan-cli)
    - [2. Konfigurasi menggunakan CDN](#2-konfigurasi-menggunakan-cdn)
    - [3. Instalasi menggunakan NPM](#3-instalasi-menggunakan-npm)
  - [B. Praktik Membangun Proyek Vue](#b-praktik-membangun-proyek-vue)
    - [1. Membangun Struktur Proyek Vue](#1-membangun-struktur-proyek-vue)
  - [C. Praktikum Fitur Inti Vue](#c-praktikum-fitur-inti-vue)
    - [1. Rendering Deklaratif](#1-rendering-deklaratif)
    - [2. Interaksi dengan Pemakai](#2-interaksi-dengan-pemakai)
    - [3. Struktur Kendali](#3-struktur-kendali)
    - [4. Komponen Dasar](#4-komponen-dasar)

---

## ⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯
## 📘 Praktikum 3: Dasar-Dasar Vue
## ⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯

### 🔶 A. Instalasi, Konfigurasi, dan Memulai Vue

#### 1️⃣ Instalasi menggunakan CLI (Command Line Interface)

Instalasi dan percobaan untuk menghasilkan proyek Vue adalah sebagai berikut:

**⚡ Praktikkan** langkah-langkah berikut:

```bash
$ npm install -g @vue/cli // <1>
$ vue create first-vue // <2>
Vue CLI v4.5.10
? Please pick a preset: (Use arrow keys) // <3> 
pilih Vue 3
❯ Default ([Vue 2] babel, eslint) 
 Default (Vue 3 Preview) ([Vue 3] babel, eslint) 
 Manually select features 
…
…
⚓ Running completion hooks...
📄 Generating README.md...
🎉 Successfully created project first-vue.
👉 Get started with the following commands:
$ cd first-vue // <4>
$ npm run serve // <5>
DONE Compiled successfully in 1827ms 05.40.08
 App running at:
 - Local: http://localhost:8080/ 
 - Network: http://192.168.x.x:8080/
 Note that the development build is not optimized.
 To create a production build, run npm run build.
$
```

<div class="code-explanation">
<strong>Penjelasan:</strong>
<ol>
<li>Perintah untuk melakukan instalasi Vue CLI, akan memakan waktu dalam proses instalasi.</li>
<li>Setelah instalasi, terdapat perintah baru yaitu vue. Perintah pada baris ini digunakan untuk membuat aplikasi/proyek baru. Perintah vue akan bisa digunakan jika proses instalasi langkah 1 berhasil.</li>
<li>Memilih jenis proyek. Pilih Default (Vue 3 Preview) ([Vue 3] babel, eslint)</li>
<li>Masuk ke direktori proyek baru.</li>
<li>Menjalankan proyek baru dalam mode development.</li>
</ol>
</div>

> ⚠️ **Perhatian**:
> - Jika perintah npm pada langkah <1> tidak bekerja, pastikan anda mengunduh Node.js pada laman: https://nodejs.org/en/download/ (unduh sesuai dengan sistem operasi yang anda gunakan pada komputer anda)
> - Jika menemukan kendala pada saat instalasi, kemungkinan sekuriti komputer anda terlalu kuat. Jika menggunakan Windows, gunakan Run Administrator dalam menjalankan command prompt.

Untuk mengakses aplikasi SPA tersebut, gunakan browser untuk mengakses sesuai dengan URL yang ditulis tersebut. Hasil bisa dilihat pada Gambar 3.1.

![Hasil dari Vue/cli](https://example.com/placeholder-image1.png)

**Gambar 3.1**: Hasil dari Vue/cli

> 💡 **Tip**: Jika tampilan seperti pada Gambar 3.1, bisa dipastikan bahwa Vue sudah bisa digunakan.

#### 2️⃣ Konfigurasi menggunakan CDN

Cara menyertakan Vue dari CDN. Penjelasan tentang kode sumber ada pada pembahasan berikut-berikutnya.

<div class="code-header">
<strong>Listing 3.1:</strong> Contoh Penggunaan Vue Di HTML Menggunakan CDN
</div>

```html
<div id="app"></div>
<script src="http://unpkg.com/vue@next"></script> // <1>
<script>
const { createApp } = Vue;
const App = {
  data() {
    return {
      name: "Vue CDN",
    };
  },
  template: `<h1>Halo {{ name }}!</h1>`,
};
createApp(App).mount("#app");
</script>
```

Hasilnya bisa dilihat pada Gambar 3.2.

![Hasil dari penggunaan Vue di HTML dari CDN](https://example.com/placeholder-image2.png)

**Gambar 3.2**: Hasil dari penggunaan Vue di HTML dari CDN

#### 3️⃣ Instalasi menggunakan NPM

Cara menyertakan Vue dalam file HTML menggunakan npm

**⚡ Praktikkan** langkah-langkah berikut:

```bash
$ npm init -y
$ npm install vue@next --savedev
```

Contoh file HTML:

<div class="code-header">
<strong>Listing 3.2:</strong> Contoh Penggunaan Vue Di HTML Menggunakan NPM
</div>

```html
<div id="app"></div>
<script src="node_modules/vue/dist/vue.global.js"></script> // <1>
<script>
const { createApp } = Vue;
const App = {
  data() {
    return {
      name: "Vue npm",
    };
  },
  template: `<h1>Hello {{ name }}!</h1>`,
};
createApp(App).mount("#app");
</script>
```

> 📝 **Catatan**: Jika listing program seperti pada Listing 3.2, maka file HTML harus berada satu rute dengan folder node_modules.

Hasil bisa dilihat pada Gambar 3.3.

![Hasil Dari Penggunaan Vue Di HTML Dari npm](https://example.com/placeholder-image3.png)

**Gambar 3.3**: Hasil Dari Penggunaan Vue Di HTML Dari npm

### 🔶 B. Praktik Membangun Proyek Vue

> 💡 **Konsep Dasar**: Ada dua mode yang bisa dilakukan dengan menggunakan Vue CLI untuk mengelola proyek:
> 1. Menggunakan CLI (lihat pembahasan pada instalasi).
> 2. Menggunakan GUI (Graphical User Interface) di browser.

Untuk menggunakan GUI, jalankan CLI dengan argumen UI:

```bash
$ vue ui
```

Setelah itu akan ditampilkan aplikasi pengelola proyek Vue di browser. Pada dasarnya, semua yang dikerjakan di GUI bisa dikerjakan pada shell/command prompt/powershell. Kita akan menggunakan antarmuka shell/command prompt/powershell untuk pembahasan berikutnya.

#### 1️⃣ Membangun Struktur Proyek Vue

Hasil dari kerangka direktori serta file yang dibuat oleh vue cli bisa dilihat pada Gambar 3.4

![Struktur Proyek Vue (Vue CLI)](https://example.com/placeholder-image4.png)

**Gambar 3.4**: Struktur Proyek Vue (Vue CLI)

<div class="code-explanation">
<strong>Beberapa file di direktori akar (root):</strong>
<ol>
<li><strong>babel.config.js</strong>: konfigurasi dari Babel - transpiler (mengubah kode sumber dari suatu bahasa pemrograman ke bahasa pemrograman yang sama tetapi beda versi) JavaScript</li>
<li><strong>package.json</strong>: digunakan untuk konfigurasi proyek JavaScript</li>
<li><strong>README.md</strong>: file dokumentasi dan penjelasan singkat tentang proyek yang dibuat.</li>
</ol>

<strong>Direktori-direktori:</strong>
<ol>
<li><strong>node_modules</strong>: direktori untuk menyimpan berbagai paket pustaka yang diperlukan oleh proyek.</li>
<li><strong>public</strong>: direktori untuk menyimpan file HTML yang akan dijadikan tampilan utama.</li>
<li><strong>src</strong>: direktori untuk menyimpan kode sumber. File-file yang akan kita buat berada di direktori ini.
<ul>
<li>File <strong>main.js</strong> berhubungan dengan public/index.html (lihat #app yang digunakan untuk memberitahu nama komponen aplikasi utama dari proyek Vue).</li>
<li>File-file <strong>.vue</strong> merupakan file yang digunakan untuk mendefinisikan tampilan antarmuka pemakai. File-file .vue berisi template, script, maupun CSS.</li>
<li>Direktori <strong>assets</strong> berisi berbagai file selain .vue yang diperlukan dalam pembuatan aplikasi (file gambar, multimedia, dan lain-lain).</li>
<li>Direktori <strong>components</strong> digunakan untuk menyimpan berbagai definisi komponen Vue.</li>
</ul>
</li>
</ol>
</div>

### 🔶 C. Praktikum Fitur Inti Vue

#### 1️⃣ Rendering Deklaratif

> 💡 **Konsep Dasar**: Vue melakukan render (memproses keluaran ke DOM) secara deklaratif dengan menggunakan template {{ }}.

**⚡ Praktikkan** contoh dibawah ini:

<div class="code-header">
<strong>Listing 3.3:</strong> Rendering deklaratif
</div>

```html
<div id="app">
  Halo {{ name }}, detik berjalan: {{ counter }}
</div>
<script src="http://unpkg.com/vue@next"></script>
<script>
const { createApp } = Vue;
const App = {
  data() {
    return {
      name: "Vue",
      counter: 0
    };
  },
  mounted() {
    setInterval(() => {
      this.counter++
    }, 1000)
  }
};
createApp(App).mount("#app");
</script>
```

Hasil jika ditampilkan di browser:
```
Halo Vue, detik berjalan: 826
```

#### 2️⃣ Interaksi dengan Pemakai

> 💡 **Konsep Dasar**: Untuk menangani interaksi dengan pemakai aplikasi, Vue menggunakan direktif `v-on:<event>`. Dengan direktif tersebut, Vue akan meletakkan event listener yang bertugas untuk menangani event tertentu terkait dengan komponen tersebut.

**⚡ Praktikkan** contoh program berikut ini:

<div class="code-header">
<strong>Listing 3.4:</strong> Event Listener Untuk Menangani Interaksi Dengan Pemakai Aplikasi
</div>

```html
<div id="app">
  <p>{{ pesan }}</p>
  <button v-on:click="reverseStr">Balik String</button> // <1> 
</div>
<script src="http://unpkg.com/vue@next"></script>
<script>
const { createApp } = Vue;
const App = {
  data() {
    return {
      pesan: "Universitas Terbuka",
    };
  },
  methods: {
    reverseStr() { // <2>
      this.pesan = this.pesan.split('').reverse().join('')
    }
  }
};
createApp(App).mount("#app");
</script>
```

<div class="code-explanation">
<strong>Penjelasan:</strong>
<ol>
<li>Mendeklarasikan v-on:click untuk menangani event jika button tersebut di-klik. Jika di-klik maka dikerjakan fungsi reverseStr yang berada pada script App.</li>
<li>Definisi fungsi reverseStr yang menerima pesan dan kemudian membalik string pesan yang diterima tersebut.</li>
</ol>
</div>

Jika file HTML tersebut ditampilkan di browser, hasilnya adalah sebagai berikut:

![Tampilan awal](https://example.com/placeholder-image5.png)

Jika di-klik pada button **Balik String**, maka:

![Setelah diklik](https://example.com/placeholder-image6.png)

#### 3️⃣ Struktur Kendali

> 💡 **Konsep Dasar**: Vue menyediakan direktif yang bisa digunakan untuk kondisi tertentu serta perulangan. Untuk kondisi tertentu, bisa digunakan v-if, sementara untuk perulangan digunakan v-for.

##### 🔸 a) Direktif v-if untuk kondisi

**⚡ Praktikkan** contoh di bawah ini:

<div class="code-header">
<strong>Listing 3.5:</strong> Direktif if Untuk rendering Kondisional
</div>

```html
<div id="app">
  <p v-if='terlihat'>Universitas Terbuka<p> // <1>
  <button v-on:click="onOff">{{ aksi }}</button> // <2>
</div>
<script src="http://unpkg.com/vue@next"></script>
<script>
const { createApp } = Vue;
const App = {
  data() {
    return {
      terlihat: true, // <3> 
      aksi: 'Sembunyikan'
    };
  },
  methods: {
    onOff() {
      if (this.aksi === 'Sembunyikan') { // <4>
        this.aksi = 'Tampilkan';
        this.terlihat = false;
      } else {
        this.aksi = 'Sembunyikan';
        this.terlihat = true;
      }
    }
  }
};
createApp(App).mount("#app");
</script>
```

<div class="code-explanation">
<strong>Penjelasan:</strong>
<ol>
<li>Menetapkan nilai awal dari komponen dengan menggunakan v-if sesuai isi dari "terlihat".</li>
<li>Menampilkan tulisan sesuai nilai dari aksi. Jika di-klik, maka akan mengerjakan fungsi onOff.</li>
<li>Nilai awal yang ditetapkan.</li>
<li>Digunakan untuk memeriksa, jika state awal terlihat, maka sembunyikan. Jika tidak, maka tampilkan.</li>
</ol>
</div>

Saat dijalankan, akan ditampilkan tulisan dan button:

![Tampilan awal v-if](https://example.com/placeholder-image7.png)

Jika di-klik **Sembunyikan**, maka tulisan akan disembunyikan:

![Setelah diklik Sembunyikan](https://example.com/placeholder-image8.png)

##### 🔸 b) Direktif v-for untuk perulangan

**⚡ Praktikkan** contoh di bawah ini:

<div class="code-header">
<strong>Listing 3.6:</strong> Perulangan Menggunakan Direktif v-for
</div>

```html
<div id="app">
  <p>Universitas Terbuka<p>
  <ol>
    <li v-for="mk in daftarMK" v-bind:key="mk.text"> // <1>
      {{ mk.text }}
    </li>
  </ol> 
</div>
<script src="http://unpkg.com/vue@next"></script>
<script>
const { createApp } = Vue;
const App = {
  data() {
    return {
      daftarMK: [ // <2>
        { text: 'Algoritma Pemrograman' },
        { text: 'Pemrograman Perangkat Bergerak' },
        { text: 'Sistem Terdistribusi' }
      ]
    };
  },
};
createApp(App).mount("#app");
</script>
```

<div class="code-explanation">
<strong>Penjelasan:</strong>
<ol>
<li>Mengambil data dari daftarMK kemudian di-bind atau dirangkaikan ke dalam kunci tertentu yang akan diakses pada perulangan &lt;ol&gt;&lt;li&gt;&lt;/li&gt;&lt;/ol&gt;.</li>
<li>Definisi data yang akan diambil.</li>
</ol>
</div>

Hasil:
```
Universitas Terbuka
1. Algoritma Pemrograman
2. Pemrograman Perangkat Bergerak
3. Sistem Terdistribusi
```

#### 4️⃣ Komponen Dasar

> 💡 **Konsep Dasar**: Komponen ini akan memperluas HTML dengan tag-tag baru.

**⚡ Praktikkan** cara membuat dan menggunakan komponen dengan kode program berikut ini:

<div class="code-header">
<strong>Listing 3.7:</strong> Komponen Dasar HTML
</div>

```html
<div id="list-mk-app">
  <p>Universitas Terbuka<p>
  <ol>
    <daftar-mk // <1>
      v-for='mkDitawarkan in daftarMK'
      v-bind:mk='mkDitawarkan'
      v-bind:key='mkDitawarkan.id'>
    </daftar-mk>
  </ol> 
</div>
<script src="http://unpkg.com/vue@next"></script>
<script>
const App = {
  data() {
    return {
      daftarMK: [ // <2>
        { id: 0, text: 'Algoritma Pemrograman' },
        { id: 1, text: 'Pemrograman Perangkat Bergerak' },
        { id: 2, text: 'Sistem Terdistribusi' }
      ]
    };
  },
};
const app = Vue.createApp(App)
app.component('daftar-mk', { // <3>
  props: ['mk'], // <4>
  template: '<li>{{ mk.text }}</li>' // <5>
})
app.mount('#list-mk-app')
</script>
```

<div class="code-explanation">
<strong>Penjelasan:</strong>
<ol>
<li>Menggunakan komponen yang sudah didefinisikan.</li>
<li>Definisi data yang digunakan.</li>
<li>Definisi komponen baru. Dari definisi ini, kita menetapkan bahwa nantinya komponen kita merupakan tag &lt;daftar-mk&gt;&lt;/daftar-mk&gt;.</li>
<li>Props merupakan atribut kustom yang bisa didaftarkan untuk komponen. Dalam kasus ini kita mendaftarkan mk sebagai atribut untuk komponen yang kita buat.</li>
<li>Mendefinisikan template untuk komponen.</li>
</ol>
</div>

## 📚 Referensi

1. [Vue.js Official Documentation](https://v3.vuejs.org/)
2. [Vue CLI Documentation](https://cli.vuejs.org/)
3. [Vue.js Components Explained](https://vuejs.org/guide/essentials/component-basics.html)
4. [Vue.js Style Guide](https://vuejs.org/style-guide/)

## 🧩 Latihan

1. Buatlah sebuah aplikasi Vue sederhana yang menampilkan daftar tugas (todo list) dengan kemampuan menambah, menghapus, dan menandai tugas sebagai selesai.
2. Buat komponen Vue yang menampilkan informasi mahasiswa dengan props untuk nama, NPM, dan jurusan.
3. Kembangkan aplikasi kalkulator sederhana menggunakan Vue yang memiliki operasi dasar (tambah, kurang, kali, bagi).

## 🔍 Tips Pengembangan

- Gunakan Vue DevTools untuk mempermudah debugging aplikasi Vue Anda.
- Pisahkan logika bisnis ke dalam methods dan computed properties untuk menjaga template tetap bersih.
- Manfaatkan lifecycle hooks seperti created() dan mounted() untuk menginisialisasi data yang diperlukan.
- Untuk proyek besar, pertimbangkan menggunakan Vuex untuk state management.
