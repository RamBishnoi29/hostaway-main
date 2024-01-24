<?php

use App\Http\Controllers\BedroomsController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\BedTypeController;
use App\Http\Controllers\HostawayController;
use App\Http\Controllers\ListingsController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\AmenitiesController;
use App\http\Controllers\Hostaway\PropertyTypesController;
use App\http\Controllers\Hostaway\HostawayListingController;
use App\http\Controllers\Hostaway\HostawayPricingController;
use App\http\Controllers\Hostaway\HostawayMediaController;
use App\http\Controllers\Hostaway\HostawayFeaturesController;
use App\http\Controllers\Hostaway\HostawayLocationController;
use App\http\Controllers\Hostaway\HostawayBedroomsController;
use App\http\Controllers\Hostaway\HostawayTermsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'index']);
Route::get('/register', [UserController::class, 'register']);
Route::get('/forgot', [UserController::class, 'forgot']);
//Route::get('/reset',[UserController::class,'reset']);
Route::get('/reset/{email}/{token}', [UserController::class, 'reset'])->name('reset');

Route::post('/register', [UserController::class, 'saveUser'])->name('auth.register');
Route::post('/login', [UserController::class, 'loginUser'])->name('auth.login');
Route::post('/forgot', [UserController::class, 'forgotPassword'])->name('auth.forgot');
Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('auth.reset');



Route::group(['middleware' => ['LoginCheck']], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/addlisting', [ListingsController::class, 'addlisting']);
    Route::post('/addlisting', [ListingsController::class, 'savelisting'])->name('savelisting');
    Route::get('/addpricing', [PricingController::class, 'addpricing'])->name('addpricing');
    Route::post('/addpricing', [PricingController::class, 'savepricing'])->name('savepricing');

    Route::get('/addmedia', [MediaController::class, 'addmedia'])->name('addmedia');
    Route::post('/addmedia', [MediaController::class, 'savemedia'])->name('savemedia');

    Route::get('/addfeatures', [FeaturesController::class, 'addfeatures'])->name('addfeatures');

    Route::get('/addlocation', [LocationController::class, 'addlocation'])->name('addlocation');
    Route::post('/addlocation', [LocationController::class, 'savelocation'])->name('savelocation');

    Route::get('/addbedrooms', [BedroomsController::class, 'addbedrooms'])->name('addbedrooms');
    Route::post('/addbedrooms', [BedroomsController::class, 'savebedrooms'])->name('savebedrooms');

    Route::get('/addterms', [TermsController::class, 'addterms'])->name('addterms');
    Route::post('/addtrems', [TermsController::class, 'saveterms'])->name('saveterms');


    Route::get('/mylisting', [ListingsController::class, 'mylisting']);
    Route::get('/hostaway', [HostawayController::class, 'hostaway'])->name('hostaway');
    Route::post('/hostaway', [HostawayController::class, 'savelisting'])->name('savelisting');

    Route::get('/updatelisting/{id}', [ListingsController::class, 'updatelisting']);
    Route::post('/update_listing', [ListingsController::class, 'update_listing'])->name('update_listing');
    Route::post('/update_bedrooms', [BedroomsController::class, 'update_bedrooms'])->name('update_bedrooms');

    Route::get('/addamenities', [AmenitiesController::class, 'addamenities'])->name('addamenities');
    Route::post('/addamenities', [AmenitiesController::class, 'saveamenities'])->name('saveamenities');
   

    Route::get('/addbedtype', [BedTypeController::class, 'addbedtype'])->name('addbedtype');
    Route::post('/addbedtype', [BedTypeController::class, 'savebedtype'])->name('savebedtype');

    Route::get('/addPropertyTypes', [PropertyTypesController::class, 'addPropertyTypes'])->name('addPropertyTypes');
    Route::post('/addPropertyTypes', [PropertyTypesController::class, 'savePropertytype'])->name('savePropertytype');

     Route::get('/addpropertyfromHostaway', [PropertyTypesController::class, 'addpropertyfromHostaway'])->name('addpropertyfromHostaway');
    Route::get('/addbedtypefromHostaway', [HostawayBedTypeController::class, 'addbedtypefromHostaway'])->name('addbedtypefromHostaway');
    Route::post('/addbedtypefromHostaway', [HostawayBedTypeController::class, 'savebedtype'])->name('savebedtype');
    Route::get('/addamenitiesfromHostaway', [HostawayAmenitiesController::class, 'addamenitiesfromHostaway'])->name('addamenitiesfromHostaway');
    Route::get('/addHostawayListing', [HostawayListingController::class, 'addHostawayListing'])->name('addHostawayListing');
    Route::post('/addHostawayListing', [HostawayListingController::class, 'savehostawaylisting'])->name('savehostawaylisting');
    Route::get('/addhostawaypricing', [HostawayPricingController::class, 'hostawaypricings'])->name('hostawaypricings');
  
    Route::post('/addhostawaypricing', [HostawayPricingController::class, 'saveHostawaypricing'])->name('saveHostawaypricing');
    Route::get('/authHostaway', [PropertyTypesController::class, 'authHostaway'])->name('authHostaway');
    Route::get('/addhostawaymedia', [HostawayMediaController::class, 'addHostamedia'])->name('addHostamedia');
    Route::post('/addhostawaymedia', [HostawayMediaController::class, 'saveHostamedia'])->name('saveHostamedia');
    Route::get('/addhostawayamenities', [HostawayFeaturesController::class, 'addfeatures'])->name('addfeatures');
    Route::post('/addhostawayamenities', [HostawayFeaturesController::class, 'savefeatures'])->name('savefeatures');
    
    Route::get('/addhostawaylocation', [HostawayLocationController::class, 'addlocation'])->name('addlocation');
    Route::post('/addhostawaylocation', [HostawayLocationController::class, 'savelocation'])->name('savelocation');

    Route::get('/addhostawaybedrooms', [HostawayBedroomsController::class, 'addbedrooms'])->name('addbedrooms');
    Route::post('/addhostawaybedrooms', [HostawayBedroomsController::class, 'savebedrooms'])->name('savebedrooms');
   
    Route::get('/addhostawayterms', [HostawayTermsController::class, 'addterms'])->name('addterms');
    Route::post('/addhostawayterms', [HostawayTermsController::class, 'saveterms'])->name('saveterms');

    Route::get('/logout', [UserController::class, 'logout'])->name('auth.logout');
});
