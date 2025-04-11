# 📱 MSIM4401 - Modul 1: Lingkungan Pengembangan Aplikasi Perangkat Bergerak

> **Universitas Terbuka - 2025**

## 📋 Daftar Isi

- [Praktikum 1.1: Lingkungan Pengembangan Aplikasi Perangkat Bergerak](#praktikum-11-lingkungan-pengembangan-aplikasi-perangkat-bergerak)
  - [A. Ionic Framework](#a-ionic-framework)
  - [Instalasi dan Konfigurasi Lingkungan Pengembangan](#instalasi-dan-konfigurasi-lingkungan-pengembangan)
- [Praktikum 1.2: Pemrograman TypeScript](#praktikum-12-pemrograman-typescript)
  - [A. Dasar-dasar TypeScript](#a-dasar-dasar-typescript)
  - [B. Pemrograman Modular di TypeScript](#b-pemrograman-modular-di-typescript)
  - [C. Interface](#c-interface)
  - [D. OOP di TypeScript](#d-oop-di-typescript)
  - [E. Generics](#e-generics)

---

## Praktikum 1.1: Lingkungan Pengembangan Aplikasi Perangkat Bergerak

### A. Ionic Framework

#### Pemahaman: Ekosistem Ionic Framework

Beberapa software atau komponen software yang memiliki keterkaitan dengan Ionic:

1. **Node.js**: JavaScript runtime yang dibuat dari V8 (JavaScript engine dari Google Chrome).

2. **TypeScript**: Bahasa pemrograman bertipe static typing yang merupakan superset dari JavaScript. TypeScript banyak digunakan di berbagai framework untuk tampilan antarmuka. TypeScript dikompilasi menjadi JavaScript dan dijalankan menggunakan Node.js.

3. **Framework untuk antarmuka**: Ionic mendukung setidaknya 3 framework, yaitu Angular, React, dan Vue.

4. **Pustaka/paket JavaScript dan TypeScript** di npm (software yang digunakan untuk mengelola paket serta proyek Node.js)

5. **Web Components**: Komponen siap pakai untuk tampilan antarmuka dengan menggunakan Ionic.

6. **Stencil**: Kompilator untuk membuat web components.

7. **Apache Cordova**: Perangkat penyedia native API plugins untuk memungkinkan aplikasi yang dibangun dengan teknologi web dapat mengakses perangkat sistem di level rendah.

8. **Capacitor**: Memiliki fungsi yang sama dengan Apache Cordova, tetapi dibuat oleh Ionic.

9. **Android SDK (Software Development Kit)**: Perangkat pengembangan yang digunakan untuk membangun aplikasi Android.

10. **IDE (Integrated Development Environment)**: Perangkat software yang menyediakan lingkungan pengembangan terpadu untuk membangun aplikasi. Meskipun Ionic dapat menggunakan IDE/editor teks apa saja, disarankan menggunakan Visual Studio Code yang menyediakan dukungan komprehensif untuk pengembangan berbasis JavaScript/TypeScript.

11. Informasi tentang integrasi Ionic dengan berbagai komponen lainnya dapat diakses di [https://ionicframework.com/integrations](https://ionicframework.com/integrations).

### Instalasi dan Konfigurasi Lingkungan Pengembangan

Pada kegiatan belajar ini, instalasi hanya mencakup:

#### 1. Node.js

```bash
$ node -v
v14.15.4
$ npm -v
6.14.10
$
```

> **Catatan**: Tanda `$` merupakan tanda prompt/shell, yaitu pertanda bahwa perintah dijalankan pada shell (jika menggunakan Linux/Mac) atau command prompt/powershell (jika menggunakan Windows)

#### 2. Visual Studio Code

Langkah pada Windows:

1. Buka cmd : <kbd>Win+R</kbd> → ketik "cmd" → <kbd>Enter</kbd>
2. Ketik `node -v` dan `npm -v`
3. Hasilnya seperti berikut:

![Hasil Perintah Node dan NPM](https://example.com/placeholder-image.png)

> **Catatan**: Perbedaan hasil v14.16.1 dan 6.14.10 dikarenakan versi node.js yang berbeda

Software Visual Studio Code dapat diperoleh pada situs [https://code.visualstudio.com/Download](https://code.visualstudio.com/Download). Unduh sesuai dengan sistem operasi yang akan digunakan, kemudian eksekusi installer tersebut. Visual Studio Code memiliki siklus rilis yang relatif cepat, oleh karena itu ada baiknya jika selalu melakukan pemeriksaan apakah Visual Studio Code yang digunakan merupakan software yang paling up-to-date.

---

## Praktikum 1.2: Pemrograman TypeScript

### A. Dasar-dasar TypeScript

#### 1. Instalasi TypeScript

Implementasi dari spesifikasi TypeScript (kompilator) dibuat dengan menggunakan JavaScript. Untuk instalasi, sebenarnya kita dapat menggunakan dua perangkat lunak:

1. **Kompilator TypeScript** - paket dari npm. Versi ini merupakan versi yang selalu diperbaharui sesuai dengan kondisi terbaru dari TypeScript.
2. **Deno**, runtime untuk JavaScript serta TypeScript. Dibuat oleh Ryan Dahl (pencipta asli dari Node.js). Deno mirip dengan Node.js, hanya saja Deno sudah sekaligus menyertakan TypeScript. Versi TypeScript yang ada di Deno biasanya bukan versi terbaru. Deno dapat diperoleh di [https://deno.land/](https://deno.land/).

Untuk keperluan modul ini, kita menggunakan versi paket dari npm. Instalasi TypeScript dapat dilakukan dengan perintah npm dari Node.js (buka Node.js command prompt).

**Praktikkan**:

```bash
$ npm install -g typescript // <1>
...
... keluaran hasil npm
...
$ tsc --version // <2>
Version 4.1.3
$ npm install -g ts-node // <3>
...
... keluaran hasil npm
...
$ ts-node --version // <4>
v9.1.1
$
```

1. Instalasi kompilator TypeScript (tsc)
2. Memeriksa hasil instalasi TypeScript
3. Instalasi ts-node untuk REPL dari TypeScript. REPL (Read-Eval-Print-Loop) digunakan untuk menuliskan kode-kode pendek yang akan langsung dikerjakan.
4. Memeriksa hasil instalasi ts-node

> **Catatan**: Tanda "// <angka>" di atas dan seterusnya pada modul ini bukan merupakan bagian dari perintah/hasil, ditulis hanya untuk memudahkan penjelasan.

Hasil dari langkah 1 s.d 4 adalah sebagai berikut:

![Hasil Instalasi TypeScript](https://example.com/placeholder-image2.png)

#### 2. Menjalankan TypeScript

**Praktikkan**:

```bash
$ ts-node 
> console.log("Halo dari TypeScript")
Halo dari TypeScript
undefined
> 
```

Dengan menggunakan mode kode sumber, langkah yang dilakukan adalah:

1. Pemrogram membuat program TypeScript (dengan ekstensi .ts)
2. Kompilasi program tersebut menggunakan kompilator TypeScript. Jika semua berjalan baik, maka hasil kompilasi berupa file JavaScript.
3. Jalankan file JavaScript tersebut dengan menggunakan Node.js.

Berikut adalah contoh dengan menggunakan Listing 1.1. Pembahasan akan diberikan di bagian-bagian berikutnya. Pada bagian ini, pelajari bagaimana cara membuat kode sumber dan kemudian menjalankan kode sumber tersebut.

```typescript
let message: string = 'Hello, World!'; // <1>
console.log(message); // <2>
```

**Listing 1.1**
Kode sumber sederhana untuk ilustrasi menjalankan TypeScript.

1. Mendefinisikan variabel message.
2. Menampilkan tulisan sesuai isi variabel message yaitu 'Hello, World!'.

Urut-urutan kompilasi sampai dengan menjalankan hasil adalah sebagai berikut:

```bash
$ ls // <1>
app.ts
$ tsc app.ts // <2>
$ ls
app.js app.ts // <3>
$ node app.js // <4>
Hello, World!
$
```

1. Perintah untuk menampilkan isi direktori. Ganti dengan command/perintah `dir` jika menggunakan Windows.
2. Perintah untuk mengkompilasi.
3. Menghasilkan file JavaScript sesuai nama, dengan ekstensi .js.
4. Menjalankan hasil kompilasi

#### 3. Dasar-dasar Pemrograman TypeScript

##### a) Variabel

Ada beberapa cara untuk menetapkan variabel di TypeScript:

1. **var**: tidak menentukan tipe data, dapat dideklarasikan ulang kapan saja.
2. **let**: dapat menentukan atau tidak menentukan tipe data, hanya dapat dideklarasikan sekali saja, selebihnya langsung memanipulasi nilai.
3. **const**: dapat menentukan atau tidak menentukan tipe data, sekali dideklarasikan tidak dapat diubah.

**Praktikkan**: Penggunaan masing-masing dapat dilihat pada Listing 1.2.

```typescript
var a = 10;
console.log(a);
var a = 20; // <1>
console.log(a);

let b = 30;
console.log(b);
b = b + 5; // <2>
// let b = b + 10; // <3>

const c = "softwareku";
console.log(c);
// c = "softwareku - versi 1.0"; // <4>
```

**Listing 1.2**
Deklarasi variabel

1. Deklarasi dengan `var` dapat dideklarasikan ulang. Contohnya `var a = 20` dideklarasikan ulang dari `var a = 10`;
2. Deklarasi dengan `let` hanya dapat diteruskan dengan memanipulasi nilai.
3. Error karena deklarasi ulang.
4. Error karena mengubah nilai

Meskipun terdapat error, jika dikompilasi akan tetap menghasilkan file .js dan dapat dijalankan dengan menggunakan Node.js. Meskipun demikian, sebaiknya perbaiki dulu semua error.

Pada saat membahas tentang Pemrograman Modular - Fungsi, kita akan membahas sisi lain dari ketiga hal tersebut.

##### b) Tipe Data Dasar

Beberapa tipe data dasar dari TypeScript adalah sebagai berikut:

1. **Boolean**: menyimpan nilai benar (true) atau salah (false) saja.
2. **Number**: menyimpan nilai angka (floating point: pecahan dan big integer: bilangan bulat besar). TypeScript juga mendukung decimal, hexadecimal (0x), octal (0o), biner (0b).
3. **String**: menyimpan nilai tulisan.
4. **Array**: menyimpan nilai variabel dengan indeks.
5. **Tuple**: seperti array, tetapi jumlahnya sudah pasti dan dengan tipe data tertentu yang boleh berbeda-beda.
6. **Enum**: menyimpan data enumerasi.
7. **Unknown**: menyimpan data yang kita belum tahu akan bertipe apa.
8. **Any**: menyimpan tipe data apa saja - tidak dilakukan pemeriksaan oleh TypeScript.
9. **Null**: menyimpan nilai "tidak ada nilai", terjadi jika suatu variabel dideklarasikan tetapi tidak mempunyai nilai.
10. **Undefined**: menyimpan nilai yang tidak didefinisikan, terjadi jika suatu variabel tidak dideklarasikan tetapi dirujuk dalam program.
11. **Union**: mempunyai kemungkinan lebih dari 1 tipe data.

Tipe void, never, dan object akan dibahas di pembahasan tentang fungsi dan OOP. Contoh deklarasi serta penggunaan tipe data dasar di TypeScript dapat dilihat pada Listing 1.3.

**Praktikkan**:

```typescript
let isFinished: boolean = false;
console.log(isFinished, typeof isFinished); // <1>

let price: number = 150.34;
console.log(price, typeof price);

let numOfEmployees: number = 25;
console.log(numOfEmployees, typeof numOfEmployees);

let progLang: string = "TypeScript";
console.log(progLang, typeof progLang)

let university: string[] = ['UT', 'UGM', 'ITB'];
console.log(university, typeof university)

let employee: [number, string, boolean, number, string];
employee = [1, "Zaky Aditya", true, 20, "Engineer"];
console.log(employee, typeof employee);

enum Color {
  Black = 2,
  Blue,
  Yellow,
  Green = 3,
  Red = 3 * 3
}
console.log(Color, typeof Color);

let code: string | number;
console.log(code, typeof code);
code = 'my code';
console.log(code, typeof code);
code = 21;
console.log(code, typeof code);

let valueNull = null
console.log(valueNull, typeof valueNull)

let valueUndefined = undefined
console.log(valueUndefined, typeof valueUndefined)

let valueAny: any;
console.log(valueAny, typeof valueAny)
valueAny = true;
console.log(valueAny, typeof valueAny)
valueAny = 42;
console.log(valueAny, typeof valueAny)
valueAny = "TypeScript";
console.log(valueAny, typeof valueAny)
valueAny = [];
console.log(valueAny, typeof valueAny)
valueAny = {};
console.log(valueAny, typeof valueAny)
valueAny = Math.random;
console.log(valueAny, typeof valueAny)
valueAny = null;
console.log(valueAny, typeof valueAny)
valueAny = undefined;
console.log(valueAny, typeof valueAny)

let valueUnknown: unknown;
console.log(valueUnknown, typeof valueUnknown);
valueUnknown = true;
console.log(valueUnknown, typeof valueUnknown);
valueUnknown = 42;
console.log(valueUnknown, typeof valueUnknown);
valueUnknown = "TypeScript";
console.log(valueUnknown, typeof valueUnknown);
valueUnknown = [];
console.log(valueUnknown, typeof valueUnknown);
valueUnknown = {};
console.log(valueUnknown, typeof valueUnknown);
valueUnknown = Math.random;
console.log(valueUnknown, typeof valueUnknown);
valueUnknown = null;
console.log(valueUnknown, typeof valueUnknown);
valueUnknown = undefined;
console.log(valueUnknown, typeof valueUnknown);
```

**Listing 1.3**
Tipe data dasar di TypeScript

`typeof` digunakan untuk menghasilkan nilai tipe data dari variabel yang bersangkutan.

##### c) Struktur Kendali

###### 1) Pencabangan dengan if

**Praktikkan** contoh di bawah ini:

```typescript
let a: number = 21;
let b: number = 3;
let c: number = a / b;

if (c > 5) {
  console.log("lebih besar dari 5");
} else if (c > 3) {
  console.log("antara 3 - 5");
} else {
  console.log("di bawah 3");
}
```

**Listing 1.4**
Pencabangan dengan if

###### 2) Seleksi Kondisi dengan switch

**Praktikkan** contoh di bawah ini:

```typescript
let hari: number = 5;
let hariStr: string;

switch (hari) {
  case 0:
    hariStr = "Minggu";
    break;
  case 1:
    hariStr = "Senin";
    break;
  case 2:
    hariStr = "Selasa";
    break;
  case 3:
    hariStr = "Rabu";
    break;
  case 4:
    hariStr = "Kamis";
    break;
  case 5:
    hariStr = "Jum'at";
    break;
  case 6:
    hariStr = "Sabtu";
    break;
  default:
    hariStr = "Tidak ada hari tersebut";
    break;
}

console.log(hariStr);
```

**Listing 1.5**
Seleksi kondisi dengan switch

###### 3) Perulangan dengan for

Perulangan (looping) dengan for mempunyai 3 bentuk:
1. Perulangan sejumlah tertentu.
2. Perulangan untuk mengakses nilai dari array (for ... of).
3. Perulangan untuk mengakses indeks dari array (for ... in)

**Praktikkan** contoh di bawah ini:

```typescript
for (let i = 0; i < 3; i++) { // <1>
  console.log("Looping ke " + i);
}

let arr = ["nilai 1", "nilai 2", "nilai 3", "nilai 4"];

for (var nilai of arr) { // <2>
  console.log(nilai);
}

for (var index1 in arr) { // <3>
  console.log(index1);
}

console.log(index1); // <4>

for (let index2 in arr) { // <5>
  console.log(index2);
}

// console.log(index2) // <6>

let str = "Universitas Terbuka";
for (var huruf of str) { // <7>
  console.log(huruf);
}
```

**Listing 1.6**: Perulangan menggunakan for

1. Perulangan dengan jumlah pasti tertentu.
2. Perulangan untuk mengambil nilai array.
3. Perulangan untuk mengakses indeks, var digunakan untuk definisi variabel.
4. Variabel masih tetap tersedia setelah keluar dari perulangan
5. Perulangan untuk mengakses indeks, let digunakan untuk definisi variabel.
6. Jika komentar dihilangkan akan error karena let tidak membuat variabel tetap dapat digunakan di luar perulangan.
7. Penggunaan for ... of untuk string.

Untuk mengkompilasi kode sumber di atas, gunakan spesifikasi ES6 (ES merupakan spesifikasi bahasa pemrograman Ecmascript yang diimplementasikan oleh JavaScript). Jika menggunakan spesifikasi default (`tsc namafile.ts`), maka akan terjadi kesalahan karena default hasil kompilasi akan menggunakan spesifikasi ES3 dan for ... of tidak didukung oleh ES3. Perintah untuk mengkompilasi dengan menggunakan ES6 adalah sebagai berikut:

```bash
$ tsc --target es6 for.ts
```

###### 4) Perulangan dengan while

Pernyataan while digunakan untuk perulangan sejumlah yang belum diketahui, sampai dengan suatu kondisi terpenuhi.

Ada 2 tipe pernyataan while:
1. **while**: perulangan sampai kondisi terpenuhi, dapat tidak dilakukan jika evaluasi nilai while pertama sudah bernilai false.
2. **do ... while**: perulangan sampai kondisi terpenuhi, dilakukan minimal sekali sampai dengan evaluasi nilai while bernilai false.

**Praktikkan** contoh di bawah ini:

```typescript
let nilai1: number = 5;
while (nilai1 < 10) { // <1>
  console.log(nilai1)
  nilai1++;
}

let nilai2: number = 5;
while (nilai2 < 5) { // <2>
  console.log(nilai2)
  nilai2++;
}

let nilai3: number = 5;
do { // <3>
  console.log(nilai3)
  nilai3++;
} while (nilai3 < 10)

let nilai4: number = 5;
do { // <4>
  console.log(nilai4)
  nilai4++;
} while (nilai4 < 5)
```

**Listing 1.7**
Perulangan menggunakan while

1. Selama nilai1 lebih kecil dari 10 (nilai1 awal adalah 5), akan ditampilkan. Hasil: 5 6 7 8 9.
2. Perulangan ini tidak dikerjakan karena saat evaluasi pertama sudah bernilai false (nilai2 berisi 5, dibandingkan apakah lebih kecil dari 5).
3. Selama nilai3 lebih kecil dari 10 (nilai3 awal adalah 5), akan ditampilkan. Hasil: 5 6 7 8 9.
4. Perulangan ini hanya akan dikerjakan sekali saja, sebelum evaluasi nilai4 kurang dari 5. Begitu menemui evaluasi tersebut, hasil evaluasi adalah false. Hasil: 5.

### B. Pemrograman Modular di TypeScript

#### 1. Mengenal Fungsi

Fungsi di dalam TypeScript merupakan unit terkecil yang menjadi bangunan dasar dari suatu aplikasi.

Ada 2 kategori fungsi:
1. **Fungsi pustaka standar**: disediakan oleh Node.js dan siap digunakan oleh JavaScript/TypeScript.
2. **UDF (User-Defined Function)**: fungsi yang dibuat sendiri oleh pemrogram. Jika disediakan untuk pemrogram lainnya, maka kumpulan fungsi ini sering juga disebut pustaka pihak ketiga atau third party library.

#### 2. Fungsi Pustaka Standar

Untuk keperluan ini, harus diinstal modul untuk membuat supaya pustaka standar Node.js dikenali dan dapat digunakan oleh TypeScript. 

**Praktikkan** langkah-langkah untuk menggunakan pustaka standar sebagai berikut:

```bash
$ npm init -y // <1>
...
...
 "author": "",
 "license": "ISC"
}
$ ls // <2>
package.json
$ npm install @types/node --save-dev // <3>
...
...
+ @types/node@14.14.17
added 1 package from 44 contributors and audited 1 package in 5.597s
found 0 vulnerabilities
$ ts-node // <4>
> import * as os from 'os'; // <5>
{}
> os.userInfo() // <6>
{
 uid: 1000,
 gid: 1000,
 username: 'bpdp',
 homedir: '/home/bpdp',
 shell: '/usr/bin/fish'
}
> 
```

**Listing 1.8**
Fungsi Pustaka Standar

1. Inisialisasi proyek.
2. Hasil dari inisialisasi adalah file package.json.
3. Instalasi paket yang diperlukan: @types/node
4. Masuk ke REPL.
5. Import digunakan untuk mengaktifkan modul yang ingin digunakan (os).
6. Menggunakan fungsi userInfo() dari modul os.

#### 3. Fungsi Buatan Sendiri

Fungsi buatan sendiri didefinisikan oleh pemrogram jika dirasakan tidak ada modul yang diinginkan sehingga harus membuat sendiri berbagai fungsionalitas tersebut. Untuk selanjutnya, pembahasan akan mengacu pada fungsi yang dibuat sendiri ini.

##### a) Membuat Fungsi

Fungsi dapat dibuat dengan menggunakan function definition dan function expression. Dari sisi penamaan, suatu fungsi juga dapat mempunyai nama (named function), dapat juga tidak mempunyai nama (anonymous function).

##### b) Function Definition

Dengan menggunakan kata kunci function di awal, maka berarti fungsi didefinisikan. 

**Praktikkan** contoh di bawah ini:

```typescript
console.log(add(32,12)); // <1>

function add(x: number, y: number): number { // <2>
  return x + y; // <3>
}

console.log(add(21,12)); // <4>
```

**Listing 1.9**
Mendefinisikan Fungsi

1. Fungsi dapat dipanggil dari mana saja.
2. Definisi fungsi. add adalah nama fungsi, 2 argumen fungsi (x dan y) dengan tipe data number, hasilnya adalah number (:number).
3. Badan dari fungsi, tempat mendefinisikan fungsi.
4. Fungsi dipanggil atau digunakan.

##### c) Function Expression

Dengan menggunakan function expression, definisi dari fungsi dapat diletakkan pada bagian ekspresi. Sebagai suatu ekspresi, fungsi akan dijalankan saat kompilator menemui function expression sehingga tidak dapat digunakan sebelum dibuat. 

**Praktikkan** contoh di bawah ini:

```typescript
//console.log(2, 3); // <1>

let add = function (x: number, y: number): number { // <2>
  return x + y; // <3>
};

console.log(add(2, 3)); // <4>
```

**Listing 1.10**
Membuat fungsi menggunakan function expression

1. Jika dihilangkan komentar, akan terjadi error karena pada baris ini belum ditemui nama fungsi add.
2. Membuat fungsi add sebagai ekspresi dari variabel add.
3. Badan dari fungsi, tempat mendefinisikan fungsi.
4. Baru dapat dipanggil jika sudah didefinisikan di bagian atas.

##### d) Nilai Kembalian Fungsi

Pada penjelasan pembuatan program di atas, bagian `:number` setelah definisi argumen x dan y merupakan nilai kembalian yang diharapkan. Bagian tersebut dapat berisi tipe data yang telah dibahas sebelumnya. Selain itu, terdapat dua tipe nilai kembalian yang digunakan pada kondisi tertentu:

1. **void**: nilai kembalian dari fungsi tersebut tidak ada atau suatu fungsi yang tidak menghasilkan nilai. Contoh dapat dilihat pada Listing 1.11.
2. **never**: tipe data untuk nilai kembalian suatu fungsi yang tidak pernah dicapai.

**Praktikkan** contoh di bawah ini:

```typescript
function tampilkan(arg1: any): void {
  console.log(arg1)
}

tampilkan("Halo!");
```

**Listing 1.11**
Nilai kembalian void

```typescript
nonStop();

function nonStop(): never {
  while (true) {
    console.log('tulisan non-stop');
  }
}
```

**Listing 1.12**
Nilai kembalian never

##### e) Arrow Function

Tanda panah `=>` digunakan sebagai arrow function, yaitu sintaks untuk membuat suatu fungsi menjadi terlihat lebih ringkas. 

**Praktikkan** contoh di bawah ini:

```typescript
let add1 = (a: number, b: number): number => { return a + b }; // <1>
let add2 = (a: number, b: number): number => a + b; // <2>
let lenStr1 = (s: string): number => s.length; // <3>
let lenStr2 = s => s.length; // <4>

// Penggunaan arrow func // <5>
console.log(add1(2,3));
console.log(add2(2,3));
console.log(lenStr1('abcdefg'));
console.log(lenStr2('abcdefg'));
```

**Listing 1.13**
Penggunaan _arrow function_ (=>)

1. Ekspresi lengkap dengan nama add1, argumen a dan b bertipe number, nilai kembalian number (:number), serta definisi fungsi di dalam {…}.
2. Penulisan lebih singkat.
3. Penulisan singkat.
4. Jika tanpa tipe, akan lebih singkat lagi.
5. Berbagai penggunaan dari arrow function.

#### 4. Fungsi Anonymous

Fungsi anonymous adalah fungsi yang tidak mempunyai nama. Biasanya digunakan sebagai ekspresi yang dapat langsung dijalankan, tidak dimaksudkan untuk penggunaan berikut-berikutnya, serta memungkinkan untuk digunakan sebagai parameter fungsi (higher order function). 

**Praktikkan** contoh di bawah ini:

```typescript
((str: string, idx: number) => { // <1>
  console.log(str[idx]) // <2>
})('Universitas Terbuka', 4); // <3>

let idxStr = function(str: string, idx: number): void { // <4>
  console.log(str[idx]); // <5>
}

console.log(idxStr('Universitas Terbuka', 4)); // <6>
```

**Listing 1.14**
Fungsi Anonymous

1. Membuat fungsi dengan argumen str dan idx. Kegunaannya untuk mengambil karakter ke idx dari suatu string str.
2. Badan dari fungsi.
3. Sekaligus memanggil fungsi dengan argumen tertentu.
4. Membuat ekspresi fungsi yang diberikan ke variabel idxStr dengan argumen string str dan indeks ke berapa yang akan diambil (idx berupa number).
5. Badan dari fungsi.
6. Penggunaan fungsi.

#### 5. let, var, dan Ruang Lingkupnya

**Praktikkan** contoh di bawah ini:

```typescript
let scoping = function(input: any) { // <1>
  let angka1 = 100;
  if (typeof input == 'number') {
    let angka2 = angka1 + input; // <2>
    var angka3 = angka1 - input; // <3>
  }
  
  // Error: Cannot find name 'angka2'
  // return angka2; // <4>
  
  // karena definisi dengan var, maka
  // dapat diakses
  return angka3; // <5>
}

console.log(scoping(1));
```

**Listing 1.15**
Ruang lingkup let dan var

1. Mendefinisikan ekspresi fungsi.
2. Mendefinisikan variabel dalam blok if menggunakan let.
3. Mendefinisikan variabel dalam blok if menggunakan var.
4. Error karena variabel didefinisikan menggunakan let, hanya dikenali di blok tempat variabel tersebut didefinisikan.
5. Tidak error karena didefinisikan menggunakan var, dapat dikenali di seluruh blok ekspresi fungsi.

### C. Interface

Interface adalah struktur yang digunakan sebagai kontrak untuk definisi (data, fungsi, maupun class di OOP). 

**Praktikkan** contoh di bawah ini:

```typescript
interface IPerson { // <1>
  nik: string;
  nama: string;
  alamat: string;
  menikah: boolean;
}

interface IPegawai extends IPerson { // <2>
  readonly npp: string;
  jabatan: string;
  gaji: number;
  email?: string;
}

let peg01: IPegawai = { // <3>
  nik: '012345',
  nama: 'Donal',
  alamat: 'Jl. Awan Biru 21',
  menikah: true,
  npp: '98123',
  jabatan: 'Manager SDM',
  gaji: 15000000
}

console.log(peg01.nama, peg01.jabatan); // <4>

// error: Cannot assign to 'npp' because it is a read-only property
// peg01.npp = '981234';

interface IKamusList { // <5>
  [index:string]:string
}

let strKamus: IKamusList = {}; // <6>
strKamus["university"] = "universitas";
strKamus["freedom"] = "merdeka";
console.log(strKamus["university"]);

interface IPemrosesNilai { // <7>
  (kunci: number,
  nilai: string): void
}

function tambahNilai(kunci: number, nilai: string): void { // <8>
  console.log('Menambah ', kunci, nilai);
}

function perbaruiNilai(kunci: number, nilaiBaru: string): void { // <9>
  console.log('Memperbarui ', kunci, nilaiBaru);
}

let pemrosesTambah: IPemrosesNilai = tambahNilai; // <10>
pemrosesTambah(123, 'Nilai 123');

let pemrosesPerbarui: IPemrosesNilai = perbaruiNilai;
pemrosesPerbarui(123, 'Nilai baru 123');
```

**Listing 1.16**
Penggunaan Interface

1. Mendefinisikan interface untuk kontrak person, pada umumnya pola penamaannya "I" + nama (dengan huruf pertama besar).
2. Mendefinisikan interface yang merupakan turunan dari definisi sebelumnya.
3. Membuat data dengan kontrak interface tertentu.
4. Mengakses data.
5. Mendefinisikan interface untuk array dengan indeks string.
6. Membuat data sesuai kontrak interface.
7. Mendefinisikan interface untuk fungsi.
8. Mendefinisikan fungsi yang akan dipastikan kontraknya dengan interface.
9. Mendefinisikan fungsi yang akan dipastikan kontraknya dengan interface.
10. Membuat ekspresi fungsi sesuai interface.

### D. OOP di TypeScript

#### 1. OOP: Definisi Class dan Instance

TypeScript mendefinisikan class dengan menggunakan kata kunci class. Untuk mendefinisikan instance digunakan kata kunci new. Setiap class mempunyai berbagai fitur (dengan sifat public, private, serta protected). Perilaku yang dimiliki oleh kelas didefinisikan menggunakan method (mirip dengan fungsi tetapi khusus untuk class). Method khusus yang dijalankan pada saat instance dibuat disebut constructor. Class dapat diturunkan ke subclass (disebut dengan inheritance). 

**Praktikkan** contoh di bawah ini:

```typescript
class Person { // <1>
  perNik: string; // <2>
  protected perNama: string;
  perAlamat: string;
  
  constructor(nik: string, nama: string) { // <3>
    this.perNik = nik;
    this.perNama = nama;
  }
}

class Pegawai extends Person { // <4>
  pegNpp: string; // <5>
  private _pegJmlTanggungan: number;
  readonly dept: string;
  gaji: number;
  static potongPajak = 10; // <6>
  
  constructor(nik: string, npp: string, // <7>
              nama: string, dept: string) {
    super(nik, nama);
    this.pegNpp = npp;
    this.dept = dept;
  }
  
  getGaji(): number { // <8>
    return this.gaji;
  }
  
  setGaji(gajiBaru: number): void { // <9>
    this.gaji = gajiBaru;
  }
  
  getPotonganPajak(): number { // <10>
    return this.gaji * (Pegawai.potongPajak / 100);
  }
  
  presensi(): void { // <11>
    let dateTime = new Date();
    console.log("Presensi pada " +
                dateTime.toLocaleTimeString() +
                ' - ' + dateTime.toDateString());
  }
}

let pakBambang = new Pegawai('nik1122', 'npp123',// <12>
                            'Bambang Purnomosidi', 'IT');
console.log(pakBambang.setGaji(15750500)); // <13>
console.log(pakBambang.getGaji());
console.log(pakBambang.presensi());
console.log(pakBambang.getPotonganPajak());

// error:
// Property '_pegJmlTanggungan' is private and only
// accessible within class 'Pegawai'
// console.log(pakBambang._pegJmlTanggungan);
```

**Listing 1.17**
Definisi Class dan Instance

1. Mendefinisikan class Person.
2. Mendefinisikan properties dari class Person, semuanya public kecuali perNama yang mempunyai access modifier protected - dapat diakses dari class yang mendefinisikan dan turunannya.
3. Konstruktor dari Person, akan dikerjakan pertama kali saat membuat instance Person.
4. Mendefinisikan class Pegawai yang merupakan turunan dari class Person.
5. Mendefinisikan properies dari class Pegawai. Private berarti hanya dapat diakses di class tersebut, readonly berarti hanya dapat dibaca - dapat ditetapkan hanya saat deklarasi dan definisi di konstruktor.
6. Property static berarti ada di level class bukan di level instance.
7. Konstruktor untuk Pegawai. Penggunaan super berarti mengacu pada konstruktor induknya.
8. Kelas menyediakan getter untuk mengambil nilai pada suatu class.
9. Kelas menyediakan setter untuk menetapkan suatu nilai.
10. Mendefinisikan method, property static dimana property yang berada pada sisi class dapat diakses dengan namaClass.property.
11. Mendefinisikan method.
12. Pembuatan instance baru. Argumen sesuai konstruktor.
13. Menjalankan berbagai method serta setter dan getter.

### E. Generics

Generics merupakan suatu teknik pemrograman yang digunakan untuk membuat tipe data yang ada pada kode fungsi kita se-generik/se-umum mungkin sehingga kemudian dapat digunakan untuk berbagai macam tipe data. Generics diperlukan untuk membuat kode kita reusable dengan cara tidak menetapkan secara kaku untuk suatu jenis tipe data yang akan diproses di depan (di langkah berikutnya). Sebagai gantinya, tipe data yang akan diproses baru akan didefinisikan pada saat akan menggunakan fungsi tersebut. Bagian tipe data yang menandai generics dibuat dengan menggunakan satu huruf besar.

**Praktikkan** contoh di bawah ini:

```typescript
// tanpa generics // <1>
function funN(argN: number): number {
  return argN;
}

function funS(argS: string): string {
  return argS;
}

console.log(funN(23));
console.log(funS('TypeScript'));

// tanpa generics - menggunakan any
// tidak type safe, karena menerima tipe
// data apa saja.
function funA(argA: any): any{ // <2>
  return argA;
}

console.log(funA(true));
console.log(funA([1,2,3]));

// menggunakan generics
function funG1<T>(argG1:T):T { // <3>
  return argG1;
}

function funGn<T, U>(argGn1:T, argGn2: U): U { // <4>
  return argGn2;
}

console.log(funG1<string>('TypeScript'));
console.log(funG1<number>(23));
console.log(funGn<string, number>('TypeScript', 23));

interface argGenConstraint { // <5>
  length: number;
}

function panjang<T extends argGenConstraint>(argGC:T): number { // <6>
  return argGC.length;
}

let hasil1 = panjang({ length: 23, name: 'TypeScript'}); // <7>
let hasil2 = panjang('TypeScript');
console.log(hasil1);
console.log(hasil2);
```

**Listing 1.18**
Penggunaan Generics

1. Terdapat 2 (dua) fungsi tanpa generics yang boleh digunakan untuk memproses argumen string serta number. Jika tanpa generics maka harus didefinisikan secara langsung dengan tipe data yang dikehendaki agar dapat diproses; sementara itu bisa saja terjadi adanya kemiripan pada proses badan fungsi; sehingga keadaan ini dapat menyebabkan program yang kita buat menjadi bertele-tele.

2. Tanpa generics hanya menggunakan 1 (satu) fungsi saja. Penggunaan argumen any memang memungkinkan, namun tidak type safe (aman) karena tipe data yang diproses dapat saja tidak sesuai dengan tipe data dari pemroses pada badan fungsi; sehingga dengan kata lain dapat dinyatakan bahwa masih terdapat unsur ketidakpastian.

3. Menggunakan generics, cukup mendefinisikan 1 (satu) fungsi. Huruf T digunakan untuk menandai tipe data yang digunakan pada argumen nantinya. Contoh pemakaiannya ada di bagian bawah. T merupakan tanda generics, dapat diganti dengan huruf lainnya.

4. Generics dapat lebih dari satu, dengan nilai kembalian sesuai dengan yang kita inginkan.

5. Seringkali kita harus memastikan suatu constraint tertentu yang dapat digunakan untuk memeriksa apakah penggunaan suatu fungsi sudah sesuai atau belum. Dalam kasus ini, kita memastikan bahwa setiap argumen mempunyai property length. Definisi dari constraint tersebut dibuat dengan menggunakan interface.

6. Untuk menerapkan contraint pada suatu fungsi, digunakan perintah extends sesuai dengan interface yang kita inginkan untuk diterapkan.

7. Dua baris berikut digunakan untuk memberi contoh bahwa setiap argumen harus mempunyai property length. Untuk contoh kedua, tidak perlu didefinisikan karena suatu string mempunyai property length.

---

## 📚 Referensi

1. [TypeScript Official Documentation](https://www.typescriptlang.org/docs/)
2. [Ionic Framework Documentation](https://ionicframework.com/docs)
3. [Node.js Official Documentation](https://nodejs.org/en/docs/)
4. [Mozilla Developer Network - JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)

## 🧩 Latihan

1. Buatlah sebuah aplikasi TypeScript sederhana yang menghitung luas dan keliling berbagai bentuk geometri (lingkaran, persegi, segitiga).
2. Buatlah class `Mahasiswa` dan `MataKuliah` dengan relasi yang sesuai. Implementasikan method untuk menghitung nilai akhir.
3. Gunakan Ionic Framework untuk membuat aplikasi mobile sederhana yang menampilkan daftar tugas (todo list).

## 🔗 Tautan Penting

- [Download Node.js](https://nodejs.org/en/download/)
- [Download Visual Studio Code](https://code.visualstudio.com/download)
- [TypeScript Playground](https://www.typescriptlang.org/play)
- [Ionic Framework](https://ionicframework.com/)
