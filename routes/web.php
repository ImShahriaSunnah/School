<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultSetting;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\Exam\ExamController;
use App\Http\Controllers\Exam\MarkController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\School\SMSController;
use App\Http\Controllers\ClassPeriodController;
use App\Http\Controllers\School\TermController;
use App\Http\Controllers\School\AddonController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Exam\QuestionController;
use App\Http\Controllers\School\DeviceController;
use App\Http\Controllers\School\ResultController;
use App\Http\Controllers\School\ZktecoController;
use App\Http\Controllers\School\FinanceController;
use App\Http\Controllers\School\LibraryController;
use App\Http\Controllers\School\StudentController;
use App\Http\Controllers\School\SubjectController;
use App\Http\Controllers\School\SyllabusController;
use App\Http\Controllers\OnlineAddmissionController;
use App\Http\Controllers\Notice\NoticeViewController;
use App\Http\Controllers\School\AssignFeesController;
use App\Http\Controllers\School\AttendanceController;
use App\Http\Controllers\Finance\SchoolFeesController;
use App\Http\Controllers\Lib\LanguageDetectController;
use App\Http\Controllers\School\CertificateController;


            //----------------Question Route Start----------------

            Route::get('/create/question/index', [QuestionController::class, 'index'])->name('create.question.show');
            Route::post('ckeditor/image_upload', [QuestionController::class, 'imageUpload'])->name('ckeditor.image.upload');
            Route::post('/create/question/store', [QuestionController::class, 'questionStore'])->name('question.store');
            Route::get('/show/question', [QuestionController::class, 'showQuestion'])->name('show.question');

            // admitCard
            Route::get('/show/admit/card', [ExamController::class, 'showAdmitCard'])->name('show.admit.card');
            Route::post('/show/admit/card/download', [ExamController::class, 'showAdmitCardDownload'])->name('show.admit.card.download');

            // sitPlan
            Route::get('/show/sit/plan', [ExamController::class, 'showSitPlan'])->name('show.sit.plan');
            Route::post('/show/sit/plan/download', [ExamController::class, 'showSitPlanDownload'])->name('show.sit.plan.download');

            //Ajax
            Route::get('/view/single/question/{id}', [QuestionController::class, 'viewSingleQuestion'])->name('view.single.question');
            Route::get('/term/wiese/question/{id}', [QuestionController::class, 'termWiseQuestion'])->name('term.wise.question');
            Route::get('/ajax/delete/question/{id}', [QuestionController::class, 'ajaxDeleteQuestion'])->name('term.wise.question');
            Route::post('/ajax/question/store', [QuestionController::class, 'ajaxQuestionStore']);
            //Ajax

            Route::get('/view/mcq/creative/question/{id}', [QuestionController::class, 'viewMcqCreativeQuestion'])->name('view.mcq.creative.question');
            Route::get('/edit/question/{id}', [QuestionController::class, 'editQuestion'])->name('edit.question');
            Route::post('/update/question/{id}', [QuestionController::class, 'updateQuestion'])->name('update.question');
            Route::get('/delete/question/{id}', [QuestionController::class, 'deleteQuestion'])->name('delete.question');
            Route::delete('/question/check/delete', [QuestionController::class, 'Question_check_delete'])->name('Question.check.delete');
            Route::get('/pdf/question/{id}', [QuestionController::class, 'pdfQuestion'])->name('pdf.question');
            Route::get('/restore/Question/{id}', [QuestionController::class, 'restoreQuestion'])->name('restore.question');
            Route::get('/pDelete/Question/{id}', [QuestionController::class, 'PdeleteQuestion'])->name('Pdelete.admission');


     
    //Notice Route Start
    Route::post('/term/wise/result', [NoticeViewController::class, 'termWiseResult'])->name('show.term.wise.result');
    Route::post('/notice/by/student/logged', [NoticeViewController::class, 'studentLoginController'])->name('student.login');
    // Route::get('/student/otp', [NoticeViewController::class, 'otpView']);
    //Notice Route End

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/admin', [AdminPageController::class, 'admin'])->name('admin');
        //Route::view('/admin', 'admin');

        Route::prefix('admin')->group(function () {

            Route::prefix('contact-us')->group(function () {
                Route::get('/index',             [App\Http\Controllers\AdminPageController::class, 'contactusIndex'])->name('contactus.index');
                Route::get('/edit/{id}',         [App\Http\Controllers\AdminPageController::class, 'contactusEdit'])->name('contactus.edit');
                Route::post('/update/{id}',     [App\Http\Controllers\AdminPageController::class, 'contactusUpdate'])->name('contactus.update');
                Route::get('/destroy/{id}',     [App\Http\Controllers\AdminPageController::class, 'contactusDestroy'])->name('contactus.destroy');
            });

            Route::prefix('pricing')->group(function () {
                Route::get('/index',             [App\Http\Controllers\AdminPageController::class, 'pricingIndex'])->name('pricing.index');
                Route::get('/create',             [App\Http\Controllers\AdminPageController::class, 'pricingCreate'])->name('pricing.create');
                Route::post('/store',             [App\Http\Controllers\AdminPageController::class, 'pricingStore'])->name('pricing.store');
                Route::get('/edit/{id}',         [App\Http\Controllers\AdminPageController::class, 'pricingEdit'])->name('pricing.edit');
                Route::post('/update/{id}',     [App\Http\Controllers\AdminPageController::class, 'pricingUpdate'])->name('pricing.update');
                Route::get('/destroy/{id}',     [App\Http\Controllers\AdminPageController::class, 'pricingDestroy'])->name('pricing.destroy');
            });

            Route::prefix('tutorial')->group(function () {
                Route::get('/index',             [App\Http\Controllers\AdminPageController::class, 'tutorialIndex'])->name('tutorial.index');
                Route::get('/create',             [App\Http\Controllers\AdminPageController::class, 'tutorialCreate'])->name('tutorial.create');
                Route::post('/store',             [App\Http\Controllers\AdminPageController::class, 'tutorialStore'])->name('tutorial.store');
                Route::get('/edit/{id}',         [App\Http\Controllers\AdminPageController::class, 'tutorialEdit'])->name('tutorial.edit');
                Route::post('/update/{id}',     [App\Http\Controllers\AdminPageController::class, 'tutorialUpdate'])->name('tutorial.update');
                Route::get('/destroy/{id}',     [App\Http\Controllers\AdminPageController::class, 'tutorialDestroy'])->name('tutorial.destroy');
            });

            Route::prefix('message-package')->group(function () {
                Route::get('/index',             [App\Http\Controllers\AdminPageController::class, 'messagePackageIndex'])->name('messagePackage.index');
                Route::get('/create',             [App\Http\Controllers\AdminPageController::class, 'messagePackageCreate'])->name('messagePackage.create');
                Route::post('/store',             [App\Http\Controllers\AdminPageController::class, 'messagePackageStore'])->name('messagePackage.store');
                Route::get('/edit/{id}',         [App\Http\Controllers\AdminPageController::class, 'messagePackageEdit'])->name('messagePackage.edit');
                Route::post('/update/{id}',     [App\Http\Controllers\AdminPageController::class, 'messagePackageUpdate'])->name('messagePackage.update');
                Route::get('/destroy/{id}',     [App\Http\Controllers\AdminPageController::class, 'messagePackageDestroy'])->name('messagePackage.destroy');
            });

            Route::prefix('checkout-sell')->group(function () {
                Route::get('/all',             [App\Http\Controllers\AdminPageController::class, 'confirmMessagePaymentIndex'])->name('confirm.message.payment.index');
                Route::post('/message/{id}',     [App\Http\Controllers\AdminPageController::class, 'confirmMessagePayment'])->name('confirm.message.payment');
            });

            Route::prefix('school-payment')->group(function () {
                Route::get('/all',             [App\Http\Controllers\AdminPageController::class, 'showallSchoolForPayment'])->name('show.all.School.ForPayment');
                Route::get('/details/{id}', [App\Http\Controllers\AdminPageController::class, 'showallSchoolForPaymentDetails'])->name('show.all.School.ForPayment.Details');
                Route::get('/details/send/{id}', [App\Http\Controllers\AdminPageController::class, 'showallSchoolForPaymentSendDetails'])->name('show.all.School.ForPayment.send.checkout');
                Route::post('checkout/school/fess/update/{id}', [App\Http\Controllers\AdminPageController::class, 'checkoutSchoolFessUpdate'])->name('checkout.schoolFess.update');
                Route::post('checkout/school/checkout/update/{id}', [App\Http\Controllers\AdminPageController::class, 'checkoutSchoolCheckoutUpdate'])->name('checkout.schoolCheckout.update');
            });

            Route::prefix('school')->group(function () {
                Route::get('/all',             [App\Http\Controllers\AdminPageController::class, 'showAllSchool'])->name('show.all.School');
                Route::post('/status/update/{id}', [App\Http\Controllers\AdminPageController::class, 'SchoolStatusUpdate'])->name('status.school.update');
            });

            Route::prefix('feature-page')->group(function () {
                Route::get('/create',             [App\Http\Controllers\AdminPageController::class, 'featurePageCreate'])->name('featurePage.create');
                Route::post('/store',             [App\Http\Controllers\AdminPageController::class, 'featurePageStore'])->name('featurePage.store');
                Route::post('/store/details',             [App\Http\Controllers\AdminPageController::class, 'featureDetailsPageStore'])->name('featureDetailsPage.store');
                Route::get('/edit/{id}',         [App\Http\Controllers\AdminPageController::class, 'featurePageEdit'])->name('featurePage.edit');
                Route::post('/update/{id}',     [App\Http\Controllers\AdminPageController::class, 'featurePageUpdate'])->name('featurePage.update');
                Route::get('/destroy/{id}',     [App\Http\Controllers\AdminPageController::class, 'featurePageDestroy'])->name('featurePage.destroy');
                Route::get('/index',             [App\Http\Controllers\AdminPageController::class, 'featurePageIndex'])->name('featurePage.index');
                Route::get('/details/create',             [App\Http\Controllers\AdminPageController::class, 'featureDetailsInput'])->name('featurePage.details.input');
            });
        });
    });


   


