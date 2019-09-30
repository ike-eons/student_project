<?php

Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

        Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
        Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

        Route::group(['prefix'  =>   'departments'], function() {

            Route::get('/', 'Admin\DepartmentController@index')->name('admin.departments.index');
            Route::get('/create', 'Admin\DepartmentController@create')->name('admin.departments.create');
            Route::post('/store', 'Admin\DepartmentController@store')->name('admin.departments.store');
            Route::get('/{id}/edit', 'Admin\DepartmentController@edit')->name('admin.departments.edit');
            Route::get('/{id}/show', 'Admin\DepartmentController@show')->name('admin.departments.show');
            Route::post('/update', 'Admin\DepartmentController@update')->name('admin.departments.update');
            Route::get('/{id}/delete', 'Admin\DepartmentController@delete')->name('admin.departments.delete');

        });

        Route::post('registration','Admin\RegistrationController@store');

        Route::group(['prefix' => 'subjects'],function(){

            Route::get('/', 'Admin\SubjectController@index')->name('admin.subjects.index');
            Route::get('/create', 'Admin\SubjectController@create')->name('admin.subjects.create');
            Route::post('/store', 'Admin\SubjectController@store')->name('admin.subjects.store');
            Route::get('/{id}/edit', 'Admin\SubjectController@edit')->name('admin.subjects.edit');
            Route::post('/update', 'Admin\SubjectController@update')->name('admin.subjects.update');
            Route::get('/{id}/delete', 'Admin\SubjectController@delete')->name('admin.subjects.delete');

        });

        Route::group(['prefix'=>'courses'],function(){

             Route::get('/', 'Admin\CourseController@index')->name('admin.courses.index');
            Route::get('/create', 'Admin\CourseController@create')->name('admin.courses.create');
            Route::post('/store', 'Admin\CourseController@store')->name('admin.courses.store');
            Route::get('/{id}/edit', 'Admin\CourseController@edit')->name('admin.courses.edit');
            Route::post('/update', 'Admin\CourseController@update')->name('admin.courses.update');
            Route::get('/{id}/delete', 'Admin\CourseController@delete')->name('admin.courses.delete');
        });

        Route::group(['prefix' => 'students'], function() {

            Route::get('/', 'Admin\StudentController@index')->name('admin.students.index');
            Route::get('/create', 'Admin\StudentController@create')->name('admin.students.create');
            Route::post('/store', 'Admin\StudentController@store')->name('admin.students.store');
            Route::get('/{id}/edit', 'Admin\StudentController@edit')->name('admin.students.edit');
            Route::get('/{id}/show', 'Admin\StudentController@show')->name('admin.students.show');
            Route::post('/update', 'Admin\StudentController@update')->name('admin.students.update');
            Route::get('/{id}/delete', 'Admin\StudentController@delete')->name('admin.students.delete');

            //load subjects on to the page
            //Route::get('subjects/load', 'Admin\SubjectRegistration@loadSubjects');
            //add selected subject to current student
            //Route::post('sujects/add', 'Admin\SubjectRegistration@addSubect');
            //delete subject from current student
            //Route::delete('subjects/delete', 'Admin\SubjectRegistration@deleteSubject');
            //Route::post('/{id}/registration','Admin\RegistrationController@store')->name('admin.registration.store');
        });

        Route::group(['prefix' => 'registrations'], function(){
            Route::get('/', 'Admin\RegistrationController@index')->name('admin.registrations.index');
            Route::get('/{id}/register','Admin\RegistrationController@create')->name('admin.registrations.subjectregistration');
            Route::post('/store','Admin\RegistrationController@store')->name('admin.registrations.store');
        });


        // Route::group(['prefix'  =>   'attributes'], function() {

        //     Route::get('/', 'Admin\AttributeController@index')->name('admin.attributes.index');
        //     Route::get('/create', 'Admin\AttributeController@create')->name('admin.attributes.create');
        //     Route::post('/store', 'Admin\AttributeController@store')->name('admin.attributes.store');
        //     Route::get('/{id}/edit', 'Admin\AttributeController@edit')->name('admin.attributes.edit');
        //     Route::post('/update', 'Admin\AttributeController@update')->name('admin.attributes.update');
        //     Route::get('/{id}/delete', 'Admin\AttributeController@delete')->name('admin.attributes.delete');

        //     Route::post('/get-values', 'Admin\AttributeValueController@getValues');
        //     Route::post('/add-values', 'Admin\AttributeValueController@addValues');
        //     Route::post('/update-values', 'Admin\AttributeValueController@updateValues');
        //     Route::post('/delete-values', 'Admin\AttributeValueController@deleteValues');
        // });

        // Route::group(['prefix'  =>   'brands'], function() {

        //     Route::get('/', 'Admin\BrandController@index')->name('admin.brands.index');
        //     Route::get('/create', 'Admin\BrandController@create')->name('admin.brands.create');
        //     Route::post('/store', 'Admin\BrandController@store')->name('admin.brands.store');
        //     Route::get('/{id}/edit', 'Admin\BrandController@edit')->name('admin.brands.edit');
        //     Route::post('/update', 'Admin\BrandController@update')->name('admin.brands.update');
        //     Route::get('/{id}/delete', 'Admin\BrandController@delete')->name('admin.brands.delete');

        // });

        // Route::group(['prefix' => 'products'], function () {

        //    Route::get('/', 'Admin\ProductController@index')->name('admin.products.index');
        //    Route::get('/create', 'Admin\ProductController@create')->name('admin.products.create');
        //    Route::post('/store', 'Admin\ProductController@store')->name('admin.products.store');
        //    Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('admin.products.edit');
        //    Route::post('/update', 'Admin\ProductController@update')->name('admin.products.update');

        // });
    });
});
