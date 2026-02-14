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
