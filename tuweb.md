# 🚀 Tutorial Ionic React To-Do App - Step by Step

## 📋 Table of Contents
1. [Setup Project](#1-setup-project)
2. [Struktur Folder](#2-struktur-folder)
3. [Ionic Components](#3-ionic-components)
4. [State Management](#4-state-management)
5. [Local Storage](#5-local-storage)
6. [UI Components](#6-ui-components)
7. [CRUD Operations](#7-crud-operations)
8. [Filter & Search](#8-filter--search)
9. [Styling & Theme](#9-styling--theme)
10. [Build & Deploy](#10-build--deploy)

---

## 1. Setup Project

### 1.1 Install Prerequisites
```bash
# Install Node.js (versi 16 atau lebih baru)
# Download dari: https://nodejs.org

# Install Ionic CLI
npm install -g @ionic/cli

# Install Capacitor CLI (untuk mobile)
npm install -g @capacitor/cli
```

### 1.2 Create New Project
```bash
# Buat project baru
ionic start TodoApp tabs --type=react --capacitor

# Masuk ke folder project
cd TodoApp

# Install dependencies tambahan
npm install @ionic/react @ionic/react-router ionicons
npm install @types/react @types/react-dom
```

### 1.3 Run Development Server
```bash
# Jalankan development server
ionic serve

# Atau dengan port tertentu
ionic serve --port 8100
```

---

## 2. Struktur Folder

### 2.1 Struktur Project Ionic
```
TodoApp/
├── src/
│   ├── components/          # Komponen reusable
│   ├── pages/              # Halaman aplikasi
│   ├── hooks/              # Custom React hooks
│   ├── services/           # API services
│   ├── theme/              # CSS variables dan styling
│   ├── types/              # TypeScript interfaces
│   ├── App.tsx             # Root component
│   └── index.tsx           # Entry point
├── public/                 # Static assets
├── capacitor.config.ts     # Capacitor configuration
├── ionic.config.json       # Ionic configuration
└── package.json            # Dependencies
```

### 2.2 File Structure untuk Todo App
```
src/
├── components/
│   ├── TaskItem.tsx        # Komponen individual task
│   ├── TaskModal.tsx       # Modal untuk add/edit task
│   ├── SearchBar.tsx       # Komponen search
│   └── FilterTabs.tsx      # Tab filter
├── pages/
│   └── TodoPage.tsx        # Main page
├── hooks/
│   ├── useTasks.tsx        # Hook untuk task management
│   └── useLocalStorage.tsx # Hook untuk local storage
├── types/
│   └── Task.ts             # Interface Task
└── theme/
    └── variables.css       # Custom CSS variables
```

---

## 3. Ionic Components

### 3.1 Core Components yang Digunakan

#### IonApp
```tsx
import { IonApp, setupIonicReact } from '@ionic/react';

// Setup Ionic
setupIonicReact();

const App: React.FC = () => (
  <IonApp>
    {/* Content goes here */}
  </IonApp>
);
```

#### IonPage Structure
```tsx
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent } from '@ionic/react';

const TodoPage: React.FC = () => (
  <IonPage>
    <IonHeader>
      <IonToolbar color="primary">
        <IonTitle>My Todo List</IonTitle>
      </IonToolbar>
    </IonHeader>
    <IonContent>
      {/* Page content */}
    </IonContent>
  </IonPage>
);
```

#### IonList & IonItem
```tsx
import { IonList, IonItem, IonLabel, IonCheckbox } from '@ionic/react';

<IonList>
  <IonItem>
    <IonCheckbox slot="start" />
    <IonLabel>
      <h2>Task Title</h2>
      <p>Task Description</p>
    </IonLabel>
  </IonItem>
</IonList>
```

### 3.2 Navigation Components
```tsx
import { IonSegment, IonSegmentButton, IonLabel } from '@ionic/react';

<IonSegment value={filter} onIonChange={(e) => setFilter(e.detail.value)}>
  <IonSegmentButton value="all">
    <IonLabel>All</IonLabel>
  </IonSegmentButton>
  <IonSegmentButton value="pending">
    <IonLabel>Pending</IonLabel>
  </IonSegmentButton>
</IonSegment>
```

---

## 4. State Management

### 4.1 useState untuk Local State
```tsx
import React, { useState } from 'react';

interface Task {
  id: string;
  title: string;
  description: string;
  completed: boolean;
  category: string;
  priority: 'low' | 'medium' | 'high';
  dueDate: string;
  createdAt: string;
  favorite: boolean;
}

const TodoPage: React.FC = () => {
  // State untuk tasks
  const [tasks, setTasks] = useState<Task[]>([]);
  
  // State untuk UI
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [editingTask, setEditingTask] = useState<Task | null>(null);
  const [searchTerm, setSearchTerm] = useState('');
  const [filter, setFilter] = useState('all');
  
  // State untuk form
  const [title, setTitle] = useState('');
  const [description, setDescription] = useState('');
  const [category, setCategory] = useState('personal');
  const [priority, setPriority] = useState<'low' | 'medium' | 'high'>('medium');
  const [dueDate, setDueDate] = useState('');
  
  // ... rest of component
};
```

### 4.2 Custom Hook untuk Tasks
```tsx
// hooks/useTasks.tsx
import { useState, useEffect } from 'react';
import { Task } from '../types/Task';

export const useTasks = () => {
  const [tasks, setTasks] = useState<Task[]>([]);

  // Load tasks from localStorage
  useEffect(() => {
    const savedTasks = localStorage.getItem('ionic-todo-tasks');
    if (savedTasks) {
      setTasks(JSON.parse(savedTasks));
    }
  }, []);

  // Save tasks to localStorage
  useEffect(() => {
    localStorage.setItem('ionic-todo-tasks', JSON.stringify(tasks));
  }, [tasks]);

  // CRUD operations
  const addTask = (taskData: Omit<Task, 'id' | 'createdAt' | 'completed' | 'favorite'>) => {
    const newTask: Task = {
      id: Date.now().toString(),
      ...taskData,
      completed: false,
      createdAt: new Date().toISOString(),
      favorite: false,
    };
    setTasks(prev => [...prev, newTask]);
  };

  const updateTask = (id: string, updates: Partial<Task>) => {
    setTasks(prev => prev.map(task => 
      task.id === id ? { ...task, ...updates } : task
    ));
  };

  const deleteTask = (id: string) => {
    setTasks(prev => prev.filter(task => task.id !== id));
  };

  const toggleTask = (id: string) => {
    updateTask(id, { completed: !tasks.find(t => t.id === id)?.completed });
  };

  const toggleFavorite = (id: string) => {
    updateTask(id, { favorite: !tasks.find(t => t.id === id)?.favorite });
  };

  return {
    tasks,
    addTask,
    updateTask,
    deleteTask,
    toggleTask,
    toggleFavorite
  };
};
```

---

## 5. Local Storage

### 5.1 Custom Hook untuk Local Storage
```tsx
// hooks/useLocalStorage.tsx
import { useState, useEffect } from 'react';

export function useLocalStorage<T>(key: string, initialValue: T) {
  // Get value from localStorage or use initial value
  const [storedValue, setStoredValue] = useState<T>(() => {
    try {
      const item = window.localStorage.getItem(key);
      return item ? JSON.parse(item) : initialValue;
    } catch (error) {
      console.error(`Error reading localStorage key "${key}":`, error);
      return initialValue;
    }
  });

  // Function to set value
  const setValue = (value: T | ((val: T) => T)) => {
    try {
      // Allow value to be a function so we have the same API as useState
      const valueToStore = value instanceof Function ? value(storedValue) : value;
      setStoredValue(valueToStore);
      window.localStorage.setItem(key, JSON.stringify(valueToStore));
    } catch (error) {
      console.error(`Error setting localStorage key "${key}":`, error);
    }
  };

  return [storedValue, setValue] as const;
}

// Penggunaan:
const [tasks, setTasks] = useLocalStorage<Task[]>('ionic-todo-tasks', []);
```

### 5.2 Implementasi Backup & Restore
```tsx
// Export data ke JSON
const exportTasks = () => {
  const dataStr = JSON.stringify(tasks, null, 2);
  const dataBlob = new Blob([dataStr], { type: 'application/json' });
  const url = URL.createObjectURL(dataBlob);
  
  const link = document.createElement('a');
  link.href = url;
  link.download = `todo-backup-${new Date().toISOString().split('T')[0]}.json`;
  link.click();
  
  URL.revokeObjectURL(url);
};

// Import data dari JSON
const importTasks = (event: React.ChangeEvent<HTMLInputElement>) => {
  const file = event.target.files?.[0];
  if (!file) return;

  const reader = new FileReader();
  reader.onload = (e) => {
    try {
      const importedTasks = JSON.parse(e.target?.result as string);
      setTasks(importedTasks);
    } catch (error) {
      alert('Error importing file');
    }
  };
  reader.readAsText(file);
};
```

---

## 6. UI Components

### 6.1 Task Item Component
```tsx
// components/TaskItem.tsx
import React from 'react';
import {
  IonItem,
  IonLabel,
  IonCheckbox,
  IonButton,
  IonIcon,
  IonChip,
  IonItemSliding,
  IonItemOptions,
  IonItemOption
} from '@ionic/react';
import { create, trash, star, starOutline } from 'ionicons/icons';
import { Task } from '../types/Task';

interface TaskItemProps {
  task: Task;
  onToggle: (id: string) => void;
  onEdit: (task: Task) => void;
  onDelete: (id: string) => void;
  onToggleFavorite: (id: string) => void;
}

export const TaskItem: React.FC<TaskItemProps> = ({
  task,
  onToggle,
  onEdit,
  onDelete,
  onToggleFavorite
}) => {
  const getPriorityColor = (priority: string) => {
    switch (priority) {
      case 'high': return 'danger';
      case 'medium': return 'warning';
      case 'low': return 'success';
      default: return 'medium';
    }
  };

  const formatDate = (dateString: string) => {
    if (!dateString) return '';
    return new Date(dateString).toLocaleDateString('id-ID');
  };

  const isOverdue = () => {
    if (!task.dueDate || task.completed) return false;
    return new Date(task.dueDate) < new Date();
  };

  return (
    <IonItemSliding>
      <IonItem button onClick={() => onToggle(task.id)}>
        <IonCheckbox
          checked={task.completed}
          onIonChange={() => onToggle(task.id)}
          slot="start"
        />
        <IonLabel className="ion-text-wrap">
          <h2 style={{
            textDecoration: task.completed ? 'line-through' : 'none',
            opacity: task.completed ? 0.6 : 1
          }}>
            {task.title}
            {task.favorite && (
              <IonIcon
                icon={star}
                color="warning"
                style={{ marginLeft: '8px' }}
              />
            )}
          </h2>
          {task.description && (
            <p style={{ opacity: task.completed ? 0.6 : 0.8 }}>
              {task.description}
            </p>
          )}
          <div style={{ display: 'flex', gap: '8px', marginTop: '4px' }}>
            <IonChip color="primary" size="small">
              <IonLabel>{task.category}</IonLabel>
            </IonChip>
            <IonChip color={getPriorityColor(task.priority)} size="small">
              <IonLabel>{task.priority}</IonLabel>
            </IonChip>
            {task.dueDate && (
              <IonChip color={isOverdue() ? 'danger' : 'medium'} size="small">
                <IonLabel>{formatDate(task.dueDate)}</IonLabel>
              </IonChip>
            )}
          </div>
        </IonLabel>
        <IonButton
          fill="clear"
          color={task.favorite ? 'warning' : 'medium'}
          onClick={(e) => {
            e.stopPropagation();
            onToggleFavorite(task.id);
          }}
        >
          <IonIcon icon={task.favorite ? star : starOutline} />
        </IonButton>
      </IonItem>

      <IonItemOptions side="end">
        <IonItemOption color="primary" onClick={() => onEdit(task)}>
          <IonIcon icon={create} />
          Edit
        </IonItemOption>
        <IonItemOption color="danger" onClick={() => onDelete(task.id)}>
          <IonIcon icon={trash} />
          Delete
        </IonItemOption>
      </IonItemOptions>
    </IonItemSliding>
  );
};
```

### 6.2 Task Modal Component
```tsx
// components/TaskModal.tsx
import React, { useState, useEffect } from 'react';
import {
  IonModal,
  IonHeader,
  IonToolbar,
  IonTitle,
  IonContent,
  IonItem,
  IonLabel,
  IonInput,
  IonTextarea,
  IonSelect,
  IonSelectOption,
  IonDatetime,
  IonButton,
  IonButtons,
  IonIcon
} from '@ionic/react';
import { close, checkmark } from 'ionicons/icons';
import { Task } from '../types/Task';

interface TaskModalProps {
  isOpen: boolean;
  task?: Task | null;
  onSave: (taskData: any) => void;
  onClose: () => void;
}

export const TaskModal: React.FC<TaskModalProps> = ({
  isOpen,
  task,
  onSave,
  onClose
}) => {
  const [title, setTitle] = useState('');
  const [description, setDescription] = useState('');
  const [category, setCategory] = useState('personal');
  const [priority, setPriority] = useState<'low' | 'medium' | 'high'>('medium');
  const [dueDate, setDueDate] = useState('');

  const categories = ['personal', 'work', 'shopping', 'health', 'study'];

  useEffect(() => {
    if (task) {
      setTitle(task.title);
      setDescription(task.description);
      setCategory(task.category);
      setPriority(task.priority);
      setDueDate(task.dueDate);
    } else {
      resetForm();
    }
  }, [task]);

  const resetForm = () => {
    setTitle('');
    setDescription('');
    setCategory('personal');
    setPriority('medium');
    setDueDate('');
  };

  const handleSave = () => {
    if (!title.trim()) return;

    onSave({
      title: title.trim(),
      description: description.trim(),
      category,
      priority,
      dueDate,
    });

    resetForm();
    onClose();
  };

  const handleClose = () => {
    resetForm();
    onClose();
  };

  return (
    <IonModal isOpen={isOpen} onDidDismiss={handleClose}>
      <IonHeader>
        <IonToolbar>
          <IonTitle>{task ? 'Edit Task' : 'Add New Task'}</IonTitle>
          <IonButtons slot="end">
            <IonButton onClick={handleClose}>
              <IonIcon icon={close} />
            </IonButton>
          </IonButtons>
        </IonToolbar>
      </IonHeader>
      
      <IonContent className="ion-padding">
        <IonItem>
          <IonLabel position="stacked">Title *</IonLabel>
          <IonInput
            value={title}
            onIonInput={(e) => setTitle(e.detail.value!)}
            placeholder="Enter task title"
            required
          />
        </IonItem>

        <IonItem>
          <IonLabel position="stacked">Description</IonLabel>
          <IonTextarea
            value={description}
            onIonInput={(e) => setDescription(e.detail.value!)}
            placeholder="Enter task description"
            rows={3}
          />
        </IonItem>

        <IonItem>
          <IonLabel position="stacked">Category</IonLabel>
          <IonSelect
            value={category}
            onSelectionChange={(e) => setCategory(e.detail.value)}
          >
            {categories.map(cat => (
              <IonSelectOption key={cat} value={cat}>
                {cat.charAt(0).toUpperCase() + cat.slice(1)}
              </IonSelectOption>
            ))}
          </IonSelect>
        </IonItem>

        <IonItem>
          <IonLabel position="stacked">Priority</IonLabel>
          <IonSelect
            value={priority}
            onSelectionChange={(e) => setPriority(e.detail.value)}
          >
            <IonSelectOption value="low">Low</IonSelectOption>
            <IonSelectOption value="medium">Medium</IonSelectOption>
            <IonSelectOption value="high">High</IonSelectOption>
          </IonSelect>
        </IonItem>

        <IonItem>
          <IonLabel position="stacked">Due Date</IonLabel>
          <IonDatetime
            value={dueDate}
            onIonChange={(e) => setDueDate(e.detail.value as string)}
            presentation="date"
            min={new Date().toISOString()}
          />
        </IonItem>

        <IonButton
          expand="block"
          onClick={handleSave}
          disabled={!title.trim()}
          className="ion-margin-top"
        >
          <IonIcon icon={checkmark} slot="start" />
          {task ? 'Update Task' : 'Add Task'}
        </IonButton>
      </IonContent>
    </IonModal>
  );
};
```

---

## 7. CRUD Operations

### 7.1 Create (Add Task)
```tsx
const addTask = (taskData: Omit<Task, 'id' | 'createdAt' | 'completed' | 'favorite'>) => {
  const newTask: Task = {
    id: Date.now().toString(), // Generate unique ID
    ...taskData,
    completed: false,
    createdAt: new Date().toISOString(),
    favorite: false,
  };
  setTasks(prev => [...prev, newTask]);
};
```

### 7.2 Read (Get/Filter Tasks)
```tsx
const getFilteredTasks = (searchTerm: string, filter: string) => {
  return tasks.filter(task => {
    // Search filter
    const matchesSearch = task.title.toLowerCase().includes(searchTerm.toLowerCase()) ||
                         task.description.toLowerCase().includes(searchTerm.toLowerCase());
    
    // Status filter
    switch (filter) {
      case 'completed':
        return matchesSearch && task.completed;
      case 'pending':
        return matchesSearch && !task.completed;
      case 'favorites':
        return matchesSearch && task.favorite;
      default:
        return matchesSearch;
    }
  });
};
```

### 7.3 Update (Edit Task)
```tsx
const updateTask = (id: string, updates: Partial<Task>) => {
  setTasks(prev => prev.map(task => 
    task.id === id ? { ...task, ...updates } : task
  ));
};

// Usage examples:
const toggleCompleted = (id: string) => {
  const task = tasks.find(t => t.id === id);
  if (task) {
    updateTask(id, { completed: !task.completed });
  }
};

const editTask = (id: string, newData: Partial<Task>) => {
  updateTask(id, newData);
};
```

### 7.4 Delete (Remove Task)
```tsx
const deleteTask = (id: string) => {
  setTasks(prev => prev.filter(task => task.id !== id));
};

// With confirmation
const deleteTaskWithConfirm = (id: string) => {
  const task = tasks.find(t => t.id === id);
  if (task && window.confirm(`Delete "${task.title}"?`)) {
    deleteTask(id);
  }
};
```

---

## 8. Filter & Search

### 8.1 Search Implementation
```tsx
const [searchTerm, setSearchTerm] = useState('');

// Search component
<IonSearchbar
  value={searchTerm}
  onIonInput={(e) => setSearchTerm(e.detail.value!)}
  placeholder="Search tasks..."
  showClearButton="focus"
  debounce={300} // Delay search untuk performance
/>

// Filter function
const searchTasks = (tasks: Task[], searchTerm: string) => {
  if (!searchTerm.trim()) return tasks;
  
  const term = searchTerm.toLowerCase();
  return tasks.filter(task => 
    task.title.toLowerCase().includes(term) ||
    task.description.toLowerCase().includes(term) ||
    task.category.toLowerCase().includes(term)
  );
};
```

### 8.2 Advanced Filtering
```tsx
interface FilterOptions {
  status: 'all' | 'completed' | 'pending';
  category: string;
  priority: string;
  dateRange: {
    start: string;
    end: string;
  };
}

const applyFilters = (tasks: Task[], filters: FilterOptions) => {
  return tasks.filter(task => {
    // Status filter
    if (filters.status === 'completed' && !task.completed) return false;
    if (filters.status === 'pending' && task.completed) return false;
    
    // Category filter
    if (filters.category !== 'all' && task.category !== filters.category) return false;
    
    // Priority filter
    if (filters.priority !== 'all' && task.priority !== filters.priority) return false;
    
    // Date range filter
    if (filters.dateRange.start && task.dueDate) {
      if (new Date(task.dueDate) < new Date(filters.dateRange.start)) return false;
    }
    if (filters.dateRange.end && task.dueDate) {
      if (new Date(task.dueDate) > new Date(filters.dateRange.end)) return false;
    }
    
    return true;
  });
};
```

### 8.3 Sorting
```tsx
type SortOption = 'created' | 'priority' | 'dueDate' | 'alphabetical';

const sortTasks = (tasks: Task[], sortBy: SortOption) => {
  return [...tasks].sort((a, b) => {
    switch (sortBy) {
      case 'priority':
        const priorityOrder = { high: 3, medium: 2, low: 1 };
        return priorityOrder[b.priority] - priorityOrder[a.priority];
        
      case 'dueDate':
        if (!a.dueDate && !b.dueDate) return 0;
        if (!a.dueDate) return 1;
        if (!b.dueDate) return -1;
        return new Date(a.dueDate).getTime() - new Date(b.dueDate).getTime();
        
      case 'alphabetical':
        return a.title.localeCompare(b.title);
        
      default: // created
        return new Date(b.createdAt).getTime() - new Date(a.createdAt).getTime();
    }
  });
};
```

---

## 9. Styling & Theme

### 9.1 CSS Variables (theme/variables.css)
```css
:root {
  /* Primary colors */
  --ion-color-primary: #3880ff;
  --ion-color-primary-rgb: 56, 128, 255;
  --ion-color-primary-contrast: #ffffff;
  --ion-color-primary-contrast-rgb: 255, 255, 255;
  --ion-color-primary-shade: #3171e0;
  --ion-color-primary-tint: #4c8dff;

  /* Secondary colors */
  --ion-color-secondary: #3dc2ff;
  --ion-color-secondary-rgb: 61, 194, 255;
  --ion-color-secondary-contrast: #ffffff;
  --ion-color-secondary-contrast-rgb: 255, 255, 255;
  --ion-color-secondary-shade: #36abe0;
  --ion-color-secondary-tint: #50c8ff;

  /* Dark theme colors */
  --ion-color-dark: #222428;
  --ion-color-dark-rgb: 34, 36, 40;
  --ion-color-dark-contrast: #ffffff;
  --ion-color-dark-contrast-rgb: 255, 255, 255;
  --ion-color-dark-shade: #1e2023;
  --ion-color-dark-tint: #383a3e;
}

/* Custom task priority colors */
.task-priority-high {
  --ion-color-base: #ff4961;
  --ion-color-base-rgb: 255, 73, 97;
  --ion-color-contrast: #ffffff;
}

.task-priority-medium {
  --ion-color-base: #ffce00;
  --ion-color-base-rgb: 255, 206, 0;
  --ion-color-contrast: #000000;
}

.task-priority-low {
  --ion-color-base: #2dd36f;
  --ion-color-base-rgb: 45, 211, 111;
  --ion-color-contrast: #ffffff;
}
```

### 9.2 Component Styling
```scss
// Custom SCSS untuk task item
.task-item {
  &.completed {
    .task-title {
      text-decoration: line-through;
      opacity: 0.6;
    }
  }

  &.overdue {
    border-left: 4px solid var(--ion-color-danger);
  }

  &.favorite {
    background: linear-gradient(45deg, 
      var(--ion-color-warning-tint) 0%, 
      transparent 10%
    );
  }
}

// Statistics cards
.stats-card {
  background: linear-gradient(135deg, 
    var(--ion-color-primary) 0%, 
    var(--ion-color-secondary) 100%
  );
  color: white;
  border-radius: 12px;
  padding: 1rem;
  text-align: center;

  .stats-number {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
  }

  .stats-label {
    font-size: 0.9rem;
    opacity: 0.8;
  }
}
```

### 9.3 Dark Mode Support
```tsx
// hooks/useDarkMode.tsx
import { useEffect, useState } from 'react';

export const useDarkMode = () => {
  const [isDarkMode, setIsDarkMode] = useState(false);

  useEffect(() => {
    // Check system preference
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)');
    setIsDarkMode(prefersDark.matches);

    // Listen for changes
    const handleChange = (e: MediaQueryListEvent) => {
      setIsDarkMode(e.matches);
    };

    prefersDark.addEventListener('change', handleChange);
    return () => prefersDark.removeEventListener('change', handleChange);
  }, []);

  useEffect(() => {
    // Apply dark class to body
    document.body.classList.toggle('dark', isDarkMode);
  }, [isDarkMode]);

  return [isDarkMode, setIsDarkMode] as const;
};

// Usage in App component
const App: React.FC = () => {
  const [isDarkMode, setIsDarkMode] = useDarkMode();

  return (
    <IonApp className={isDarkMode ? 'dark-theme' : ''}>
      {/* App content */}
    </IonApp>
  );
};
```

---

## 10. Build & Deploy

### 10.1 Build untuk Web
```bash
# Development build
ionic build

# Production build
ionic build --prod

# Build dengan environment specific
ionic build --prod --configuration=production
```

### 10.2 Deploy ke Mobile

#### Android
```bash
# Add Android platform
ionic capacitor add android

# Build and sync
ionic capacitor build android

# Open in Android Studio
ionic capacitor open android

# Run on device
ionic capacitor run android --livereload --external
```

#### iOS
```bash
# Add iOS platform
ionic capacitor add ios

# Build and sync
ionic capacitor build ios

# Open in Xcode
ionic capacitor open ios

# Run on device
ionic capacitor run ios --livereload --external
```

### 10.3 Progressive Web App (PWA)
```bash
# Install PWA elements
npm install @ionic/pwa-elements

# Add to src/index.tsx
import { defineCustomElements } from '@ionic/pwa-elements/loader';
defineCustomElements(window);
```

### 10.4 Deploy ke Web Hosting

#### Netlify
```bash
# Build
ionic build --prod

# Install Netlify CLI
npm install -g netlify-cli

# Deploy
netlify deploy --prod --dir=build
```

#### Vercel
```bash
# Install Vercel CLI
npm install -g vercel

# Deploy
vercel --prod
```

#### Firebase Hosting
```bash
# Install Firebase CLI
npm install -g firebase-tools

# Initialize
firebase init hosting

# Deploy
firebase deploy
```

---

## 🎯 Next Steps

### 1. Advanced Features
- Push notifications
- Offline sync dengan Service Workers
- Real-time collaboration
- File attachments
- Voice notes
- Geolocation reminders

### 2. Backend Integration
- Firebase/Firestore
- Supabase
- REST API dengan Express.js
- GraphQL dengan Apollo

### 3. Testing
- Unit testing dengan Jest
- E2E testing dengan Cypress
- Component testing dengan React Testing Library

### 4. Performance Optimization
- Lazy loading components
- Virtual scrolling untuk list besar
- Image optimization
- Bundle size optimization

Selamat! Anda telah memiliki foundation yang solid untuk mengembangkan aplikasi Ionic React yang lebih kompleks. 🚀