/** ----------- Online Admission Form (SUNNAH)
 * ================================================================*/
Route::get('/online/admission/form/{unique_id}', [OnlineAddmissionController::class, 'onlineAdmissionForm'])->name('online.Admission.Form')->middleware('language');
Route::post('/online/admission/form/post', [OnlineAddmissionController::class, 'onlineAdmissionFormPost'])->name('online.Admission.Form.Post');
Route::get('/restorAdmission/{id}', [OnlineAddmissionController::class, 'restoreAdmission'])->name('restore.admission');
Route::get('/pdeleteAdmission/{id}', [OnlineAddmissionController::class, 'pDeleteAdmission'])->name('Pdelete.admission');



Route::middleware(['auth:schools', 'language'])
    ->prefix('school')
    ->group(function () {
        Route::get('/online/admission/formList', [OnlineAddmissionController::class, 'onlineAdmissionFormList'])->name('online.Admission.Form.list')->middleware('language');
        Route::get('/online/admission/singleShow/{id}', [OnlineAddmissionController::class, 'onlineAdmissionSingleShow'])->name('online.Admission.Single.Show');
        Route::get('/online/admission/edit/{id}', [OnlineAddmissionController::class, 'onlineAdmissionEdit'])->name('online.Admission.Edit');
        Route::put('/online/admission/editPost/{id}', [OnlineAddmissionController::class, 'onlineAdmissionEditPost'])->name('online.Admission.Edit.Post');
        Route::get('/online/admission/delete/{id}', [OnlineAddmissionController::class, 'onlineAdmissionDelete'])->name('online.Admission.Delete');
        Route::delete('/online/admission/Check/delete', [OnlineAddmissionController::class, 'onlineAdmission_Check_Delete'])->name('online.Admission.Check.Delete');
    });
