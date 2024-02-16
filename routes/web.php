<?php

use App\Http\Controllers\backend\AjaxController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\DesinerConroller;
use App\Http\Controllers\backend\FSideBarController;
use App\Http\Controllers\backend\HomePageSliderController;
use App\Http\Controllers\backend\NewsLetterController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\OrderdetailsController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\PageImages;
use App\Http\Controllers\backend\ProductAttrController;
use App\Http\Controllers\backend\ProductCategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\ProductSubcategoryController;
use App\Http\Controllers\backend\RazorpayController;
use App\Http\Controllers\backend\ShopPageSliderController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\UserOrderController;
use App\Http\Controllers\backend\SideBarController;
use App\Http\Controllers\backend\TagController;
use App\Http\Controllers\frontend\AfterLoginController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\PaymentController;
use App\Models\backend\ProductSubcategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Models\backend\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



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

Route::get('/', [HomeController::class, 'home'])->name('frontend.home');
Route::get('contact-us', [HomeController::class, 'contact_us'])->name('frontend.contact');
Route::get('about-us', [PageController::class, 'about_us'])->name('frontend.about');
Route::get('blogs', [PageController::class, 'blogs'])->name('blogs');
Route::get('blogs/{id}', [PageController::class, 'blogs_show'])->name('blogs.show');
Route::get('page/{slug}', [PageController::class, 'page_dynamic'])->name('page.dynamic');
Route::get('my-account', [Pagecontroller::class, 'my_account'])->name('my.account')->middleware('auth');
Route::get('profile', [Pagecontroller::class, 'profile'])->name('profile')->middleware('auth');;
Route::get('categories/{slug}', [HomeController::class, 'dynamic_categories'])->name('dynamic.categories');
Route::get('tags/{slug}', [HomeController::class, 'dynamic_tags'])->name('dynamic.tags');
Route::get('filter/{key}/{slug}', [HomeController::class, 'dynamic_filter'])->name('dynamic.filter');
Route::get('shop', [HomeController::class, 'shop_page'])->name('shop.page');
Route::get('categories', [HomeController::class, 'categories'])->name('categories');
Route::get('product/{slug}', [HomeController::class, 'product_detail'])->name('product.detail');
Route::get('cart', [HomeController::class, 'cart'])->name('cart');
Route::get('buy/now/{id}/{qty}', [HomeController::class, 'buy_now'])->name('buy.now');
Route::get('wishlist', [HomeController::class, 'wishlist'])->name('wishlist')->middleware('auth');;
Route::get('product-page', [HomeController::class, 'productpage'])->name('productpage');
Route::post('searchproduct', [HomeController::class, 'searchproduct'])->name('searchproduct');
Route::get('become-a-vendor', [HomeController::class, 'become_a_vendor'])->name('vendor.page');
Route::get('place-a-bulk-order', [HomeController::class, 'place_a_bulk_order'])->name('bulk.order.page');
Route::get('user-orders', [HomeController::class, 'user_orders'])->name('orders.page')->middleware('auth');
Route::get('schedule-a-purchase', [HomeController::class, 'schedule_purchase'])->name('schedule.purchase');
Route::resource('newsletter', NewsLetterController::class);

//post save
Route::post('become-a-vendor-save', [HomeController::class, 'vendor_save'])->name('become.a.vendor');
Route::post('place-a-bulk-order-save', [HomeController::class, 'bulk_order_save'])->name('bulk.order.page.save');
Route::post('contact-us-save', [HomeController::class, 'contact_us_save'])->name('contact.us');
Route::post('schedule-a-purchase', [HomeController::class, 'schedule_a_purchase'])->name('schedule.a.purchase');


//-----------------------------------AjaxRoutes-----------------------------------------------------

Route::post('attribute-change', [AjaxController::class, 'attribute_change'])->name('attr.change');
Route::post('add-to-cart', [AjaxController::class, 'add_to_cart'])->name('add.to.cart');
Route::post('add-qty-cart', [AjaxController::class, 'add_qty_cart'])->name('add.qty.cart');
Route::post('remove-qty-cart', [AjaxController::class, 'remove_qty_cart'])->name('remove.qty.cart');
Route::post('remove-cart', [AjaxController::class, 'remove_cart'])->name('remove.cart');
Route::post('product-search', [AjaxController::class, 'product_search'])->name('product.search');

//wishlist
Route::post('add-to-wishlist', [AjaxController::class, 'add_to_wishlist'])->name('add.to.wishlist');
Route::post('remove-wishlist', [AjaxController::class, 'remove_wishlist'])->name('remove.wishlist');

//--------------------------------------------------------------------------------------------------
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('customerhome');

