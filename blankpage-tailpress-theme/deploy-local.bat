@echo off
echo ========================================
echo   BlankPage TailPress Deploy Script v2.0
echo   Local by Flywheel + Production Ready
echo ========================================
echo.

REM Configuration
set LOCAL_PATH=C:\Users\tooma\Local Sites\blankpage-local\app\public\wp-content\themes\blankpage-tailpress-theme
set LOCAL_URL=https://blankpage.local

echo Current environment: Local by Flywheel
echo Deploy target: %LOCAL_PATH%
echo Local URL: %LOCAL_URL%
echo.

REM Check if Local theme directory exists
if not exist "%LOCAL_PATH%" (
    echo ERROR: Local by Flywheel theme directory not found!
    echo Expected: %LOCAL_PATH%
    echo.
    echo Please check:
    echo 1. Local by Flywheel is running
    echo 2. Site name is correct: blankpage-local
    echo 3. Theme folder exists in Local Sites
    pause
    exit /b 1
)

echo [1/9] Building theme with npm...
call npm run build
if %ERRORLEVEL% neq 0 (
    echo ERROR: npm build failed!
    echo Make sure you have run: npm install
    pause
    exit /b 1
)
echo ✅ Build complete!
echo.

echo [2/9] Copying dist files (CSS/JS assets)...
xcopy "dist" "%LOCAL_PATH%\dist" /E /Y /I
echo ✅ Dist files copied!
echo.

echo [3/9] Copying PHP template files...
xcopy "*.php" "%LOCAL_PATH%\" /Y
xcopy "template-parts" "%LOCAL_PATH%\template-parts" /E /Y /I
xcopy "woocommerce" "%LOCAL_PATH%\woocommerce" /E /Y /I
echo ✅ PHP files copied!
echo.

echo [4/9] Copying theme assets...
xcopy "style.css" "%LOCAL_PATH%\" /Y
xcopy "theme.json" "%LOCAL_PATH%\" /Y 2>nul
xcopy "screenshot.png" "%LOCAL_PATH%\" /Y 2>nul
echo ✅ Theme assets copied!
echo.

echo [5/9] Copying resources folder (CSS/JS source)...
xcopy "resources" "%LOCAL_PATH%\resources" /E /Y /I
echo ✅ Resources folder copied!
echo.

echo [6/9] Copying vendor folder (Composer dependencies)...
xcopy "vendor" "%LOCAL_PATH%\vendor" /E /Y /I
echo ✅ Vendor folder copied!
echo.

echo [7/9] Copying includes folder (Framework files)...
xcopy "includes" "%LOCAL_PATH%\includes" /E /Y /I
echo ✅ Includes folder copied!
echo.

echo [8/9] Copying src folder (Custom TailPress classes)...
xcopy "src" "%LOCAL_PATH%\src" /E /Y /I
echo ✅ Src folder copied!
echo.

echo [9/9] Copying framework configuration files...
xcopy "composer.json" "%LOCAL_PATH%\" /Y 2>nul
xcopy "composer.lock" "%LOCAL_PATH%\" /Y 2>nul
xcopy "package.json" "%LOCAL_PATH%\" /Y 2>nul
xcopy "package-lock.json" "%LOCAL_PATH%\" /Y 2>nul
echo ✅ Framework files copied!
echo.

echo ========================================
echo   🚀 LOCAL DEPLOY COMPLETE!
echo ========================================
echo.
echo Your changes are now live at:
echo %LOCAL_URL%
echo %LOCAL_URL%/shop/
echo %LOCAL_URL%/cart/
echo %LOCAL_URL%/checkout/
echo.
echo 💡 Next steps:
echo 1. Test cart and checkout styling
echo 2. Verify WooCommerce integration
echo 3. Check Alpine.js functionality
echo.
pause
