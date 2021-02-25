<?php

use Illuminate\Support\Facades\Route;

Route::get('/tests', 'Vocalogenesis\Testmodule\Controllers\TestmoduleController@index')
->name('testmoduleIndex')->middleware('web', 'auth');

Route::get('/tests/all', 'Vocalogenesis\Testmodule\Controllers\TestmoduleController@index')
->name('testmoduleIndexAll')->middleware('web', 'auth');

Route::get('/tests/create', 'Vocalogenesis\Testmodule\Controllers\TestmoduleController@createTest')
->name('testmoduleCreateTest')->middleware('web', 'auth');

Route::get('/tests/create/object', 'Vocalogenesis\Testmodule\Controllers\TestmoduleController@createObject')
->name('testmoduleCreateObject')->middleware('web', 'auth');

Route::post('/tests/create', 'Vocalogenesis\Testmodule\Controllers\TestmoduleController@createTestSubmit')
->name('testmoduleCreateTestSubmit');

Route::post('/tests/create/object', 'Vocalogenesis\Testmodule\Controllers\TestmoduleController@createObjectSubmit')
->name('testmoduleCreateObjectSubmit');

Route::get('/tests/{id}', 'Vocalogenesis\Testmodule\Controllers\TestmoduleController@previewTest')
->name('testmodulePreview')->middleware('web', 'auth');

Route::get('/tests/results/{id}', 'Vocalogenesis\Testmodule\Controllers\TestmoduleController@resultTest')
->name('testmoduleResult')->middleware('web', 'auth');

Route::get('/tests/object/{id}', 'Vocalogenesis\Testmodule\Controllers\TestmoduleController@sortedTest')
->name('testmoduleSorted')->middleware('web', 'auth');

Route::post('/tests/{id}', 'Vocalogenesis\Testmodule\Controllers\TestmoduleController@startTest')
->name('testmoduleStart')->middleware('web', 'auth');

Route::get('/tests/removetest/{id}', 'Vocalogenesis\Testmodule\Controllers\TestmoduleController@removeTest')
->name('testmoduleRemove')->middleware('web', 'auth');

Route::get('/tests/removeobj/{id}', 'Vocalogenesis\Testmodule\Controllers\TestmoduleController@removeObj')
->name('testmoduleRemoveObj')->middleware('web', 'auth');