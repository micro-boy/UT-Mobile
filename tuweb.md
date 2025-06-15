# 📱 Ionic Framework untuk Pemula Absolut
### Tutorial Lengkap 2024-2025

---

## 📚 Daftar Isi

### [Bab 1: Memulai dengan Ionic](#bab-1-memulai-dengan-ionic)
- [Apa itu Ionic?](#-apa-itu-ionic)
- [Setup Environment](#-setup-environment)
- [Project Pertama: To-Do App](#-project-pertama-to-do-app)

### [Bab 2: Navigasi dan Deployment](#bab-2-navigasi-dan-deployment)
- [Membuat Multi-Page App](#-membuat-multi-page-app)
- [Styling dan Theming](#-styling-dan-theming)
- [Deploy ke Device](#-deploy-ke-device)

---

# Bab 1: Memulai dengan Ionic

## 🚀 Apa itu Ionic?

> **Ionic adalah toolkit UI yang memungkinkan kamu membuat aplikasi mobile menggunakan teknologi web (HTML, CSS, JavaScript) yang sudah familiar!**

### Kenapa Ionic? 🤔

| ✅ **Keuntungan** | ❌ **Keterbatasan** |
|-------------------|---------------------|
| Satu kode untuk iOS & Android | Performa sedikit lebih lambat dari native |
| Menggunakan teknologi web familiar | Akses terbatas ke fitur device tertentu |
| Lebih cepat dan murah dibanding native | Tampilan mungkin tidak 100% native feel |
| Bisa jadi web app juga (PWA) | Memerlukan learning curve untuk mobile UX |

### 🏗️ Bagaimana Ionic Bekerja?

```
📱 Your Web App (HTML/CSS/JS)
        ⬇️
🎨 Ionic UI Components
        ⬇️
⚡ Capacitor (Native Bridge)
        ⬇️
📲 Native iOS/Android App
```

---

## 🛠️ Setup Environment

### Prerequisites

Sebelum mulai, pastikan kamu punya:

- **Node.js** (versi 18 atau 20 LTS) ➡️ [Download di sini](https://nodejs.org)
- **Code Editor** (VS Code recommended) ➡️ [Download VS Code](https://code.visualstudio.com)
- **Git** untuk version control ➡️ [Download Git](https://git-scm.com)

### 🔧 Instalasi Step-by-Step

#### Step 1: Cek Node.js
```bash
node --version
npm --version
```
> Harus keluar versi angka, misal: `v20.9.0` dan `10.1.0`

#### Step 2: Install Ionic CLI
```bash
# Hapus instalasi lama (kalau ada)
npm uninstall -g ionic

# Install yang terbaru
npm install -g @ionic/cli
```

#### Step 3: Verifikasi Instalasi
```bash
ionic --version
ionic info
```

> 💡 **Tips**: Kalau dapat error permission, coba pakai `sudo` di Mac/Linux atau run command prompt sebagai Administrator di Windows

### 🎯 Template Project yang Tersedia

| Template | Cocok untuk | Difficulty |
|----------|-------------|------------|
| `blank` | Belajar dari nol | ⭐ |
| `tabs` | App dengan tab navigation | ⭐⭐ |
| `sidemenu` | App dengan side menu | ⭐⭐ |
| `list` | App dengan list data | ⭐⭐ |
| `conference` | Demo app lengkap | ⭐⭐⭐ |

---

## 📝 Project Pertama: To-Do App

Kita akan membuat aplikasi To-Do List sederhana yang bisa:
- ✅ Tambah task baru
- ✅ Mark task sebagai selesai
- ✅ Hapus task
- ✅ Simpan data di local storage

### 🚀 Langkah 1: Buat Project

```bash
# Buat project baru
ionic start MyTodoApp blank --type=angular --capacitor

# Masuk ke folder project
cd MyTodoApp

# Install dependencies tambahan untuk PWA
npm install @ionic/pwa-elements

# Jalankan aplikasi
ionic serve
```

> 🎉 **Selamat!** Browser akan terbuka di `http://localhost:8100` dan kamu akan melihat halaman Ionic pertamamu!

### 📁 Struktur Project

```
MyTodoApp/
├── src/
│   ├── app/
│   │   ├── home/           # Halaman utama kita
│   │   ├── app.module.ts   # Module utama
│   │   └── app.component.* # Component utama
│   ├── assets/             # Gambar, icon, dll
│   ├── theme/              # File styling
│   └── index.html          # File HTML utama
├── capacitor.config.ts     # Config untuk mobile
├── ionic.config.json       # Config Ionic
└── package.json           # Dependencies
```

### 🎨 Langkah 2: Buat Interface To-Do

Buka file `src/app/home/home.page.html` dan ganti semua isinya dengan:

```html
<ion-header [translucent]="true">
  <ion-toolbar color="primary">
    <ion-title>
      📝 My To-Do List
    </ion-title>
  </ion-toolbar>
</ion-header>

<ion-content [fullscreen]="true">
  <!-- Form untuk tambah task -->
  <div class="add-task-section">
    <ion-item>
      <ion-input 
        [(ngModel)]="newTask" 
        placeholder="Tulis task baru di sini..."
        (keyup.enter)="addTask()"
        clearInput="true">
      </ion-input>
      <ion-button 
        fill="clear" 
        slot="end" 
        (click)="addTask()"
        [disabled]="!newTask?.trim()">
        <ion-icon name="add-circle"></ion-icon>
      </ion-button>
    </ion-item>
  </div>

  <!-- Daftar task -->
  <ion-list>
    <ion-item-sliding *ngFor="let task of tasks; let i = index">
      <ion-item>
        <ion-checkbox 
          slot="start" 
          [(ngModel)]="task.completed"
          (ionChange)="toggleTask(i)">
        </ion-checkbox>
        
        <ion-label [class.completed]="task.completed">
          <h2>{{ task.text }}</h2>
          <p>{{ task.createdAt | date:'short' }}</p>
        </ion-label>
        
        <ion-chip *ngIf="task.completed" color="success">
          <ion-icon name="checkmark"></ion-icon>
          <ion-label>Selesai</ion-label>
        </ion-chip>
      </ion-item>
      
      <!-- Swipe untuk hapus -->
      <ion-item-options slot="end">
        <ion-item-option color="danger" (click)="deleteTask(i)">
          <ion-icon name="trash"></ion-icon>
          Hapus
        </ion-item-option>
      </ion-item-options>
    </ion-item-sliding>
  </ion-list>

  <!-- Kalau belum ada task -->
  <div *ngIf="tasks.length === 0" class="empty-state">
    <ion-icon name="clipboard-outline" size="large"></ion-icon>
    <h2>Belum ada task</h2>
    <p>Tambahkan task pertama kamu di atas! 👆</p>
  </div>

  <!-- Summary -->
  <div class="task-summary" *ngIf="tasks.length > 0">
    <ion-chip color="primary">
      <ion-icon name="stats-chart"></ion-icon>
      <ion-label>{{ getCompletedCount() }} / {{ tasks.length }} selesai</ion-label>
    </ion-chip>
    
    <ion-progress-bar 
      [value]="getCompletedCount() / tasks.length"
      color="success">
    </ion-progress-bar>
  </div>
</ion-content>
```

### 💻 Langkah 3: Logic Aplikasi

Sekarang edit file `src/app/home/home.page.ts`:

```typescript
import { Component } from '@angular/core';

// Interface untuk struktur data task
interface Task {
  text: string;
  completed: boolean;
  createdAt: Date;
}

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {
  newTask: string = '';
  tasks: Task[] = [];

  constructor() {
    // Load data saat aplikasi dimulai
    this.loadTasks();
  }

  // Fungsi untuk tambah task baru
  addTask() {
    if (this.newTask && this.newTask.trim()) {
      const task: Task = {
        text: this.newTask.trim(),
        completed: false,
        createdAt: new Date()
      };
      
      // Tambah di paling atas
      this.tasks.unshift(task);
      this.newTask = ''; // Clear input
      this.saveTasks(); // Simpan ke storage
      
      console.log('Task baru ditambahkan:', task.text);
    }
  }

  // Fungsi untuk toggle status task (selesai/belum)
  toggleTask(index: number) {
    if (this.tasks[index]) {
      this.tasks[index].completed = !this.tasks[index].completed;
      this.saveTasks();
      
      const status = this.tasks[index].completed ? 'selesai' : 'belum selesai';
      console.log(`Task "${this.tasks[index].text}" diubah jadi ${status}`);
    }
  }

  // Fungsi untuk hapus task
  deleteTask(index: number) {
    const deletedTask = this.tasks[index];
    this.tasks.splice(index, 1);
    this.saveTasks();
    
    console.log('Task dihapus:', deletedTask.text);
  }

  // Hitung berapa task yang sudah selesai
  getCompletedCount(): number {
    return this.tasks.filter(task => task.completed).length;
  }

  // Simpan data ke localStorage
  private saveTasks() {
    localStorage.setItem('todoTasks', JSON.stringify(this.tasks));
  }

  // Load data dari localStorage
  private loadTasks() {
    const saved = localStorage.getItem('todoTasks');
    if (saved) {
      this.tasks = JSON.parse(saved);
      // Convert string date kembali ke Date object
      this.tasks.forEach(task => {
        task.createdAt = new Date(task.createdAt);
      });
      
      console.log('Data dimuat:', this.tasks.length, 'tasks');
    }
  }
}
```

### 🎨 Langkah 4: Styling yang Menarik

Edit file `src/app/home/home.page.scss`:

```scss
// Styling untuk section tambah task
.add-task-section {
  padding: 16px;
  background: var(--ion-color-light);
  
  ion-item {
    --background: white;
    --border-radius: 12px;
    --border-color: var(--ion-color-primary);
    --border-style: solid;
    --border-width: 2px;
    margin-bottom: 8px;
    
    ion-input {
      font-size: 16px;
    }
    
    ion-button {
      margin: 0;
      
      ion-icon {
        font-size: 24px;
      }
    }
  }
}

// Styling untuk task yang sudah selesai
.completed {
  text-decoration: line-through;
  opacity: 0.6;
  color: var(--ion-color-medium);
}

// Styling untuk empty state
.empty-state {
  text-align: center;
  padding: 80px 20px;
  color: var(--ion-color-medium);
  
  ion-icon {
    margin-bottom: 24px;
    color: var(--ion-color-light);
  }
  
  h2 {
    font-size: 1.5rem;
    margin: 16px 0 8px 0;
    color: var(--ion-color-dark);
  }
  
  p {
    font-size: 1rem;
    line-height: 1.5;
  }
}

// Styling untuk summary
.task-summary {
  padding: 16px;
  text-align: center;
  background: var(--ion-color-light);
  margin-top: 16px;
  
  ion-chip {
    margin-bottom: 12px;
  }
  
  ion-progress-bar {
    height: 8px;
    border-radius: 4px;
  }
}

// Animasi untuk list items
ion-item-sliding {
  transition: all 0.3s ease;
  
  &:hover {
    --background: var(--ion-color-light);
  }
}

// Styling untuk checkbox
ion-checkbox {
  --size: 20px;
  --checkmark-color: white;
  --border-radius: 4px;
  margin-right: 12px;
}
```

### 🏃‍♂️ Langkah 5: Testing Aplikasi

```bash
# Pastikan server masih jalan
ionic serve
```

Sekarang coba:

1. **Tambah task baru** - ketik dan tekan Enter atau klik tombol +
2. **Mark task selesai** - klik checkbox
3. **Hapus task** - swipe ke kiri dan klik "Hapus"
4. **Reload halaman** - data tetap tersimpan!

> 🎉 **Congratulations!** Kamu sudah berhasil membuat aplikasi To-Do List pertama dengan Ionic!

### 🔧 Troubleshooting

**Problem: `ngModel` tidak dikenali**

Tambahkan `FormsModule` ke `src/app/home/home.module.ts`:

```typescript
import { FormsModule } from '@angular/forms';

@NgModule({
  imports: [
    CommonModule,
    FormsModule, // Tambahkan ini
    IonicModule,
    HomePageRoutingModule
  ],
  // ...
})
```

**Problem: Ionic serve tidak jalan**

```bash
# Kill process yang ada
npx kill-port 8100

# Coba lagi
ionic serve
```

---

# Bab 2: Navigasi dan Deployment

Sekarang kita akan upgrade aplikasi To-Do menjadi multi-page app dengan navigasi, dark mode, dan siap di-deploy ke device!

## 🧭 Membuat Multi-Page App

### Langkah 1: Generate Pages Baru

```bash
# Generate page untuk completed tasks
ionic generate page pages/completed-tasks

# Generate page untuk settings
ionic generate page pages/settings

# Generate page untuk about
ionic generate page pages/about
```

> 📁 **File baru akan dibuat** di folder `src/app/pages/`

### Langkah 2: Setup Tab Navigation

Kita akan ubah aplikasi menjadi tab-based navigation. Edit `src/app/app-routing.module.ts`:

```typescript
import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: '',
    redirectTo: '/tabs/home',
    pathMatch: 'full'
  },
  {
    path: 'tabs',
    loadChildren: () => import('./tabs/tabs.module').then(m => m.TabsPageModule)
  }
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule {}
```

### Langkah 3: Buat Tab Module

```bash
ionic generate page tabs
```

Edit `src/app/tabs/tabs-routing.module.ts`:

```typescript
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { TabsPage } from './tabs.page';

const routes: Routes = [
  {
    path: '',
    component: TabsPage,
    children: [
      {
        path: 'home',
        loadChildren: () => import('../home/home.module').then(m => m.HomePageModule)
      },
      {
        path: 'completed-tasks',
        loadChildren: () => import('../pages/completed-tasks/completed-tasks.module').then(m => m.CompletedTasksPageModule)
      },
      {
        path: 'settings',
        loadChildren: () => import('../pages/settings/settings.module').then(m => m.SettingsPageModule)
      },
      {
        path: '',
        redirectTo: '/tabs/home',
        pathMatch: 'full'
      }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class TabsPageRoutingModule {}
```

### Langkah 4: Tab Navigation UI

Edit `src/app/tabs/tabs.page.html`:

```html
<ion-tabs>
  <ion-tab-bar slot="bottom" color="primary">
    <ion-tab-button tab="home">
      <ion-icon name="list"></ion-icon>
      <ion-label>All Tasks</ion-label>
      <ion-badge *ngIf="getTotalTasks() > 0" color="danger">{{ getTotalTasks() }}</ion-badge>
    </ion-tab-button>
    
    <ion-tab-button tab="completed-tasks">
      <ion-icon name="checkmark-done"></ion-icon>
      <ion-label>Completed</ion-label>
      <ion-badge *ngIf="getCompletedTasks() > 0" color="success">{{ getCompletedTasks() }}</ion-badge>
    </ion-tab-button>
    
    <ion-tab-button tab="settings">
      <ion-icon name="settings"></ion-icon>
      <ion-label>Settings</ion-label>
    </ion-tab-button>
  </ion-tab-bar>
</ion-tabs>
```

Logic untuk tabs (`src/app/tabs/tabs.page.ts`):

```typescript
import { Component } from '@angular/core';

@Component({
  selector: 'app-tabs',
  templateUrl: 'tabs.page.html',
  styleUrls: ['tabs.page.scss']
})
export class TabsPage {
  
  getTotalTasks(): number {
    const tasks = JSON.parse(localStorage.getItem('todoTasks') || '[]');
    return tasks.filter((task: any) => !task.completed).length;
  }
  
  getCompletedTasks(): number {
    const tasks = JSON.parse(localStorage.getItem('todoTasks') || '[]');
    return tasks.filter((task: any) => task.completed).length;
  }
}
```

### 🎯 Langkah 5: Completed Tasks Page

Edit `src/app/pages/completed-tasks/completed-tasks.page.html`:

```html
<ion-header [translucent]="true">
  <ion-toolbar color="success">
    <ion-title>
      ✅ Completed Tasks
    </ion-title>
    <ion-buttons slot="end">
      <ion-button (click)="clearCompleted()" [disabled]="completedTasks.length === 0">
        <ion-icon name="trash"></ion-icon>
      </ion-button>
    </ion-buttons>
  </ion-toolbar>
</ion-header>

<ion-content [fullscreen]="true">
  <!-- List completed tasks -->
  <ion-list *ngIf="completedTasks.length > 0">
    <ion-item *ngFor="let task of completedTasks">
      <ion-avatar slot="start">
        <ion-icon name="checkmark-circle" color="success" size="large"></ion-icon>
      </ion-avatar>
      
      <ion-label>
        <h2>{{ task.text }}</h2>
        <p>Completed: {{ task.completedAt | date:'medium' }}</p>
        <p>Created: {{ task.createdAt | date:'short' }}</p>
      </ion-label>
      
      <ion-chip color="success" slot="end">
        <ion-icon name="trophy"></ion-icon>
        <ion-label>Done</ion-label>
      </ion-chip>
    </ion-item>
  </ion-list>

  <!-- Empty state -->
  <div *ngIf="completedTasks.length === 0" class="empty-state">
    <ion-icon name="trophy-outline" size="large"></ion-icon>
    <h2>No completed tasks yet</h2>
    <p>Complete some tasks to see your achievements here! 🏆</p>
    <ion-button routerLink="/tabs/home" fill="outline">
      <ion-icon name="add" slot="start"></ion-icon>
      Add Some Tasks
    </ion-button>
  </div>

  <!-- Stats -->
  <div *ngIf="completedTasks.length > 0" class="stats-section">
    <h3>📊 Your Stats</h3>
    <ion-grid>
      <ion-row>
        <ion-col size="6">
          <div class="stat-card">
            <h4>{{ completedTasks.length }}</h4>
            <p>Tasks Completed</p>
          </div>
        </ion-col>
        <ion-col size="6">
          <div class="stat-card">
            <h4>{{ getCompletionRate() }}%</h4>
            <p>Completion Rate</p>
          </div>
        </ion-col>
      </ion-row>
    </ion-grid>
  </div>
</ion-content>
```

Logic untuk completed tasks (`completed-tasks.page.ts`):

```typescript
import { Component, OnInit } from '@angular/core';
import { AlertController, ToastController } from '@ionic/angular';

interface Task {
  text: string;
  completed: boolean;
  createdAt: Date;
  completedAt?: Date;
}

@Component({
  selector: 'app-completed-tasks',
  templateUrl: './completed-tasks.page.html',
  styleUrls: ['./completed-tasks.page.scss'],
})
export class CompletedTasksPage implements OnInit {
  completedTasks: Task[] = [];
  allTasks: Task[] = [];

  constructor(
    private alertController: AlertController,
    private toastController: ToastController
  ) {}

  ngOnInit() {
    this.loadTasks();
  }

  ionViewWillEnter() {
    this.loadTasks();
  }

  loadTasks() {
    const saved = localStorage.getItem('todoTasks');
    if (saved) {
      this.allTasks = JSON.parse(saved);
      this.completedTasks = this.allTasks
        .filter(task => task.completed)
        .map(task => ({
          ...task,
          createdAt: new Date(task.createdAt),
          completedAt: task.completedAt ? new Date(task.completedAt) : new Date()
        }));
    }
  }

  async clearCompleted() {
    const alert = await this.alertController.create({
      header: 'Clear Completed Tasks',
      message: `Are you sure you want to delete ${this.completedTasks.length} completed tasks?`,
      buttons: [
        {
          text: 'Cancel',
          role: 'cancel'
        },
        {
          text: 'Delete',
          role: 'destructive',
          handler: () => {
            this.performClearCompleted();
          }
        }
      ]
    });

    await alert.present();
  }

  async performClearCompleted() {
    const remainingTasks = this.allTasks.filter(task => !task.completed);
    localStorage.setItem('todoTasks', JSON.stringify(remainingTasks));
    this.loadTasks();

    const toast = await this.toastController.create({
      message: `${this.completedTasks.length} completed tasks deleted`,
      duration: 2000,
      color: 'success'
    });
    toast.present();
  }

  getCompletionRate(): number {
    if (this.allTasks.length === 0) return 0;
    return Math.round((this.completedTasks.length / this.allTasks.length) * 100);
  }
}
```

---

## 🎨 Styling dan Theming

### Langkah 1: Settings Page dengan Dark Mode

Edit `src/app/pages/settings/settings.page.html`:

```html
<ion-header [translucent]="true">
  <ion-toolbar color="tertiary">
    <ion-title>
      ⚙️ Settings
    </ion-title>
  </ion-toolbar>
</ion-header>

<ion-content [fullscreen]="true">
  <ion-list>
    <!-- Theme Section -->
    <ion-list-header>
      <ion-label>🎨 Appearance</ion-label>
    </ion-list-header>
    
    <ion-item>
      <ion-icon name="moon" slot="start"></ion-icon>
      <ion-label>
        <h2>Dark Mode</h2>
        <p>Switch between light and dark theme</p>
      </ion-label>
      <ion-toggle 
        [(ngModel)]="darkMode" 
        (ionChange)="toggleDarkMode()"
        color="dark">
      </ion-toggle>
    </ion-item>

    <!-- Notifications Section -->
    <ion-list-header>
      <ion-label>🔔 Notifications</ion-label>
    </ion-list-header>
    
    <ion-item>
      <ion-icon name="notifications" slot="start"></ion-icon>
      <ion-label>
        <h2>Task Reminders</h2>
        <p>Get reminded about your tasks</p>
      </ion-label>
      <ion-toggle [(ngModel)]="notifications" color="primary"></ion-toggle>
    </ion-item>

    <!-- Data Section -->
    <ion-list-header>
      <ion-label>💾 Data Management</ion-label>
    </ion-list-header>
    
    <ion-item button (click)="exportData()">
      <ion-icon name="download" slot="start" color="primary"></ion-icon>
      <ion-label>
        <h2>Export Tasks</h2>
        <p>Download your tasks as JSON file</p>
      </ion-label>
      <ion-icon name="chevron-forward" slot="end"></ion-icon>
    </ion-item>

    <ion-item button (click)="clearAllData()">
      <ion-icon name="trash" slot="start" color="danger"></ion-icon>
      <ion-label>
        <h2>Clear All Data</h2>
        <p>Delete all tasks and settings</p>
      </ion-label>
      <ion-icon name="chevron-forward" slot="end"></ion-icon>
    </ion-item>

    <!-- About Section -->
    <ion-list-header>
      <ion-label>ℹ️ About</ion-label>
    </ion-list-header>
    
    <ion-item button routerLink="/about">
      <ion-icon name="information-circle" slot="start" color="tertiary"></ion-icon>
      <ion-label>
        <h2>About This App</h2>
        <p>Version 1.0.0 - Learn more</p>
      </ion-label>
      <ion-icon name="chevron-forward" slot="end"></ion-icon>
    </ion-item>
  </ion-list>

  <!-- App Info -->
  <div class="app-info">
    <p>Made with ❤️ using Ionic Framework</p>
    <p>Version 1.0.0</p>
  </div>
</ion-content>
```

Logic untuk settings (`settings.page.ts`):

```typescript
import { Component, OnInit } from '@angular/core';
import { AlertController, ToastController } from '@ionic/angular';

@Component({
  selector: 'app-settings',
  templateUrl: './settings.page.html',
  styleUrls: ['./settings.page.scss'],
})
export class SettingsPage implements OnInit {
  darkMode: boolean = false;
  notifications: boolean = true;

  constructor(
    private alertController: AlertController,
    private toastController: ToastController
  ) {}

  ngOnInit() {
    // Load saved settings
    const savedTheme = localStorage.getItem('darkMode');
    this.darkMode = savedTheme === 'true';
    this.applyTheme();

    const savedNotifications = localStorage.getItem('notifications');
    this.notifications = savedNotifications !== 'false';
  }

  toggleDarkMode() {
    localStorage.setItem('darkMode', this.darkMode.toString());
    this.applyTheme();
    this.showToast(`Dark mode ${this.darkMode ? 'enabled' : 'disabled'}`);
  }

  private applyTheme() {
    document.body.classList.toggle('dark', this.darkMode);
  }

  async exportData() {
    const tasks = localStorage.getItem('todoTasks');
    if (tasks) {
      const dataStr = JSON.stringify(JSON.parse(tasks), null, 2);
      const dataBlob = new Blob([dataStr], {type: 'application/json'});
      
      // Create download link
      const url = URL.createObjectURL(dataBlob);
      const link = document.createElement('a');
      link.href = url;
      link.download = 'my-tasks.json';
      link.click();
      
      this.showToast('Tasks exported successfully!');
    } else {
      this.showToast('No tasks to export');
    }
  }

  async clearAllData() {
    const alert = await this.alertController.create({
      header: 'Clear All Data',
      message: 'This will delete all your tasks and settings. This action cannot be undone.',
      buttons: [
        {
          text: 'Cancel',
          role: 'cancel'
        },
        {
          text: 'Delete Everything',
          role: 'destructive',
          handler: () => {
            localStorage.clear();
            this.showToast('All data cleared');
          }
        }
      ]
    });

    await alert.present();
  }

  private async showToast(message: string) {
    const toast = await this.toastController.create({
      message,
      duration: 2000,
      position: 'bottom'
    });
    toast.present();
  }
}
```

### Langkah 2: Custom Theme Colors

Edit `src/theme/variables.scss`:

```scss
// Ionic Variables and Theming
// Custom color palette
:root {
  /** Primary color - Main brand color **/
  --ion-color-primary: #3880ff;
  --ion-color-primary-rgb: 56, 128, 255;
  --ion-color-primary-contrast: #ffffff;
  --ion-color-primary-contrast-rgb: 255, 255, 255;
  --ion-color-primary-shade: #3171e0;
  --ion-color-primary-tint: #4c8dff;

  /** Success color - For completed tasks **/
  --ion-color-success: #2dd36f;
  --ion-color-success-rgb: 45, 211, 111;
  --ion-color-success-contrast: #ffffff;
  --ion-color-success-contrast-rgb: 255, 255, 255;
  --ion-color-success-shade: #28ba62;
  --ion-color-success-tint: #42d77d;

  /** Custom task-complete color **/
  --ion-color-task-complete: #10dc60;
  --ion-color-task-complete-rgb: 16, 220, 96;
  --ion-color-task-complete-contrast: #ffffff;
  --ion-color-task-complete-contrast-rgb: 255, 255, 255;
  --ion-color-task-complete-shade: #0ec254;
  --ion-color-task-complete-tint: #28e070;

  // Global styling
  --ion-font-family: -apple-system, BlinkMacSystemFont, 'Helvetica Neue', 'Roboto', sans-serif;
}

// Dark theme
.dark {
  --ion-color-primary: #428cff;
  --ion-color-primary-rgb: 66, 140, 255;
  --ion-color-primary-contrast: #ffffff;
  --ion-color-primary-contrast-rgb: 255, 255, 255;
  --ion-color-primary-shade: #3a7be0;
  --ion-color-primary-tint: #5598ff;

  --ion-background-color: #0d1117;
  --ion-background-color-rgb: 13, 17, 23;

  --ion-text-color: #ffffff;
  --ion-text-color-rgb: 255, 255, 255;

  --ion-color-step-50: #1c2128;
  --ion-color-step-100: #2d333b;
  --ion-color-step-150: #373e47;
  --ion-color-step-200: #444c56;
  --ion-color-step-250: #545d68;
  --ion-color-step-300: #636e7b;
  --ion-color-step-350: #7d8590;
  --ion-color-step-400: #8b949e;
  --ion-color-step-450: #a2a9b1;
  --ion-color-step-500: #b1bac4;
  --ion-color-step-550: #c9d1d9;
  --ion-color-step-600: #e1e4e8;
  --ion-color-step-650: #f0f6fc;
  --ion-color-step-700: #f7f8fa;
  --ion-color-step-750: #ffffff;
  --ion-color-step-800: #ffffff;
  --ion-color-step-850: #ffffff;
  --ion-color-step-900: #ffffff;
  --ion-color-step-950: #ffffff;

  --ion-item-background: var(--ion-color-step-100);
  --ion-card-background: var(--ion-color-step-100);
}

// Custom global styles
.empty-state {
  text-align: center;
  padding: 40px 20px;
  
  ion-icon {
    font-size: 64px;
    color: var(--ion-color-medium);
    margin-bottom: 16px;
  }
  
  h2 {
    color: var(--ion-color-dark);
    margin: 16px 0 8px 0;
  }
  
  p {
    color: var(--ion-color-medium);
    line-height: 1.5;
  }
}

.stats-section {
  padding: 20px;
  
  h3 {
    text-align: center;
    margin-bottom: 20px;
    color: var(--ion-color-primary);
  }
  
  .stat-card {
    background: var(--ion-color-light);
    padding: 20px;
    border-radius: 12px;
    text-align: center;
    
    h4 {
      font-size: 2rem;
      margin: 0 0 8px 0;
      color: var(--ion-color-primary);
    }
    
    p {
      margin: 0;
      color: var(--ion-color-medium);
      font-size: 0.9rem;
    }
  }
}

.app-info {
  text-align: center;
  padding: 40px 20px;
  color: var(--ion-color-medium);
  
  p {
    margin: 4px 0;
    font-size: 0.9rem;
  }
}
```

---

## 📱 Deploy ke Device

### Langkah 1: Build untuk Production

```bash
# Build aplikasi untuk production
ionic build --prod
```

> 📁 **Hasil build** akan tersimpan di folder `www/`

### Langkah 2: Deploy ke Browser (PWA)

Untuk deploy sebagai Progressive Web App:

```bash
# Install PWA elements (kalau belum)
npm install @ionic/pwa-elements

# Build PWA
ionic build --prod --service-worker

# Upload folder www/ ke hosting:
# - Netlify: drag & drop folder www/
# - Vercel: gunakan CLI vercel
# - Firebase: firebase deploy
```

**Deploy ke Netlify (termudah):**
1. Drag & drop folder `www/` ke [netlify.com/drop](https://netlify.com/drop)
2. Aplikasi langsung live dengan URL unik!

### Langkah 3: Deploy ke Android

```bash
# Tambah platform Android
ionic capacitor add android

# Build dan sync ke platform Android
ionic capacitor build android

# Buka di Android Studio
ionic capacitor open android
```

**Di Android Studio:**
1. Tunggu gradle sync selesai
2. Connect device Android via USB (enable USB debugging)
3. Klik ▶️ Run untuk install ke device
4. Atau klik **Build > Build Bundle(s) / APK(s) > Build APK(s)** untuk generate APK

### Langkah 4: Deploy ke iOS (Mac only)

```bash
# Tambah platform iOS
ionic capacitor add ios

# Build dan sync ke platform iOS
ionic capacitor build ios

# Buka di Xcode
ionic capacitor open ios
```

**Di Xcode:**
1. Select development team (perlu Apple Developer Account)
2. Connect iPhone/iPad via USB
3. Klik ▶️ Run untuk install ke device

### 🔧 Troubleshooting Deploy

**Problem: Gradle build failed (Android)**
```bash
# Update Android SDK di Android Studio
# Tools > SDK Manager > Update all

# Clean dan rebuild
cd android
./gradlew clean
cd ..
ionic capacitor build android
```

**Problem: iOS build failed**
```bash
# Update iOS dependencies
cd ios/App
pod install
cd ../..
ionic capacitor build ios
```

**Problem: App tidak loading di device**
- Pastikan `ionic build --prod` sukses
- Check network connectivity di device
- Enable developer mode di device

---

## 🎉 Selamat!

Kamu sudah berhasil membuat aplikasi Ionic lengkap dengan:

✅ **Multi-page navigation** dengan tabs  
✅ **Dark mode** toggle  
✅ **Local storage** untuk menyimpan data  
✅ **Responsive design** yang cantik  
✅ **Deploy ke device** Android/iOS  

### 🚀 Langkah Selanjutnya

1. **Add more features**: Search, categories, due dates
2. **Learn state management**: NgRx untuk Angular
3. **Add native features**: Push notifications, camera
4. **Backend integration**: Firebase, REST APIs
5. **Testing**: Unit tests dengan Jest
6. **Performance**: Lazy loading, virtual scrolling

### 📚 Resources untuk Belajar Lebih

- **Official Docs**: [ionicframework.com/docs](https://ionicframework.com/docs)
- **Ionic Blog**: Tips dan tutorial terbaru
- **GitHub**: Explore open source Ionic projects
- **Capacitor Plugins**: [capacitorjs.com/docs/plugins](https://capacitorjs.com/docs/plugins)

> 💡 **Pro tip**: Join komunitas Ionic di Discord atau Forum untuk bertanya dan sharing!

**Happy coding! 🚀📱**