//** ====================== Online Admission end here  ======================*/


/** ----------- School Accesories Type (SUNNAH)
 * ================================================================*/
Route::middleware(['auth:schools', 'language'])
    ->group(function () {
        Route::get('/receipt/show', [App\Http\Controllers\ExpenseController::class, 'receipt'])->name('reciept.create');
        Route::get('/receipt/delete/{id}', [App\Http\Controllers\ExpenseController::class, 'receiptDelete'])->name('receipt.delete');
        Route::put('/receipt/edit/{id}', [App\Http\Controllers\ExpenseController::class, 'receiptHistoryEdit'])->name('receipt.history.edit');


        Route::get('/getPrice/{id}', [App\Http\Controllers\ExpenseController::class, 'getPrice'])->name('getPrice');
        Route::get('/receipt/Show', [App\Http\Controllers\ExpenseController::class, 'receiptShow'])->name('receipt.Show')->middleware('language');
        Route::post('/ajax/accesories/', [AjaxController::class, 'ajaxLoaderaccesories'])->name('ajax.load.accesories');

        Route::get('/accesories/create', [App\Http\Controllers\ExpenseController::class, 'accesoriesType'])->name('accesoriesType');
        Route::put('/accesories/edit/post/{id}', [App\Http\Controllers\ExpenseController::class, 'accesoriesEditPost'])->name('accesoriesType.edit.post');

        Route::post('/accesories/create/post', [App\Http\Controllers\ExpenseController::class, 'accesoriesTypePost'])->name('accesoriesType.post');
        Route::get('/accesories/list', [App\Http\Controllers\ExpenseController::class, 'accesoriesTypeList'])->name('accesoriesType.list');
        Route::post('/ajax/accesories/transaction', [AjaxController::class, 'ajaxAccesorisTransaction'])->name('ajax.load.accesories.transaction');
        Route::get('/ajax/section', [AjaxController::class, 'ajaxLoaderSection'])->name('ajax.load.section');
    });

