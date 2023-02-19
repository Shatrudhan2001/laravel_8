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
use App\Http\Controllers\AdminController\EnquiryController;
use App\Http\Controllers\AdminController\ImportController;
use App\Http\Controllers\UserController;


// Web site Routes

Route::get('/',[IndexController::class,'index'])->middleware('XssSanitizer');
Route::get('about',[AboutController::class,'index']);
Route::get('chairman-message',[AboutController::class,'chairmanMessage']);
Route::get('vision-mission',[AboutController::class,'visionMission']);
Route::get('our-team',[TeamSection::class,'index']);
Route::get('events',[EventsController::class,'index']);
Route::get('events-details/{slug}',[EventsController::class,'eventsDetails']);
Route::get('news',[NewsController::class,'index']);
Route::get('news-details/{slug}',[NewsController::class,'newDetails']);
Route::get('team',[TeamSection::class,'index']);
Route::get('default-member',[IndexController::class,'defaultMemberList']);


Route::group(['middleware' => ['XssSanitizer']], function () {
    Route::get('contact',[ContactController::class,'index']);
    Route::post('SaveEnquiry',[ContactController::class,'SaveEnquiry']);
});

Route::get('complaint',[IndexController::class,'complaint'])->middleware('construction');
Route::get('donate',[IndexController::class,'donate']);
Route::post('donate',[IndexController::class,'donate']);
Route::get('pay-online',[IndexController::class,'payOnline'])->middleware('construction');
Route::post('/sendEnquiry',[IndexController::class,'SaveEnquiryData'])->name('enquiry-form');
Route::post('/savesubscriber',[IndexController::class,'SaveSubscriber']);

// Member routes
Route::get('/member-login',[UserController::class,'index'])->middleware('XssSanitizer','IsMemberLogged');
//Route::post('/MemberLoginProcess',[UserController::class,'MemberLoginProcess'])->middleware('XssSanitizer','IsMemberLogged');
Route::post('/MemberLoginProcess',[UserController::class,'MemberLoginProcess']);

Route::get('/member-registration',[MemberController::class,'register'])->middleware('XssSanitizer');
Route::post('/create-member',[MemberController::class,'createMember']);
//Route::post('/MemberLoginProcess',[UserController::class,'MemberLoginProcess']);
Route::post('/checkEmail',[MemberController::class,'EmailIdAlreadyExist']);
Route::get('/send-mail',[MemberController::class,'getPasswordEmail']);


        
Route::group(['middleware' => ['IsMember']], function () {
    Route::group(['middleware' => ['XssSanitizer']], function () {
        Route::get('/member-dashboard',[UserController::class,'member']);
        Route::get('/edit-member',[MemberController::class,'register']);
        Route::post('/update-member',[UserController::class,'UpdateMember']);
        Route::get('/member-logout',[UserController::class,'MemberLogout']);
        Route::get('/update-password',[UserController::class,'ChangePassword']);
        Route::post('/update-password',[UserController::class,'ChangePassword']);
        Route::get('/payment-history',[MemberController::class,'PaymentHistory']);
    });
});



// Admin Routes

Route::get('/admin-login',[loginController::class,'index'])->middleware('allreadyLogged');
Route::get('/admin-register',[loginController::class,'register'])->middleware('allreadyLogged');;
Route::post('/register',[loginController::class,'registerProcess'])->name('register');
Route::post('/login',[loginController::class,'loginProcess'])->name('login');

