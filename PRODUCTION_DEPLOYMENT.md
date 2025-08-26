# Production Deployment Guide

## 🚀 Pre-Deployment Checklist

### 1. Environment Configuration
- [ ] Set `APP_ENV=production` in `.env`
- [ ] Set `APP_DEBUG=false` in `.env`
- [ ] Set `APP_URL` to your production domain
- [ ] Generate new `APP_KEY` if needed: `php artisan key:generate`
- [ ] Set `DB_CONNECTION`, `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
- [ ] Set `MAIL_MAILER`, `MAIL_HOST`, `MAIL_USERNAME`, `MAIL_PASSWORD`
- [ ] Set `WHATSAPP_PHONE` for production

### 2. Security & Performance
- [ ] All debug routes removed ✅
- [ ] All console.log statements removed ✅
- [ ] Test views removed ✅
- [ ] Unused files cleaned up ✅
- [ ] Caches cleared ✅

### 3. Database
- [ ] Run migrations: `php artisan migrate --force`
- [ ] Seed production data if needed
- [ ] Create admin user: `php artisan user:create-admin`

### 4. File Storage
- [ ] Create storage link: `php artisan storage:link`
- [ ] Ensure storage directory is writable
- [ ] Upload production images to storage

## 🔧 Production Commands

```bash
# Clear all caches
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Create storage link
php artisan storage:link

# Run migrations
php artisan migrate --force

# Create admin user
php artisan user:create-admin
```

## 🌐 Server Requirements

- **PHP**: 8.2 or higher
- **Extensions**: BCMath, Ctype, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML, cURL, GD, Fileinfo
- **Web Server**: Apache/Nginx
- **Database**: MySQL 8.0+ or PostgreSQL 13+
- **Memory**: Minimum 512MB RAM
- **Storage**: Minimum 1GB free space

## 📁 File Permissions

```bash
# Set proper permissions
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
chmod -R 644 public/
chmod -R 644 .env
```

## 🔒 Security Checklist

- [ ] HTTPS enabled
- [ ] Environment variables secured
- [ ] Admin panel access restricted
- [ ] File uploads validated
- [ ] SQL injection protection
- [ ] XSS protection
- [ ] CSRF protection enabled

## 📊 Performance Optimization

- [ ] Enable OPcache
- [ ] Enable Redis for caching (optional)
- [ ] Enable gzip compression
- [ ] Optimize images
- [ ] Minify CSS/JS (if using build tools)

## 🚨 Post-Deployment

1. **Test all functionality**:
   - Language switching
   - Contact form
   - Admin panel access
   - Image uploads
   - WhatsApp integration

2. **Monitor logs**:
   - Check `storage/logs/laravel.log`
   - Monitor error rates
   - Check performance metrics

3. **Backup strategy**:
   - Database backups
   - File storage backups
   - Configuration backups

## 📞 Support

For production issues, check:
- Laravel logs: `storage/logs/laravel.log`
- Server error logs
- Database connection
- File permissions
- Environment variables

## 🎯 Production Features

✅ **Multilingual Support**: English/Arabic with RTL layout
✅ **Admin Panel**: Filament-based with user management
✅ **Contact System**: Form with validation and storage
✅ **WhatsApp Integration**: Floating button with admin config
✅ **Image Management**: Secure uploads with storage
✅ **Responsive Design**: Mobile-first approach
✅ **SEO Ready**: Meta tags and structured content
✅ **Security**: Admin access control and validation

## 🔄 Maintenance

- Regular security updates
- Database optimization
- Log rotation
- Performance monitoring
- Backup verification