//** ====================== School Accesories Type end here  ======================*/


/** ----------- Finance ===> School Panel (SHAHIDUL)
 * ================================================================*/
Route::middleware(['auth:schools', 'language'])
    ->name('school.finance.')
    ->group(function () {
        Route::get('/school/finance/dashboard', [FinanceController::class, 'dashboard'])->name('dashoboard');
        Route::resource('/school/finance/fees', FinanceController::class)->names(['as' => 'fees']);

        // school Fees
        Route::get("school/finance/school-fees", [SchoolFeesController::class, 'index'])->name('schoolFees');
        Route::post("school/finance/school-fees-create", [SchoolFeesController::class, 'createSchoolFees'])->name('schoolFees.create');
        Route::post("school/finance/school-fees/store", [SchoolFeesController::class, 'storeSchoolFees'])->name('schoolFees.store');
        Route::post("school/finance/school-fees/destory", [SchoolFeesController::class, 'destorySchoolFees'])->name('schoolFees.destroy');

        Route::post('/school/finance/fees/update', [FinanceController::class, 'update'])->name('fees.update');
        Route::get('/school/delete/finance/fees/title/{id}', [FinanceController::class, 'financeTitleDelete'])->name('fees.title.delete');

        // assign fees
        Route::get("school/assign/fees", [AssignFeesController::class, 'index'])->name('assign.fees.index');
        Route::post("school/assign/fees", [AssignFeesController::class, 'store'])->name('assign.fees.store');

        // students list
        Route::get('/school/finance/collect/fees', [FinanceController::class, 'userList'])->name('userlist');
        Route::post('/school/finance/collect/fees', [FinanceController::class, 'collectFees'])->name('collect.fees');
        Route::get('/school/finance/collect/fees/userInfo', [FinanceController::class, 'getUserInfo'])->name('userInfo.get');

        Route::get('/school/finance/student/{sid}/{month?}/fee', [FinanceController::class, 'findStudent'])->name('find.student.fee');
        Route::post('school/finance/history/get', [FinanceController::class, 'getFinanceHistory'])->name('history');

        // received student fees
        Route::post('/school/finance/payment/receive', [FinanceController::class, 'receivedFees'])->name('fees.received');
        Route::post('/onclick/filter/amount', [FinanceController::class, 'showAjaxfilter'])->name('dashoboard.filtered');
        Route::post('/onclick/filter/amount', [FinanceController::class, 'showAjaxfilterMonthly'])->name('dashoboard.filtered.monthly');


        Route::get('/school/finance/students', [FinanceController::class, 'students'])->name('students');
    });
//** ====================== Finance end here  ======================*/


/** ---------- upload attendance (SHAHIDUL)
 * =========================================================*/
Route::middleware(['auth:schools', 'language'])
    ->name('school.attendance.')
    ->group(function () {

        Route::post("school/attendance/file/uplaod", [AttendanceController::class, 'uploadAttendance'])->name('upload');
    });

/** ========================= upload attendance ==================== */



/** ----------- Transfer and testimonial certificate (LIZA)
 * ================================================================*/
Route::middleware('auth:schools', 'language')
    ->prefix('school/student/')
    ->group(function () {
        Route::get('Transfer/{id}', [CertificateController::class, 'Transfer'])->name('Transfer');
    });
//** ====================== Transfer and testimonial certificate end here  ======================*/





/** --------------  Super Admin Panel (LIZA)
 * =================================================================*/
