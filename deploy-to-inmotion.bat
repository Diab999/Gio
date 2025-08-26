@echo off
chcp 65001 >nul
echo 🚀 Preparing Laravel project for InMotion Hosting deployment...

REM Check if we're in the right directory
if not exist "artisan" (
    echo ❌ Error: Please run this script from your Laravel project root directory
    pause
    exit /b 1
)

echo 📁 Current directory: %CD%

REM Create deployment directory
set DEPLOY_DIR=deployment-ready
if exist "%DEPLOY_DIR%" (
    echo 🗑️  Removing existing deployment directory...
    rmdir /s /q "%DEPLOY_DIR%"
)

echo 📦 Creating deployment directory...
mkdir "%DEPLOY_DIR%"

REM Copy project files (excluding development files)
echo 📋 Copying project files...
xcopy /E /I /Y /EXCLUDE:deployment-exclude.txt . "%DEPLOY_DIR%"

REM Create necessary directories
echo 📁 Creating necessary directories...
mkdir "%DEPLOY_DIR%\storage\logs" 2>nul
mkdir "%DEPLOY_DIR%\storage\framework\cache" 2>nul
mkdir "%DEPLOY_DIR%\storage\framework\sessions" 2>nul
mkdir "%DEPLOY_DIR%\storage\framework\views" 2>nul
mkdir "%DEPLOY_DIR%\storage\app\public" 2>nul
mkdir "%DEPLOY_DIR%\bootstrap\cache" 2>nul

REM Create .env.production template
echo ⚙️  Creating .env.production template...
(
echo APP_ENV=production
echo APP_DEBUG=false
echo APP_URL=https://yourdomain.com
echo APP_KEY=your-generated-key
echo.
echo DB_CONNECTION=mysql
echo DB_HOST=localhost
echo DB_DATABASE=your_database_name
echo DB_USERNAME=your_database_user
echo DB_PASSWORD=your_database_password
echo.
echo MAIL_MAILER=smtp
echo MAIL_HOST=mail.yourdomain.com
echo MAIL_PORT=587
echo MAIL_USERNAME=your_email@yourdomain.com
echo MAIL_PASSWORD=your_email_password
echo MAIL_ENCRYPTION=tls
echo MAIL_FROM_ADDRESS=your_email@yourdomain.com
echo MAIL_FROM_NAME="${APP_NAME}"
echo.
echo WHATSAPP_PHONE=your-production-whatsapp-number
echo.
echo CACHE_DRIVER=file
echo SESSION_DRIVER=file
echo QUEUE_CONNECTION=sync
echo.
echo LOG_CHANNEL=stack
echo LOG_DEPRECATIONS_CHANNEL=null
echo LOG_LEVEL=error
) > "%DEPLOY_DIR%\.env.production"

REM Create deployment instructions
echo 📖 Creating deployment instructions...
(
echo INMOTION HOSTING DEPLOYMENT INSTRUCTIONS
echo ========================================
echo.
echo 1. UPLOAD FILES:
echo    - Upload all files from this directory to your InMotion hosting public_html folder
echo    - You can use cPanel File Manager, FTP, or SSH
echo.
echo 2. SET ENVIRONMENT:
echo    - Rename .env.production to .env
echo    - Update .env with your actual production values:
echo      * APP_URL=https://yourdomain.com
echo      * Database credentials
echo      * Email settings
echo      * WhatsApp phone number
echo.
echo 3. INSTALL DEPENDENCIES:
echo    - Via SSH: composer install --optimize-autoloader --no-dev
echo    - Or via cPanel Terminal
echo.
echo 4. SET PERMISSIONS:
echo    - chmod -R 755 storage/
echo    - chmod -R 755 bootstrap/cache/
echo    - chmod -R 644 public/
echo.
echo 5. CREATE STORAGE LINK:
echo    - php artisan storage:link
echo.
echo 6. RUN MIGRATIONS:
echo    - php artisan migrate --force
echo.
echo 7. CREATE ADMIN USER:
echo    - php artisan user:create-admin
echo.
echo 8. CLEAR AND CACHE:
echo    - php artisan config:clear
echo    - php artisan route:clear
echo    - php artisan view:clear
echo    - php artisan config:cache
echo    - php artisan route:cache
echo    - php artisan view:cache
echo.
echo 9. TEST YOUR SITE:
echo    - Check homepage loads
echo    - Test language switching
echo    - Verify contact form
echo    - Access admin panel
echo.
echo For detailed instructions, see INMOTION_DEPLOYMENT.md
) > "%DEPLOY_DIR%\DEPLOYMENT_INSTRUCTIONS.txt"

