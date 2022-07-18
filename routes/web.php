<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Pages;

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

Route::get('/admin/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth']], function() 
{
    Route::resource('roles', RoleController::class);

	/**
	 * Admin settings
	 */
	
	Route::get('/admin/settings', [App\Http\Controllers\DashboardController::class, 'adminSettings'])->name('admin.settings');
	Route::post('/admin/update/{id}', [App\Http\Controllers\DashboardController::class, 'settingupdate'])->name('settings.update');

	/*
	pages **/
	Route::get('/admin/pages', [App\Http\Controllers\PagesController::class, 'index'])->name('pages');
	Route::get('/admin/pages/create', [App\Http\Controllers\PagesController::class, 'create'])->name('pages.create');
	Route::post('/admin/pages/store', [App\Http\Controllers\PagesController::class, 'store'])->name('pages.store');
	Route::post('/admin/pages/update', [App\Http\Controllers\PagesController::class, 'update'])->name('pages.update');
	Route::get('/admin/pages/{id}', [App\Http\Controllers\PagesController::class, 'edit'])->name('pages.edit');
	Route::get('/admin/pages/show/{id}', [App\Http\Controllers\PagesController::class, 'show'])->name('pages.show');
	Route::get('/admin/pages/delete/{id}', [App\Http\Controllers\PagesController::class, 'destroy'])->name('pages.destroy');
	Route::get('/admin/pages/remove/{id}', [App\Http\Controllers\PagesController::class, 'removePage'])->name('pages.remove');
	Route::get('/admin/sections/', [App\Http\Controllers\SectionsController::class, 'index'])->name('sections');
	Route::get('/admin/section/create', [App\Http\Controllers\SectionsController::class, 'create'])->name('section.create');
	Route::post('/admin/section/store', [App\Http\Controllers\SectionsController::class, 'store'])->name('section.store');
	Route::post('/admin/section/update', [App\Http\Controllers\SectionsController::class, 'update'])->name('section.update');
	Route::get('/admin/section/{id}', [App\Http\Controllers\SectionsController::class, 'edit'])->name('section.edit');
	Route::get('/admin/section/delete/{id}', [App\Http\Controllers\SectionsController::class, 'destroy'])->name('section.destroy');

	/**
	 * plans
	 */

	Route::get('/admin/plans', [App\Http\Controllers\PlanController::class, 'index'])->name('plans');
	Route::get('/admin/plans/create', [App\Http\Controllers\PlanController::class, 'create'])->name('plans.create');
	Route::post('/admin/plans/store', [App\Http\Controllers\PlanController::class, 'store'])->name('plans.store');
	Route::post('/admin/plans/update/{id}', [App\Http\Controllers\PlanController::class, 'update'])->name('plans.update');
	Route::get('/admin/plans/edit/{id}', [App\Http\Controllers\PlanController::class, 'edit'])->name('plans.edit');
	Route::get('/admin/plans/show/{id}', [App\Http\Controllers\PlanController::class, 'show'])->name('plans.show');
	Route::get('/admin/plans/delete/{id}', [App\Http\Controllers\PlanController::class, 'destroy'])->name('plans.destroy');

	/*
	users **/
	Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
	Route::get('/admin/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
	Route::post('/admin/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
	Route::get('/admin/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
	Route::post('/admin/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
	Route::get('/admin/user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
	Route::get('/admin/user/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');

	/*
	categories **/
	Route::get('/admin/listing-categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('listingcategories');
	Route::get('/admin/listing-categories/create', [App\Http\Controllers\CategoriesController::class, 'create'])->name('categories.create');
	Route::post('/admin/listing-categories/store', [App\Http\Controllers\CategoriesController::class, 'store'])->name('categories.store');
	Route::post('/admin/listing-categories/update/{id}', [App\Http\Controllers\CategoriesController::class, 'update'])->name('categories.update');
	Route::get('/admin/listing-categories/edit/{id}', [App\Http\Controllers\CategoriesController::class, 'edit'])->name('categories.edit');
	Route::get('/admin/listing-categories/delete/{id}', [App\Http\Controllers\CategoriesController::class, 'destroy'])->name('categories.destroy');
	Route::post('/admin/listing-categories/storeotherinfo/', [App\Http\Controllers\CategoriesController::class, 'categoryOtherInfo'])->name('categories.saveotherinfo');
	Route::post('/admin/listing-categories/updateotherinfo/{id}', [App\Http\Controllers\CategoriesController::class, 'categoryOtherInfoUpdate'])->name('categories.updateotherinfo');

	Route::post('/admin/listing-categories/storefaq/', [App\Http\Controllers\CategoriesController::class, 'addCategoryFAQ'])->name('categories.savefaq');
	Route::post('/admin/listing-categories/updatefaq/{id}', [App\Http\Controllers\CategoriesController::class, 'updateCategoryFAQ'])->name('categories.updatefaq');

	/*
	sub categories **/
	Route::get('/admin/listing-sub-categories', [App\Http\Controllers\CategoriesController::class, 'subcategories'])->name('listingsubcategories');
	Route::post('/admin/get-sub-categories', [App\Http\Controllers\CategoriesController::class, 'getSubCategories'])->name('getsubcategories');
	Route::get('/admin/listing-sub-categories/create', [App\Http\Controllers\CategoriesController::class, 'subcreate'])->name('subcategories.create');
	Route::post('/admin/listing-sub-categories/store', [App\Http\Controllers\CategoriesController::class, 'substore'])->name('subcategories.store');
	Route::post('/admin/listing-sub-categories/update/{id}', [App\Http\Controllers\CategoriesController::class, 'subupdate'])->name('subcategories.update');
	Route::get('/admin/listing-sub-categories/edit/{id}', [App\Http\Controllers\CategoriesController::class, 'subedit'])->name('subcategories.edit');
	Route::get('/admin/listing-sub-categories/delete/{id}', [App\Http\Controllers\CategoriesController::class, 'subdestroy'])->name('subcategories.destroy');

	/*
	Listings **/
	Route::get('/admin/listings', [App\Http\Controllers\ListingController::class, 'index'])->name('listings');
	Route::get('/admin/listings/create', [App\Http\Controllers\ListingController::class, 'chooseType'])->name('listingcreate');
	Route::get('/admin/listings/create/new', [App\Http\Controllers\ListingController::class, 'create'])->name('listingcreatenew');
	Route::get('/admin/listings/create/duplicate', [App\Http\Controllers\ListingController::class, 'create'])->name('listingcreateduplicate');
	Route::post('/admin/listings/store', [App\Http\Controllers\ListingController::class, 'store'])->name('listingstore');
});

/*
front end **/
Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('home');
Route::post('/member/register', [App\Http\Controllers\WebController::class, 'memberRegistration'])->name('memberregsiter');
Route::post('/checklogin', [App\Http\Controllers\WebController::class, 'checkLogin'])->name('checklogin');
Route::get('/member/logout', [App\Http\Controllers\WebController::class, 'memberlogout'])->name('memberlogout');
Route::get('/{route_name}', [App\Http\Controllers\WebController::class, 'memberlogin'])->name('memberlogin');
Route::post('/verifyotp', [App\Http\Controllers\WebController::class, 'verifyOTP'])->name('verifyotp');
Route::get('/listing/new', [App\Http\Controllers\FrontlistingController::class, 'createNewListing'])->name('newlisting');
Route::get('/listing/create', [App\Http\Controllers\FrontlistingController::class, 'formNewListing'])->name('newlistingform');
Route::post('/listing/store', [App\Http\Controllers\FrontlistingController::class, 'frontlistingstore'])->name('savelisting');
Route::post('/listing/store-duplicate', [App\Http\Controllers\FrontlistingController::class, 'saveDuplicateListing'])->name('frontlistingstore.duplicate');
Route::post('load/stepform/', [App\Http\Controllers\FrontlistingController::class, 'loadStepForm'])->name('loadstepform');

/**
* Front end routes **/	
if(isset($_SERVER['REQUEST_URI']))
{
	$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$uri_segments = explode('/', $uri_path);
	if(isset($uri_segments[2]) && $uri_segments[2] != "")
	{
		$routes = DB::table('pages')->select('id','route_name')->where("route_name", $uri_segments[2])->first();
		if(!empty($routes))
		{
			Route::get('/{route_name}', [App\Http\Controllers\WebController::class, "pages"])->name($uri_segments[2]);
		}else{
			/**
			 * search route
			 */
			Route::get('/{city}', [App\Http\Controllers\FrontlistingController::class, 'getListingByCity'])->name('viewcompanyprofile');
		}
	}
}
Route::get('/profile/edit', [App\Http\Controllers\MemberDashboardController::class, 'profileEdit'])->name('profileedit');
Route::get('/profile/view/{member_id}', [App\Http\Controllers\MemberDashboardController::class, 'profileView'])->name('viewprofile');
Route::get('/profile/company/edit/', [App\Http\Controllers\MemberDashboardController::class, 'companyProfileEdit'])->name('companyprofile');
Route::get('/get/member-listing', [App\Http\Controllers\MemberDashboardController::class, 'allListing'])->name('getalllisting');
Route::post('/profile/update/{member_id}', [App\Http\Controllers\MemberDashboardController::class, 'updateProfile'])->name('profileupdate');
Route::post('/get/states', [App\Http\Controllers\MemberDashboardController::class, 'getStates'])->name('getstates');
Route::post('/get/cities', [App\Http\Controllers\MemberDashboardController::class, 'getCities'])->name('getcities');
Route::get('/listing/all/', [App\Http\Controllers\FrontlistingController::class, 'index'])->name('alllisting');
//Route::get('/listing/details/{listing_id}', [App\Http\Controllers\FrontlistingController::class, 'show'])->name('getdetails');
Route::get('/listing/details/{listing_slug}', [App\Http\Controllers\FrontlistingController::class, 'getDetailsBySlug'])->name('getdetailsbyslug');
Route::get('/listing/categories/', [App\Http\Controllers\FrontlistingController::class, 'categories'])->name('getcategories');
Route::get('/category/listing/{category_slug}', [App\Http\Controllers\FrontlistingController::class, 'categorylisting'])->name('getcategorylisting');
Route::get('/category/listing/{parent_slug}/{category_slug}', [App\Http\Controllers\FrontlistingController::class, 'subcategorylisting'])->name('getsubcategorylisting');
Route::get('/city/{city}', [App\Http\Controllers\FrontlistingController::class, 'citylisting'])->name('getcitylisting');
Route::post('/store/ratings', [App\Http\Controllers\FrontlistingController::class, 'saveRatings'])->name('storeratings');
Route::post('/store/likes', [App\Http\Controllers\FrontlistingController::class, 'saveLike'])->name('storelikes');
Route::post('/store/views', [App\Http\Controllers\FrontlistingController::class, 'listingViews'])->name('storeviews');
Route::post('/store/companyprofile', [App\Http\Controllers\MemberDashboardController::class, 'companyProfileStore'])->name('storecompanyprofile');
Route::post('/store/company/views', [App\Http\Controllers\MemberDashboardController::class, 'companyViews'])->name('storecompanyviews');
Route::get('/company/profile/', [App\Http\Controllers\MemberDashboardController::class, 'getCompanyProfile'])->name('viewcompanyprofile');
Route::post('/user/follow', [App\Http\Controllers\MemberDashboardController::class, 'followMember'])->name('followmember');
Route::post('/user/unfollow', [App\Http\Controllers\MemberDashboardController::class, 'unfollowMember'])->name('unfollowmember');




 