Route::middleware('auth:admin')
    ->prefix('admin')
    ->group(function () {

        Route::get('schools/view', [App\Http\Controllers\AdminPageController::class, 'school_view'])->name('Schools.list');

        Route::get('/SchoolListsearch', [AdminPageController::class, 'SchoolListsearch'])->name('SchoolListsearch');
        Route::get('/SchoolRegisterPage', [App\Http\Controllers\AdminPageController::class, 'SchoolRegisterPage'])->name('SchoolRegisterPage');

        Route::post('school/Register', [AdminPageController::class, 'school_Register'])->name('Schools.Register');
        Route::get('school/SingleView/{id}', [AdminPageController::class, 'school_SingleView'])->name('School.SingleView');
        Route::get('school/edit/{id}', [AdminPageController::class, 'school_edit'])->name('School.edit');
        Route::put('school/update/{id}', [AdminPageController::class, 'school_update'])->name('School.update');

        Route::get('changestatus/{id}', [AdminPageController::class, 'changestatus'])->name('changestatus');

        Route::get('AppReleased', [AdminPageController::class, 'AppReleased'])->name('AppReleased');
        Route::post('AppReleased/store', [AdminPageController::class, 'AppReleased_store'])->name('AppReleased.store');
        Route::get('AppReleased/List', [AdminPageController::class, 'AppReleased_List'])->name('AppReleased.List');
        Route::get('AppReleased/Delete/{id}', [AdminPageController::class, 'AppReleased_Delete'])->name('AppReleased.Delete');
        Route::get('AppReleased/Edit/{id}', [AdminPageController::class, 'AppReleased_Edit'])->name('AppReleased.Edit');
        Route::put('AppReleased/Update/{id}', [AdminPageController::class, 'AppReleased_Update'])->name('AppReleased.Update');

        //Addon in admin panel
        
        Route::get('AddonList', [TicketController::class, 'support'])->name('support');

        Route::get('AddonList', [AdminPageController::class, 'AddonList'])->name('AddonList');

        Route::get('Blog/List', [AdminPageController::class, 'blogList'])->name('bloglist');
        Route::get('Blog/Create', [AdminPageController::class, 'blogCreate'])->name('blog.create');
        Route::get('Blog/edit/{id}', [AdminPageController::class, 'blogedit'])->name('blog.edit');
        Route::post('Blog/update/{id}', [AdminPageController::class, 'blogeditpost'])->name('blog.edit.post');
        Route::get('Blog/delete{id}', [AdminPageController::class, 'blogdelete'])->name('blog.delete');

        Route::post('Blog/Create/post', [AdminPageController::class, 'blogCreatepost'])->name('blog.create.post');
        Route::get('Addonform', [AdminPageController::class, 'Addon_form'])->name('Addon.form');
        Route::post('Addon/create', [AdminPageController::class, 'Addon_create'])->name('Addon.create');
        Route::get('Addon/Edit/{id}', [AdminPageController::class, 'Addon_Edit'])->name('Addon.Edit');
        Route::put('Addon/Update/{id}', [AdminPageController::class, 'Addon_Update'])->name('Addon.Update');
        Route::get('Addon/Delete/{id}', [AdminPageController::class, 'Addon_Delete'])->name('Addon.Delete');

        //billing add
        Route::get('billing/index', [AdminPageController::class, 'billing_index'])->name('');
        Route::get('billing/page/{id}', [AdminPageController::class, 'billing_page'])->name('billing.page');
        Route::post('billing/store', [AdminPageController::class, 'billing_store'])->name('billing.store');
        Route::get('billing/status/{id}', [AdminPageController::class, 'billing_status'])->name('billing.status');
        // SEO 
        Route::get('SEO/Tools', [AdminPageController::class, 'SEO_Tool_List'])->name('seo.tool');
        Route::get('SEO/Form', [AdminPageController::class, 'SEO_form'])->name('SEO.form');
        Route::post('SEO/create', [AdminPageController::class, 'SEO_create'])->name('SEO.create');
        Route::get('SEO/Edit/{id}', [AdminPageController::class, 'SEO_Edit'])->name('SEO.Edit');
        Route::put('SEO/Update/{id}', [AdminPageController::class, 'SEO_Update'])->name('SEO.Update');
        Route::get('SEO/Delete/{id}', [AdminPageController::class, 'SEO_Delete'])->name('SEO.Delete');
    
    
        Route::get('/setting/under/maintainnace', [App\Http\Controllers\AdminPageController::class, 'showMaintainance'])->name('under.maintenance.show');
        Route::get('/maintenance-mode', [App\Http\Controllers\AdminPageController::class, 'setMaintenanceMode'])->name('admin.maintenance.set');
        Route::get('/maintenance-mode/up', [App\Http\Controllers\AdminPageController::class, 'resetsetMaintenanceMode'])->name('admin.maintenance.reset');
               



        Route::get('/admin/ticket/list', [App\Http\Controllers\TicketController::class, 'adminticketmessagelist'])->name('ticketmessage.list.admin');
        Route::get('/admin/ticket/reply', [App\Http\Controllers\TicketController::class, 'adminticketreply'])->name('ticket.reply.admin');
        Route::get('/admin/ticket/delete', [App\Http\Controllers\TicketController::class, 'ticketDelete'])->name('ticket.delete');

    });
