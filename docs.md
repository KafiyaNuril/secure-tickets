## 📝 Checklist Praktik

### Demo Blade Templating
- [x] Akses `/demo-blade/directives` - lihat cara kerja @if, @foreach, $loop
- [x] Akses `/demo-blade/components` - lihat cara pakai x-alert, x-card
- [x] Akses `/demo-blade/includes` - lihat cara @include, @each
- [x] Akses `/demo-blade/stacks` - klik button untuk lihat JavaScript berjalan

### XSS Lab
- [x] Test Reflected XSS Vulnerable dengan payload `<script>alert('XSS')</script>`
- [x] Test Reflected XSS Secure dengan payload yang sama (harusnya aman)
- [x] Test Stored XSS Vulnerable dengan submit comment berbahaya
- [x] Test Stored XSS Secure dengan payload yang sama (harusnya aman)
- [x] Test DOM-Based XSS dengan klik link payload
- [x] Bandingkan versi vulnerable vs secure

---

## Security Audit Checklist

### XSS Prevention
- [x] Semua user input di-escape dengan `{{ }}`
- [x] `{!! !!}` hanya untuk trusted content
- [x] JavaScript data menggunakan `@json()`
- [x] `strip_tags()` digunakan untuk sanitasi input

### CSRF Protection
- [x] `@csrf` ada di setiap form
- [x] VerifyCsrfToken middleware aktif

### Input Validation
- [x] Semua input divalidasi di server
- [x] Validation rules yang spesifik (min, max, string, etc.)

### Security Headers
- [x] SecurityHeaders middleware aktif
- [x] CSP policy dikonfigurasi

### Authentication & Authorization
- [x] Routes dilindungi middleware auth
- [x] Authorization check (owner only delete n put)

---

## Checklist Keamanan

### Input Validation
### ✅ Yang HARUS dilakukan :

- [x] Semua form memiliki server-side validation
- [x] String fields memiliki `max` length
- [ ] Numeric fields memiliki `min`/`max` range
- [x] Enum/select menggunakan `in:value1,value2` (WHITELIST)
- [x] Email menggunakan rule `email`
- [x] Foreign keys menggunakan `exists:table,column`
- [x] Error messages tidak expose sensitive info
- [x] Form Request digunakan untuk code organization
- [x] `$request->validated()` digunakan, bukan `$request->all()`

### ❌ Yang JANGAN dilakukan:

- [x] Hanya mengandalkan client-side validation
- [x] Skip validasi untuk "internal" endpoint
- [x] Trust hidden fields tanpa validasi
- [x] Gunakan blacklist approach
- [x] Tampilkan technical error ke user
- [x] Hardcode validation di banyak tempat

### CSRF
### ✅ Yang HARUS dilakukan:

- [x] Semua form POST/PUT/DELETE memiliki `@csrf`
- [x] Layout memiliki meta tag `csrf-token`
- [x] AJAX request menyertakan X-CSRF-TOKEN header
- [x] VerifyCsrfToken middleware aktif
- [x] Hanya exclude route yang benar-benar perlu
- [x] API menggunakan Sanctum/Passport, bukan disable CSRF

### ❌ Yang JANGAN dilakukan:

- [x] Disable CSRF middleware untuk semua route
- [x] Exclude route sensitif dari CSRF check
- [x] Menyimpan CSRF token di localStorage
- [x] Menggunakan GET untuk aksi yang mengubah data
- [x] Menganggap hidden field aman tanpa CSRF
---
