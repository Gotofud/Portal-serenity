<?php

use App\Http\Controllers\Admin\Service\ContactController;
use App\Http\Controllers\GetData;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Middleware\Security;
use App\Models\Master\Block;
use App\Models\Master\CommunityUnit;
use App\Models\Master\Faq;
use App\Models\Master\House;
use App\Models\Master\NeighborhoodUnit;
use App\Models\Resident\User;
use App\Models\Service\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Auth Biasa
Auth::routes();
// Auth Google
Route::get('/auth/google', [GoogleAuthController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);
// Route Get RT
Route::get('/get-rt/{community_id}', [GetData::class, 'getRt']);
// Route Get Blok
Route::get('/get-block/{community_id}/{neighborhood_id}', [GetData::class, 'getBlock']);
// Route Get House
Route::get('/get-house/{community_id}/{neighborhood_id}/{block_id}', [GetData::class, 'getHouse']);
// Route OTP
Route::middleware(['auth'])->group(function () {
    Route::get('/verify-otp', [App\Http\Controllers\OtpController::class, 'showForm'])->name('verify-otp.view');
    Route::post('/verify-otp', [App\Http\Controllers\OtpController::class, 'verify'])->name('verify-otp.submit');
    Route::post('/verify-otp/resend', [App\Http\Controllers\OtpController::class, 'resend'])->name('verify-otp.resend');
});

// Admin Route
Route::middleware(['auth', 'is_verified'])->group(function () {
    // Master
    Route::prefix('dashboard')->as('dashboard.')->middleware([Security::class])->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
        // Community Unit
        Route::resource('/community-unit', App\Http\Controllers\Admin\Master\CUController::class);
        Route::get('/community-unit-export', [App\Http\Controllers\Admin\Master\CUController::class, 'export'])->name('community-unit.export');
        Route::post('/community-unit-import', [App\Http\Controllers\Admin\Master\CUController::class, 'import'])->name('community-unit.import');
        Route::get('/community-unit-pdfexport', [App\Http\Controllers\Admin\Master\CUController::class, 'exportPdf'])->name('community-unit.exportPdf');
        // Neighborhood Unit
        Route::resource('/neighborhood-unit', App\Http\Controllers\Admin\Master\NUController::class);
        Route::post('/neighborhood-unit-import', [App\Http\Controllers\Admin\Master\NUController::class, 'import'])->name('neighborhood-unit.import');
        Route::get('/neighborhood-unit-pdfexport', [App\Http\Controllers\Admin\Master\NUController::class, 'exportPdf'])->name('neighborhood-unit.exportPdf');
        // Block
        Route::resource('/block', App\Http\Controllers\Admin\Master\BlockController::class);
        Route::post('/block-import', [App\Http\Controllers\Admin\Master\BlockController::class, 'import'])->name('block.import');
        Route::get('/block-pdfexport', [App\Http\Controllers\Admin\Master\BlockController::class, 'exportPdf'])->name('block.exportPdf');
        // Building Type
        Route::resource('/building-type', App\Http\Controllers\Admin\Master\BuildingTypes::class);
        Route::post('/building-type-import', [App\Http\Controllers\Admin\Master\BuildingTypes::class, 'import'])->name('building-type.import');
        Route::get('/building-type-pdfexport', [App\Http\Controllers\Admin\Master\BuildingTypes::class, 'exportPdf'])->name('building-type.exportPdf');
        // Stall Place
        Route::resource('/stall-place', App\Http\Controllers\Admin\Master\StallsPlaceController::class);
        Route::post('/stall-place-import', [App\Http\Controllers\Admin\Master\StallsPlaceController::class, 'import'])->name('stall-place.import');
        Route::get('/stall-place-pdfexport', [App\Http\Controllers\Admin\Master\StallsPlaceController::class, 'exportPdf'])->name('stall-place.exportPdf');
        // Vehicle Type
        Route::resource('/vehicle-type', App\Http\Controllers\Admin\Master\VehicleTypeController::class);
        Route::post('/vehicle-type-import', [App\Http\Controllers\Admin\Master\VehicleTypeController::class, 'import'])->name('vehicle-type.import');
        Route::get('/vehicle-type-pdfexport', [App\Http\Controllers\Admin\Master\VehicleTypeController::class, 'exportPdf'])->name('vehicle-type.exportPdf');
        // Report Categories
        Route::resource('/report-categories', App\Http\Controllers\Admin\Master\ReportCategories::class);
        Route::post('/report-categories-import', [App\Http\Controllers\Admin\Master\ReportCategories::class, 'import'])->name('report-categories.import');
        Route::get('/report-categories-pdfexport', [App\Http\Controllers\Admin\Master\ReportCategories::class, 'exportPdf'])->name('report-categories.exportPdf');
        // Guest Type
        Route::resource('/guest-type', App\Http\Controllers\Admin\Master\GuestTypeController::class);
        Route::post('/guest-type-import', [App\Http\Controllers\Admin\Master\GuestTypeController::class, 'import'])->name('guest-type.import');
        Route::get('/guest-type-pdfexport', [App\Http\Controllers\Admin\Master\GuestTypeController::class, 'exportPdf'])->name('guest-type.exportPdf');
        // Faq
        Route::resource('/faq', App\Http\Controllers\Admin\Master\FaqController::class);
        Route::post('/faq-import', [App\Http\Controllers\Admin\Master\FaqController::class, 'import'])->name('faq.import');
        Route::get('/faq-pdfexport', [App\Http\Controllers\Admin\Master\FaqController::class, 'exportPdf'])->name('faq.exportPdf');
        // Banner
        Route::resource('/banner', App\Http\Controllers\Admin\Master\BannerController::class);
        // House
        Route::resource('/house', App\Http\Controllers\Admin\Master\HouseController::class);
        Route::post('/house-import', [App\Http\Controllers\Admin\Master\HouseController::class, 'import'])->name('house.import');
        Route::get('/house-pdfexport', [App\Http\Controllers\Admin\Master\HouseController::class, 'exportPdf'])->name('house.exportPdf');
        // Template Excel
        Route::get('/template/{type}', function ($type) {

            $files = [
                // Master
                'rw' => 'template-excel-rw.xlsx',
                'rt' => 'template-excel-rt.xlsx',
                'block' => 'template-excel-block.xlsx',
                'building-type' => 'template-excel-building-type.xlsx',
                'guest-type' => 'template-excel-guest-type.xlsx',
                'vehicle-type' => 'template-excel-vehicle-type.xlsx',
                'stall-place' => 'template-excel-stall-place.xlsx',
                'house' => 'template-excel-house.xlsx',
                'faq' => 'template-excel-faq.xlsx',
                'report-categories' => 'template-excel-report-categories.xlsx',
                // Banner Belum
                // Resident
                'operator' => 'template-excel-operator.xlsx',
                // Service
                'news' => 'template-excel-news.xlsx',
                'announcement' => 'template-excel-announcement.xlsx',
                // Finance
                'bill' => 'template-excel-bill.xlsx',
                'agreement' => 'template-excel-agreement.xlsx',
            ];

            if (!array_key_exists($type, $files)) {
                abort(404);
            }

            return response()->download(
                storage_path('app/public/templates/' . $files[$type])
            );

        })->name('template.download');
    });
    // Service
    Route::prefix('service')->as('service.')->middleware(['auth', Security::class])->group(function () {
        Route::resource('/announcements', App\Http\Controllers\Admin\Service\AnnouncementsController::class);
        Route::post('/publish-announcements/{announcement}', [App\Http\Controllers\Admin\Service\AnnouncementsController::class, 'publish'])->name('announcements.publish');
        Route::get('/announcements-pdfexport', [App\Http\Controllers\Admin\Service\AnnouncementsController::class, 'exportPdf'])->name('announcements.exportPdf');
        Route::resource('/report', App\Http\Controllers\Admin\Service\ReportController::class);
        Route::get('/report-pdfexport', [App\Http\Controllers\Admin\Service\ReportController::class, 'exportPdf'])->name('report.exportPdf');
        Route::post('/report/{report}/accept', [App\Http\Controllers\Admin\Service\ReportController::class, 'accept'])->name('report.accept');
        Route::post('/report/{report}/complete', [App\Http\Controllers\Admin\Service\ReportController::class, 'complete'])->name('report.complete');
        Route::post('/report/{report}/reject', [App\Http\Controllers\Admin\Service\ReportController::class, 'reject'])->name('report.reject');
        Route::resource('/stall', App\Http\Controllers\Admin\Service\StallController::class);
        Route::get('/stall-pdfexport', [App\Http\Controllers\Admin\Service\StallController::class, 'exportPdf'])->name('stall.exportPdf');
        Route::resource('/contact', App\Http\Controllers\Admin\Service\ContactController::class);
        Route::get('/contact-pdfexport', [App\Http\Controllers\Admin\Service\ContactController::class, 'exportPdf'])->name('contact.exportPdf');
        Route::get('/contact/{contact}/reply', [ContactController::class, 'reply'])
            ->name('contact.reply');
        Route::post('/contact/{contact}/reply', [ContactController::class, 'sendReply'])
            ->name('contact.sendReply');
        Route::resource('/news', App\Http\Controllers\Admin\Service\NewsController::class);
        Route::get('/news-pdfexport', [App\Http\Controllers\Admin\Service\NewsController::class, 'exportPdf'])->name('news.exportPdf');
        // Route Support
        Route::get('/support', function () {
            return view('admin.service.support');
        })->name('support');
        ;
    });
    // Resident
    Route::prefix('resident')->as('resident.')->middleware(['auth', Security::class])->group(function () {
        Route::resource('/operator', App\Http\Controllers\Admin\Resident\OperatorController::class);
        Route::post('/operator-import', [App\Http\Controllers\Admin\Resident\OperatorController::class, 'import'])->name('operator.import');
        Route::get('/operator-pdfexport', [App\Http\Controllers\Admin\Resident\OperatorController::class, 'exportPdf'])->name('operator.exportPdf');
        Route::resource('/user', App\Http\Controllers\Admin\Resident\UserController::class);
        Route::get('/user-pdfexport', [App\Http\Controllers\Admin\Resident\UserController::class, 'exportPdf'])->name('user.exportPdf');
        Route::resource('/guest', App\Http\Controllers\Admin\Resident\GuestController::class);
        Route::get('/guest-pdfexport', [App\Http\Controllers\Admin\Resident\GuestController::class, 'exportPdf'])->name('guest.exportPdf');
    });
    // Finance
    Route::prefix('finance')->as('finance.')->middleware(['auth', Security::class])->group(function () {
        Route::resource('/agreement', App\Http\Controllers\Admin\Finance\AgreementController::class);
        Route::get('/agreement-pdfexport', [App\Http\Controllers\Admin\Finance\AgreementController::class, 'exportPdf'])->name('agreement.exportPdf');
        Route::resource('/bill', App\Http\Controllers\Admin\Finance\BillController::class);
        Route::get('/bill-pdfexport', [App\Http\Controllers\Admin\Finance\BillController::class, 'exportPdf'])->name('bill.exportPdf');
        Route::post('/generate-bill', [App\Http\Controllers\Admin\Finance\BillController::class, 'generateBill'])->name('bill.generate');
        Route::get('/bill-export', [App\Http\Controllers\Admin\Finance\BillController::class, 'export'])->name('bill.export');
        Route::get('/bill-import', [App\Http\Controllers\Admin\Finance\BillController::class, 'import'])->name('bill.import');
        Route::post('/bill-import', [App\Http\Controllers\Admin\Finance\BillController::class, 'importProcess'])->name('bill.importProcess');
    });
});


