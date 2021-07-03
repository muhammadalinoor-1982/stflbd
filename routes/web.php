<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
     return view('welcome');
 });

Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/verify','Auth\RegisterController@verifyUser')->name('verify.user');
Route::get('/HomePage', 'frontend\FrontendController@homepage')->name('HomePage.view');

Route::get('Agro/Products/view', 'frontend\FrontendController@AgroProductsView')->name('AgroProducts.view');
Route::get('Agro/Products/details/{id}', 'frontend\FrontendController@AgroProductsDetails')->name('AgroProducts.details');

Route::get('Fashion/Products/view', 'frontend\FrontendController@FashionProductsView')->name('FashionProducts.view');
Route::get('Fashion/Products/details/{id}', 'frontend\FrontendController@FashionProductsDetails')->name('FashionProducts.details');

Route::get('Luxury/Products/view', 'frontend\FrontendController@LuxuryProductsView')->name('LuxuryProducts.view');
Route::get('Luxury/Products/details/{id}', 'frontend\FrontendController@LuxuryProductsDetails')->name('LuxuryProducts.details');



Route::get('ContactUs/view', 'frontend\ContactUsController@view')->name('ContactUs.view');
Route::get('AboutUs/view', 'frontend\AboutUsController@view')->name('AboutUs.view');
Route::get('Services/view', 'frontend\ServicesController@view')->name('Services.view');

Route::prefix('Subscribe')->group(function()
{
    Route::post('Subscribe/store', 'frontend\SubscriptionController@store')->name('Subscribe.store');
});

Route::group(['middleware'=>['auth','Frontend']],function (){
    Route::get('/Frontend', 'frontend\FrontendController@view')->name('Frontend.view');


    Route::prefix('FrontendUser')->group(function()
    {
        Route::get('/edit/FrontendUser/','frontend\FrontendUserController@edit')->name('FrontendUser.edit');
        Route::post('/update/FrontendUser/','frontend\FrontendUserController@update')->name('FrontendUser.update');
    });
    Route::prefix('FrontendCustomerQuery')->group(function()
    {
        Route::get('FrontendCustomerQuery/view', 'frontend\FrontendCustomerQueryController@view')->name('FrontendCustomerQuery.view');
        Route::get('FrontendCustomerQuery/create', 'frontend\FrontendCustomerQueryController@create')->name('FrontendCustomerQuery.create');
        Route::post('FrontendCustomerQuery/store', 'frontend\FrontendCustomerQueryController@store')->name('FrontendCustomerQuery.store');
    });
    Route::prefix('CommentReply')->group(function()
    {
        Route::post('CommentReply/store/{id}', 'frontend\CommentReplyController@store')->name('CommentReply.store');
    });

});


