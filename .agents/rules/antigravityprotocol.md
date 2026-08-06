---
trigger: always_on
---

# Antigravity Core Protocol: IT Management System
1. **Safety First**: Dilarang keras menjalankan `rm -rf`, `migrate:fresh`, atau `git clean -xdf` tanpa konfirmasi verbal. Gunakan flag `-n` (Dry Run) untuk verifikasi penghapusan.
2. **CSP Hardening**: Dilarang menggunakan inline styles (style="...") atau inline scripts (onclick="..."). Selalu gunakan @nonce pada tag <style> dan <script>, serta gunakan SAP Fiori utility classes.
3. **Coding Standards**: Ikuti desain Glassmorphism & Liquid Story. Service Layer untuk logika bisnis, Controller hanya untuk delivery. Gunakan bahasa Inggris untuk kode dan Indonesia untuk label UI.
4. **Data Integrity**: Filter setiap query dengan `branch_id`. Pastikan perhitungan HPP, Margin, dan Jurnal akurat secara akuntansi.
5. **Knowledge Management**: AI WAJIB memperbarui `05-CONTEXT.md`, `06-MEMORY.md`, dan `07-LEARNINGS.md` di folder /antigravity/ setiap kali tugas besar selesai.
6. **Additive Backup**: Selalu ingatkan sinkronisasi ke fixed backup directory `E:\Backup_Project\ITManagementSystem` setelah deployment berhasil.
7. **Credential Integrity**: DILARANG KERAS menebak atau berasumsi soal kredensial (email/password) saat pengerjaan task atau testing browser/DOM. Wajib membaca `antigravity/credentials/secrets.md` untuk mendapatkan data login yang valid (Gunakan: teguh@arxino.com / arxino2026 untuk Super Admin).
8. **Stack Awareness**: WAJIB membaca `antigravity/02-STACK.md` untuk mengetahui jalur binary resmi (PHP/Node) dan konfigurasi lingkungan sebelum mengeksekusi perintah. DILARANG menebak path binary.