// User Route
Route::get('/', function () {
    $faq = Faq::where('status', 'Aktif')->get()->groupBy('category');
    $mainNews = News::latest()->first();
    $recentNews = News::inRandomOrder()->limit(2)->get();
    $otherNews = News::inRandomOrder()->limit(4)->get();
    $house = House::all()->count();
    $user = $user = User::whereHas('roles', function ($role) {
        $role->whereIn('name', ['Resident', 'Onboarding']);
    })->count();
    $rt = NeighborhoodUnit::all()->count();
    $rw = CommunityUnit::all()->count();
    return view('welcome', compact('faq', 'mainNews', 'recentNews', 'house', 'user', 'rt', 'rw', 'otherNews'));
})->name('home');
Route::resource('/contact', App\Http\Controllers\User\Service\Contact::class);
// Route Berita User
Route::prefix('services')->as('services.')->group(function () {
    Route::resource('news', App\Http\Controllers\User\Service\NewsController::class);
});
// Midtrans Callback
Route::post('/midtrans/callback', [App\Http\Controllers\User\MidtransController::class, 'callback']);
Route::middleware(['auth', 'is_verified'])->group(function () {
    Route::get('profile', function () {
        return view('user.profile.profile');
    })->name('profile');
    Route::resource('user-profile', App\Http\Controllers\User\UserProfileController::class);
    Route::resource('user-dashboard', App\Http\Controllers\User\Dashboard::class);
    Route::post('/storehouse', [App\Http\Controllers\User\Dashboard::class, 'storehouse'])
        ->name('user-dashboard.storehouse');
    Route::post('/storehouse/{id}', [App\Http\Controllers\User\Dashboard::class, 'updatehouse'])
        ->name('user-dashboard.updatehouse');
    Route::post('/storevehicle', [App\Http\Controllers\User\Dashboard::class, 'storevehicle'])
        ->name('user-dashboard.storevehicle');
    Route::post('/storevehicle/{id}', [App\Http\Controllers\User\Dashboard::class, 'updatevehicle'])
        ->name('user-dashboard.updatevehicle');
    Route::prefix('services')->as('services.')->group(function () {
        Route::resource('announcements', App\Http\Controllers\User\Service\AnnouncementsController::class);
        Route::resource('stall', App\Http\Controllers\User\Service\StallController::class);
        Route::get('payment/{id}', [App\Http\Controllers\User\Service\StallController::class, 'pay'])
            ->name('payment.pay');
        Route::resource('guest', App\Http\Controllers\User\Service\GuestController::class);
        Route::resource('report', App\Http\Controllers\User\Service\ReportController::class);
    });
    Route::prefix('finances')->as('finances.')->group(function () {
        Route::resource('bill', App\Http\Controllers\User\Finance\BillsController::class);
        Route::get('payment/{id}', [App\Http\Controllers\User\Finance\BillsController::class, 'pay'])
            ->name('payment.pay');
    });
});