//** ====================== Super admin end here  ======================*/


/** ----------- Addon checkout page (LIZA)
 * ================================================================*/
Route::middleware('auth:schools', 'language')
    ->group(function () {

        Route::get('AddonList/School', [AddonController::class, 'SchoolAddon'])->name('SchoolAddon');
        Route::post('Addon/Checkout/School', [AddonController::class, 'SchoolAddonCheckout']);
        // Route::get('/Addon/Checkout/School/{id}',[AddonController::class,'SchoolAddonCheckout']);
    });
//** ====================== Addon checkout page end here  ======================*/

/** ----------- Document of Student (LIZA)
 * ================================================================*/
Route::middleware('auth:schools', 'language')
    ->prefix('school/student/')
    ->group(function () {
        Route::post('documentpost', [StudentController::class, 'documentpost'])->name('document.post');
        Route::get('document/delete/{id}', [StudentController::class, 'document_delete'])->name('document.delete');
        Route::get('document/download/{uploadfile}', [StudentController::class, 'document_download'])->name('document.download');
        Route::get('document/view/{id}', [StudentController::class, 'document_view'])->name('document.view');
    });
//** ====================== Document of Student here end here  ======================*/



/** ----------- Attendance of Staff start  (LIZA)
 * ================================================================*/
Route::middleware('auth:schools', 'language')
    ->prefix('school/Staff/')
    ->group(function () {
        Route::get('StaffAttendancePage', [AttendanceController::class, 'StaffAttendancePage'])->name('StaffAttendancePage');
        Route::get('StaffAttendance/Date', [AttendanceController::class, 'StaffAttendance_DatePost'])->name('StaffAttendance.DatePost');
        Route::get('Staff/Attendance/{date}', [AttendanceController::class, 'StaffAttendance'])->name('StaffAttendance');
        Route::post('StaffAttendance/post', [AttendanceController::class, 'StaffAttendance_post'])->name('StaffAttendance.post');
        Route::post('StaffAttendance/confirm-absent-present/{id}', [AttendanceController::class, 'Staff_confirmabsentpresent'])->name('Staff.confirmabsentpresent');
        Route::get('StaffAttendance/All/View', [AttendanceController::class, 'StaffAttendance_AllView'])->name('StaffAttendance.AllView');
        Route::get('StaffAttendance/AllView/Post', [AttendanceController::class, 'StaffAttendance_AllView_Post'])->name('StaffAttendance.AllView.Post');
        Route::get('StaffAttendance/Month/{date}', [AttendanceController::class, 'StaffAttendance_Month'])->name('StaffAttendance.Month');
    });
//** ====================== Attendance of Staff end here  ======================*/



/** ----------- Attendance of Teacher start  (LIZA)
 * ================================================================*/
Route::middleware('auth:schools', 'language')
    ->prefix('school/Teacher/')
    ->group(function () {
        Route::get('datepage', [AttendanceController::class, 'Teacher_datepage'])->name('Teacher.datepage');
        Route::get('datepage/post', [AttendanceController::class, 'datepage_post'])->name('datepage.post');
        Route::get('TeacherView/Attendance/page/{date}', [AttendanceController::class, 'TeacherAttendance_page'])->name('TeacherAttendance.page');
        Route::post('TeacherAttendance/post', [AttendanceController::class, 'TeacherAttendance_post'])->name('TeacherAttendance.post');
        Route::get('TeacherAttendance/All/View', [AttendanceController::class, 'TeacherAttendance_AllView'])->name('TeacherAttendance.AllView');
        Route::get('TeacherAttendance/Viewpost', [AttendanceController::class, 'TeacherAttendance_Viewpost'])->name('TeacherAttendance.Viewpost');
        Route::get('Teacher-Attendance-Month/{date}', [AttendanceController::class, 'TeacherAttendance_Month'])->name('TeacherAttendance.Month');
        Route::post('TeacherAttendance/confirmabsentpresent/{id}', [AttendanceController::class, 'Teacher_confirmabsentpresent'])->name('Teacher.confirmabsentpresent');
    });