Route::resource('users', UserController::class)->middleware('auth');
Route::resource('desiners', DesinerConroller::class)->middleware('auth');
Route::resource('products', ProductController::class)->middleware('auth');
Route::resource('products-categories', ProductCategoryController::class)->middleware('auth');
Route::resource('orders', OrderController::class)->middleware('auth');
Route::resource('pages', PageController::class)->middleware('auth');
Route::resource('pages-images', PageImages::class)->middleware('auth');
Route::get('footer-image', [PageImages::class, 'footer_image'])->name('footer.image')->middleware('auth');
Route::post('footer-image-save', [PageImages::class, 'footer_image_save'])->name('footer.image.save')->middleware('auth');
Route::resource('tags', TagController::class)->middleware('auth');
Route::resource('orderdetails', OrderdetailsController::class)->middleware('auth');
Route::resource('sidebar', FSideBarController::class)->middleware('auth');
Route::resource('shop/page/slider', ShopPageSliderController::class)->middleware('auth');
Route::resource('home-slider', HomePageSliderController::class)->middleware('auth');
Route::resource('blog', BlogController::class)->middleware('auth');

//for tag ajax
Route::post('tag_create', [TagController::class, 'tag_create'])->name('tag.create');
Route::post('tag_search', [TagController::class, 'tag_search'])->name('tag.search');
// Route::get('productsub-index/{slug}', [ProductSubcategoryController::class, 'index'])->name('product.sub.cat.index');
// Route::get('productsub-create/{id}', [ProductSubcategoryController::class, 'create'])->name('product.sub.cat.create');
// Route::get('productsub-edit/{slug}', [ProductSubcategoryController::class, 'edit1'])->name('product.sub.cat.edit');
// Route::post('productsub-edit-update', [ProductSubcategoryController::class, 'update1'])->name('product.sub.cat.update');
Route::resource('product-subcategories', ProductSubcategoryController::class)->middleware('auth');

Route::get('product-attribute/{id}', [ProductAttrController::class, 'product_index'])->name('product.attr');

Route::post('product-attribute-save', [ProductAttrController::class, 'product_attribute_save'])->name('product.attribute.save');

Route::get('product-attribute-delete/{id}', [ProductAttrController::class, 'product_attribute_delete'])->name('product.attribute.delete');

Route::get('product-variance/{id}', [ProductAttrController::class, 'product_variance'])->name('product-variance');

Route::get('product-variance/{id}/edit', [ProductAttrController::class, 'product_variance_edit'])->name('product.variance.edit');

Route::post('product-variance-save', [ProductAttrController::class, 'product_variance_save'])->name('product.variance.save');

Route::post('product-variance-image', [ProductAttrController::class, 'image_upload'])->name('product.variance.image.upload');

Route::get('product-variance-delete/{id}', [ProductAttrController::class, 'product_variance_delete'])->name('product.variance.delete');

Route::post('product-variance-save-ajax', [AjaxController::class, 'variance_ajax'])->name('variance.ajax');

//route for changesubcategory 
Route::post('product-subcategory', [AjaxController::class, 'product_subcategory'])->name('product.subcategory');
Route::post('get-product-attr', [AjaxController::class, 'get_product_attr'])->name('get.product.attr');


//userorders 
Route::get('userorders', [UserOrderController::class, 'index'])->name('userorders');
Route::get('userorders-details/{id}', [UserOrderController::class, 'order_details'])->name('userorders.details');


//for contact, vendor, bulkproduct backend index

Route::get('contactform-index', [SideBarController::class, 'contact_index'])->name('contactform.index');
Route::get('vendor-index', [SideBarController::class, 'vendor_index'])->name('vendor.index');
Route::get('bulkproduct-index', [SideBarController::class, 'bulkproduct_index'])->name('bulkproduct.index');

Route::get('contactform-destroy/{id}', [SideBarController::class, 'contact_destroy'])->name('contactform.destroy');
Route::get('vendor-destroy/{id}', [SideBarController::class, 'vendor_destroy'])->name('vendor.destroy');
Route::get('bulkorder-destroy/{id}', [SideBarController::class, 'bulkorder_destroy'])->name('bulkorder.destroy');


//mail testing

Route::get('download-bill/{id}', function ($id) {
    // dd($id);
    $order = Order::where('order_id', $id)->first();
    // $user = User::where($order->user_id)->first();
    $order_details = Json_decode($order->product_details);
    // dd($order, $order_details);
    return view('mail.testing', compact('order', 'order_details'));
})->name('download.bill');

// Route::get('sendmail', function () {

//     $data1 = ['prateek' => 'kumar'];
//     $message = "testing";
//     $user = 'testing';

//     $mail = Mail::send('mail.testing1', ['body' => $data1], function ($message) use ($user) {
//         $message->sender('projectmanagement@omegawebdemo.com.au');
//         $message->subject('Prashast');
//         $message->to('prateekk898@gmail.com');
//     });

// });


//paytm payment routes 
Route::post('paytm-payment', [PaymentController::class, 'paytm_payment'])->name('paytm.payment');
Route::post('paytm-done', [PaymentController::class, 'paytm_done'])->name('paytm.payment.done')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);


//password change 

Route::post('password-change', [HomeController::class, 'password_change'])->name('password.change');
Route::post('password-change1', [HomeController::class, 'password_change1'])->name('password.change1');


Route::group(['middleware' => ['auth']], function () {
    // backend ROutes frontend login'billing.address'
    Route::post('billing/address', [AfterLoginController::class, 'billing_address'])->name('billing.address');
});
