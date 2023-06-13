<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\ClientsController;
use Illuminate\Http\Request;
use App\Http\Controllers\AcceptationClientsController;
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
use App\SMS\Sms;
Route::get('/', function () {

if(auth()->guard('clientt')->check()){
return redirect()->route('client.home');
}
if(auth()->guard()->check()){
    return redirect()->route('home');
    }

    return view('welcome');
})->name('/');

Route::get('/term', function (Request $request) {
   $id = $request->id;

  return view('term',compact('id'));
})->name('term');

Route::get('/confiramtion', function (Request $request) {
    $id = $request->id;
    $sms = new Sms;
    $client = App\Models\Client::find($id);
    $contry = App\Models\countries::find($client->contry_id );

    $code = mt_rand(1111,9999);
    $client->code = $code;
    $client->save();

    $sms->send($contry->phonecode.$client->phone,"Hello your code :  ".$code);
   return view('confiramtion',compact('id'));
 })->name('confiramtion');

Route::get('/singup', function () {
    return view('register');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/client/home', [App\Http\Controllers\HomeClientController::class, 'index'])->name('client.home');




        Route::group([
            'prefix' => 'users',
        ], function () {
            Route::get('/', [UsersController::class, 'index'])
                 ->name('users.users.index');
            Route::get('/create', [UsersController::class, 'create'])
                 ->name('users.users.create');
            Route::get('/show/{users}',[UsersController::class, 'show'])
                 ->name('users.users.show');
            Route::get('/{users}/edit',[UsersController::class, 'edit'])
                 ->name('users.users.edit');
            Route::post('/', [UsersController::class, 'store'])
                 ->name('users.users.store');
            Route::put('users/{users}', [UsersController::class, 'update'])
                 ->name('users.users.update');
            Route::delete('/users/{users}',[UsersController::class, 'destroy'])
                 ->name('users.users.destroy');
        });

        Route::group([
            'prefix' => 'countries',
        ], function () {
            Route::get('/', [CountriesController::class, 'index'])
                 ->name('countries.countries.index');
            Route::get('/create', [CountriesController::class, 'create'])
                 ->name('countries.countries.create');
            Route::get('/show/{countries}',[CountriesController::class, 'show'])
                 ->name('countries.countries.show')->where('id', '[0-9]+');
            Route::get('/{countries}/edit',[CountriesController::class, 'edit'])
                 ->name('countries.countries.edit')->where('id', '[0-9]+');
            Route::post('/', [CountriesController::class, 'store'])
                 ->name('countries.countries.store');
            Route::put('countries/{countries}', [CountriesController::class, 'update'])
                 ->name('countries.countries.update')->where('id', '[0-9]+');
            Route::delete('/countries/{countries}',[CountriesController::class, 'destroy'])
                 ->name('countries.countries.destroy')->where('id', '[0-9]+');
        });




Route::group([
    'prefix' => 'clients',
], function () {
    Route::get('/', [ClientsController::class, 'index'])
         ->name('clients.client.index');
    Route::get('/create', [ClientsController::class, 'create'])
         ->name('clients.client.create');
    Route::get('/show/{client}',[ClientsController::class, 'show'])
         ->name('clients.client.show')->where('id', '[0-9]+');
    Route::get('/{client}/edit',[ClientsController::class, 'edit'])
         ->name('clients.client.edit')->where('id', '[0-9]+');
    Route::post('/', [ClientsController::class, 'store'])
         ->name('clients.client.store');

    Route::post('/sungupp', [ClientsController::class, 'sungupp'])
         ->name('clients.client.sungupp');
    Route::put('client/{client}', [ClientsController::class, 'update'])->name('clients.client.update')->where('id', '[0-9]+');
    Route::put('clientm/{client}', [ClientsController::class, 'updatem'])->name('clients.client.updatem')->where('id', '[0-9]+');
    Route::put('refused/{client}', [ClientsController::class, 'refused'])->name('clients.client.refused')->where('id', '[0-9]+');

    Route::get('accept/{client}', [ClientsController::class, 'accept'])->name('clients.client.accept')->where('id', '[0-9]+');


    Route::put('confiramtionc/{client}', [ClientsController::class, 'confiramtion'])
         ->name('clients.client.confiramtion')->where('id', '[0-9]+');

         Route::put('signature/{client}', [ClientsController::class, 'signature'])
         ->name('clients.client.signature')->where('id', '[0-9]+');


    Route::delete('/client/{client}',[ClientsController::class, 'destroy'])
         ->name('clients.client.destroy')->where('id', '[0-9]+');

    Route::post('/login', [ClientsController::class, 'login'])
         ->name('clients.client.login');
});

Route::group([
    'prefix' => 'acceptation_clients',
], function () {
    Route::get('/', [AcceptationClientsController::class, 'index'])
         ->name('acceptation_clients.acceptation_client.index');
    Route::get('/create', [AcceptationClientsController::class, 'create'])
         ->name('acceptation_clients.acceptation_client.create');
    Route::get('/show/{acceptationClient}',[AcceptationClientsController::class, 'show'])
         ->name('acceptation_clients.acceptation_client.show')->where('id', '[0-9]+');
    Route::get('/{acceptationClient}/edit',[AcceptationClientsController::class, 'edit'])
         ->name('acceptation_clients.acceptation_client.edit')->where('id', '[0-9]+');
    Route::post('/', [AcceptationClientsController::class, 'store'])
         ->name('acceptation_clients.acceptation_client.store');
    Route::put('acceptation_client/{acceptationClient}', [AcceptationClientsController::class, 'update'])
         ->name('acceptation_clients.acceptation_client.update')->where('id', '[0-9]+');
    Route::delete('/acceptation_client/{acceptationClient}',[AcceptationClientsController::class, 'destroy'])
         ->name('acceptation_clients.acceptation_client.destroy')->where('id', '[0-9]+');
});