//** ====================== Attendance of Teacher end here  ======================*/


/** ----------- Recycle Bin of School  (LIZA)
 * ================================================================*/
Route::middleware('auth:schools', 'language')
    ->prefix('school/Recycle/')
    ->group(function () {
        Route::get('Recyclepage', [SettingsController::class, 'Recyclepage'])->name('Recyclepage');
    });
Route::middleware('auth:schools', 'language')
    ->prefix('school/support/')
    ->group(function () {
        Route::get('/ticket/create', [TicketController::class, 'SupportTicketCreate'])->name('support.ticket.create');
        Route::get('/ticket/message ', [TicketController::class, 'ticketmessage'])->name('ticketmessage.create');
        Route::get('/ticket/message/post ', [TicketController::class, 'ticketmessage'])->name('ticketmessage.create.post');
        Route::post('/ticket/post', [TicketController::class, 'SupportTicketPost'])->name('support.ticket.post');
    });
Route::get('/school/finance/feerestore/{id}', [FinanceController::class, 'feerestore'])->name('restore.fee');
Route::get('/school/finance/assignFessrestore/{id}', [FinanceController::class, 'assignFessrestore'])->name('restore.assignFess');
Route::get('/school/finance/staffSalaryrestore/{id}', [FinanceController::class, 'staffSalaryrestore'])->name('restore.staffSalary');
Route::get('/school/finance/TeacherSalaryrestore/{id}', [FinanceController::class, 'TeacherSalaryrestore'])->name('restore.TeacherSalary');
Route::get('/school/finance/expenserestore/{id}', [FinanceController::class, 'expenserestore'])->name('restore.expense');
Route::get('/school/finance/fundrestore/{id}', [FinanceController::class, 'fundrestore'])->name('restore.fund');
Route::get('/school/finance/studentMontyFeerestore/{id}', [FinanceController::class, 'studentMontyFeerestore'])->name('restore.studentMontyFee');

Route::get('/school/finance/assignFesspdelete/{id}', [FinanceController::class, 'assignFesspdelete'])->name('pdelete.assignFess');
Route::get('/school/finance/feepdelete/{id}', [FinanceController::class, 'feepdelete'])->name('pdelete.fee');
Route::get('/school/finance/staffSalarypdelete/{id}', [FinanceController::class, 'staffSalarypdelete'])->name('pdelete.staffSalary');
Route::get('/school/finance/TeacherSalarypdelete/{id}', [FinanceController::class, 'TeacherSalarypdelete'])->name('pdelete.TeacherSalary');
Route::get('/school/finance/expensepdelete/{id}', [FinanceController::class, 'expensepdelete'])->name('pdelete.expense');
Route::get('/school/finance/fundpdelete/{id}', [FinanceController::class, 'fundpdelete'])->name('pdelete.fund');
Route::get('/school/finance/studentMontyFeepdelete/{id}', [FinanceController::class, 'studentMontyFeepdelete'])->name('pdelete.studentMontyFee');


//** ====================== End Recycle Bin of School  ======================*/

/** ---------- upload attendance (LIZA)
 * =========================================================*/
Route::middleware(['auth:schools', 'language'])
    ->group(function () {

        Route::get("/student/attendance/dashboard/", [AttendanceController::class, 'Attendance_dashboard'])->name('Attendance.dashboard');
        Route::get("/student/attendance/profile/", [AttendanceController::class, 'Attendance_profile'])->name('Attendance.profile');
    });

/** ========================= upload attendance ==================== */

/** ----------- Billing of school  (LIZA)
 * ================================================================*/
Route::middleware(['auth:schools', 'language'])
    ->group(function () {

        Route::get("/school/billing", [SettingsController::class, 'school_billing'])->name('school.billing');
    });
/** ========================= Billing of school  ==================== */

