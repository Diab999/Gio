#!/bin/bash

# InMotion Hosting Deployment Script
# This script prepares your Laravel project for deployment to InMotion Hosting

echo "🚀 Preparing Laravel project for InMotion Hosting deployment..."

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Check if we're in the right directory
if [ ! -f "artisan" ]; then
    echo -e "${RED}❌ Error: Please run this script from your Laravel project root directory${NC}"
    exit 1
fi

echo -e "${YELLOW}📁 Current directory: $(pwd)${NC}"

# Create deployment directory
DEPLOY_DIR="deployment-ready"
if [ -d "$DEPLOY_DIR" ]; then
    echo -e "${YELLOW}🗑️  Removing existing deployment directory...${NC}"
    rm -rf "$DEPLOY_DIR"
fi

echo -e "${GREEN}📦 Creating deployment directory...${NC}"
mkdir -p "$DEPLOY_DIR"

# Copy project files (excluding development files)
echo -e "${GREEN}📋 Copying project files...${NC}"
rsync -av --exclude='.git' \
    --exclude='node_modules' \
    --exclude='vendor' \
    --exclude='storage/logs/*' \
    --exclude='storage/framework/cache/*' \
    --exclude='storage/framework/sessions/*' \
    --exclude='storage/framework/views/*' \
    --exclude='storage/app/public/*' \
    --exclude='bootstrap/cache/*' \
    --exclude='.env' \
    --exclude='.env.local' \
    --exclude='.env.development' \
    --exclude='deployment-ready' \
    --exclude='deploy-to-inmotion.sh' \
    --exclude='INMOTION_DEPLOYMENT.md' \
    --exclude='PRODUCTION_DEPLOYMENT.md' \
    --exclude='README.md' \
    --exclude='tests' \
    --exclude='.gitignore' \
    --exclude='.gitattributes' \
    --exclude='composer.lock' \
    --exclude='package-lock.json' \
    --exclude='yarn.lock' \
    --exclude='vite.config.js' \
    --exclude='webpack.mix.js' \
    --exclude='tailwind.config.js' \
    --exclude='postcss.config.js' \
    --exclude='.eslintrc.js' \
    --exclude='.prettierrc' \
    --exclude='phpunit.xml' \
    --exclude='.editorconfig' \
    --exclude='.styleci.yml' \
    --exclude='.github' \
    --exclude='.vscode' \
    --exclude='.idea' \
    --exclude='*.log' \
    --exclude='*.sql' \
    --exclude='*.sqlite' \
    --exclude='*.db' \
    . "$DEPLOY_DIR/"

# Create necessary directories
echo -e "${GREEN}📁 Creating necessary directories...${NC}"
mkdir -p "$DEPLOY_DIR/storage/logs"
mkdir -p "$DEPLOY_DIR/storage/framework/cache"
mkdir -p "$DEPLOY_DIR/storage/framework/sessions"
mkdir -p "$DEPLOY_DIR/storage/framework/views"
mkdir -p "$DEPLOY_DIR/storage/app/public"
mkdir -p "$DEPLOY_DIR/bootstrap/cache"

# Set proper permissions
echo -e "${GREEN}🔐 Setting file permissions...${NC}"
chmod -R 755 "$DEPLOY_DIR/storage"
chmod -R 755 "$DEPLOY_DIR/bootstrap/cache"
chmod -R 644 "$DEPLOY_DIR/public"

# Create .env.production template
echo -e "${GREEN}⚙️  Creating .env.production template...${NC}"
cat > "$DEPLOY_DIR/.env.production" << 'EOF'
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
MAIL_PORT=587
MAIL_USERNAME=your_email@yourdomain.com
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"

WHATSAPP_PHONE=your-production-whatsapp-number

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error
EOF

# Create deployment instructions
echo -e "${GREEN}📖 Creating deployment instructions...${NC}"
cat > "$DEPLOY_DIR/DEPLOYMENT_INSTRUCTIONS.txt" << 'EOF'
INMOTION HOSTING DEPLOYMENT INSTRUCTIONS
========================================

