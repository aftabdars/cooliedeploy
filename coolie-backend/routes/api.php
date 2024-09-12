<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\RemixController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReleaseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LyricController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LandingPageImage;
use App\Http\Controllers\FrontEndConfigController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//AUTH
route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//FrontendConfig
Route::get('/frontendconfig', [FrontEndConfigController::class, 'index']);

// Singles routes
Route::get('/singles', [SingleController::class, 'index']);

// Albums routes
Route::get('/albums', [AlbumController::class, 'index']);

// Remixes routes
Route::get('/remixes', [RemixController::class, 'index']);

// News routes
Route::get('/news', [NewsController::class, 'index']);

// Releases routes
Route::get('/releases', [ReleaseController::class, 'index']);

// Events routes
Route::get('/events', [EventController::class, 'index']);

// Lyrics routes
Route::get('/lyrics', [LyricController::class, 'index']);

// Posts routes
Route::get('/posts', [PostController::class, 'index']);

// Reviews routes
Route::get('/reviews', [ReviewController::class, 'index']);


Route::middleware('auth:sanctum')->group(function () {
    
    //FRONTEND CONFIG
    Route::post('/landingpageimage', [LandingPageImage::class, 'store']);
    Route::post('/updatespotifylink', [FrontEndConfigController::class, 'updateSpotifyLink']);
    Route::post('/updatebiographytext', [FrontEndConfigController::class, 'updateBiographyText']);
    Route::post('/updatefacebooklink', [FrontEndConfigController::class, 'updateFacebookLink']);
    Route::post('/updateinstagramlink', [FrontEndConfigController::class, 'updateInstagramLink']);
    Route::post('/updateyoutubelink', [FrontEndConfigController::class, 'updateYoutubeLink']);
    Route::post('/updatesoundcloudlink', [FrontEndConfigController::class, 'updateSoundCloudLink']);
    Route::post('/updatespotifysonglink', [FrontEndConfigController::class, 'updateSpotifySongLink']);
    Route::post('/updatephonecontact', [FrontEndConfigController::class, 'updatePhoneContact']);
    Route::post('/updatebookingscontact', [FrontEndConfigController::class, 'updateBookingsContact']);
    Route::post('/updatemanagementcontact', [FrontEndConfigController::class, 'updateManagementContact']);
    Route::post('/updateprcontact', [FrontEndConfigController::class, 'updatePrContact']);

    //SINGLES
    Route::post('/singles', [SingleController::class, 'store']);
    Route::get('/singles/{id}', [SingleController::class, 'show']);
    Route::put('/singles/{id}', [SingleController::class, 'update']);
    Route::delete('/singles/{id}', [SingleController::class, 'destroy']);

    //ALBUMS
    Route::post('/albums', [AlbumController::class, 'store']);
    Route::get('/albums/{id}', [AlbumController::class, 'show']);
    Route::put('/albums/{id}', [AlbumController::class, 'update']);
    Route::delete('/albums/{id}', [AlbumController::class, 'destroy']);

    // Remixes routes
    Route::post('/remixes', [RemixController::class, 'store']);
    Route::get('/remixes/{id}', [RemixController::class, 'show']);
    Route::put('/remixes/{id}', [RemixController::class, 'update']);
    Route::delete('/remixes/{id}', [RemixController::class, 'destroy']);

    // News routes
    Route::post('/news', [NewsController::class, 'store']);
    Route::get('/news/{id}', [NewsController::class, 'show']);
    Route::put('/news/{id}', [NewsController::class, 'update']);
    Route::delete('/news/{id}', [NewsController::class, 'destroy']);

    // Releases routes
    Route::post('/releases', [ReleaseController::class, 'store']);
    Route::get('/releases/{id}', [ReleaseController::class, 'show']);
    Route::put('/releases/{id}', [ReleaseController::class, 'update']);
    Route::delete('/releases/{id}', [ReleaseController::class, 'destroy']);

    // Events routes
    Route::post('/events', [EventController::class, 'store']);
    Route::get('/events/{id}', [EventController::class, 'show']);
    Route::put('/events/{id}', [EventController::class, 'update']);
    Route::delete('/events/{id}', [EventController::class, 'destroy']);

    // Lyrics routes
    Route::post('/lyrics', [LyricController::class, 'store']);
    Route::get('/lyrics/{id}', [LyricController::class, 'show']);
    Route::put('/lyrics/{id}', [LyricController::class, 'update']);
    Route::delete('/lyrics/{id}', [LyricController::class, 'destroy']);

    // Posts routes
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts/{id}', [PostController::class, 'show']);
    Route::put('/posts/{id}', [PostController::class, 'update']);
    Route::delete('/posts/{id}', [PostController::class, 'destroy']);

    // Reviews routes
    Route::post('/reviews', [ReviewController::class, 'store']);
    Route::get('/reviews/{id}', [ReviewController::class, 'show']);
    Route::put('/reviews/{id}', [ReviewController::class, 'update']);
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']);

});