REM Create .htaccess for root domain deployment
echo 🌐 Creating .htaccess for root domain deployment...
(
echo ^<IfModule mod_rewrite.c^>
echo     ^<IfModule mod_negotiation.c^>
echo         Options -MultiViews -Indexes
echo     ^</IfModule^>
echo.
echo     RewriteEngine On
echo.
echo     # Handle Authorization Header
echo     RewriteCond %%{HTTP:Authorization} .
echo     RewriteRule .* - [E=HTTP_AUTHORIZATION:%%{HTTP:Authorization}]
echo.
echo     # Redirect Trailing Slashes If Not A Folder...
echo     RewriteCond %%{REQUEST_FILENAME} !-d
echo     RewriteCond %%{REQUEST_URI} ^(.+^)/$
echo     RewriteRule ^ %1 [L,R=301]
echo.
echo     # Send Requests To Front Controller...
echo     RewriteCond %%{REQUEST_FILENAME} !-d
echo     RewriteCond %%{REQUEST_FILENAME} !-f
echo     RewriteRule ^ index.php [L]
echo ^</IfModule^>
echo.
echo # Enable Gzip Compression
echo ^<IfModule mod_deflate.c^>
echo     AddOutputFilterByType DEFLATE text/plain
echo     AddOutputFilterByType DEFLATE text/html
echo     AddOutputFilterByType DEFLATE text/xml
echo     AddOutputFilterByType DEFLATE text/css
echo     AddOutputFilterByType DEFLATE application/xml
echo     AddOutputFilterByType DEFLATE application/xhtml+xml
echo     AddOutputFilterByType DEFLATE application/rss+xml
echo     AddOutputFilterByType DEFLATE application/javascript
echo     AddOutputFilterByType DEFLATE application/x-javascript
echo ^</IfModule^>
echo.
echo # Security Headers
echo ^<IfModule mod_headers.c^>
echo     Header always set X-Content-Type-Options nosniff
echo     Header always set X-Frame-Options DENY
echo     Header always set X-XSS-Protection "1; mode=block"
echo ^</IfModule^>
) > "%DEPLOY_DIR%\public\.htaccess"

REM Create index.php for subdirectory deployment (optional)
echo 📁 Creating index.php for subdirectory deployment...
(
echo ^<?php
echo.
echo /**
echo  * Subdirectory Deployment Index
echo  * Place this file in public_html root if deploying to a subdirectory
echo  */
echo.
echo // Redirect to your Laravel project
echo header^('Location: ./your-project-name/public/'^);
echo exit;
echo ?^>
) > "%DEPLOY_DIR%\index.php"

REM Create composer install script
echo 📦 Creating composer install script...
(
echo @echo off
echo echo Installing Laravel dependencies...
echo composer install --optimize-autoloader --no-dev
echo.
echo echo Clearing caches...
echo php artisan config:clear
echo php artisan route:clear
echo php artisan view:clear
echo php artisan cache:clear
echo.
echo echo Optimizing for production...
echo php artisan config:cache
echo php artisan route:cache
echo php artisan view:cache
echo.
echo echo Dependencies installed successfully!
echo pause
) > "%DEPLOY_DIR%\install-dependencies.bat"

REM Create post-deployment script
echo 🔧 Creating post-deployment script...
(
echo @echo off
echo echo Running post-deployment tasks...
echo.
echo REM Set permissions (if using SSH)
echo REM chmod -R 755 storage/
echo REM chmod -R 755 bootstrap/cache/
echo REM chmod -R 644 public/
echo.
echo echo Creating storage link...
echo php artisan storage:link
echo.
echo echo Running migrations...
echo php artisan migrate --force
echo.
echo echo Creating admin user ^(uncomment if needed^)
echo REM php artisan user:create-admin
echo.
echo echo Post-deployment tasks completed!
echo pause
) > "%DEPLOY_DIR%\post-deploy.bat"

REM Create exclusion file for xcopy
echo Creating exclusion file for xcopy...
(
echo .git
echo node_modules
echo vendor
echo storage\logs\*
echo storage\framework\cache\*
echo storage\framework\sessions\*
echo storage\framework\views\*
echo storage\app\public\*
echo bootstrap\cache\*
echo .env
echo .env.local
echo .env.development
echo deployment-ready
echo deploy-to-inmotion.sh
echo deploy-to-inmotion.bat
echo INMOTION_DEPLOYMENT.md
echo PRODUCTION_DEPLOYMENT.md
echo README.md
echo tests
echo .gitignore
echo .gitattributes
echo composer.lock
echo package-lock.json
echo yarn.lock
echo vite.config.js
echo webpack.mix.js
echo tailwind.config.js
echo postcss.config.js
echo .eslintrc.js
echo .prettierrc
echo phpunit.xml
echo .editorconfig
echo .styleci.yml
echo .github
echo .vscode
echo .idea
echo *.log
echo *.sql
echo *.sqlite
echo *.db
) > "deployment-exclude.txt"

REM Show summary
echo.
echo ✅ Deployment preparation completed!
echo.
echo 📁 Your deployment-ready files are in: %DEPLOY_DIR%
echo.
echo 📋 Next steps:
echo 1. Review and update .env.production with your actual values
echo 2. Upload the contents of %DEPLOY_DIR% to your InMotion hosting
echo 3. Follow the DEPLOYMENT_INSTRUCTIONS.txt file
echo 4. Run the post-deployment scripts on your server
echo.
echo 📚 For detailed instructions, see:
echo    - INMOTION_DEPLOYMENT.md
echo    - DEPLOYMENT_INSTRUCTIONS.txt (in deployment folder)
echo.
echo 🚀 Happy deploying!
echo.
pause
