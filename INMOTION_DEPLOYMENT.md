# InMotion Hosting Deployment Guide

## 🚀 Pre-Deployment Preparation

### 1. InMotion Hosting Requirements Check
- [ ] **Shared Hosting Plan**: Business or higher (supports PHP 8.2+)
- [ ] **PHP Version**: 8.2 or higher (available on InMotion)
- [ ] **Database**: MySQL 8.0+ (included with hosting plans)
- [ ] **SSH Access**: Available on Business+ plans (recommended)
- [ ] **SSL Certificate**: Free with hosting plans

### 2. Local Project Preparation
```bash
# Create production build
composer install --optimize-autoloader --no-dev

# Clear all caches
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 3. Environment File Setup
Create `.env.production` with:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
APP_KEY=your-generated-key

DB_CONNECTION=mysql
DB_HOST=localhost
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

MAIL_MAILER=smtp
MAIL_HOST=mail.yourdomain.com
MAIL_USERNAME=your_email
MAIL_PASSWORD=your_email_password

WHATSAPP_PHONE=your-production-whatsapp-number
```

## 📤 Upload Methods

### Method 1: File Manager (Recommended for beginners)
1. **Login to InMotion Hosting cPanel**
2. **Go to File Manager**
3. **Navigate to `public_html` folder**
4. **Upload your project files** (excluding `node_modules`, `.git`, etc.)

### Method 2: FTP/SFTP (Recommended for developers)
```bash
# Using FileZilla or similar FTP client
Host: your-domain.com
Username: your-cpanel-username
Password: your-cpanel-password
Port: 21 (FTP) or 22 (SFTP)
```

### Method 3: Git Deployment (Advanced)
```bash
# If you have SSH access
ssh username@your-domain.com
cd public_html
git clone your-repository-url .
```

## 🗂️ File Structure on InMotion

### Option A: Root Domain Deployment
```
public_html/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/          # This becomes your web root
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env
├── artisan
└── composer.json
```

### Option B: Subdirectory Deployment
```
public_html/
├── your-project/    # Your Laravel project
│   ├── app/
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   ├── public/
│   ├── resources/
│   ├── routes/
│   ├── storage/
│   ├── vendor/
│   ├── .env
│   ├── artisan
│   └── composer.json
└── index.php        # Redirect to your-project/public/
```

## 🔧 Post-Upload Configuration

### 1. Set File Permissions
```bash
# Via cPanel File Manager or SSH
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
chmod -R 644 public/
chmod -R 644 .env
```

### 2. Create Storage Link
```bash
# Via SSH or cPanel Terminal
php artisan storage:link
```

### 3. Run Database Migrations
```bash
# Via SSH or cPanel Terminal
php artisan migrate --force
```

### 4. Create Admin User
```bash
# Via SSH or cPanel Terminal
php artisan user:create-admin
```

## 🌐 Domain Configuration

### 1. Update .htaccess (if needed)
```apache
# public/.htaccess
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

### 2. SSL Configuration
- **Enable SSL** in cPanel (free with hosting)
- **Force HTTPS** in your `.env` file
- **Update APP_URL** to use `https://`

## 🗄️ Database Setup

### 1. Create Database in cPanel
1. **Go to cPanel → MySQL Databases**
2. **Create New Database** (e.g., `yourusername_projectname`)
3. **Create Database User** with strong password
4. **Add User to Database** with all privileges

### 2. Import Database (if you have existing data)
```bash
# Via phpMyAdmin in cPanel
# Or via SSH:
mysql -u username -p database_name < backup.sql
```

## 📧 Email Configuration

### 1. InMotion SMTP Settings
```env
MAIL_MAILER=smtp
MAIL_HOST=mail.yourdomain.com
MAIL_PORT=587
MAIL_USERNAME=your_email@yourdomain.com
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"
```

### 2. Test Email Configuration
```bash
# Via SSH or cPanel Terminal
php artisan tinker
Mail::raw('Test email', function($message) { $message->to('test@example.com')->subject('Test'); });
```

