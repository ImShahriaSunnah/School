<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/notification/{student_id}', [\App\Http\Controllers\PageController::class, 'notificationData'])->name('notification.index');
Route::get('school/list', [\App\Http\Controllers\Api\SchoolController::class, 'schoolList']);
Route::post('attendance/list/{class_id}/{section_id}/{group_id}', [\App\Http\Controllers\Api\SchoolController::class, 'presentArray']);
Route::get('school/list/search/{data}', [\App\Http\Controllers\Api\SchoolController::class, 'schoolListSearch']);
Route::group(['prefix' => 'schools'] , function() {
    Route::post('/login', [\App\Http\Controllers\Api\SchoolController::class, 'login']);
    Route::post('/register', [\App\Http\Controllers\Api\SchoolController::class, 'register']);
    Route::post('/otp', [\App\Http\Controllers\Api\SchoolController::class, 'verifyOtp']);


    Route::group(['middleware' =>['auth:sanctum']],function(){
        Route::post('/acquisition', [\App\Http\Controllers\Api\SchoolController::class, 'acquisitionPost']);
        Route::get('/price/suggest/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'priceSuggest']);
        Route::post('/select/price/post/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'selectPricePost']);


        //api for school operation .............

        //class section ....
        Route::post('/create/class/post',    [\App\Http\Controllers\Api\SchoolController::class, 'createClassPost']);
        Route::get('/show/class',    [\App\Http\Controllers\Api\SchoolController::class, 'showClass']);
        Route::get('/delete/class/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'deleteClass']);
        Route::get('/edit/class/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'editClass']);
        Route::post('/update/class/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'updateClass']);

        //section section ....

        Route::post('/create/section/post',    [\App\Http\Controllers\Api\SchoolController::class, 'createSectionPost']);
        Route::get('/show/section',    [\App\Http\Controllers\Api\SchoolController::class, 'showSection']);
        Route::get('/show/section/class/{class_id}',    [\App\Http\Controllers\Api\SchoolController::class, 'showSectionClass']);
        Route::get('/delete/section/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'deleteSection']);
        Route::get('/edit/section/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'editSection']);
        Route::post('/update/section/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'updateSection']);

        //group section ....

        Route::post('/create/group/post',    [\App\Http\Controllers\Api\SchoolController::class, 'createGroupPost']);
        Route::get('/show/group',    [\App\Http\Controllers\Api\SchoolController::class, 'showGroup']);
        Route::get('/delete/group/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'deleteGroup']);
        Route::get('/edit/group/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'editGroup']);
        Route::post('/update/group/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'updateGroup']);


        Route::get('class/section/group/all',[\App\Http\Controllers\Api\SchoolController::class, 'classSectionGroupAll']);
        Route::get('search/student/{class_id}/{section_id}/{group_id}/{data}',[\App\Http\Controllers\Api\SchoolController::class, 'studentSearch']);
        Route::get('class/section/group/student/show/{class_id}/{section_id}/{group_id}',[\App\Http\Controllers\Api\SchoolController::class, 'classSectionGroupAllStudent']);

        //subject section ....

        Route::post('/create/subject/post',    [\App\Http\Controllers\Api\SchoolController::class, 'createSubjectPost']);
        Route::get('/show/subject/data/{class_id}/{section_id}',    [\App\Http\Controllers\Api\SchoolController::class, 'showClassSectionForSubject']);
        Route::get('/show/subject',    [\App\Http\Controllers\Api\SchoolController::class, 'showSubject']);
        Route::get('/delete/subject/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'deleteSubject']);
        Route::get('/edit/subject/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'editSubject']);
        Route::post('/update/subject/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'updateSubject']);
        Route::get('/subject/show/{class_id}/{section_id}/{group_id}',    [\App\Http\Controllers\Api\SchoolController::class, 'dataShowSubject']);


        //class section ....
        Route::post('/create/department/post',    [\App\Http\Controllers\Api\SchoolController::class, 'createDeptPost']);
        Route::get('/show/department',    [\App\Http\Controllers\Api\SchoolController::class, 'showDept']);
        Route::get('/delete/department/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'deleteDept']);
        Route::get('/edit/department/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'editDept']);
        Route::post('/update/department/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'updateDept']);


        //class section ....
        Route::post('/create/term/post',    [\App\Http\Controllers\Api\SchoolController::class, 'createTermPost']);
        Route::get('/show/term',    [\App\Http\Controllers\Api\SchoolController::class, 'showTerm']);
        Route::get('/delete/term/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'deleteTerm']);
        Route::get('/edit/term/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'editTerm']);
        Route::post('/update/term/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'updateTerm']);


        //class section ....
        Route::post('/create/teacher/post',    [\App\Http\Controllers\Api\SchoolController::class, 'createTeacherPost']);
        Route::get('/show/teacher',    [\App\Http\Controllers\Api\SchoolController::class, 'showTeacher']);
        Route::get('/delete/teacher/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'deleteTeacher']);
        Route::get('/edit/teacher/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'editTeacher']);
        Route::post('/update/teacher/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'updateTeacher']);


        Route::get('/show/assign/teacher/{class_id}/{section_id}/{group_id}',    [\App\Http\Controllers\Api\SchoolController::class, 'assignTeacherForData']);
        Route::post('/show/assign/teacher/post',    [\App\Http\Controllers\Api\SchoolController::class, 'assignTeacherForDataPost']);
        Route::get('/show/assign/teacher/all/{class_id}/{section_id}/{group_id}',    [\App\Http\Controllers\Api\SchoolController::class, 'assignTeacherShowAll']);
        Route::get('/show/all/student',    [\App\Http\Controllers\Api\SchoolController::class, 'showAllStudent']);
        Route::post('/create/all/student',    [\App\Http\Controllers\Api\SchoolController::class, 'addAllStudent']);

        Route::post('attendance/list/{class_id}/{section_id}/{group_id}', [\App\Http\Controllers\Api\SchoolController::class, 'presentArray']);
        Route::get('attendance/list/check/{class_id}/{section_id}/{group_id}', [\App\Http\Controllers\Api\SchoolController::class, 'attendanceCheck']);
        Route::post('attendance/check/status/{id}', [\App\Http\Controllers\Api\SchoolController::class, 'attendanceCheckStatus']);
        Route::get('message/status/data', [\App\Http\Controllers\Api\SchoolController::class, 'messageStatusData']);
        Route::get('message/usage/data', [\App\Http\Controllers\Api\SchoolController::class, 'messageUsageData']);
        Route::post('message/checkout/post', [\App\Http\Controllers\Api\SchoolController::class, 'schoolMessagePostCheckout']);
        Route::get('message/checkout/show', [\App\Http\Controllers\Api\SchoolController::class, 'schoolMessagePostCheckoutShow']);

        Route::get('result/list/{class_id}/{section_id}/{group_id}/{subject_id}/{term_id}',[\App\Http\Controllers\Api\SchoolController::class, 'resultShowAll']);
        Route::post('result/update/{student_id}',[\App\Http\Controllers\Api\SchoolController::class, 'resultUpdatePost']);

        Route::group(['prefix' => 'student/class/fees'] , function() {

        Route::post('/post',    [\App\Http\Controllers\Api\SchoolController::class, 'createClassFeesPost']);
        Route::get('/show',    [\App\Http\Controllers\Api\SchoolController::class, 'showClassFees']);
        Route::get('/show/extra',    [\App\Http\Controllers\Api\SchoolController::class, 'showClassExtra']);
        Route::get('/delete/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'deleteClassFees']);
        Route::get('/edit/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'editClassFees']);
        Route::post('/update/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'updateClassFees']);


        Route::get('/pay/data/show/{student_id}/{month_name}',    [\App\Http\Controllers\Api\SchoolController::class, 'showStudentPayAmount']);
        Route::post('post/pay/data/show/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'postStudentPayAmount']);

        //teacher salary ...

        Route::get('/show/all/teacher/list',    [\App\Http\Controllers\Api\SchoolController::class, 'showTeacherAccount']);
        Route::get('/show/salary/{teacher_id}/{month_name}',    [\App\Http\Controllers\Api\SchoolController::class, 'showTeacherSalary']);
        Route::post('/post/salary/{id}',    [\App\Http\Controllers\Api\SchoolController::class, 'postTeacherSalary']);


        //staff ....

        Route::post('/staff/position/create',    [\App\Http\Controllers\Api\SchoolController::class, 'createStaffPosition']);
        Route::get('/staff/position/list',    [\App\Http\Controllers\Api\SchoolController::class, 'showStaffPosition']);
        Route::get('/show/all/staff/list',    [\App\Http\Controllers\Api\SchoolController::class, 'showStaff']);
        Route::post('/post/all/staff/create',    [\App\Http\Controllers\Api\SchoolController::class, 'showStaffPostCreate']);

        Route::get('show/month/data/{id}/{month_name}',[\App\Http\Controllers\Api\SchoolController::class, 'showStaffMonthData']);
        Route::post('post/month/data/{id}/{month_name}',[\App\Http\Controllers\Api\SchoolController::class, 'postStaffMonthData']);

        Route::get('all/teacher/salary/{id}',[\App\Http\Controllers\Api\SchoolController::class, 'allTeacherSalary']);
        Route::get('all/staff/salary/{id}',[\App\Http\Controllers\Api\SchoolController::class, 'allStaffSalary']);


        });

        Route::get('show/notice/data',[\App\Http\Controllers\Api\SchoolController::class, 'showNoticeData']);
        Route::get('delete/notice/data/{id}',[\App\Http\Controllers\Api\SchoolController::class, 'deleteNoticeData']);
        Route::post('post/notice/data',[\App\Http\Controllers\Api\SchoolController::class, 'postNoticeData']);
        Route::get('show/notice/data/{id}',[\App\Http\Controllers\Api\SchoolController::class, 'showNoticeDataId']);

        Route::get('show/teacher/data/class/{id}',[\App\Http\Controllers\Api\SchoolController::class, 'showTeacherClassId']);


        Route::get('/logout', [\App\Http\Controllers\Api\SchoolController::class, 'logout']);



    });
});

Route::group(['prefix' => 'teachers'] , function() {
    Route::post('/login', [\App\Http\Controllers\Api\TeacherController::class, 'login']);
    Route::post('/register', [\App\Http\Controllers\Api\TeacherController::class, 'register']);
    Route::post('/otp', [\App\Http\Controllers\Api\TeacherController::class, 'verifyOtp']);
});