Route::group(['middleware' => ['IsAdmin']], function () {
    Route::get('/dashboard',[loginController::class,'dashboard']);
    Route::get('/logout',[loginController::class,'logOut'])->name('logout');
    Route::get('/profile',[loginController::class,'ViewAdminProfile']);
    Route::post('/UpdateProfile',[loginController::class,'UpdateAdminProfile']);
    Route::get('/member-list',[MemberController::class,'index']);
    Route::get('/AddUser',[MemberController::class,'AddUser']);
    Route::get('/add-member',[MemberController::class,'AddUser']);
    Route::post('/AddUser',[MemberController::class,'AddUser']);
    Route::post('/CheckAlreadyEmail',[MemberController::class,'CheckAlreadyEmail']);
    Route::get('/edit-user/{id}',[MemberController::class,'index']);
    Route::get("/delete-user/{id}",[MemberController::class,'DeleteUser']);
    Route::get('/payment-history/{id}',[MemberController::class,'PaymentHistory']);
    Route::get('/ToPayment/{id}',[MemberController::class,'ToPayment']);
    Route::post('/ToPaymentProcess',[MemberController::class,'ToPaymentProcess']);
    Route::get('/donar-list',[UserController::class,'donarList']);
    Route::get('/delete-donar/{id}',[UserController::class,'DeleteDonar']);



    Route::get('/home-banner',[BannerController::class,'index']);
    Route::post('/banner',[BannerController::class,'AddBanner'])->name('banner');
    Route::get("edit-banner/{id}",[BannerController::class,'index']);
    Route::get("delete-banner/{id}",[BannerController::class,'DeleteBanner']);

    // about section route
    Route::get('/about-section',[AboutSection::class,'index']);
    Route::get('/ManageAbout',[AboutSection::class,'AddUpdateAbout']);
    Route::post('/addAbout',[AboutSection::class,'AddUpdateAbout']);
    Route::get('/edit-about/{id}',[AboutSection::class,'index']);
    Route::get("/delete-about/{id}",[AboutSection::class,'DeleteAbout']);

    //  Events Routes 
    Route::get('/eventlist',[EventSection::class,'index']);
    Route::get('/AddEvent',[EventSection::class,'AddEvent']);
    Route::post('/AddEvent',[EventSection::class,'AddEvent']);
    Route::get('/edit-event/{id}',[EventSection::class,'index']);
    Route::get("/delete-event/{id}",[EventSection::class,'DeleteEvent']);

    // Multiples Events images.
    Route::get('/multipleimglist',[EventSection::class,'multipleimagelist']);
    Route::get('/addmultipleimage',[EventSection::class,'multipleimageform']);
    Route::post('/addmultipleimage',[EventSection::class,'multipleimageform']);
    Route::get('/edit-photo/{id}',[EventSection::class,'multipleimagelist']);
    Route::get("/delete-photos/{id}",[EventSection::class,'DeletePhotos']);

    // News Route 
    Route::get('/newslist',[NewsSection::class,'index']);
    Route::get('/AddNews',[NewsSection::class,'AddNews']);
    Route::post('/AddNews',[NewsSection::class,'AddNews']);
    Route::get('/edit-news/{id}',[NewsSection::class,'index']);
    Route::get("/delete-news/{id}",[NewsSection::class,'DeleteNews']);

    // FAQs Route 
    Route::get('/faqslist',[FaqsSection::class,'index']);
    Route::get('/AddFaqs',[FaqsSection::class,'AddFaqs']);
    Route::post('/AddFaqs',[FaqsSection::class,'AddFaqs']);
    Route::get('/edit-faqs/{id}',[FaqsSection::class,'index']);
    Route::get("/delete-faqs/{id}",[FaqsSection::class,'DeleteFaqs']);

    // Subscriber Route
    Route::get('/subscriberlist',[loginController::class,'subscriberlist']);
    Route::get("/delete-subscriber/{id}",[loginController::class,'DeleteSubscriber']);

    // Enquiry Route
     Route::get('/enquirylist',[EnquiryController::class,'index']);
    Route::get("/delete-enquiry/{id}",[EnquiryController::class,'DeleteRecored']);

    // Teams Routes 
    Route::get('/teamlist',[TeamController::class,'index']);
    Route::get('/AddTeam',[TeamController::class,'AddTeam']);
    Route::post('/AddTeam',[TeamController::class,'AddTeam']);
    Route::get('/edit-team/{id}',[TeamController::class,'index']);
    Route::get("/delete-team/{id}",[TeamController::class,'DeleteTeam']);

    //  Upload Excel file
    Route::post('/uploadcsv',[ImportController::class,'import']);
    

});