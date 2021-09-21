# KochrezeptSAE
KochrezeptApp for SAE

<h1>content to add to .htaccess file in main directory</h1>

Options -MultiViews
RewriteEngine on

# remove php
RewriteCond %{THE_REQUEST} ^[A-Z]{3,}\s([^.]+)\.php [NC]
RewriteRule ^ %1 [R=301,L]

# rewrite with php
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{DOCUMENT_ROOT}/$1.php -f
RewriteRule ^(.+)/?$ $1.php [L]

<h1>libarys used</h1>
getbootstrap.com
