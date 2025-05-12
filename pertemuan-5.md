# 🧠 MSIM4401 - Modul 5: Event dan Komponen dalam Vue

> **Universitas Terbuka - 2025**

## 📋 Daftar Isi

- [A. Event dalam Vue](#a-event-dalam-vue)
  - [1. Dasar Penanganan Event](#1-dasar-penanganan-event)
  - [2. Event Handler Langsung](#2-event-handler-langsung)
  - [3. Event Handler dengan Fungsi](#3-event-handler-dengan-fungsi)
  - [4. Event Handler Ganda](#4-event-handler-ganda)
  - [5. Mengakses DOM melalui \$event](#5-mengakses-dom-melalui-event)
  - [6. Modifier dalam Event](#6-modifier-dalam-event)
- [B. Komponen di Vue](#b-komponen-di-vue)
  - [1. Konsep Dasar Komponen](#1-konsep-dasar-komponen)
  - [2. Praktikum Membuat Komponen ButtonOnOff](#2-praktikum-membuat-komponen-buttononoff)

---

## 🔶 A. Event dalam Vue

### 1️⃣ Dasar Penanganan Event

Vue menggunakan `v-on:event` atau shorthand `@event` untuk menangani kejadian dari elemen antarmuka. Event handler ditulis di bagian `methods` dalam root component.

---

### 2️⃣ Event Handler Langsung

```html
<div id="app">
  <p>Jumlah klik: {{ jumlahKlik }}</p>
  <button @click="jumlahKlik += 1">Klik untuk menambah 1</button>
</div>
```

```js
const App = {
  data() {
    return {
      jumlahKlik: 0
    };
  }
};
```

📌 **Listing 5.1** – Menangani klik dengan ekspresi langsung.

---

### 3️⃣ Event Handler dengan Fungsi

```html
<input v-model="angka1" @change="hitung"> x
<input v-model="angka2" @change="hitung">
<p>{{ angka1 }} x {{ angka2 }} = {{ hasil }}</p>
```

```js
methods: {
  hitung() {
    this.hasil = this.angka1 * this.angka2;
  }
}
```

📌 **Listing 5.2** – Event handler berupa fungsi.

📌 **Listing 5.3** – Event handler dengan argumen: `hitung(angka1, angka2)`

---

### 4️⃣ Event Handler Ganda

```html
<button @click="tambahKlik(), factorial(jumlahKlik)">Klik untuk menambah 1</button>
```

```js
methods: {
  tambahKlik() { this.jumlahKlik += 1; },
  factorial(num) {
    let hasil = 1;
    for (let i = 2; i <= num; i++) hasil *= i;
    this.faktorial = hasil;
  }
}
```

📌 **Listing 5.4** – Dua handler dijalankan berurutan.

---

### 5️⃣ Mengakses DOM melalui `$event`

```html
<input v-model="isianTeks" />
<button @click="cekIsianTeks($event)">Kirim</button>
```

```js
methods: {
  cekIsianTeks(event) {
    if (this.isianTeks === '') {
      event.preventDefault();
      alert('Isikan teks terlebih dahulu');
    } else {
      alert('Terima kasih');
    }
  }
}
```

📌 **Listing 5.5** – Mengakses event DOM langsung.

---

### 6️⃣ Modifier dalam Event

```html
<button @click.once="tampilPesan">Klik sekali saja!</button>
```

```js
methods: {
  tampilPesan() {
    alert("Hanya boleh klik sekali saja");
  }
}
```

📌 **Listing 5.6** – Modifier `.once` hanya izinkan satu kali klik.

---

## 🧩 B. Komponen di Vue

### 1️⃣ Konsep Dasar Komponen

Komponen disimpan dalam file `.vue` dan biasanya diletakkan di `src/components`. Contoh komponen dasar:

```vue
<template>
  <div class="hello">
    <h1>{{ msg }}</h1>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  props: ['msg']
}
</script>
```

📌 **Listing 5.7** – Komponen `HelloWorld.vue`

---

### 2️⃣ Praktikum Membuat Komponen ButtonOnOff

```vue
<template>
  <p v-if="compShowHide">{{ strToHideShow }}</p>
  <button @click="onOff">{{ aksi }}</button>
</template>

<script>
export default {
  name: 'ButtonOnOff',
  props: { strToHideShow: String },
  data() {
    return { aksi: 'Sembunyikan', terlihat: true };
  },
  computed: {
    compShowHide() {
      return this.terlihat;
    }
  },
  methods: {
    onOff() {
      this.terlihat = !this.terlihat;
      this.aksi = this.terlihat ? 'Sembunyikan' : 'Tampilkan';
    }
  }
}
</script>

<style scoped>
button { color: #42b983; }
</style>
```

📌 **Listing 5.8** – Komponen ButtonOnOff.vue

Penggunaan komponen pada App.vue:

```vue
<template>
  <ButtonOnOff strToHideShow="Universitas Terbuka"/>
  <ButtonOnOff strToHideShow="Indonesia"/>
</template>

<script>
import ButtonOnOff from './components/ButtonOnOff.vue'

export default {
  name: 'App',
  components: {
    ButtonOnOff
  }
}
</script>
```

📌 **Listing 5.9** – Penggunaan komponen ButtonOnOff di App.vue

---

## 📚 Referensi

1. [Vue Event Handling](https://vuejs.org/guide/essentials/event-handling.html)
2. [Vue Components](https://vuejs.org/guide/essentials/component-basics.html)
3. [Modifiers in Vue Events](https://vuejs.org/api/built-in-directives.html#v-on)

## 🧪 Latihan

1. Tambahkan fitur reset untuk event klik agar jumlah klik bisa di-nol-kan.
2. Buat komponen tambahan bernama `<JumlahKlik />` yang menerima props jumlah dan menampilkannya.
3. Gunakan event modifier `.prevent` pada form agar tidak reload halaman.

