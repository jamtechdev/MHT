# Install new laravel
    composer global require laravel/installer
    laravel new martialartszen

# Refresh or Create migration and seed
    php artisan migrate:fresh --seed

# Use Laravel Breeze
composer require laravel/breeze --dev

php artisan breeze:install

npm install
npm run dev
php artisan migrate

# For sending email
    Setup Email configuration in .env
    Add app/Models/User.php > implements MustVerifyEmail

    In web.php Route file add verified middleware

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

# Setup Google Auth
    composer require laravel/socialite

    Create New Google Console project at
    https://console.cloud.google.com/apis/dashboard?authuser=1&project=martialartszentest

    click on the credentials and choose OAuth client id.

"@popperjs/core": "^2.11.0",
        "animate.css": "^3.7.2",
        "datatables.net-bs5": "^1.11.3",
        "jquery-slimscroll": "^1.3.8",
        "metismenu": "^3.0.4",
        "select2": "^4.0.9",
        "sweetalert": "^2.1.2",

# After Git Pull Commands
composer install --optimize-autoloader --no-dev
php artisan route:clear
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan optimize
php artisan queue:restart

# instructor free video id api data not found
'Courtney Gaines' => 'yuiwpaxy1c'
# instructor paid video id api data not found
'Alice Roveda' => 'u08cogjtxx',
'Alice Roveda' => '9f0fpmt4qg',


# command for create instructor videos data
php artisan create:generateInstructorVideoData
