<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeamSection;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\loginController;
use App\Http\Controllers\AdminController\BannerController;
use App\Http\Controllers\AdminController\AboutSection;
use App\Http\Controllers\AdminController\TeamController;
use App\Http\Controllers\AdminController\EventSection;
use App\Http\Controllers\AdminController\NewsSection;
use App\Http\Controllers\AdminController\FaqsSection;
use App\Http\Controllers\AdminController\MemberController;
use App\Http\Controllers\UserController;


// Web site Routes

Route::get('/',[IndexController::class,'index']);
Route::get('about',[AboutController::class,'index']);
Route::get('chairman-message',[AboutController::class,'chairmanMessage']);
Route::get('vision-mission',[AboutController::class,'visionMission']);
Route::get('our-team',[TeamSection::class,'index']);
Route::get('events',[EventsController::class,'index']);
Route::get('events-details/{slug}',[EventsController::class,'eventsDetails']);
Route::get('news',[NewsController::class,'index']);
Route::get('news-details/{slug}',[NewsController::class,'newDetails']);
Route::get('team',[TeamSection::class,'index']);
Route::get('contact',[ContactController::class,'index'])->middleware('construction');
Route::get('complaint',[IndexController::class,'complaint'])->middleware('construction');
Route::get('donate',[IndexController::class,'donate'])->middleware('construction');
Route::get('pay-online',[IndexController::class,'payOnline'])->middleware('construction');
Route::post('/sendEnquiry',[IndexController::class,'SaveEnquiryData'])->name('enquiry-form');
Route::post('/savesubscriber',[IndexController::class,'SaveSubscriber']);

// Member routes
Route::get('/login',[UserController::class,'index']);
Route::post('/LoginProcess',[UserController::class,'LoginProcess']);
Route::get('/member-dashboard',[UserController::class,'member']);

// Admin Routes

Route::get('/admin-login',[loginController::class,'index'])->middleware('allreadyLogged');
Route::get('/admin-register',[loginController::class,'register'])->middleware('allreadyLogged');;
Route::post('/register',[loginController::class,'registerProcess'])->name('register');
Route::post('/login',[loginController::class,'loginProcess'])->name('login');


    Route::get('/dashboard',[loginController::class,'dashboard'])->middleware('IsAdmin');
    Route::get('/logout',[loginController::class,'logOut'])->name('logout')->middleware('IsAdmin');
    Route::get('/profile',[loginController::class,'ViewAdminProfile'])->middleware('IsAdmin');
    Route::post('/UpdateProfile',[loginController::class,'UpdateAdminProfile'])->middleware('IsAdmin');
    Route::get('/user-list',[MemberController::class,'index'])->middleware('IsAdmin');
    Route::get('/AddUser',[MemberController::class,'AddUser'])->middleware('IsAdmin');
    Route::post('/AddUser',[MemberController::class,'AddUser'])->middleware('IsAdmin');
    Route::post('/CheckAlreadyEmail',[MemberController::class,'CheckAlreadyEmail'])->middleware('IsAdmin');
    Route::get('/edit-user/{id}',[MemberController::class,'index'])->middleware('IsAdmin');
    Route::get("/delete-user/{id}",[MemberController::class,'DeleteUser'])->middleware('IsAdmin');



    Route::get('/home-banner',[BannerController::class,'index'])->middleware('IsAdmin');
    Route::post('/banner',[BannerController::class,'AddBanner'])->name('banner')->middleware('IsAdmin');
    Route::get("edit-banner/{id}",[BannerController::class,'index'])->middleware('IsAdmin');
    Route::get("delete-banner/{id}",[BannerController::class,'DeleteBanner'])->middleware('IsAdmin');

    // about section route
    Route::get('/about-section',[AboutSection::class,'index'])->middleware('IsAdmin');
    Route::get('/ManageAbout',[AboutSection::class,'AddUpdateAbout'])->middleware('IsAdmin');
    Route::post('/addAbout',[AboutSection::class,'AddUpdateAbout'])->middleware('IsAdmin');
    Route::get('/edit-about/{id}',[AboutSection::class,'index'])->middleware('IsAdmin');
    Route::get("/delete-about/{id}",[AboutSection::class,'DeleteAbout'])->middleware('IsAdmin');

    //  Events Routes 
    Route::get('/eventlist',[EventSection::class,'index'])->middleware('IsAdmin');
    Route::get('/AddEvent',[EventSection::class,'AddEvent'])->middleware('IsAdmin');
    Route::post('/AddEvent',[EventSection::class,'AddEvent'])->middleware('IsAdmin');
    Route::get('/edit-event/{id}',[EventSection::class,'index'])->middleware('IsAdmin');
    Route::get("/delete-event/{id}",[EventSection::class,'DeleteEvent'])->middleware('IsAdmin');

    // Multiples Events images.
    Route::get('/multipleimglist',[EventSection::class,'multipleimagelist'])->middleware('IsAdmin');
    Route::get('/addmultipleimage',[EventSection::class,'multipleimageform'])->middleware('IsAdmin');
    Route::post('/addmultipleimage',[EventSection::class,'multipleimageform'])->middleware('IsAdmin');
    Route::get('/edit-photo/{id}',[EventSection::class,'multipleimagelist'])->middleware('IsAdmin');
    Route::get("/delete-photos/{id}",[EventSection::class,'DeletePhotos'])->middleware('IsAdmin');

    // News Route 
    Route::get('/newslist',[NewsSection::class,'index'])->middleware('IsAdmin');
    Route::get('/AddNews',[NewsSection::class,'AddNews'])->middleware('IsAdmin');
    Route::post('/AddNews',[NewsSection::class,'AddNews'])->middleware('IsAdmin');
    Route::get('/edit-news/{id}',[NewsSection::class,'index'])->middleware('IsAdmin');
    Route::get("/delete-news/{id}",[NewsSection::class,'DeleteNews'])->middleware('IsAdmin');

    // FAQs Route 
    Route::get('/faqslist',[FaqsSection::class,'index'])->middleware('IsAdmin');
    Route::get('/AddFaqs',[FaqsSection::class,'AddFaqs'])->middleware('IsAdmin');
    Route::post('/AddFaqs',[FaqsSection::class,'AddFaqs'])->middleware('IsAdmin');
    Route::get('/edit-faqs/{id}',[FaqsSection::class,'index'])->middleware('IsAdmin');
    Route::get("/delete-faqs/{id}",[FaqsSection::class,'DeleteFaqs'])->middleware('IsAdmin');

    // Subscriber Route
    Route::get('/subscriberlist',[loginController::class,'subscriberlist'])->middleware('IsAdmin');
    Route::get("/delete-subscriber/{id}",[loginController::class,'DeleteSubscriber'])->middleware('IsAdmin');

    // Teams Routes 
    Route::get('/teamlist',[TeamController::class,'index'])->middleware('IsAdmin');
    Route::get('/AddTeam',[TeamController::class,'AddTeam'])->middleware('IsAdmin');
    Route::post('/AddTeam',[TeamController::class,'AddTeam'])->middleware('IsAdmin');
    Route::get('/edit-team/{id}',[TeamController::class,'index'])->middleware('IsAdmin');
    Route::get("/delete-team/{id}",[TeamController::class,'DeleteTeam'])->middleware('IsAdmin');