Route::group(['middleware'=>['auth','Backend']],function (){
    /*Route::get('/home', 'HomeController@index')->name('home');*/
    Route::get('dashboard/index', 'backend\dashboardController@index')->name('dashboard.index');

    Route::prefix('user')->group(function()
    {
        Route::get('dashboard/index', 'backend\dashboardController@index')->name('dashboard.index');
        Route::get('/user/{id}','backend\UserController@profile')->name('user.profile');
        Route::get('/edit/user/','backend\UserController@edit')->name('user.edit');
        Route::post('/update/user/','backend\UserController@update')->name('user.update');
        Route::get('/userList/user', 'backend\userListController@userList')->name('user.userList');
        Route::get('/listEdit/user/{id}','backend\userListController@listEdit')->name('user.listEdit');
        Route::put('/listUpdate/user/{id}','backend\userListController@listUpdate')->name('user.listUpdate');
        Route::get('listDetails/user/{id}', 'backend\userListController@details')->name('user.listDetails');
        Route::delete('/destroy/user/{id}','backend\userListController@destroy')->name('user.destroy');
        Route::post('/restore/user/{id}','backend\userListController@restore')->name('user.restore');
        Route::delete('/force_delete/user/{id}','backend\userListController@force_delete')->name('user.force_delete');
        Route::get('/active/user/{id}','backend\userListController@active')->name('user.active');
        Route::get('/inactive/user/{id}','backend\userListController@inactive')->name('user.inactive');
    });

    Route::prefix('agro')->group(function()
    {
        Route::get('agro/view', 'backend\AgroController@view')->name('agro.view');
        Route::get('agro/create', 'backend\AgroController@create')->name('agro.create');
        Route::post('agro/store', 'backend\AgroController@store')->name('agro.store');
        Route::get('agro/edit/{id}', 'backend\AgroController@edit')->name('agro.edit');
        Route::post('agro/update/{id}', 'backend\AgroController@update')->name('agro.update');
        Route::delete('agro/destroy/{id}', 'backend\AgroController@destroy')->name('agro.destroy');
        Route::post('agro/restore/{id}', 'backend\AgroController@restore')->name('agro.restore');
        Route::delete('agro/delete/{id}', 'backend\AgroController@delete')->name('agro.delete');
    });

    Route::prefix('AgroProduct')->group(function()
    {
        Route::get('AgroProduct/view', 'backend\AgroProductController@view')->name('AgroProduct.view');
        Route::get('AgroProduct/create', 'backend\AgroProductController@create')->name('AgroProduct.create');
        Route::post('AgroProduct/store', 'backend\AgroProductController@store')->name('AgroProduct.store');
        Route::get('AgroProduct/edit/{id}', 'backend\AgroProductController@edit')->name('AgroProduct.edit');
        Route::post('AgroProduct/update/{id}', 'backend\AgroProductController@update')->name('AgroProduct.update');
        Route::get('AgroProduct/details/{id}', 'backend\AgroProductController@details')->name('AgroProduct.details');
        Route::get('AgroProduct/bulkupload','backend\AgroProductController@bulkupload')->name('AgroProduct.bulkupload');
        Route::post('AgroProduct/bulkproduct','backend\AgroProductController@bulkproduct')->name('AgroProduct.bulkproduct');
        Route::get('AgroProduct/bulkimage','backend\AgroProductController@bulkimage')->name('AgroProduct.bulkimage');
        Route::post('AgroProduct/multipleimage','backend\AgroProductController@multipleimage')->name('AgroProduct.multipleimage');
        Route::delete('AgroProduct/destroy/{id}', 'backend\AgroProductController@destroy')->name('AgroProduct.destroy');
        Route::post('AgroProduct/restore/{id}', 'backend\AgroProductController@restore')->name('AgroProduct.restore');
        Route::delete('AgroProduct/delete/{id}', 'backend\AgroProductController@delete')->name('AgroProduct.delete');
    });

    Route::prefix('Fashion')->group(function()
    {
        Route::get('Fashion/view', 'backend\FashionController@view')->name('Fashion.view');
        Route::get('Fashion/create', 'backend\FashionController@create')->name('Fashion.create');
        Route::post('Fashion/store', 'backend\FashionController@store')->name('Fashion.store');
        Route::get('Fashion/edit/{id}', 'backend\FashionController@edit')->name('Fashion.edit');
        Route::post('Fashion/update/{id}', 'backend\FashionController@update')->name('Fashion.update');
        Route::delete('Fashion/destroy/{id}', 'backend\FashionController@destroy')->name('Fashion.destroy');
        Route::post('Fashion/restore/{id}', 'backend\FashionController@restore')->name('Fashion.restore');
        Route::delete('Fashion/delete/{id}', 'backend\FashionController@delete')->name('Fashion.delete');
    });

    Route::prefix('FashionProduct')->group(function()
    {
        Route::get('FashionProduct/view', 'backend\FashionProductController@view')->name('FashionProduct.view');
        Route::get('FashionProduct/create', 'backend\FashionProductController@create')->name('FashionProduct.create');
        Route::post('FashionProduct/store', 'backend\FashionProductController@store')->name('FashionProduct.store');
        Route::get('FashionProduct/edit/{id}', 'backend\FashionProductController@edit')->name('FashionProduct.edit');
        Route::post('FashionProduct/update/{id}', 'backend\FashionProductController@update')->name('FashionProduct.update');
        Route::get('FashionProduct/details/{id}', 'backend\FashionProductController@details')->name('FashionProduct.details');
        Route::get('FashionProduct/bulkupload','backend\FashionProductController@bulkupload')->name('FashionProduct.bulkupload');
        Route::post('FashionProduct/bulkproduct','backend\FashionProductController@bulkproduct')->name('FashionProduct.bulkproduct');
        Route::get('FashionProduct/bulkimage','backend\FashionProductController@bulkimage')->name('FashionProduct.bulkimage');
        Route::post('FashionProduct/multipleimage','backend\FashionProductController@multipleimage')->name('FashionProduct.multipleimage');
        Route::delete('FashionProduct/destroy/{id}', 'backend\FashionProductController@destroy')->name('FashionProduct.destroy');
        Route::post('FashionProduct/restore/{id}', 'backend\FashionProductController@restore')->name('FashionProduct.restore');
        Route::delete('FashionProduct/delete/{id}', 'backend\FashionProductController@delete')->name('FashionProduct.delete');
    });

    Route::prefix('Luxury')->group(function()
    {
        Route::get('Luxury/view', 'backend\LuxuryController@view')->name('Luxury.view');
        Route::get('Luxury/create', 'backend\LuxuryController@create')->name('Luxury.create');
        Route::post('Luxury/store', 'backend\LuxuryController@store')->name('Luxury.store');
        Route::get('Luxury/edit/{id}', 'backend\LuxuryController@edit')->name('Luxury.edit');
        Route::post('Luxury/update/{id}', 'backend\LuxuryController@update')->name('Luxury.update');
        Route::delete('Luxury/destroy/{id}', 'backend\LuxuryController@destroy')->name('Luxury.destroy');
        Route::post('Luxury/restore/{id}', 'backend\LuxuryController@restore')->name('Luxury.restore');
        Route::delete('Luxury/delete/{id}', 'backend\LuxuryController@delete')->name('Luxury.delete');
    });
    Route::prefix('LuxuryProduct')->group(function()
    {
        Route::get('LuxuryProduct/view', 'backend\LuxuryProductController@view')->name('LuxuryProduct.view');
        Route::get('LuxuryProduct/create', 'backend\LuxuryProductController@create')->name('LuxuryProduct.create');
        Route::post('LuxuryProduct/store', 'backend\LuxuryProductController@store')->name('LuxuryProduct.store');
        Route::get('LuxuryProduct/edit/{id}', 'backend\LuxuryProductController@edit')->name('LuxuryProduct.edit');
        Route::post('LuxuryProduct/update/{id}', 'backend\LuxuryProductController@update')->name('LuxuryProduct.update');
        Route::get('LuxuryProduct/details/{id}', 'backend\LuxuryProductController@details')->name('LuxuryProduct.details');
        Route::get('LuxuryProduct/bulkupload','backend\LuxuryProductController@bulkupload')->name('LuxuryProduct.bulkupload');
        Route::post('LuxuryProduct/bulkproduct','backend\LuxuryProductController@bulkproduct')->name('LuxuryProduct.bulkproduct');
        Route::get('LuxuryProduct/bulkimage','backend\LuxuryProductController@bulkimage')->name('LuxuryProduct.bulkimage');
        Route::post('LuxuryProduct/multipleimage','backend\LuxuryProductController@multipleimage')->name('LuxuryProduct.multipleimage');
        Route::delete('LuxuryProduct/destroy/{id}', 'backend\LuxuryProductController@destroy')->name('LuxuryProduct.destroy');
        Route::post('LuxuryProduct/restore/{id}', 'backend\LuxuryProductController@restore')->name('LuxuryProduct.restore');
        Route::delete('LuxuryProduct/delete/{id}', 'backend\LuxuryProductController@delete')->name('LuxuryProduct.delete');
    });
    Route::prefix('QueryType')->group(function()
    {
        Route::get('QueryType/view', 'frontend\QueryTypeController@view')->name('QueryType.view');
        Route::get('QueryType/create', 'frontend\QueryTypeController@create')->name('QueryType.create');
        Route::post('QueryType/store', 'frontend\QueryTypeController@store')->name('QueryType.store');
        Route::get('QueryType/edit/{id}', 'frontend\QueryTypeController@edit')->name('QueryType.edit');
        Route::post('QueryType/update/{id}', 'frontend\QueryTypeController@update')->name('QueryType.update');
        Route::delete('QueryType/destroy/{id}', 'frontend\QueryTypeController@destroy')->name('QueryType.destroy');
        Route::post('QueryType/restore/{id}', 'frontend\QueryTypeController@restore')->name('QueryType.restore');
        Route::delete('QueryType/delete/{id}', 'frontend\QueryTypeController@delete')->name('QueryType.delete');
    });
    Route::prefix('CustomerQuery')->group(function()
    {
        Route::get('CustomerQuery/view', 'frontend\CustomerQueryController@view')->name('CustomerQuery.view');
        Route::get('CustomerQuery/create', 'frontend\CustomerQueryController@create')->name('CustomerQuery.create');
        Route::post('CustomerQuery/store', 'frontend\CustomerQueryController@store')->name('CustomerQuery.store');
        Route::get('CustomerQuery/edit/{id}', 'frontend\CustomerQueryController@edit')->name('CustomerQuery.edit');
        Route::post('CustomerQuery/update/{id}', 'frontend\CustomerQueryController@update')->name('CustomerQuery.update');
        Route::delete('CustomerQuery/destroy/{id}', 'frontend\CustomerQueryController@destroy')->name('CustomerQuery.destroy');
        Route::post('CustomerQuery/restore/{id}', 'frontend\CustomerQueryController@restore')->name('CustomerQuery.restore');
        Route::delete('CustomerQuery/delete/{id}', 'frontend\CustomerQueryController@delete')->name('CustomerQuery.delete');
    });
    Route::prefix('ReplyView')->group(function()
    {
        Route::get('ReplyView/view', 'backend\ReplyViewController@view')->name('ReplyView.view');
        Route::delete('ReplyView/destroy/{id}', 'backend\ReplyViewController@destroy')->name('ReplyView.destroy');
    });
    Route::prefix('BackEndCommentReply')->group(function()
    {
        Route::get('BackEndCommentReply/view', 'backend\BackEndCommentReplyController@view')->name('BackEndCommentReply.view');
        Route::get('BackEndCommentReply/create', 'backend\BackEndCommentReplyController@create')->name('BackEndCommentReply.create');
        Route::post('BackEndCommentReply/store', 'backend\BackEndCommentReplyController@store')->name('BackEndCommentReply.store');
        Route::post('BackEndCommentReply/reply/{id}', 'backend\BackEndCommentReplyController@reply')->name('BackEndCommentReply.reply');
    });
    Route::prefix('Subscription')->group(function()
    {
        Route::get('Subscription/view', 'backend\SubscriptionController@view')->name('Subscription.view');
        Route::get('Subscription/create', 'backend\SubscriptionController@create')->name('Subscription.create');
        Route::post('Subscription/store', 'backend\SubscriptionController@store')->name('Subscription.store');
        Route::post('Subscription/subscribe', 'backend\SubscriptionController@subscribe')->name('Subscription.subscribe');
        Route::get('Subscription/{id}', 'backend\SubscriptionController@edit')->name('Subscription.edit');
        Route::post('Subscription/update/{id}', 'backend\SubscriptionController@update')->name('Subscription.update');
        Route::delete('Subscription/destroy/{id}', 'backend\SubscriptionController@destroy')->name('Subscription.destroy');
    });
    Route::prefix('ContactUs')->group(function()
    {
        Route::get('ContactUs/view', 'backend\ContactUsController@view')->name('ContactUs.view');
        Route::get('ContactUs/create', 'backend\ContactUsController@create')->name('ContactUs.create');
        Route::post('ContactUs/store', 'backend\ContactUsController@store')->name('ContactUs.store');
        Route::get('ContactUs/edit/{id}', 'backend\ContactUsController@edit')->name('ContactUs.edit');
        Route::post('ContactUs/update/{id}', 'backend\ContactUsController@update')->name('ContactUs.update');
        Route::delete('ContactUs/destroy/{id}', 'backend\ContactUsController@destroy')->name('ContactUs.destroy');
    });
    Route::prefix('AboutUs')->group(function()
    {
        Route::get('AboutUs/view', 'backend\AboutUsController@view')->name('AboutUs.view');
        Route::get('AboutUs/create', 'backend\AboutUsController@create')->name('AboutUs.create');
        Route::post('AboutUs/store', 'backend\AboutUsController@store')->name('AboutUs.store');
        Route::get('AboutUs/edit/{id}', 'backend\AboutUsController@edit')->name('AboutUs.edit');
        Route::post('AboutUs/update/{id}', 'backend\AboutUsController@update')->name('AboutUs.update');
        Route::delete('AboutUs/destroy/{id}', 'backend\AboutUsController@destroy')->name('AboutUs.destroy');
    });
    Route::prefix('Services')->group(function()
    {
        Route::get('Services/view', 'backend\ServicesController@view')->name('Services.view');
        Route::get('Services/create', 'backend\ServicesController@create')->name('Services.create');
        Route::post('Services/store', 'backend\ServicesController@store')->name('Services.store');
        Route::get('Services/edit/{id}', 'backend\ServicesController@edit')->name('Services.edit');
        Route::post('Services/update/{id}', 'backend\ServicesController@update')->name('Services.update');
        Route::delete('Services/destroy/{id}', 'backend\ServicesController@destroy')->name('Services.destroy');
    });
    Route::prefix('HomeCarousel')->group(function()
    {
        Route::get('HomeCarousel/view', 'backend\HomeCarouselController@view')->name('HomeCarousel.view');
        Route::get('HomeCarousel/create', 'backend\HomeCarouselController@create')->name('HomeCarousel.create');
        Route::post('HomeCarousel/store', 'backend\HomeCarouselController@store')->name('HomeCarousel.store');
        Route::get('HomeCarousel/edit/{id}', 'backend\HomeCarouselController@edit')->name('HomeCarousel.edit');
        Route::post('HomeCarousel/update/{id}', 'backend\HomeCarouselController@update')->name('HomeCarousel.update');
        Route::delete('HomeCarousel/destroy/{id}', 'backend\HomeCarouselController@destroy')->name('HomeCarousel.destroy');
    });
    Route::prefix('AgroLink')->group(function()
    {
        Route::get('AgroLink/view', 'backend\AgroLinkController@view')->name('AgroLink.view');
        Route::get('AgroLink/create', 'backend\AgroLinkController@create')->name('AgroLink.create');
        Route::post('AgroLink/store', 'backend\AgroLinkController@store')->name('AgroLink.store');
        Route::get('AgroLink/edit/{id}', 'backend\AgroLinkController@edit')->name('AgroLink.edit');
        Route::post('AgroLink/update/{id}', 'backend\AgroLinkController@update')->name('AgroLink.update');
        Route::delete('AgroLink/destroy/{id}', 'backend\AgroLinkController@destroy')->name('AgroLink.destroy');
    });
    Route::prefix('FashionLink')->group(function()
    {
        Route::get('FashionLink/view', 'backend\FashionLinkController@view')->name('FashionLink.view');
        Route::get('FashionLink/create', 'backend\FashionLinkController@create')->name('FashionLink.create');
        Route::post('FashionLink/store', 'backend\FashionLinkController@store')->name('FashionLink.store');
        Route::get('FashionLink/edit/{id}', 'backend\FashionLinkController@edit')->name('FashionLink.edit');
        Route::post('FashionLink/update/{id}', 'backend\FashionLinkController@update')->name('FashionLink.update');
        Route::delete('FashionLink/destroy/{id}', 'backend\FashionLinkController@destroy')->name('FashionLink.destroy');
    });
    Route::prefix('LuxuryLink')->group(function()
    {
        Route::get('LuxuryLink/view', 'backend\LuxuryLinkController@view')->name('LuxuryLink.view');
        Route::get('LuxuryLink/create', 'backend\LuxuryLinkController@create')->name('LuxuryLink.create');
        Route::post('LuxuryLink/store', 'backend\LuxuryLinkController@store')->name('LuxuryLink.store');
        Route::get('LuxuryLink/edit/{id}', 'backend\LuxuryLinkController@edit')->name('LuxuryLink.edit');
        Route::post('LuxuryLink/update/{id}', 'backend\LuxuryLinkController@update')->name('LuxuryLink.update');
        Route::delete('LuxuryLink/destroy/{id}', 'backend\LuxuryLinkController@destroy')->name('LuxuryLink.destroy');
    });

});

