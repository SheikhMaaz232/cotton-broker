<?php

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
    return redirect('login');
});

Auth::routes(); 

//Route::group([
//    'as'        => 'user.',
    //'prefix'    => 'user'
    //'namespace' => 'User',
    //'middleware'  => 'SomeUserMiddleware'
//],function(){
   // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
   // Route::post('register', 'Auth\RegisterController@register');
//});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout','Auth\LoginController@logout');

Route::group(['prefix' => 'users'], function () {
    Route::get('/list', ['as' => 'users.list', 'uses' => 'Auth\RegisterController@index']);
    Route::get('edit/{id}', ['as' => 'user.edit', 'uses' => 'Auth\RegisterController@edit']);
    Route::post('update', ['as' => 'user.update', 'uses' => 'Auth\RegisterController@update']);
    Route::delete('delete/{id}', ['as' => 'user.delete', 'uses' => 'Auth\RegisterController@destroy']);
});

Route::group(['middleware' => ['auth']], function () {

    //Company routes
    Route::group(['prefix' => 'company'], function () {
        Route::get('list', ['as' => 'company.list', 'uses' => 'CompaniesController@index']);
        Route::get('create', ['as' => 'company.create', 'uses' => 'CompaniesController@create']);
        Route::post('save', ['as' => 'company.save', 'uses' => 'CompaniesController@store']);
        Route::get('edit/{id}', ['as' => 'company.edit', 'uses' => 'CompaniesController@edit']);
        Route::post('update', ['as' => 'company.update', 'uses' => 'CompaniesController@update']);
        Route::delete('delete/{id}', ['as' => 'company.delete', 'uses' => 'CompaniesController@destroy']);
        Route::post('show/{id}', ['as' => 'company.show', 'uses' => 'CompaniesController@show']);
        Route::get('search', ['as' => 'company.search', 'uses' => 'CompaniesController@search']);

    });

    //Donor routes
    Route::group(['prefix' => 'donor'], function () {
        Route::get('list', ['as' => 'donor.list', 'uses' => 'DonorsController@index']);
        Route::get('create', ['as' => 'donor.create', 'uses' => 'DonorsController@create']);
        Route::post('save', ['as' => 'donor.save', 'uses' => 'DonorsController@store']);
        Route::get('edit/{id}', ['as' => 'donor.edit', 'uses' => 'DonorsController@edit']);
        Route::post('update', ['as' => 'donor.update', 'uses' => 'DonorsController@update']);
        Route::delete('delete/{id}', ['as' => 'donor.delete', 'uses' => 'DonorsController@destroy']);
        Route::post('show/{id}', ['as' => 'donor.show', 'uses' => 'DonorsController@show']);
        Route::get('search', ['as' => 'donor.search', 'uses' => 'DonorsController@search']);
    });

    //Project routes
    Route::group(['prefix' => 'project'], function () {
        Route::get('list', ['as' => 'project.list', 'uses' => 'ProjectsController@index']);
        Route::get('create', ['as' => 'project.create', 'uses' => 'ProjectsController@create']);
        Route::post('save', ['as' => 'project.save', 'uses' => 'ProjectsController@store']);
        Route::get('edit/{id}', ['as' => 'project.edit', 'uses' => 'ProjectsController@edit']);
        Route::post('update', ['as' => 'project.update', 'uses' => 'ProjectsController@update']);
        Route::delete('delete/{id}', ['as' => 'project.delete', 'uses' => 'ProjectsController@destroy']);
        Route::post('show/{id}', ['as' => 'project.show', 'uses' => 'ProjectsController@show']);
        Route::get('search', ['as' => 'project.search', 'uses' => 'ProjectsController@search']);
        Route::get('preview-project-file/{file}', ['as' => 'preview.project.file', 'uses' => 'ProjectsController@previewAttachment']);
    });

    //Financial Year routes
    Route::group(['prefix' => 'financial_year'], function () {
        Route::get('list', ['as' => 'financial.year.list', 'uses' => 'FinancialYearsController@index']);
        Route::get('create', ['as' => 'financial.year.create', 'uses' => 'FinancialYearsController@create']);
        Route::post('save', ['as' => 'financial.year.save', 'uses' => 'FinancialYearsController@store']);
        Route::get('edit/{id}', ['as' => 'financial.year.edit', 'uses' => 'FinancialYearsController@edit']);
        Route::post('update', ['as' => 'financial.year.update', 'uses' => 'FinancialYearsController@update']);
        Route::delete('delete/{id}', ['as' => 'financial.year.delete', 'uses' => 'FinancialYearsController@destroy']);
        Route::post('show/{id}', ['as' => 'financial.year.show', 'uses' => 'FinancialYearsController@show']);
        Route::get('search', ['as' => 'financial.year.search', 'uses' => 'FinancialYearsController@search']);
    });

    //Bank Payment Voucher routes
    Route::group(['prefix' => 'bpv'], function () {
        Route::get('list', ['as' => 'bpv.list', 'uses' => 'BankPaymentVouchersController@index']);
        Route::get('create', ['as' => 'bpv.create', 'uses' => 'BankPaymentVouchersController@create']);
        Route::post('save', ['as' => 'bpv.save', 'uses' => 'BankPaymentVouchersController@store']);
        Route::get('edit/{id}', ['as' => 'bpv.edit', 'uses' => 'BankPaymentVouchersController@edit']);
        Route::post('update', ['as' => 'bpv.update', 'uses' => 'BankPaymentVouchersController@update']);
        Route::delete('delete/{id}', ['as' => 'bpv.delete', 'uses' => 'BankPaymentVouchersController@destroy']);
        Route::post('show/{id}', ['as' => 'bpv.show', 'uses' => 'BankPaymentVouchersController@show']);
        Route::get('search', ['as' => 'bpv.search', 'uses' => 'BankPaymentVouchersController@search']);
        Route::get('preview-bpv-file/{file}', ['as' => 'preview.bpv.file', 'uses' => 'BankPaymentVouchersController@previewAttachment']);
    });

    //Bank Receipt Voucher routes
    Route::group(['prefix' => 'brv'], function () {
        Route::get('list', ['as' => 'brv.list', 'uses' => 'BankReceiptVouchersController@index']);
        Route::get('create', ['as' => 'brv.create', 'uses' => 'BankReceiptVouchersController@create']);
        Route::post('save', ['as' => 'brv.save', 'uses' => 'BankReceiptVouchersController@store']);
        Route::get('edit/{id}', ['as' => 'brv.edit', 'uses' => 'BankReceiptVouchersController@edit']);
        Route::post('update', ['as' => 'brv.update', 'uses' => 'BankReceiptVouchersController@update']);
        Route::delete('delete/{id}', ['as' => 'brv.delete', 'uses' => 'BankReceiptVouchersController@destroy']);
        Route::post('show/{id}', ['as' => 'brv.show', 'uses' => 'BankReceiptVouchersController@show']);
        Route::get('search', ['as' => 'brv.search', 'uses' => 'BankReceiptVouchersController@search']);
        Route::get('preview-file/{file}', ['as' => 'preview.file', 'uses' => 'BankReceiptVouchersController@previewAttachment']);

    });

    //Cash Receipt Voucher routes
    Route::group(['prefix' => 'crv'], function () {
        Route::get('list', ['as' => 'crv.list', 'uses' => 'CashReceiptVouchersController@index']);
        Route::get('create', ['as' => 'crv.create', 'uses' => 'CashReceiptVouchersController@create']);
        Route::post('save', ['as' => 'crv.save', 'uses' => 'CashReceiptVouchersController@store']);
        Route::get('edit/{id}', ['as' => 'crv.edit', 'uses' => 'CashReceiptVouchersController@edit']);
        Route::post('update', ['as' => 'crv.update', 'uses' => 'CashReceiptVouchersController@update']);
        Route::delete('delete/{id}', ['as' => 'crv.delete', 'uses' => 'CashReceiptVouchersController@destroy']);
        Route::post('show/{id}', ['as' => 'crv.show', 'uses' => 'CashReceiptVouchersController@show']);
        Route::get('search', ['as' => 'crv.search', 'uses' => 'CashReceiptVouchersController@search']);
        Route::get('preview-crv-file/{file}', ['as' => 'preview.crv.file', 'uses' => 'CashReceiptVouchersController@previewAttachment']);
    });

    //Cash Payment Voucher routes
    Route::group(['prefix' => 'cpv'], function () {
        Route::get('list', ['as' => 'cpv.list', 'uses' => 'CashPaymentVouchersController@index']);
        Route::get('create', ['as' => 'cpv.create', 'uses' => 'CashPaymentVouchersController@create']);
        Route::post('save', ['as' => 'cpv.save', 'uses' => 'CashPaymentVouchersController@store']);
        Route::get('edit/{id}', ['as' => 'cpv.edit', 'uses' => 'CashPaymentVouchersController@edit']);
        Route::post('update', ['as' => 'cpv.update', 'uses' => 'CashPaymentVouchersController@update']);
        Route::delete('delete/{id}', ['as' => 'cpv.delete', 'uses' => 'CashPaymentVouchersController@destroy']);
        Route::post('show/{id}', ['as' => 'cpv.show', 'uses' => 'CashPaymentVouchersController@show']);
        Route::get('search', ['as' => 'cpv.search', 'uses' => 'CashPaymentVouchersController@search']);
        Route::get('preview-cpv-file/{file}', ['as' => 'preview.cpv.file', 'uses' => 'CashPaymentVouchersController@previewAttachment']);
    });

    //Journal Voucher routes
    Route::group(['prefix' => 'jv'], function () {
        Route::get('list', ['as' => 'jv.list', 'uses' => 'JournalVouchersController@index']);
        Route::get('create', ['as' => 'jv.create', 'uses' => 'JournalVouchersController@create']);
        Route::post('save', ['as' => 'jv.save', 'uses' => 'JournalVouchersController@store']);
        Route::get('edit/{id}', ['as' => 'jv.edit', 'uses' => 'JournalVouchersController@edit']);
        Route::post('update', ['as' => 'jv.update', 'uses' => 'JournalVouchersController@update']);
        Route::delete('delete/{id}', ['as' => 'jv.delete', 'uses' => 'JournalVouchersController@destroy']);
        Route::post('show/{id}', ['as' => 'jv.show', 'uses' => 'JournalVouchersController@show']);
        Route::get('search', ['as' => 'jv.search', 'uses' => 'DonorsController@search']);
        Route::get('preview-jv-file/{file}', ['as' => 'preview.jv.file', 'uses' => 'JournalVouchersController@previewAttachment']);
    });

    //Bank Registration
    Route::group(['prefix' => 'bank'], function () {
        Route::get('list', ['as' => 'bank.list', 'uses' => 'BanksController@index']);
        Route::get('create', ['as' => 'bank.create', 'uses' => 'BanksController@create']);
        Route::post('save', ['as' => 'bank.save', 'uses' => 'BanksController@store']);
        Route::get('edit/{id}', ['as' => 'bank.edit', 'uses' => 'BanksController@edit']);
        Route::post('update', ['as' => 'bank.update', 'uses' => 'BanksController@update']);
        Route::delete('delete/{id}', ['as' => 'bank.delete', 'uses' => 'BanksController@destroy']);
        Route::post('show/{id}', ['as' => 'bank.show', 'uses' => 'BanksController@show']);
        Route::get('search', ['as' => 'bank.search', 'uses' => 'BanksController@search']);
    });

    //Permissions
    Route::group(['prefix' => 'permission'], function () {
        Route::get('list', ['as' => 'permission.list', 'uses' => 'PermissionController@index']);
        Route::get('create', ['as' => 'permission.create', 'uses' => 'PermissionController@create']);
        Route::post('save', ['as' => 'permission.save', 'uses' => 'PermissionController@store']);
        Route::get('edit/{id}', ['as' => 'permission.edit', 'uses' => 'PermissionController@edit']);
        Route::post('update', ['as' => 'permission.update', 'uses' => 'PermissionController@update']);
        Route::delete('delete/{id}', ['as' => 'permission.delete', 'uses' => 'PermissionController@destroy']);
        Route::post('show/{id}', ['as' => 'permission.show', 'uses' => 'PermissionController@show']);
        Route::get('search', ['as' => 'permission.search', 'uses' => 'PermissionController@search']);
        Route::get('user', ['as' => 'user.permission', 'uses' => 'PermissionController@getUserPermissions']);
    });

    //Govt documents
    Route::group(['prefix' => 'govt-document'], function () {
        Route::get('list', ['as' => 'govt-document.list', 'uses' => 'GovtDocumentsController@index']);
        Route::get('create', ['as' => 'govt-document.create', 'uses' => 'GovtDocumentsController@create']);
        Route::post('save', ['as' => 'govt-document.save', 'uses' => 'GovtDocumentsController@store']);
        Route::get('edit/{id}', ['as' => 'govt-document.edit', 'uses' => 'GovtDocumentsController@edit']);
        Route::post('update', ['as' => 'govt-document.update', 'uses' => 'GovtDocumentsController@update']);
        Route::delete('delete/{id}', ['as' => 'govt-document.delete', 'uses' => 'GovtDocumentsController@destroy']);
        Route::post('show/{id}', ['as' => 'govt-document.show', 'uses' => 'GovtDocumentsController@show']);
        Route::get('search', ['as' => 'govt-document.search', 'uses' => 'GovtDocumentsController@search']);
        Route::get('type/{id}', ['as' => 'document-type', 'uses' => 'GovtDocumentsController@documentSubTypes']);
        Route::get('preview-govt-document-file/{file}', ['as' => 'preview.govt-document.file', 'uses' => 'GovtDocumentsController@previewAttachment']);
        // Route::get('user', ['as' => 'user.govt-document', 'uses' => 'GovtDocumentsController@getUserPermissions']);
    });

    //Govt documents
    Route::group(['prefix' => 'org-document'], function () {
        Route::get('list', ['as' => 'org-document.list', 'uses' => 'OrgDocumentsController@index']);
        Route::get('create', ['as' => 'org-document.create', 'uses' => 'OrgDocumentsController@create']);
        Route::post('save', ['as' => 'org-document.save', 'uses' => 'OrgDocumentsController@store']);
        Route::get('edit/{id}', ['as' => 'org-document.edit', 'uses' => 'OrgDocumentsController@edit']);
        Route::post('update', ['as' => 'org-document.update', 'uses' => 'OrgDocumentsController@update']);
        Route::delete('delete/{id}', ['as' => 'org-document.delete', 'uses' => 'OrgDocumentsController@destroy']);
        Route::post('show/{id}', ['as' => 'org-document.show', 'uses' => 'OrgDocumentsController@show']);
        Route::get('search', ['as' => 'org-document.search', 'uses' => 'OrgDocumentsController@search']);
        Route::get('type/{id}', ['as' => 'document-type', 'uses' => 'OrgDocumentsController@documentSubTypes']);
        Route::get('preview-org-document-file/{file}', ['as' => 'preview.org-document.file', 'uses' => 'OrgDocumentsController@previewAttachment']);
        // Route::get('user', ['as' => 'user.govt-document', 'uses' => 'GovtDocumentsController@getUserPermissions']);
    });


    Route::delete('delete/file', ['as' => 'delete.file', 'uses' => 'CommonController@deleteAttachment']);

});
