<?php


Route::group(['middleware' => ['setlang:frontend', 'globalVariable', 'maintains_mode', 'HtmlMinifier']], function () {

    Route::get('/', '_FrontendController@index')->name('homepage');
    Route::get('/page/{type}', '_FrontendController@page')->name('frontend.page');
    Route::get('/page/{type}/post/{id}', '_FrontendController@post_page')->name('frontend.page.post');
    Route::get('/page/event/{id}', '_FrontendController@event_page')->name('frontend.page.event');
    Route::get('/page/form/{type}', '_FrontendController@form_page')->name('frontend.page.form'); 
    Route::get('/page/form/{type}/{id}', '_FrontendController@form_page')->name('frontend.page.form2');
    Route::post('/page/form/{type}', '_FrontendController@form_page_post');
    Route::post('/page/form/{type}/{id}', '_FrontendController@form_page_post');
    Route::get('/imgCaptcha', '_FrontendController@img_captcha')->name('frontend.img-captcha');
    Route::post('/checkImgCaptcha', '_FrontendController@check_img_captcha')->name('frontend.check-img-captcha');


});


Route::group(['middleware' => ['setlang:frontend', 'globalVariable', 'HtmlMinifier']], function () {

    
    Route::get('/lang', '_FrontendController@lang_change')->name('frontend.langchange');
    
});