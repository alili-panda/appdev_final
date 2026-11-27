<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialWorkerDashboardController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\userManagementController;
use App\Http\Controllers\admin\caseMonitoringController;
use App\Http\Controllers\admin\caseAssignmentController;
use App\Http\Controllers\admin\referralController;
use App\Http\Controllers\admin\reportsController;
use App\Http\Controllers\admin\activityLogsController;
use App\Http\Controllers\socialWorker\myCasesController;
use App\Http\Controllers\socialWorker\referralManagementController;
use App\Http\Controllers\socialWorker\reportManagementController;
use App\Http\Controllers\socialWorker\myProfileController;
use App\Http\Controllers\client\clientDashboardController;
use App\Http\Controllers\client\caseStatusController;
use App\Http\Controllers\client\uploadFileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);


Route::get('/social-worker/dashboard', function () {
    return view('social-worker.dashboard');
});

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->name('admin.dashboard');

Route::get('/admin/userManagement', [userManagementController::class, 'index'])
    ->name('admin.userManagement');

Route::post('/users', [userManagementController::class, 'store'])->name('users.store');

Route::put('/users/{user}', [userManagementController::class, 'update'])->name('users.update');

Route::delete('/users/{user}', [userManagementController::class, 'destroy'])->name('users.destroy');



Route::get('/admin/caseMonitoring', [caseMonitoringController::class, 'index'])
->name('admin.caseMonitoring');

Route::get('/admin/caseAssignment', [caseAssignmentController::class, 'index'])
->name('admin.caseAssignment');

Route::get('/admin/referral', [referralController::class, 'index'])
->name('admin.referral');

Route::get('/admin/reports', [reportsController::class, 'index'])
->name('admin.reports');

Route::get('/admin/activityLogs', [activityLogsController::class, 'index'])
->name('admin.activityLogs');




Route::get('/social-worker/myCases', [myCasesController::class, 'index'])
->name('social-worker.cases.index');

Route::get('/create', [myCasesController::class, 'create'])->name('social-worker.cases.create');
Route::post('/', [myCasesController::class, 'store'])->name('social-worker.cases.store');

Route::get('/social-worker/referralManagement', [referralManagementController::class, 'index'])
->name('social-worker.referralManagement');

Route::get('/social-worker/reportManagement', [reportManagementController::class, 'index'])
->name('social-worker.reportManagement');

Route::get('/social-worker/myProfile', [myProfileController::class, 'index'])
->name('social-worker.myProfile');

Route::get('/client/dashboard', [clientDashboardController::class, 'index'])
->name('client.dashboard');

Route::get('/client/caseStatus', [caseStatusController::class, 'index'])
->name('client.caseStatus');

Route::get('/client/uploadFile', [uploadFileController::class, 'index'])
->name('client.uploadFile');
