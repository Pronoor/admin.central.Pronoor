<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FooterLinkController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MenuBarController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TermsConditionController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/users/', [UserController::class, 'index'])->name('admin.users');
Route::get('/users/create/', [UserController::class, 'create'])->name('admin.users.create');
Route::get('/users/{id}/edit/', [UserController::class, 'edit'])->name('admin.users.edit');
Route::get('/users/{id}/delete/', [UserController::class, 'destroy'])->name('admin.users.delete');


Route::get('/menus/', [MenuBarController::class, 'index'])->name('admin.menus');
Route::get('/menus/create/', [MenuBarController::class, 'create'])->name('admin.menus.create');
Route::post('/menus/store/', [MenuBarController::class, 'store'])->name('admin.menus.store');
Route::get('/menus/{id}/edit//', [MenuBarController::class, 'edit'])->name('admin.menus.edit');
Route::get('/menus/{id}/delete/', [MenuBarController::class, 'destroy'])->name('admin.menus.delete');

Route::get('/home-sliders/', [MenuBarController::class, 'index'])->name('admin.home-sliders');
Route::get('/home-sliders/create/', [MenuBarController::class, 'create'])->name('admin.home-sliders.create');
Route::get('/home-sliders/{id}/edit/', [MenuBarController::class, 'edit'])->name('admin.home-sliders.edit');
Route::get('/home-sliders/{id}/delete/', [MenuBarController::class, 'destroy'])->name('admin.home-sliders.delete');

Route::get('/footer-links/', [FooterLinkController::class, 'index'])->name('admin.footer-links');
Route::get('/footer-links/create/', [FooterLinkController::class, 'create'])->name('admin.footer-links.create');
Route::get('/footer-links/{id}/edit/', [FooterLinkController::class, 'edit'])->name('admin.footer-links.edit');
Route::get('/footer-links/{id}/delete/', [FooterLinkController::class, 'destroy'])->name('admin.footer-links.delete');

Route::get('/about-us/', [AboutUsController::class, 'index'])->name('admin.about-us');
Route::get('/about-us/create/', [AboutUsController::class, 'create'])->name('admin.about-us.create');
Route::get('/about-us/{id}/edit/', [AboutUsController::class, 'edit'])->name('admin.about-us.edit');
Route::get('/about-us/{id}/delete/', [AboutUsController::class, 'destroy'])->name('admin.about-us.delete');

Route::get('/testimonial/', [TestimonialController::class, 'index'])->name('admin.testimonial');
Route::get('/testimonial/create/', [TestimonialController::class, 'create'])->name('admin.testimonial.create');
Route::get('/testimonial/{id}/edit/', [TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
Route::get('/testimonial/{id}/delete/', [TestimonialController::class, 'destroy'])->name('admin.testimonial.delete');

Route::get('/service/', [ServiceController::class, 'index'])->name('admin.service');
Route::get('/service/create/', [ServiceController::class, 'create'])->name('admin.service.create');
Route::get('/service/{id}/edit/', [ServiceController::class, 'edit'])->name('admin.service.edit');
Route::get('/service/{id}/delete/', [ServiceController::class, 'destroy'])->name('admin.service.delete');


Route::get('/terms-conditions/', [TermsConditionController::class, 'index'])->name('admin.terms-conditions');
Route::get('/terms-conditions/create/', [TermsConditionController::class, 'create'])->name('admin.terms-conditions.create');
Route::get('/terms-conditions/{id}/edit/', [TermsConditionController::class, 'edit'])->name('admin.terms-conditions.edit');
Route::get('/terms-conditions/{id}/delete/', [TermsConditionController::class, 'destroy'])->name('admin.terms-conditions.delete');


Route::get('/faq/', [FaqController::class, 'index'])->name('admin.faq');
Route::get('/faq/create/', [FaqController::class, 'create'])->name('admin.faq.create');
Route::get('/faq/{id}/edit/', [FaqController::class, 'edit'])->name('admin.faq.edit');
Route::get('/faq/{id}/delete/', [FaqController::class, 'destroy'])->name('admin.faq.delete');

Route::get('/privacy-policies/', [PrivacyPolicyController::class, 'index'])->name('admin.privacy-policies');
Route::get('/privacy-policies/create/', [PrivacyPolicyController::class, 'create'])->name('admin.privacy-policies.create');
Route::get('/privacy-policies/{id}/edit/', [PrivacyPolicyController::class, 'edit'])->name('admin.privacy-policies.edit');
Route::get('/privacy-policies/{id}/delete/', [PrivacyPolicyController::class, 'destroy'])->name('admin.privacy-policies.delete');
