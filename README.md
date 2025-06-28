📌Note
This project is made for learning purposes (UAS)

✨ Panduan Penggunaan
Saat pertama kali membuka http://127.0.0.1:8000, akan muncul tampilan default Laravel.
Fitur utama ada di pojok kanan atas:

🔐 Login
📝 Register

👤 User
Register akun terlebih dulu jika belum punya akun.

Login dengan akun user.

Setelah login, untuk menggunakan fitur user harus langsung akses link berikut:

📚 Melihat daftar buku:
http://127.0.0.1:8000/user/books

🔄 Melihat daftar peminjaman:
http://127.0.0.1:8000/user/borrowings

🛠 Admin
Untuk masuk sebagai admin, langsung buka:
http://127.0.0.1:8000/admin
lalu login dengan akun admin.
Note : admin@example.com password : admin123

Fitur admin terpisah, harus akses manual:
📖 Mengelola buku (CRUD):
http://127.0.0.1:8000/admin/books
➕ Menambah buku:
http://127.0.0.1:8000/admin/books/create

⚠️ Catatan
Aplikasi ini belum memiliki navigasi langsung antar fitur, sehingga setiap fitur diakses lewat alamat URL manual (copy-paste ke bar browser).

Pastikan untuk setiap perubahan yang dilakukan di admin atau user harus refresh browser untuk melihat setiap perubahan tanpa refresh browser perubahan tidak akan terlihat
