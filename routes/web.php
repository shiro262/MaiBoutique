<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('landing');
});

//login
Route::middleware(['isGuest'])->group(function(){
    Route::get('/login', function(){
        return view('login');
    })->name('guest.viewLogin');

    Route::post('/login-user', function(Request $req){
        $cred = $req->only('email', 'password');

        $rememberMe = true;
        if($req->remember == null) $rememberMe = false;
        if(Auth::attempt($cred, $rememberMe)){
            if($rememberMe == true) Cookie::queue('last_logged', $req->email);
            if(Auth::user()->role == 'user') return redirect()->route('user.viewPage');
            return redirect()->route('admin.viewAdmin');
        }
        return redirect()->back()->withErrors('Wrong Email or Passsword!');
    })->name('guest.method.login');

});
Route::middleware(['auth'])->group(function(){
    Route::get('/user-logout', function(){
        Auth::logout();
        return redirect()->route('guest.viewLogin');
    })->name('user.method.logout');

    Route::middleware(['isMember'])->group(function(){
        Route::get('/member-page', function(){
            return view('memberpage');
        })->name('user.viewPage');

    });

    Route::middleware(['isAdmin'])->group(function(){
        Route::get('/admin-page', function(){
            return view('adminpage');
        })->name('admin.viewAdmin');

    });

});

//register
Route::get('/register', [RegisterController::class, 'openRegisterPage']);
Route::post('/register', [RegisterController::class, 'registration']);

//for member
Route::get('/member-page', [ProductController::class, 'index'])->name('user.viewPage')->middleware('isMember');
Route::get('/member/product/search', [ProductController::class, 'search'])->name('Search Product')->middleware('isMember');
Route::get('/member/product/{id}', [ProductController::class, 'show'])->name('View Product')->middleware('isMember');
Route::get('/member/member-profile', [UserController::class, 'showmemberprofile'])->name('View Member Profile')->middleware('isMember');
Route::get('/member/update-password-page', function() {
    return view('updatepasswordmember');
})->name('View Update Password Page For Member')->middleware('isMember');
Route::post('/member/update-password',  [UserController::class, 'updatepasswordmember'])->name('Update Password For Member')->middleware('isMember');
Route::get('/member/update-profile-page', function() {
    return view('updateprofile');
})->name('View Update Profile Page')->middleware('isMember');
Route::post('/member/update-profile', [UserController::class, 'updateprofile'])->name('Update Profile')->middleware('isMember');
Route::get('/member/cart', [CartController::class, 'checkout'])->name('Check Out')->middleware('isMember');
Route::post('/member/add-to-cart/{id}', [CartController::class, 'addtocart'])->name('Add To Cart')->middleware('isMember');
Route::delete('/member/remove-from-cart/{id}', [CartController::class, 'removefromcart'])->name('Remove From Cart')->middleware('isMember');
Route::get('/member/checkout', [CartController::class, 'confirmcheckout'])->name('Confirm Check Out')->middleware('isMember');
Route::get('/member/transaction-history', [CartController::class, 'historyindex'])->name('View History Page')->middleware('isMember');
Route::get('/member/transaction-history/{id}', [CartController::class, 'historydetailview'])->name('View History Detail Page')->middleware('isMember');

//for admin
Route::get('/admin-page', [ProductController::class, 'indexadmin'])->name('admin.viewAdmin')->middleware('isAdmin');
Route::get('/admin/product/search', [ProductController::class, 'searchforadmin'])->name('Search Product Admin')->middleware('isAdmin');
Route::get('/admin/product/{id}', [ProductController::class, 'showforadmin'])->name('View Product Admin')->middleware('isAdmin');
Route::post('/admin/store', [ProductController::class,'store'])->name('Add Item')->middleware('isAdmin');
Route::delete('/admin/product/delete/{id}', [ProductController::class, 'destroy'])->name('Delete Product')->middleware('isAdmin');
Route::get('/admin/add-item', function() {
    return view('additem');
})->name('View Add Item Page')->middleware('isAdmin');
Route::get('/admin/admin-profile', [UserController::class, 'showadminprofile'])->name('View Admin Profile')->middleware('isAdmin');
Route::get('/admin/update-password-page', function() {
    return view('updatepasswordadmin');
})->name('View Update Password Page For Admin')->middleware('isAdmin');
Route::post('/admin/update-password',  [UserController::class, 'updatepasswordadmin'])->name('Update Password For Admin')->middleware('isAdmin');
