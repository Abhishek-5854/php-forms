
<?php
use App\Http\Controllers\FormController;
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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndustryController;


Route::get('/1', function () {
    return view('welcome');
});


Route::get('/store', 'FormController@show')->name('show');
Route::post('/store', 'FormController@create')->name('create');

Route::get('/', 'IndustryController@show');
Route::get('main_page', 'IndustryController@show');
Route::get('test', 'IndustryController@index');
Route::get('{industry_name}', 'IndustryController@form' );
Route::post('enquiry-form','IndustryController@enquiry');
Route::post('download-form','IndustryController@download');
Route::post('industry_view/download','IndustryController@download');
Route::resource('shows', 'IndustryController');


