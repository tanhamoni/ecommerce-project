<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\LoginController;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'index']);
Route::get('/product-details/{slug}', [FrontendController::class, 'productDetalis']);

Route::get('/shop', [FrontendController::class, 'shopProduct']);
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy']);
Route::get('/terms-conditions', [FrontendController::class, 'termsConditions']);
Route::get('/refund-policy', [FrontendController::class, 'refundPolicy']);
Route::get('/payment-policy', [FrontendController::class, 'paymentPolicy']);
Route::get('/about-us', [FrontendController::class, 'aboutUs']);
Route::get('/contact-us', [FrontendController::class, 'contactUs']);
Route::post('/contact-message/store', [FrontendController::class, 'contactMessageStore']);
Route::get('/view-card', [FrontendController::class, 'viewCard']);
Route::get('/checkout', [FrontendController::class, 'Checkout']);

Route::get('/category-products/{slug}', [FrontendController::class, 'catagoryProducts']);
Route::get('/subcategory-products/{slug}', [FrontendController::class, 'subcatagoryProducts']);
Route::get('/type-products/{type}', [FrontendController::class, 'typeProducts']);
Route::get('/search-products/', [FrontendController::class, 'searchProducts']);



// Order Routes.............
Route::post('/add-cart-details/{id}', [FrontendController::class, 'addtocartDetails']);
Route::get('/add-cart/{id}', [FrontendController::class, 'addtoCart']);
Route::get('/delete-cart/{id}', [FrontendController::class, 'deleteCart']);
Route::post('/customer-order-store', [FrontendController::class, 'orderStore']);
Route::get('/order-confirmation/{invoice_id}', [FrontendController::class, 'orderConfirmation']);

// Rout login....
Route::get('/admin/login', [LoginController::class, 'adminLogin']);
Route::post('/admin/login/auth', [LoginController::class, 'adminLoginAuth']);

Route::get('/employee/login', [LoginController::class, 'employeeLogin']);
Route::post('/employee/login/auth', [LoginController::class, 'employeeLoginAuth']);

Route::get('/customer/login', [LoginController::class, 'customerLogin']);
Route::post('/customer/login/auth', [LoginController::class, 'customerLoginAuth']);
Route::get('/customer/registration', [LoginController::class, 'customerRegistration']);

Route::post('/customer/registration-store', [LoginController::class, 'customerRegistrationStore']);


Auth::routes(['login' => false, 'register' => false]);

Route::middleware(['role:admin'])->group(function () {



    // category Routes..............
    Route::get('/owner/category-create', [CategoryController::class, 'create']);
    Route::post('/owner/category-store', [CategoryController::class, 'store']);
    Route::get('/owner/category-list', [CategoryController::class, 'list']);
    Route::get('/owner/category-edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/owner/category-update/{id}', [CategoryController::class, 'update']);
    Route::get('/owner/category-delete/{id}', [CategoryController::class, 'delete']);



    //  Sub category Routes........
    Route::get('/owner/subcategory-create', [SubCategoryController::class, 'create']);
    Route::post('/owner/subcategory-store', [SubCategoryController::class, 'store']);
    Route::get('/owner/subcategory-list', [SubCategoryController::class, 'list']);
    Route::get('/owner/subcategory-edit/{id}', [SubCategoryController::class, 'edit']);
    Route::post('/owner/subcategory-update/{id}', [SubCategoryController::class, 'update']);
    Route::get('/owner/subcategory-delete/{id}', [SubCategoryController::class, 'delete']);



    //  Products Routes........
    Route::get('/owner/product-create', [ProductController::class, 'create']);
    Route::post('/owner/product-store', [ProductController::class, 'store']);
    Route::get('/owner/product-list', [ProductController::class, 'list']);
    Route::get('/owner/product-edit/{id}', [ProductController::class, 'edit']);
    Route::post('/owner/product-update/{id}', [ProductController::class, 'update']);
    Route::get('/owner/product-delete/{id}', [ProductController::class, 'delete']);
    Route::get('/owner/product-status/{id}', [ProductController::class, 'changeStatus']);


    // Contact Meassage..................
    Route::get('/owner/contact-messages', [ContactMessageController::class, 'contactMessages']);
    Route::get('/delete/contact-messages/{id}', [ContactMessageController::class, 'deletecontactMessages']);
});

Route::middleware(['role:employee'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard']);
    Route::get('/employee/logout', [EmployeeController::class, 'employeeLogout']);
});

Route::middleware(['role:customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard']);
    Route::get('/customer/logout', [CustomerController::class, 'customerLogout']);
    Route::get('/customer/profile-view', [CustomerController::class, 'customerProfileView']);
    Route::post('/customer/profile-update', [CustomerController::class, 'customerProfileUpdate']);
    Route::get('/customer/view-credentials', [CustomerController::class, 'customerViewCredential']);
    Route::post('/customer/update-credentials', [CustomerController::class, 'customerUpdateCredential']);

    // Order Routes..........
    Route::get('/customer/orders/{status}', [CustomerController::class, 'customrOrders']);
    Route::get('/customer/order-cancel/{id}', [CustomerController::class, 'customerOrderCancel']);
});

Route::middleware(['role:employee,admin'])->group(function () {


    //Settings Route.............
    Route::get('/admin/logout', [AdminController::class, 'adminLogout']);
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/owner/website-settings', [SettingController::class, 'websiteSettings']);
    Route::post('/owner/website-settings/update', [SettingController::class, 'updateSettings']);


    Route::get('/owner/website-policy', [SettingController::class, 'websitePolicy']);
    Route::post('/owner/website-policy/update', [SettingController::class, 'updatePolicy']);

    Route::get('/owner/review-list', [ReviewController::class, 'reviewList']);
    Route::get('/owner/review-create', [ReviewController::class, 'reviewCreate']);

    Route::post('/owner/review-store', [ReviewController::class, 'reviewStore']);
    Route::get('/owner/review-edit/{id}', [ReviewController::class, 'reviewEdit']);
    Route::post('/owner/review-update/{id}', [ReviewController::class, 'reviewUpdate']);
    Route::get('/owner/review-delete/{id}', [ReviewController::class, 'reviewDelete']);

    // Order Routes..........
    Route::get('/owner/orders/{status}', [OrderController::class, 'showOrders']);
    Route::get('/owner/order-details/{id}', [OrderController::class, 'detailOrder']);
    Route::post('/owner/order-update/{id}', [OrderController::class, 'updateOrder']);
    Route::post('/owner/order-details/update/{id}', [OrderController::class, 'updateOrderDetails']);
    Route::post('/owner/order-status-update/{id}', [OrderController::class, 'updateOrderStatus']);
    Route::post('/owner/order-print-bulk', [OrderController::class, 'printBulkInvoice']);


    // Couriar Entry.............
     Route::get('/owner/order-couriar-entry/{order_id}', [OrderController::class, 'couriarEntry']);
});
