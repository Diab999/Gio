# 🚀 Quick Deployment Card - InMotion Hosting

## 📋 Pre-Deployment (Local)
```bash
# Run the deployment script
deploy-to-inmotion.bat

# This creates a 'deployment-ready' folder with all necessary files
```

## 📤 Upload to InMotion
1. **Login to cPanel**
2. **Go to File Manager**
3. **Navigate to `public_html`**
4. **Upload contents of `deployment-ready` folder**

## ⚙️ Server Configuration
```bash
# 1. Rename environment file
mv .env.production .env

# 2. Update .env with your values:
# - APP_URL=https://yourdomain.com
# - Database credentials
# - Email settings
# - WhatsApp phone number

# 3. Install dependencies
composer install --optimize-autoloader --no-dev

# 4. Set permissions
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
chmod -R 644 public/

# 5. Create storage link
php artisan storage:link

# 6. Run migrations
php artisan migrate --force

# 7. Create admin user
php artisan user:create-admin

# 8. Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 🗄️ Database Setup (cPanel)
1. **MySQL Databases** → **Create Database**
2. **Create Database User**
3. **Add User to Database** (all privileges)
4. **Update .env with credentials**

## 🌐 Domain Configuration
- **Enable SSL** in cPanel (free)
- **Update APP_URL** to use `https://`
- **Test all functionality**

## ✅ Quick Test Checklist
- [ ] Homepage loads
- [ ] Language switching works
- [ ] Contact form submits
- [ ] Admin panel accessible
- [ ] Images display correctly
- [ ] WhatsApp integration works

## 🚨 Common Issues
- **500 Error**: Check file permissions and .env
- **Database Error**: Verify credentials and database exists
- **Storage Issues**: Run `php artisan storage:link`

## 📞 Need Help?
- **InMotion Support**: 24/7 phone, chat, ticket
- **Documentation**: See `INMOTION_DEPLOYMENT.md`
- **Laravel Docs**: https://laravel.com/docs

---
**Time Estimate**: 30-60 minutes  
**Difficulty**: Beginner to Intermediate  
**Success Rate**: 95%+ with proper setup
