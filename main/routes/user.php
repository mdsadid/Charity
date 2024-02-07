<?php

use Illuminate\Support\Facades\Route;

Route::namespace('User\Auth')->name('user.')->group(function () {
    // User Login and Logout Process
    Route::controller('LoginController')->group(function () {
        Route::get('/login', 'loginForm')->name('login.form');
        Route::post('/login', 'login')->name('login');
        Route::get('logout', 'logout')->middleware('auth')->name('logout');
    });

    // User Registration Process
    Route::controller('RegisterController')->group(function () {
        Route::get('register', 'registerForm')->name('register');
        Route::post('register', 'register')->middleware('register.status');
        Route::post('check-user', 'checkUser')->name('check.user');
    });

    // Forgot Password
    Route::controller('ForgotPasswordController')->prefix('password')->name('password.')->group(function () {
        Route::get('forgot', 'requestForm')->name('request.form');
        Route::post('forgot', 'sendResetCode');
        Route::get('verification/form', 'verificationForm')->name('code.verification.form');
        Route::post('verification/form', 'verificationCode');
    });

    // Reset Password
    Route::controller('ResetPasswordController')->prefix('password/reset')->name('password.')->group(function () {
        Route::get('form/{token}', 'resetForm')->name('reset.form');
        Route::post('/', 'resetPassword')->name('reset');
    });
});

Route::middleware('auth')->name('user.')->group(function () {
    Route::namespace('User')->group(function () {
        // Authorization
        Route::controller('AuthorizationController')->group(function () {
            Route::get('authorization', 'authorizeForm')->name('authorization');
            Route::get('resend-verify/{type}', 'sendVerifyCode')->name('send.verify.code');
            Route::post('verify-email', 'emailVerification')->name('verify.email');
            Route::post('verify-mobile', 'mobileVerification')->name('verify.mobile');
            Route::post('verify-g2fa', 'g2faVerification')->name('go2fa.verify');
        });

        // User Operation
        Route::middleware('authorize.status')->group(function () {
            // Campaign
            Route::controller('CampaignController')->prefix('campaign')->name('campaign.')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('new', 'new')->name('create');
                Route::post('store', 'store')->name('store');
                Route::get('edit/{slug}', 'edit')->name('edit');
                Route::post('image-remove/{id}', 'removeImage')->name('image.remove');

                Route::name('file.')->group(function () {
                    Route::post('file-upload', 'upload')->name('upload');
                    Route::post('file-remove', 'remove')->name('remove');
                });
            });

            Route::controller('UserController')->group(function () {
                // KYC Dashboard
                Route::get('dashboard', 'home')->name('home');

                // KYC Check
                Route::prefix('kyc')->name('kyc.')->group(function () {
                    Route::get('data', 'kycData')->name('data');
                    Route::get('form', 'kycForm')->name('form');
                    Route::post('form', 'kycSubmit');
                });

                // Profile Update
                Route::get('profile', 'profile')->name('profile');
                Route::post('profile', 'profileUpdate');

                // Password Change
                Route::get('change/password', 'password')->name('change.password');
                Route::post('change/password', 'passwordChange');

                // 2 Factor Authenticator
                Route::prefix('twofactor')->name('twofactor.')->group(function () {
                    Route::get('/', 'show2faForm')->name('form');
                    Route::post('enable', 'enable2fa')->name('enable');
                    Route::post('disable', 'disable2fa')->name('disable');
                });

                // Report
                Route::get('deposit/history', 'depositHistory')->name('deposit.history');
                Route::get('transactions', 'transactions')->name('transactions');

                // File Download
                Route::get('file-download', 'fileDownload')->name('file.download');
            });

            // Withdraw
            Route::controller('WithdrawController')->prefix('withdraw')->name('withdraw.')->group(function () {
                Route::middleware('kyc.status')->group(function () {
                    Route::get('/', 'methods')->name('methods');
                    Route::post('/', 'store');
                    Route::get('preview', 'preview')->name('preview');
                    Route::post('preview', 'submit');
                });

                Route::get('index', 'index')->name('index');
            });
        });
    });

    // Deposit
    Route::middleware('authorize.status')->prefix('deposit')->name('deposit.')->controller('Gateway\PaymentController')->group(function () {
        Route::any('/', 'deposit')->name('index');
        Route::post('insert', 'depositInsert')->name('insert');
        Route::get('confirm', 'depositConfirm')->name('confirm');
        Route::get('manual', 'manualDepositConfirm')->name('manual.confirm');
        Route::post('manual', 'manualDepositUpdate')->name('manual.update');
    });
});
