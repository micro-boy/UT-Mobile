# 📱 MSIM4401 - Modul 2: Pemrograman TypeScript Lanjut

> **Universitas Terbuka - 2025**

## 📋 Daftar Isi

- [Praktikum 2: Pemrograman TypeScript Lanjut](#-praktikum-2-pemrograman-typescript-lanjut)
  - [A. Asynchronous Programming](#-a-asynchronous-programming)
    - [1. Implementasi Asynchronous Programming pada TypeScript](#-1-implementasi-asynchronous-programming-pada-typescript)
      - [a) Pemahaman Promise](#-a-pemahaman-promise)
      - [b) Promise Chaining](#-b-promise-chaining)
      - [c) Pemahaman Async/Await](#-c-pemahaman-asyncawait)
  - [B. TypeScript untuk Backend](#-b-typescript-untuk-backend)
    - [1. Pemahaman Mekanisme Frontend - Backend](#-1-pemahaman-mekanisme-frontend---backend)
    - [2. Menggunakan TypeScript untuk Backend](#-2-menggunakan-typescript-untuk-backend)
      - [a) Persiapan](#-a-persiapan)
      - [b) Kode Sumber](#-b-kode-sumber)
      - [c) Menjalankan dan Mengekspos RESTful API Endpoint](#-c-menjalankan-dan-mengekspos-restful-api-endpoint)

---

## ⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯
## 📘 Praktikum 2: Pemrograman TypeScript Lanjut
## ⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯

### 🔶 A. Asynchronous Programming

#### 1️⃣ Implementasi Asynchronous Programming pada TypeScript

##### 🔸 a) Pemahaman Promise

> 💡 **Konsep Dasar**: Sama seperti halnya dalam kehidupan sehari-hari, promise atau janji merupakan suatu kejadian yang diharapkan akan terjadi di masa yang akan datang.

Beberapa contoh operasi yang memerlukan pendekatan asynchronous:

1. **Mengakses suatu endpoint di Internet** (URL tertentu). Normalnya kita dapat mengakses endpoint tersebut, tetapi dapat saja Internet mati, atau alamat URL tersebut berpindah, dan kemungkinan-kemungkinan lain.

2. **Membaca suatu file di lokasi tertentu**. Normalnya kita dapat membaca file tersebut, namun bisa terjadi file tersebut rusak, atau sudah dihapus, atau tidak memiliki hak akses untuk membaca, dan lain-lain.

3. **Melakukan query ke suatu DBMS**. Normalnya kita dapat melakukan query dan berharap mendapatkan hasilnya, tetapi dapat saja query kita salah, atau hak akses kita dibatasi, dan lain-lain.

Dalam kondisi-kondisi seperti tersebut di atas, seorang pemrogram harus mengantisipasi dengan menggunakan konstruksi bahasa pemrograman tertentu. Ada 2 hal yang harus diantisipasi terkait asynchronous programming ini, yaitu:

1. Kemungkinan **latensi** atau waktu akses yang relatif lama.
2. Kemungkinan **kegagalan operasi**, baik di awal maupun setelah terjadi proses dan kegagalan ini tidak dapat kita prediksi di awal.

Dengan menggunakan TypeScript, kita dapat menggunakan Promise maupun async/await untuk mengantisipasi kedua hal tersebut. 

**⚡ Praktikkan** contoh di bawah ini:

<div class="code-header">
<strong>Listing 2.1:</strong> Penggunaan Promise Untuk Asynchronous Programming
</div>

```typescript
function getAngkaAcak(max: number): number { // <1>
  return Math.floor(Math.random() * Math.floor(max));
}

let p = new Promise<unknown>((resolve, reject) => { // <2>
  let acak = getAngkaAcak(1000);
  if (acak > 500) {
    resolve(true); // <3>
    return;
  }
  reject("Hasil <= 500"); // <4>
});

console.log(p); // <5>
p.catch(err => console.log("ERROR - ", err)); // <6>

// Berbagai kemungkinan saat run:
// Promise { true }
// -> jika angka random lebih besar dari 500 
// Promise { <rejected> 'Hasil <= 500' }
// ERROR - Hasil <= 500
// -> jika yang terjadi adalah reject 
```

<div class="code-explanation">
<strong>Penjelasan:</strong>
<ol>
<li>Mendefinisikan fungsi <code>getAngkaAcak</code> yang akan digunakan untuk mendapatkan angka acak dengan nilai maksimal tertentu. Fungsi ini akan digunakan pada baris-baris berikutnya.</li>
<li>Membuat objek Promise dengan generics kita isi unknown karena kita belum mengetahui hasil dari proses.<br>Disini terdapat 2 argumen yakni <code>resolve</code> dan <code>reject</code>.<br>Resolve akan dikerjakan jika promise is fulfilled atau janji ditepati atau proses yang kita inginkan terjadi di masa yang akan datang selesai dengan baik. Jika terjadi sesuatu error, maka yang akan dikerjakan adalah reject.</li>
<li>Jika hasil sesuai dengan yang diinginkan (acak > 500), maka yang akan dikerjakan adalah <code>resolve</code>, dalam hal ini hanya mengembalikan nilai <code>true</code>.</li>
<li>Jika hasil tidak sesuai dengan yang diinginkan (acak <= 500), maka yang akan dikerjakan adalah <code>reject</code>.</li>
<li>Menampilkan hasil.</li>
<li>Jika terjadi error/reject, maka bagian tersebut dapat kita antisipasi dengan <code>catch</code>.</li>
</ol>
</div>

##### 🔸 b) Promise Chaining

> 💡 **Konsep Dasar**: Promise chaining adalah teknik menggabungkan beberapa proses asinkron secara berurutan, dimana output dari satu promise menjadi input bagi promise berikutnya.

Namun ada kalanya, pengerjaan satu tindakan dalam Promise saja tidak cukup, tetapi diperlukan suatu rangkaian yang akan menyusul proses yang telah berhasil dikerjakan tersebut. Sebagai contoh, kita dapat membaca suatu file CSV kemudian mengambil kolom pertama baris pertama kemudian mentransformasikan isinya sesuai dengan rumus tertentu. 

Dalam kasus seperti ini, diperlukan chaining atau merangkai satu proses dengan proses lainnya. Hasil satu proses merupakan input bagi proses berikutnya, demikian seterusnya. TypeScript memungkinkan melakukan hal tersebut dengan menggunakan promise chaining.

**⚡ Praktikkan** contoh di bawah ini:

<div class="code-header">
<strong>Listing 2.2:</strong> Promise Chaining
</div>

```typescript
function getAngkaAcak(max: number): number {
  return Math.floor(Math.random() * Math.floor(max));
}

let p = new Promise<number>((resolve, reject) => {
  let acak = getAngkaAcak(20);
  let hasil: number; // <1>
  if (acak > 10) {
    resolve(acak);
    return;
  }
  reject("Hasil <= 10");
}).then(function(hasil) { // <2>
  console.log(hasil); // <3>
  return hasil*2; // <4>
}).then(function(hasil) { // <5>
  console.log(hasil); // <6>
  return hasil*2; // <7>
}).then(function(hasil) {
  console.log(hasil);
  return hasil*2;
});

console.log(p);
p.catch(err => console.log("ERROR - ", err));

// run (dapat berbeda-beda):
// pertama (jika resolve):
// Promise { <pending> }
// 12
// 24
// 48
// kedua (jika reject):
// Promise { <pending> }
// ERROR - Hasil <= 10
```

<div class="code-explanation">
<strong>Penjelasan:</strong>
<ol>
<li>Menyiapkan variabel <code>hasil</code> yang nantinya akan digunakan untuk menampung hasil dari bilangan acak jika sesuai dengan kondisi (> 10).</li>
<li>Chain pertama, jika > 10 maka hasil bilangan acak tersebut akan diletakkan ke variabel <code>hasil</code>.</li>
<li>Setelah itu isi variabel <code>hasil</code> akan ditampilkan.</li>
<li>Variabel <code>hasil</code> kemudian dikalikan 2. Hasil perkalian tersebut dijadikan nilai kembalian yang akan digunakan oleh chain berikutnya. Misal acak berisi 12, maka hasil akan diisi 12 dan kemudian ditampilkan serta dikalikan 2. Hasil perkalian tersebut (24) akan dijadikan nilai kembalian dan menjadi masukan bagi chain berikutnya.</li>
<li>Mengambil nilai dari nilai kembalian chain sebelumnya, yaitu 24 dan kemudian dimasukkan ke variabel <code>hasil</code>.</li>
<li>Menampilkan nilai variabel <code>hasil</code> (24).</li>
<li>Sama dengan penjelasan nomor 4, tetapi untuk chain berikutnya.</li>
</ol>
</div>

##### 🔸 c) Pemahaman Async/Await

> 💡 **Konsep Dasar**: Async/await adalah sintaks yang mempermudah penulisan kode asinkron, membuat kode terlihat seperti kode sinkron (berurutan) meskipun tetap beroperasi secara asinkron.

Konstruksi async/await pada dasarnya digunakan untuk pemanis sintaksis dari asynchronous programming yang dirasakan relatif membuat kode sumber yang dibuat susah dibaca.

Pola pikir untuk menggunakan konstruksi ini adalah:
1. Buat fungsi yang akan di dalam badan fungsi tersebut terdapat operasi asynchronous.
2. Letakkan `async` di depan function.
3. Di dalam badan fungsi tersebut, gunakan `await` untuk operasi yang memerlukan penanganan asynchronous.
4. Letakkan `await` dalam kerangka `try … catch`. Jika berhasil maka bagian try akan dikerjakan. Jika error, maka bagian catch akan menangkap error tersebut.

**⚡ Praktikkan** contoh di bawah ini:

<div class="code-header">
<strong>Listing 2.3:</strong> Penggunaan Async/Await
</div>

```typescript
function getAngkaAcak(max: number): number { // <1>
  return Math.floor(Math.random() * Math.floor(max));
}

function lebihDari(max: number, angka: number): boolean | number { // <2>
  if (angka > max) {
    throw "ERR: arg 1 harus lebih besar daripada arg 2"
  }
  let acak = getAngkaAcak(max);
  if (acak > angka) {
    return true;
  } else {
    return acak;
  }
}

let p = async function (): Promise<boolean | number> { // <3>
  try {
    //let hasilOK: boolean | number = await lebihDari(100, 500); // <4>
    let hasilOK: boolean | number = await lebihDari(1000, 500); // <5>
    return hasilOK;
  } catch(error) { // <6>
    return error;
  }
};

(async () => { // <7>
  console.log(await p())
})()

// jika <4> di uncomment, maka hasil:
// ERR: arg 1 harus lebih besar daripada arg 2
// jika menggunakan <5>, maka hasil kemungkinan:
// true
// 134 (atau angka lain)
```

<div class="code-explanation">
<strong>Penjelasan:</strong>
<ol>
<li>Mendefinisikan fungsi untuk mencari nilai acak dengan nilai maksimal tertentu.</li>
<li>Mendefinisikan fungsi untuk membandingkan apakah suatu nilai acak dengan nilai maksimal tertentu (argumen 1) lebih besar daripada nilai tertentu (argumen 2). Jika penggunaan fungsi ini salah maka akan dihasilkan error (throw).</li>
<li>Fungsi p akan menghasilkan Promise dengan nilai kembalian berupa union (boolean atau angka/number).</li>
<li>Await akan diletakkan pada konstruksi try … catch. Jika baris ini digunakan maka akan menghasilkan error, sehingga akan ditangkap oleh catch.</li>
<li>Await yang ada pada bagian ini digunakan untuk mengerjakan lebihDari dan kemudian menempatkan hasilnya ke hasilOK. Perlu diketahui, saat proses dijalankan, bagian ini akan dijadikan Promise dan baru akan dikembalikan lagi setelah ada hasil.</li>
<li>Jika terjadi error, maka bagian ini akan dikerjakan.</li>
<li>Bagian ini digunakan untuk mengambil hasil dari proses async/await yang sudah didefinisikan.</li>
</ol>
</div>

### 🔶 B. TypeScript untuk Backend

#### 1️⃣ Pemahaman Mekanisme Frontend - Backend

> 💡 **Konsep Dasar**: Dalam arsitektur aplikasi modern, frontend menangani UI dan interaksi pengguna, sementara backend mengelola data dan logika bisnis. Keduanya berkomunikasi melalui API.

Dalam situasi seperti saat ini, membangun aplikasi mobile dengan data yang tersimpan dalam aplikasi/tempat penyimpanan mobile phone bukan merupakan hal yang ideal. Ketersediaan media penyimpan dalam suatu mobile phone meskipun makin lama makin besar, tetapi sama sekali tidak cukup untuk aplikasi yang relatif besar. 

Dalam kondisi demikian, seringkali aplikasi dibuat untuk dua sisi yaitu **frontend** (bagian yang menyediakan tampilan antarmuka pemakai/user interface) serta bagian yang menyediakan akses data di sisi **backend** (terletak pada suatu server tertentu di Internet). Backend akan menyediakan suatu endpoint yang dapat diakses oleh frontend dengan menggunakan protokol tertentu. 

<img src="https://github.com/user-attachments/assets/9f0ae5e5-a592-4b60-a55c-9a82b8bf52d4" width="400">

**Gambar 2.1**
Mekanisme Client - Server/Frontend - Backend.

Bagan di atas memberi gambaran konseptual yang sampai saat ini masih relevan untuk membangun aplikasi. Pemakai akan berhadapan langsung dengan aplikasi yang menyediakan antarmuka dan kemudian setiap berinteraksi dengan aplikasi tersebut, antarmuka akan mengirim permintaan akses data ke backend. 

Supaya dapat terjadi komunikasi antara frontend dengan backend, maka diperlukan suatu protokol komunikasi. Contoh protokol untuk komunikasi tersebut antara lain adalah RESTful API dan GraphQL. Dengan demikian, untuk dapat menyediakan endpoint pada sisi backend; oleh karena itu perlu disediakan server dan di dalam server tersebut dibuat serta dijalankan program untuk mengekspos endpoint sesuai dengan protokol yang disepakati.

#### 2️⃣ Menggunakan TypeScript untuk Backend

> 📝 **Catatan**: Pada bagian ini, kita akan menggunakan Express.js yang merupakan framework Node.js untuk membuat RESTful API.

Beberapa framework yang dapat digunakan untuk membangun RESTful API dengan TypeScript antara lain adalah:
1. **Loopback**
2. **Nest.js**
3. **Feathers**
4. **Express**
5. **Typetron**
6. **FoalTS**
7. **Ts.ED**

Pada pembahasan ini, akan digunakan Express untuk mengekspos suatu endpoint data users. Jika endpoint `http://server:port/users` diakses, maka seluruh data users dalam format JSON akan dikirim sebagai response ke client.

Dengan demikian, untuk mengekspos RESTful API, setidaknya harus didefinisikan:
1. Server yang akan mengekspos RESTful API tersebut.
2. Routes
3. Controllers
4. Model

##### 🔸 a) Persiapan

Sebagai langkah awal, ada beberapa paket yang harus di-install serta beberapa konfigurasi dan pengaturan direktori. Buat direktori kosong di tempat yang anda sukai, beri nama restful-api dan kemudian masuk ke direktori tersebut. Semua file akan diletakkan di direktori tersebut.

> 📝 **Catatan**: materi diambil dari https://morioh.com/p/2063e05353d4 dengan penyesuaian serta penambahan guna mengekspos file JSON untuk endpoint.

**⚡ Praktikkan** perintah di bawah ini:

<div class="code-header">
<strong>Listing 2.4:</strong> Penggunaan Resful-API
</div>

```bash
$ mkdir restful-api // <1>
$ cd restful-api // <2>
$ npm init -y // <3>
$ npm install -g nodemon concurrently // <4>
$ npm install @types/node @types/express express --save-dev // <5>
$ mkdir src dist // <6>
$ tsc --init // <7>
```

<div class="code-explanation">
<strong>Penjelasan:</strong>
<ol>
<li>Membuat direktori kosong untuk proyek yang akan dibangun.</li>
<li>Masuk ke direktori yang dibuat sebelumnya</li>
<li>Inisialisasi direktori tersebut untuk proyek Node.js. Argumen -y digunakan supaya tidak perlu menjawab satu persatu.</li>
<li>Menginstall paket yang diperlukan di level global yaitu nodemon dan concurrently, keduanya dipakai pada saat menjalankan aplikasi.</li>
<li>Instalasi paket yang diperlukan serta menyimpan nama serta versi paket tersebut pada package.json.</li>
<li>Membuat direktori src (digunakan untuk menyimpan semua kode sumber TypeScript) dan direktori dist (digunakan untuk menyimpan hasil kompilasi kode sumber TypeScript ke JavaScript) supaya dapat dijalankan oleh Node.js.</li>
<li>Membuat file tsconfig.json.</li>
</ol>
</div>

Setelah perintah-perintah tersebut, struktur direktori dan file akan terlihat seperti yang ada pada Gambar 2.2.

![Struktur Direktori Dan File Di Awal Pembuatan Proyek](https://github.com/user-attachments/assets/f95afde5-7d41-456f-b8fc-cb394a452547)

**Gambar 2.2**
Struktur Direktori Dan File Di Awal Pembuatan Proyek

Ubah bagian "scripts" pada file package.json menjadi seperti berikut ini:

<div class="code-header">
<strong>Listing 2.5:</strong> Penggunaan Paket JSON
</div>

```json
{
  "name": "restful-api",
  "version": "1.0.0",
  "description": "",
  "main": "index.js",
  "scripts": {
    "start:dev": "nodemon dist/index.js",
    "build:dev": "tsc --watch --preserveWatchOutput",
    "dev": "concurrently \"npm:build:dev\" \"npm:start:dev\"" 
  },
  "keywords": [],
  "author": "",
  "license": "ISC",
  "devDependencies": {
    "@types/express": "^4.17.10",
    "express": "^4.17.1"
  }
}
```

> 💡 **Tip**: Bagian "scripts" digunakan untuk memberitahu pada npm tentang cara menjalankan aplikasi tersebut. Pada perintah build, akan dikompilasi semua kode sumber yang berada pada direktori tertentu (src) dan kemudian hasil kompilasi akan diletakkan pada direktori tertentu (dist, definisi keduanya terdapat pada file konfigurasi tsconfig.json).

Hasil kompilasi akan mempunyai struktur direktori dan file yang sama dengan letak kode sumber TypeScript. Setelah itu, akan dijalankan file JavaScript yang berada pada direktori dist.

Konfigurasi TypeScript diletakkan pada file tsconfig.json. Gantilah isinya dengan isi berikut, perhatikan definisi outDir dan rootDir:

<div class="code-header">
<strong>Listing 2.6:</strong> Konfigurasi pada file tsconfig.json
</div>

```json
{
  "compilerOptions": {
    "target": "es5",
    "module": "commonjs",
    "outDir": "./dist",
    "rootDir": "./src",
    "strict": true,
    "esModuleInterop": true,
    "skipLibCheck": true,
    "forceConsistentCasingInFileNames": true,
    "resolveJsonModule": true
  }
}
```

##### 🔸 b) Kode Sumber

Setelah itu, file-file kode sumber diletakkan pada direktori src (Silahkan Anda buat struktur file tersebut seperti Gambar 2.3). Struktur dari direktori dan file-file yang diperlukan dapat dilihat pada Gambar 2.3.

![Struktur Direktori Dan file di src/](https://github.com/user-attachments/assets/2521b0d2-db0a-4f4b-a214-044f64fbc57b)

**Gambar 2.3**
Struktur Direktori Dan file di src/

File-file yang diperlukan untuk kode sumber akan diuraikan berikut ini.

<div class="code-header">
<strong>Listing 2.7:</strong> File config/constants.ts
</div>

```typescript
export const PORT = process.env.PORT || 4000;
```

> 📝 **Catatan**: File config/constants.ts digunakan untuk menampung konfigurasi yang diperlukan, dalam hal ini adalah konfigurasi untuk port yaitu 4000.

<div class="code-header">
<strong>Listing 2.8:</strong> resources/users.json
</div>

```json
[
  {
    "balance": "$3,946.45",
    "picture": "http://placehold.it/32x32",
    "age": 23,
    "name": "Bird Ramsey",
    "gender": "male",
    "company": "NIMON",
    "email": "birdramsey@nimon.com"
  },
  {
    "balance": "$2,499.49",
    "picture": "http://placehold.it/32x32",
    "age": 31,
    "name": "Lillian Burgess",
    "gender": "female",
    "company": "LUXURIA",
    "email": "lillianburgess@luxuria.com"
  },
  {
    "balance": "$2,820.18",
    "picture": "http://placehold.it/32x32",
    "age": 34,
    "name": "Kristie Cole",
    "gender": "female",
    "company": "QUADEEBO",
    "email": "kristiecole@quadeebo.com"
  },
  {
    "balance": "$3,277.32",
    "picture": "http://placehold.it/32x32",
    "age": 30,
    "name": "Leonor Cross",
    "gender": "female",
    "company": "GRONK",
    "email": "leonorcross@gronk.com"
  },
  {
    "balance": "$1,972.47",
    "picture": "http://placehold.it/32x32",
    "age": 28,
    "name": "Marsh Mccall",
    "gender": "male",
    "company": "ULTRIMAX",
    "email": "marshmccall@ultrimax.com"
  }
]
```

> 📝 **Catatan**: File resources/users.json akan dibaca saat endpoint diakses dan kemudian akan dikirimkan ke pemanggil (http client) dalam format JSON. File JSON tersebut diambil dari: https://gist.github.com/rubenCodeforges/ef1f0ce6a055bbb985c0848d8b0c04d5#file-users-json.

<div class="code-header">
<strong>Listing 2.9:</strong> controllers/CrudController.ts
</div>

```typescript
import { Request, Response } from 'express';

export abstract class CrudController {
  public abstract create(req: Request, res: Response): void;
  public abstract read(req: Request, res: Response): void;
  public abstract update(req: Request, res: Response): void;
  public abstract delete(req: Request, res: Response): void;
}
```

> 📝 **Catatan**: File controllers/CrudController.ts digunakan untuk mendeklarasikan abstract class (class yang dimaksudkan untuk diimplementasikan, bukan untuk dibuat instance-nya). Setiap endpoint akan didefinisikan CRUD-nya (create, read, update, delete). Implementasinya akan dikerjakan oleh class turunannya.

<div class="code-header">
<strong>Listing 2.10:</strong> controllers/User/User.ts
</div>

```typescript
import { Request, Response } from 'express';
import { CrudController } from '../CrudController';
import usersjson from '../../resources/users.json';

export class UserController extends CrudController {
  public create(req: Request<import("express-serve-static-core").ParamsDictionary>, res: Response): void {
    throw new Error("Belum diimplementasikan");
  }
  
  public read(req: Request<import("express-serve-static-core").ParamsDictionary>, res: Response): void {
    res.json(usersjson);
  }
  
  public update(req: Request<import("express-serve-static-core").ParamsDictionary>, res: Response): void {
    throw new Error("Belum diimplementasikan");
  }
  
  public delete(req: Request<import("express-serve-static-core").ParamsDictionary>, res: Response): void {
    throw new Error("Belum diimplementasikan");
  }
}
```

> 📝 **Catatan**: File controllers/User/User.ts adalah file yang akan menangani jika ada endpoint yang dipanggil. File ini juga mengimplementasikan CrudController. Pada implementasi read akan dibaca file JSON dari resources/users.json dan kemudian akan dikirimkan ke pengakses endpoint.

<div class="code-header">
<strong>Listing 2.11:</strong> controllers/index.ts
</div>

```typescript
import { UserController } from './User/User';

const userController = new UserController();

export {
  userController
};
```

> 📝 **Catatan**: File controllers/index.ts digunakan untuk mengorganisasikan export supaya lebih mudah di-import dari program utama.

<div class="code-header">
<strong>Listing 2.12:</strong> routes/User/User.ts
</div>

```typescript
import express, { Request, Response } from 'express';
import { userController } from '../../controllers';

export const router = express.Router({
  strict: true
});

router.post('/', (req: Request, res: Response) => {
  userController.create(req, res);
});

router.get('/', (req: Request, res: Response) => {
  userController.read(req, res);
});

router.patch('/', (req: Request, res: Response) => {
  userController.update(req, res);
});

router.delete('/', (req: Request, res: Response) => {
  userController.delete(req, res);
});
```

> 📝 **Catatan**: File routes/User/User.ts digunakan untuk mendefinisikan pola request HTTP method serta permintaan resources. Sebagai contoh, jika akses endpoint users/ (didefinisikan pada src/index.ts) pada server serta port yang ditentukan menggunakan http method GET, maka akan dikerjakan userController.read.

<div class="code-header">
<strong>Listing 2.13:</strong> routes/index.ts
</div>

```typescript
import { router as userRouter } from './User/User';

export {
  userRouter
};
```

> 📝 **Catatan**: File routes/index.ts digunakan untuk mengorganisasikan export supaya lebih mudah di-import dari program utama.

<div class="code-header">
<strong>Listing 2.14:</strong> File Utama: index.ts
</div>

```typescript
import express from 'express';
import { PORT } from './config/constants';
import { userRouter } from './routes';

const app = express();
app.use(express.json());

app.get('/', (req, res) => {
  res.send('Selamat datang di RESTful API gateway');
});

app.use('/users', userRouter);

app.listen(PORT, () => {
  console.log(`Endpoint sudah siap dan dapat diakses di port ${PORT}`);
});
```

> 📝 **Catatan**: File index.ts yang terletak di direktori src merupakan file utama. File ini akan dikompilasi menjadi dist/index.js dan akan dijalankan dengan menggunakan nodemon seperti yang terdapat pada scripts di package.json.

##### 🔸 c) Menjalankan dan Mengekspos RESTful API Endpoint

Untuk menjalankan, gunakan perintah `npm run dev` di direktori proyek. Saat pertama kali dijalankan, akan error karena kompilasi awal. Tekan Ctrl-C, dan setelah itu kerjakan lagi `npm run dev` di direktori proyek.

Tampilan saat run adalah sebagai berikut:

```
...
...
[start:dev] [nodemon] 2.0.7
[start:dev] [nodemon] to restart at any time, enter `rs`
[start:dev] [nodemon] watching path(s): *.*
[start:dev] [nodemon] watching extensions: js,mjs,json
[start:dev] [nodemon] starting `node dist/index.js`
[build:dev]
[build:dev] 22.19.00 - Starting compilation in watch mode...
[build:dev]
[start:dev] Endpoint sudah siap dan dapat diakses di port 4000
[start:dev] [nodemon] restarting due to changes...
[start:dev] [nodemon] restarting due to changes...
[build:dev]
[build:dev] 22.19.01 - Found 0 errors. Watching for file changes.
[start:dev] [nodemon] restarting due to changes...
[start:dev] [nodemon] restarting due to changes...
[start:dev] [nodemon] restarting due to changes...
[start:dev] [nodemon] restarting due to changes...
[start:dev] [nodemon] restarting due to changes...
[start:dev] [nodemon] restarting due to changes...
[start:dev] [nodemon] restarting due to changes...
[start:dev] [nodemon] starting `node dist/index.js`
[start:dev] Endpoint sudah siap dan dapat diakses di port 4000
```

Untuk mengakses endpoint tersebut, dapat digunakan browser. Hasil jika diakses menggunakan browser dapat dilihat pada Gambar 2.4.

![Hasil akses ke endpoint](https://example.com/placeholder-image4.png)

**Gambar 2.4.**
Hasil akses ke endpoint

## 📚 Referensi

1. [TypeScript Official Documentation](https://www.typescriptlang.org/docs/)
2. [Express.js Documentation](https://expressjs.com/)
3. [Node.js Official Documentation](https://nodejs.org/en/docs/)
4. [JavaScript Promises and Async/Await](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Using_promises)

## 🧩 Latihan

1. Buat sebuah aplikasi TypeScript yang mengimplementasikan Promise untuk mengambil data dari API publik (misalnya JSONPlaceholder atau OpenWeatherMap).
2. Modifikasi contoh RESTful API dari praktikum ini untuk menambahkan implementasi create, update, dan delete pada controller User.
3. Buat program yang menggabungkan Promise dengan async/await untuk membuat alur kerja yang lebih kompleks.

## 🔍 Tips Pengembangan

- Selalu tangani error pada operasi asynchronous untuk membuat aplikasi lebih robust.
- Gunakan TypeScript type checking secara maksimal untuk menghindari bug runtime.
- Dalam pengembangan backend, pertimbangkan untuk menggunakan framework yang lebih terstruktur seperti NestJS untuk aplikasi skala besar.
- Terapkan prinsip modularitas dalam kode untuk memudahkan maintenance di masa depan.
