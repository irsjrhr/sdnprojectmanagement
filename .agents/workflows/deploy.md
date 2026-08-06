---
description: # Antigravity Deployment Protocol (ADP)
---

🛡️ Antigravity Deployment Protocol (ADP) - ARXINO PROJECT
Workflow ini wajib dijalankan secara kaku setiap kali AI Agent melakukan deployment ke server produksi.

🏗️ Tahap 1: Pra-Deployment Audit (Rule #11 & #12)
Baca Manual: AI WAJIB membaca 

08-DEPLOYMENT-SAFETY.md
.
Multi-Repo Check: Jalankan git status di repo Laravel DAN Flutter.
Laravel: c:\laragon\www\arxino
Flutter: e:\arxino_project\arxino_flutter
Status harus CLEAN atau minimal tidak ada perubahan yang menghalangi pengerjaan fitur.
🧪 Tahap 2: Staging Bedah (Surgical Staging)
Selective Add: Gunakan git add <file> secara spesifik hanya untuk file fitur yang dikerjakan. DILARANG menggunakan git add ..
Atomic Verification: Jalankan git diff --cached --name-only untuk menunjukkan daftar file yang akan dikirim ke produksi kepada USER sebagai konfirmasi final.
🚀 Tahap 3: Push & Remote Ritual (Section 2.3)
Commit & Push: Lakukan git commit dan git push production main.
Server side Optimization: Jalankan ritual pembersihan cache di server menggunakan jalur mutlak (referensi 02-STACK.md):
/usr/local/bin/php ~/arxino/artisan optimize:clear
/usr/local/bin/php ~/arxino/artisan view:clear
/usr/local/bin/php ~/arxino/artisan config:cache
📚 Tahap 4: Finalisasi (Rule 5 & 6)
Update Legacy: Perbarui 05-CONTEXT.md, 06-MEMORY.md, dan 07-LEARNINGS.md.
Backup Sync Reminder: Ingatkan USER untuk sinkronisasi ke folder backup E:\Backup_Project\arxino menggunakan perintah robocopy yang tersedia di Section 7 manual safety.
Perubahan yang saya lakukan pada 08-DEPLOYMENT-SAFETY.md:

Mengubah semua referensi master menjadi main.
Memastikan path server menggunakan ~/arxino/ bukan ~/tokoaragpc/.
Menyelaraskan folder backup ke E:\Backup_Project\arxino.