1. UPLOAD FILES:
   - Upload all files from this directory to your InMotion hosting public_html folder
   - You can use cPanel File Manager, FTP, or SSH

2. SET ENVIRONMENT:
   - Rename .env.production to .env
   - Update .env with your actual production values:
     * APP_URL=https://yourdomain.com
     * Database credentials
     * Email settings
     * WhatsApp phone number

3. INSTALL DEPENDENCIES:
   - Via SSH: composer install --optimize-autoloader --no-dev
   - Or via cPanel Terminal

4. SET PERMISSIONS:
   - chmod -R 755 storage/
   - chmod -R 755 bootstrap/cache/
   - chmod -R 644 public/

5. CREATE STORAGE LINK:
   - php artisan storage:link

6. RUN MIGRATIONS:
   - php artisan migrate --force

7. CREATE ADMIN USER:
   - php artisan user:create-admin

8. CLEAR AND CACHE:
   - php artisan config:clear
   - php artisan route:clear
   - php artisan view:clear
   - php artisan config:cache
   - php artisan route:cache
   - php artisan view:cache

9. TEST YOUR SITE:
   - Check homepage loads
   - Test language switching
   - Verify contact form
   - Access admin panel

For detailed instructions, see INMOTION_DEPLOYMENT.md
EOF

# Create .htaccess for root domain deployment
echo -e "${GREEN}🌐 Creating .htaccess for root domain deployment...${NC}"
cat > "$DEPLOY_DIR/public/.htaccess" << 'EOF'
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

# Enable Gzip Compression
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

# Security Headers
<IfModule mod_headers.c>
    Header always set X-Content-Type-Options nosniff
    Header always set X-Frame-Options DENY
    Header always set X-XSS-Protection "1; mode=block"
</IfModule>
EOF

# Create index.php for subdirectory deployment (optional)
echo -e "${GREEN}📁 Creating index.php for subdirectory deployment...${NC}"
cat > "$DEPLOY_DIR/index.php" << 'EOF'
<?php

/**
 * Subdirectory Deployment Index
 * Place this file in public_html root if deploying to a subdirectory
 */

// Redirect to your Laravel project
header('Location: ./your-project-name/public/');
exit;
EOF

# Create composer install script
echo -e "${GREEN}📦 Creating composer install script...${NC}"
cat > "$DEPLOY_DIR/install-dependencies.sh" << 'EOF'
#!/bin/bash

echo "Installing Laravel dependencies..."
composer install --optimize-autoloader --no-dev

echo "Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

echo "Optimizing for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Dependencies installed successfully!"
EOF

chmod +x "$DEPLOY_DIR/install-dependencies.sh"

# Create post-deployment script
echo -e "${GREEN}🔧 Creating post-deployment script...${NC}"
cat > "$DEPLOY_DIR/post-deploy.sh" << 'EOF'
#!/bin/bash

echo "Running post-deployment tasks..."

# Set permissions
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
chmod -R 644 public/

# Create storage link
php artisan storage:link

# Run migrations
php artisan migrate --force

# Create admin user (uncomment if needed)
# php artisan user:create-admin

echo "Post-deployment tasks completed!"
EOF

chmod +x "$DEPLOY_DIR/post-deploy.sh"

# Show summary
echo -e "${GREEN}✅ Deployment preparation completed!${NC}"
echo ""
echo -e "${YELLOW}📁 Your deployment-ready files are in: $DEPLOY_DIR${NC}"
echo ""
echo -e "${GREEN}📋 Next steps:${NC}"
echo "1. Review and update .env.production with your actual values"
echo "2. Upload the contents of $DEPLOY_DIR to your InMotion hosting"
echo "3. Follow the DEPLOYMENT_INSTRUCTIONS.txt file"
echo "4. Run the post-deployment scripts on your server"
echo ""
echo -e "${YELLOW}📚 For detailed instructions, see:${NC}"
echo "   - INMOTION_DEPLOYMENT.md"
echo "   - DEPLOYMENT_INSTRUCTIONS.txt (in deployment folder)"
echo ""
echo -e "${GREEN}🚀 Happy deploying!${NC}"
