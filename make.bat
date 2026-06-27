@echo off
REM make.bat - Windows helper for common tasks
if "%1"=="build" (
    npm install
    npm run build
    goto :eof
)
if "%1"=="optimize" (
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    php artisan optimize
    goto :eof
)
if "%1"=="migrate" (
    php artisan migrate --force
    goto :eof
)
if "%1"=="seed" (
    php artisan db:seed --class=DatabaseSeeder --force
    goto :eof
)
if "%1"=="storage" (
    php artisan storage:link
    goto :eof
)
if "%1"=="test" (
    php artisan test
    goto :eof
)
echo Usage: make.bat [build|optimize|migrate|seed|storage|test]
