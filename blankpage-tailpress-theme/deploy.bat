@echo off
echo ========================================
echo   BlankPage TailPress Deploy Script
echo ========================================
echo.

echo [1/4] Building theme with npm...
call npm run build
if %ERRORLEVEL% neq 0 (
    echo ERROR: npm build failed!
    pause
    exit /b 1
)
echo Build complete!
echo.

echo [2/4] Copying dist files...
xcopy "dist" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme\dist" /E /Y /I
echo Dist files copied!
echo.

echo [3/4] Copying PHP template files...
xcopy "*.php" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme\" /Y
xcopy "template-parts" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme\template-parts" /E /Y /I
xcopy "woocommerce" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme\woocommerce" /E /Y /I
echo PHP files copied!
echo.

echo [4/5] Copying theme assets...
xcopy "style.css" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme\" /Y
xcopy "theme.json" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme\" /Y 2>nul
xcopy "screenshot.png" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme\" /Y 2>nul
echo Theme assets copied!
echo.

echo [5/8] Copying resources folder...
xcopy "resources" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme\resources" /E /Y /I
echo Resources folder copied!
echo.

echo [6/8] Copying vendor folder (Composer dependencies)...
xcopy "vendor" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme\vendor" /E /Y /I
echo Vendor folder copied!
echo.

echo [7/8] Copying includes folder (Framework files)...
xcopy "includes" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme\includes" /E /Y /I
echo Includes folder copied!
echo.

echo [8/9] Copying src folder (Custom TailPress classes)...
xcopy "src" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme\src" /E /Y /I
echo Src folder copied!
echo.

echo [9/9] Copying framework configuration files...
xcopy "composer.json" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme\" /Y 2>nul
xcopy "composer.lock" "C:\xampp\htdocs\wordpress\wp-content\themes\blankpage-tailpress-theme\" /Y 2>nul
echo Framework files copied!
echo.

echo ========================================
echo   Deploy Complete!
echo ========================================
echo.
echo Your changes are now live at:
echo http://localhost/wordpress/
echo http://localhost/wordpress/pood/
echo.
pause