## 🔒 Security Configuration

### 1. Admin Panel Access
- **Update admin routes** to use your domain
- **Set strong admin passwords**
- **Enable two-factor authentication** if available

### 2. File Security
```bash
# Hide sensitive files
chmod 600 .env
chmod 600 storage/logs/laravel.log
```

### 3. Environment Variables
- **Never commit `.env`** to version control
- **Use strong database passwords**
- **Enable HTTPS everywhere**

## 📊 Performance Optimization

### 1. Enable OPcache (if available)
```ini
; In your php.ini or via cPanel
opcache.enable=1
opcache.memory_consumption=128
opcache.interned_strings_buffer=8
opcache.max_accelerated_files=4000
```

### 2. Enable Gzip Compression
```apache
# In .htaccess
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/plain
    AddOutputFilterByType DEFLATE text/html
    AddOutputFilterByType DEFLATE text/xml
    AddOutputFilterByType DEFLATE text/css
    AddOutputFilterByType DEFLATE application/xml
    AddOutputFilterByType DEFLATE application/xhtml+xml
    AddOutputFilterByType DEFLATE application/rss+xml
    AddOutputFilterByType DEFLATE application/javascript
    AddOutputFilterByType DEFLATE application/x-javascript
</IfModule>
```

## 🧪 Testing Deployment

### 1. Functionality Tests
- [ ] **Homepage loads** correctly
- [ ] **Language switching** works (English/Arabic)
- [ ] **Contact form** submits successfully
- [ ] **Admin panel** accessible
- [ ] **Image uploads** work
- [ ] **WhatsApp integration** functional
- [ ] **Database operations** working

### 2. Performance Tests
- [ ] **Page load times** under 3 seconds
- [ ] **Images load** correctly
- [ ] **CSS/JS files** loading
- [ ] **Mobile responsiveness** working

## 🚨 Troubleshooting

### Common Issues & Solutions

#### 1. 500 Internal Server Error
```bash
# Check error logs in cPanel
# Common causes: file permissions, .env issues, PHP version
```

#### 2. Database Connection Error
```bash
# Verify database credentials in .env
# Check database exists and user has permissions
```

#### 3. File Permission Issues
```bash
# Set correct permissions
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

#### 4. Storage Link Issues
```bash
# Remove existing link and recreate
rm public/storage
php artisan storage:link
```

## 📞 InMotion Hosting Support

- **24/7 Support**: Available via phone, chat, and ticket
- **Knowledge Base**: Extensive documentation
- **Community Forum**: User discussions and solutions
- **Server Status**: Check hosting status page

## 🔄 Maintenance & Updates

### 1. Regular Tasks
- **Monitor error logs** weekly
- **Backup database** monthly
- **Update Laravel** quarterly
- **Check security** monthly

### 2. Backup Strategy
```bash
# Database backup
mysqldump -u username -p database_name > backup_$(date +%Y%m%d).sql

# File backup
tar -czf files_backup_$(date +%Y%m%d).tar.gz /path/to/your/project
```

## ✅ Deployment Checklist

- [ ] **Project uploaded** to InMotion hosting
- [ ] **Environment file** configured for production
- [ ] **Database created** and configured
- [ ] **File permissions** set correctly
- [ ] **Storage link** created
- [ ] **Migrations run** successfully
- [ ] **Admin user created**
- [ ] **SSL certificate** enabled
- [ ] **Email configuration** tested
- [ ] **All functionality** working
- [ ] **Performance optimized**
- [ ] **Security measures** implemented
- [ ] **Backup strategy** in place

## 🎯 Next Steps

1. **Monitor performance** for first 24-48 hours
2. **Set up monitoring** tools if needed
3. **Configure backups** automation
4. **Plan regular maintenance** schedule
5. **Document any custom configurations**

---

**Need Help?** Contact InMotion Hosting support or refer to Laravel documentation for specific issues.
