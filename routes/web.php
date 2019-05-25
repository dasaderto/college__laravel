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
Route::get('/', 'HomeController@index');

// Route::get('/parse', 'Admin\ParseController@index');

Route::get('/contact-center', 'ContactCenterController@index')->name('contact-center');

Auth::routes();

Route::group(['prefix' => '/admin', 'namespace' => 'Admin'/*, 'middleware' => 'auth'*/], function() {
    
    Route::post('/json/get_programs', 'ProgramController@get_programs')->name('json.get_programs');
    
    Route::resource('/program', 'ProgramController', ['as' => 'admin']);
    Route::get('/program/show_html/{id}', 'ProgramController@show_html', ['as' => 'admin'])->name('admin.program.show_html');
    Route::get('/program/download_html/{id}', 'ProgramController@download_html', ['as' => 'admin'])->name('admin.program.download_html'); 
    
    Route::post('/program2_mass_update', 'Program2Controller@mass_update', ['as' => 'admin'])->name('admin.program2_mass_update');
    Route::get('/program2/update_program2', 'UpdateProgram2Controller@update', ['as' => 'admin'])->name('admin.update_program2.update');
    Route::get('/program2/show_html/{id}', 'Program2Controller@show_html', ['as' => 'admin'])->name('admin.program2.show_html');
    Route::get('/program2/download_html/{id}', 'Program2Controller@download_html', ['as' => 'admin'])->name('admin.program2.download_html');
    Route::resource('/program2', 'Program2Controller', ['as' => 'admin']);
    
    Route::post('/program3_mass_update', 'Program3Controller@mass_update', ['as' => 'admin'])->name('admin.program3_mass_update');
    // Route::get('/program3/update_program3', 'UpdateProgram3Controller@update', ['as' => 'admin'])->name('admin.update_program3.update');
    Route::get('/program3/show_html/{id}', 'Program3Controller@show_html', ['as' => 'admin'])->name('admin.program3.show_html');
    Route::get('/program3/download_html/{id}', 'Program3Controller@download_html', ['as' => 'admin'])->name('admin.program3.download_html');
    Route::resource('/program3', 'Program3Controller', ['as' => 'admin']);

    Route::resource('faq', 'FaqController');

    Route::resource('/period', 'PeriodController', ['as' => 'admin']);
    Route::resource('/period_transfer_recovery', 'PeriodTransferRecoveryController', ['as' => 'admin']);
    Route::resource('/document_transfer_recovery', 'DocumentTransferRecoveryController', ['as' => 'admin']);
    
    Route::resource('/degree', 'DegreeController', ['as' => 'admin']);
    Route::resource('/faculty', 'FacultyController', ['as' => 'admin']);
    Route::resource('/direction', 'DirectionController', ['as' => 'admin']);
    Route::resource('/form', 'FormController', ['as' => 'admin']);
    
    
    
    Route::get('/parse_programs', 'ParseController@programs')->name('admin.parse_programs.index');
    Route::get('/parse_periods', 'ParseController@periods')->name('admin.parse_periods.index');
    Route::get('/parse_periods_transfer_recovery', 'ParseController@periods_transfer_recovery')->name('admin.parse_periods_transfer_recovery.index');
    Route::get('/parse_documents_transfer_recovery', 'ParseController@documents_transfer_recovery')->name('admin.parse_documents_transfer_recovery.index');
    
    Route::get('/restucturing', 'RestructuringController@index')->name('admin.restucturing.index');
    
    Route::get('/program4', 'Program4Controller@index')->name('admin.program4.index');
});
