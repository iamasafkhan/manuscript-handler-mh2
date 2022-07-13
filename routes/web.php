<?php


use App\Http\Controllers\Admin\ContentManagementController;
use App\Http\Controllers\Admin\ContentpagesController;
use App\Http\Controllers\Admin\JournalsControllers;
use App\Http\Controllers\Admin\NewsEventsManagmentController;
use App\Http\Controllers\AdminProfileSettingController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\viewusercontroller;

use App\Http\Controllers\frontend\JournalsUsingMhController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//route for frontend home

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guest'], function () {

        Route::view('login', 'admin.login')->name('admin.login');

        Route::post('login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.auth');

    });

    Route::group(['middleware' => 'admin.auth'], function () {

        Route::get('admin.home', [App\Http\Controllers\AdminController::class, 'adminhome'])->name('admin.home');

        Route::resource('users', UsersController::class);

        Route::resource('journals', JournalsControllers::class);

        Route::resource('newseventsmanagment', NewsEventsManagmentController::class);




        // contentpages

        Route::get('content/{id}', [App\Http\Controllers\Admin\ContentController::class, 'contentpages'])->name('contentpages');

        Route::post('content/store', [App\Http\Controllers\Admin\ContentController::class, 'contentstore'])->name('contentpages.store');

        Route::get('content/edit/{id}', [App\Http\Controllers\Admin\ContentController::class, 'contentedit'])->name('contentpages.edit');

        Route::post('content/update/{id}', [App\Http\Controllers\Admin\ContentController::class, 'contentupdate'])->name('content-update');

        Route::post('content/destroy/{id}', [App\Http\Controllers\Admin\ContentController::class, 'contentdestroy'])->name('contentpages.destroy');





        //checklist

        Route::get('/checklist/{id}', [App\Http\Controllers\Admin\ChecklistController::class, 'checklist'])->name('checklist');

        Route::post('/checklist', [App\Http\Controllers\Admin\ChecklistController::class, 'checkliststore'])->name('store-checklist');

        Route::post('/checklist/destroy/{id}', [App\Http\Controllers\Admin\ChecklistController::class, 'checklistdestroy'])->name('delete-checklist');

        Route::get('/checklist_edit/{id}', [App\Http\Controllers\Admin\ChecklistController::class, 'checklistedit'])->name('edit-checklist');

        Route::post('/checklist_update/{id}', [App\Http\Controllers\Admin\ChecklistController::class, 'checklistupdate'])->name('update-checklist');




        // typesofmanuscript


        Route::get('/typesofmanuscript/{id}', [App\Http\Controllers\Admin\TypesofmanuscriptController::class, 'typesofmanuscript'])->name('typesofmanuscript');

        Route::post('/typesofmanuscript/store', [App\Http\Controllers\Admin\TypesofmanuscriptController::class, 'typesofmanuscriptstore'])->name('store-typesofmanuscript');

        Route::post('/typesofmanuscript/destroy/{id}', [App\Http\Controllers\Admin\TypesofmanuscriptController::class, 'typesofmanuscriptdestroy'])->name('delete-typesofmanuscript');

        Route::get('/typesofmanuscript-edit/{id}', [App\Http\Controllers\Admin\TypesofmanuscriptController::class, 'typesofmanuscriptedit'])->name('edit-typesofmanuscript');

        Route::post('/typesofmanuscript_update/{id}', [App\Http\Controllers\Admin\TypesofmanuscriptController::class, 'typesofmanuscriptupdate'])->name('update-typesofmanuscript');





        //    filedesignation

        Route::get('/filedesignation/{id}', [App\Http\Controllers\Admin\FileDesignationController::class, 'filedesignation'])->name('filedesignation');

        Route::post('/filedesignation/store', [App\Http\Controllers\Admin\FileDesignationController::class, 'filedesignationstore'])->name('store-filedesignation');

        Route::post('/filedesignation/destroy/{id}', [App\Http\Controllers\Admin\FileDesignationController::class, 'filedesignationdestroy'])->name('delete-filedesignation');

        Route::get('/filedesignation-edit/{id}', [App\Http\Controllers\Admin\FileDesignationController::class, 'filedesignationedit'])->name('edit-filedesignation');

        Route::post('/filedesignation_update/{id}', [App\Http\Controllers\Admin\FileDesignationController::class, 'filedesignationtupdate'])->name('update-filedesignation');



        // AreaSpecificInterest

        Route::get('/areaofspecificinterest/{id}', [App\Http\Controllers\Admin\AreaSpecificInterestController::class, 'areaofspecificinterest'])->name('areaofspecificinterest');

        Route::post('/areaofspecificinterest/store', [App\Http\Controllers\Admin\AreaSpecificInterestController::class, 'areaofspecificintereststore'])->name('store-areaofspecificinterest');

        Route::post('/areaofspecificinterest/destroy/{id}', [App\Http\Controllers\Admin\AreaSpecificInterestController::class, 'areaofspecificinterestdestroy'])->name('delete-areaofspecificinterest');

        Route::get('/areaofspecificinterest-edit/{id}', [App\Http\Controllers\Admin\AreaSpecificInterestController::class, 'areaofspecificinterestedit'])->name('edit-areaofspecificinterest');

        Route::post('/areaofspecificinterest_update/{id}', [App\Http\Controllers\Admin\AreaSpecificInterestController::class, 'areaofspecificinterestupdate'])->name('update-areaofspecificinterest');



        // checklist Text

        Route::get('/checklisttext/{id}', [App\Http\Controllers\Admin\ChecklistTextController::class, 'checklisttext'])->name('checklisttext');

        Route::post('/checklisttext', [App\Http\Controllers\Admin\ChecklistTextController::class, 'checklisttextstore'])->name('store-checklisttext');





        // companies managemant

        Route::resource('newseventsmanagment', NewsEventsManagmentController::class);

        Route::get('companies', [App\Http\Controllers\Admin\CompaniesController::class, 'companies'])->name('companies.index');

        Route::get('/companies/create', [App\Http\Controllers\Admin\CompaniesController::class, 'companiescreate'])->name('create-companies');

        Route::post('/companies/store', [App\Http\Controllers\Admin\CompaniesController::class, 'companiesstore'])->name('store-companies');

        Route::post('/companies/destroy/{id}', [App\Http\Controllers\Admin\CompaniesController::class, 'companiesdestroy'])->name('delete-companies');

        Route::get('/companies/edit/{id}', [App\Http\Controllers\Admin\CompaniesController::class, 'companiesedit'])->name('edit-companies');

        Route::post('/companies/update/{id}', [App\Http\Controllers\Admin\CompaniesController::class, 'companiesupdate'])->name('update-companies');






        // Content Management


        Route::resource('newseventsmanagment', NewsEventsManagmentController::class);

        Route::get('contentmanagement/active', [App\Http\Controllers\Admin\ContentManagementController::class, 'active'])->name('contentmanagement.active');

        Route::get('contentmanagement/unactive', [App\Http\Controllers\Admin\ContentManagementController::class, 'unactive'])->name('contentmanagement.unactive');

        Route::resource('contentmanagement', ContentManagementController::class);





        // SocialLinks

        Route::get('sociallinks', [App\Http\Controllers\Admin\SocialLinksController::class, 'index'])->name('sociallinks-index');

        Route::post('sociallinks/store', [App\Http\Controllers\Admin\SocialLinksController::class, 'store'])->name('sociallinks-store');

        Route::post('sociallinks/update', [App\Http\Controllers\Admin\SocialLinksController::class, 'update'])->name('sociallinks-update');



        // Areas of Interest Managment

        Route::get('areasinterestmanagment', [App\Http\Controllers\Admin\AreasInterestManagmentController::class, 'index'])->name('areasinterestmanagment-index');

        Route::get('areasinterestmanagment/create', [App\Http\Controllers\Admin\AreasInterestManagmentController::class, 'create'])->name('areasinterestmanagment-create');

        Route::post('areasinterestmanagment/store', [App\Http\Controllers\Admin\AreasInterestManagmentController::class, 'store'])->name('areasinterestmanagment-store');

        Route::post('areasinterestmanagment/destroy/{id}', [App\Http\Controllers\Admin\AreasInterestManagmentController::class, 'destroy'])->name('areasinterestmanagment-destroy');

        Route::get('areasinterestmanagment/edit/{id}', [App\Http\Controllers\Admin\AreasInterestManagmentController::class, 'edit'])->name('areasinterestmanagment-edit');

        Route::post('areasinterestmanagment/update/{id}', [App\Http\Controllers\Admin\AreasInterestManagmentController::class, 'update'])->name('areasinterestmanagment-update');



        // Demo Requests

        Route::get('demorequests', [App\Http\Controllers\Admin\DemoRequestsController::class, 'index'])->name('demorequests-index');


        // resourcecenter

        Route::get('resourcecenter', [App\Http\Controllers\Admin\ResourceCenterController::class, 'index'])->name('resourcecenter-index');

        Route::get('resourcecenter/create', [App\Http\Controllers\Admin\ResourceCenterController::class, 'create'])->name('resourcecenter-create');

        Route::post('resourcecenter/store', [App\Http\Controllers\Admin\ResourceCenterController::class, 'store'])->name('resourcecenter-store');

        Route::post('resourcecenter/destory/{id}', [App\Http\Controllers\Admin\ResourceCenterController::class, 'destroy'])->name('resourcecenter-destroy');

        Route::get('resourcecenter/edit/{id}', [App\Http\Controllers\Admin\ResourceCenterController::class, 'edit'])->name('resourcecenter-edit');

        Route::post('resourcecenter/update/{id}', [App\Http\Controllers\Admin\ResourceCenterController::class, 'update'])->name('resourcecenter-update');

        Route::get('resourcecenter/download/{pdffile}', [App\Http\Controllers\Admin\ResourceCenterController::class, 'download'])->name('resourcecenter-download');





        Route::get('admin-dashboard', [App\Http\Controllers\AdminController::class, 'admin_dashboard'])->name('admin_dashboard');


        Route::get('inbox-email', [App\Http\Controllers\AdminController::class, 'inbox_email'])->name('inbox_email');



        Route::resource('adminprofilesetting', AdminProfileSettingController::class);

        Route::resource('change-password', ChangePasswordController::class);


        Route::get('logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
    });
});

Route::get('/', [App\Http\Controllers\frontend\HomeController::class, 'index'])->name('home');

//journals route frontend
Route::get('/journals-using-mh', [\App\Http\Controllers\frontend\JournalsUsingMhController::class, 'index'])->name('journals-using-mh');

//ragistration for auther frontend
Route::get('/{companName}/{seo}/esubmit-registraion', [App\Http\Controllers\frontend\LoginController::class, 'show_register_form'])->name('show_register_form');

Route::post('/do-register', [App\Http\Controllers\frontend\LoginController::class, 'register'])->name('do-register');

//login route for author frontend
Route::get('/{company}/{seo}/login', [App\Http\Controllers\frontend\LoginController::class, 'show_login'])->name('esubmit-login');

Route::post('/do-login', [App\Http\Controllers\frontend\LoginController::class, 'login'])->name('do-login');

// auth route for author dashboard frontend
Route::middleware('auth')->group(function () {

    Route::get('/{company}/{seo}/home/', [App\Http\Controllers\frontend\FrontendDashboardController::class, 'index'])->name('dashboard-home');

    Route::get('/logout', [App\Http\Controllers\frontend\LoginController::class, 'logout'])->name('do-logout');

    // Submit new Manuscript

    Route::get('/{company}/{seo}/submit-new-manuscript', [\App\Http\Controllers\frontend\newsubmissions\NewSubmissionsController::class, 'index'])->name('newsubmission');
    Route::post('/submit-first-step', [\App\Http\Controllers\frontend\newsubmissions\NewSubmissionsController::class, 'submit_first_step'])->name('submit-first-step');


    // Step 2 type title and abstract
    Route::get('/{company}/{seo}/type-title-abstract/', [App\Http\Controllers\frontend\newsubmissions\TypeTitleAbstractController::class, 'index'])->name('title-type-abstract');
    Route::post('/submit-type-title-abstract', [App\Http\Controllers\frontend\newsubmissions\TypeTitleAbstractController::class, 'submit_TypeTitle_Abstract'])->name('submit-typetitle-abstract');

    // Step 3 Reviewers
    Route::get('/{company}/{seo}/reviewers/', [App\Http\Controllers\frontend\newsubmissions\SuggestedNonSuggestedRevController::class, 'index'])->name('reviewer');
    Route::post('/search-reviewers', [App\Http\Controllers\frontend\newsubmissions\SuggestedNonSuggestedRevController::class, 'search_reviewers_email'])->name('search-reviewer');
    Route::post('/submit-submit-reviewers', [App\Http\Controllers\frontend\newsubmissions\SuggestedNonSuggestedRevController::class, 'submit_reviewers'])->name('submit-reviewers');
    Route::post('/submit-submit-unsreviewers', [App\Http\Controllers\frontend\newsubmissions\SuggestedNonSuggestedRevController::class, 'submit_unsreviewers'])->name('unsreviewers');
    Route::post('/{company}/{seo}/delete-sreviewers/{id}', [App\Http\Controllers\frontend\newsubmissions\SuggestedNonSuggestedRevController::class, 'sreviewer_remove'])->name('delete-sreviewer');
    Route::post('/{company}/{seo}/delete-unsreviewers/{id}', [App\Http\Controllers\frontend\newsubmissions\SuggestedNonSuggestedRevController::class, 'unsreviewer_remove'])->name('delete-unsreviewer');





    // Step 4 Author Institutions
    Route::get('/{company}/{seo}/author-institution/', [App\Http\Controllers\frontend\newsubmissions\AuthorsInstitutionsController::class, 'index'])->name('author-institution');
    Route::post('/submit-author-institution', [App\Http\Controllers\frontend\newsubmissions\AuthorsInstitutionsController::class, 'submit_author_institution'])->name('submit-author-institution');
    Route::post('/search-email', [App\Http\Controllers\frontend\newsubmissions\AuthorsInstitutionsController::class, 'search_author_email'])->name('search-email');
    Route::post('/{company}/{seo}/delete-author/{id}', [App\Http\Controllers\frontend\newsubmissions\AuthorsInstitutionsController::class, 'delete_author'])->name('delete-author');


    // Step 5 File Upload
    Route::get('/{company}/{seo}/file-upload', [App\Http\Controllers\frontend\newsubmissions\FileUploadController::class, 'index'])->name('file-upload');
    Route::post('/submit-file-upload', [App\Http\Controllers\frontend\newsubmissions\FileUploadController::class, 'submit_file_upload'])->name('submit-file-upload');
    Route::post('/{company}/{seo}/delete-file/{id}', [App\Http\Controllers\frontend\newsubmissions\FileUploadController::class, 'delete_file'])->name('delete-file');


    // Step 6 Proof and submit
    Route::get('/{company}/{seo}/proof-submit', [App\Http\Controllers\frontend\newsubmissions\ProofSubmitController::class, 'index'])->name('proof-submit');
    Route::post('/submit-proof-submit', [App\Http\Controllers\frontend\newsubmissions\ProofSubmitController::class, 'submit_proof_submit'])->name('submit-proof-submit');
    Route::get('/{company}/{seo}/marge-pdf-file/{orderNumber}', [App\Http\Controllers\frontend\newsubmissions\ProofSubmitController::class, 'marge_pdf'])->name('marge-pdf-file');
    Route::get('/{company}/{seo}/accept-pdf/{orderNumber}', [App\Http\Controllers\frontend\newsubmissions\ProofSubmitController::class, 'pdf_accept'])->name('pdf-accept');
    Route::get('/pdf-view', [App\Http\Controllers\frontend\newsubmissions\ProofSubmitController::class, 'pdfview'])->name('pdf-view');
    Route::get('/{company}/{seo}/download-pdf/{orderNumber}', [App\Http\Controllers\frontend\newsubmissions\ProofSubmitController::class, 'pdfgenerate'])->name('download-pdf');



    // Goto Finish the steps
    Route::get('/{company}/{seo}/finish-new-manuscript', [\App\Http\Controllers\frontend\newsubmissions\NewSubmissionsController::class, 'finish_new_manuscript'])->name('finish-new-manuscript');



    // Here go to incomplete submissions section
    Route::get('/{company}/{seo}/author-panel/incomplete-submissions', [\App\Http\Controllers\frontend\newsubmissions\IncompleteSubmissionsController::class, 'index'])->name('incomplete-submission');

    // update incomplete authors
    Route::get('/{company}/{seo}/update-authorchecklist/{ordernumber}', [\App\Http\Controllers\frontend\newsubmissions\NewSubmissionsController::class, 'edit_author_checklist'])->name('update-authorchecklist');

    Route::get('/{company}/{seo}/update-type-title-abstract/{ordernumber}', [App\Http\Controllers\frontend\newsubmissions\TypeTitleAbstractController::class, 'edit_type_title_abstract'])->name('edit-titleTypeAbstract');
    Route::post('/submit-update-type-title-abstract/{ordernumber}', [App\Http\Controllers\frontend\newsubmissions\TypeTitleAbstractController::class, 'update_type_title_abstract'])->name('update-titleTypeAbstract');


    Route::get('/{company}/{seo}/update-reviewers/{ordernumber}', [App\Http\Controllers\frontend\newsubmissions\SuggestedNonSuggestedRevController::class, 'edit_reviewers'])->name('edit-reviewer');
    Route::post('/submit-updated-reviewers/{ordernumber}', [App\Http\Controllers\frontend\newsubmissions\SuggestedNonSuggestedRevController::class, 'update_suggested_reviewers'])->name('update-suggested-reviewer');
    Route::post('/submit-updated-unsreviewers/{ordernumber}', [App\Http\Controllers\frontend\newsubmissions\SuggestedNonSuggestedRevController::class, 'update_unsreviewers'])->name('update-unsreviewer');
    Route::post('/{company}/{seo}/sreviewers-delete/{ordernumber}/{id}', [App\Http\Controllers\frontend\newsubmissions\SuggestedNonSuggestedRevController::class, 'sreviewer_delete'])->name('sreviewer-delete');
    Route::post('/{company}/{seo}/unsreviewers-delete/{ordernumber}/{id}', [App\Http\Controllers\frontend\newsubmissions\SuggestedNonSuggestedRevController::class, 'unsreviewer_delete'])->name('unsreviewer-delete');



    Route::get('/{company}/{seo}/update-author-institution/{ordernumber}', [App\Http\Controllers\frontend\newsubmissions\AuthorsInstitutionsController::class, 'edit_author_institution'])->name('edit-author-institution');
    Route::post('/update-search-email/{ordernumber}', [App\Http\Controllers\frontend\newsubmissions\AuthorsInstitutionsController::class, 'update_search_email'])->name('update-search-email');
    Route::post('/submit-updated-author-institution/{ordernumber}', [App\Http\Controllers\frontend\newsubmissions\AuthorsInstitutionsController::class, 'update_author_institution'])->name('update-author-institution');
    Route::post('/{company}/{seo}/delete-updated-author/{id}', [App\Http\Controllers\frontend\newsubmissions\AuthorsInstitutionsController::class, 'destroy_author'])->name('destroy-author');



    Route::get('/{company}/{seo}/update-file-upload/{ordernumber}', [App\Http\Controllers\frontend\newsubmissions\FileUploadController::class, 'edit_file_upload'])->name('edit-file-upload');
    Route::post('/submit-update-file-upload/{ordernumber}', [App\Http\Controllers\frontend\newsubmissions\FileUploadController::class, 'update_file_upload'])->name('update-file-upload');
    Route::post('/{company}/{seo}/delete-updated-file/{ordernumber}/{id}', [App\Http\Controllers\frontend\newsubmissions\FileUploadController::class, 'remove_file'])->name('remove-file');



    Route::get('/{company}/{seo}/update-proof-submit/{ordernumber}', [App\Http\Controllers\frontend\newsubmissions\ProofSubmitController::class, 'edit_proof_submit'])->name('edit-proof-submit');
    Route::post('/submit-update-proof-submit/{ordernumber}', [App\Http\Controllers\frontend\newsubmissions\ProofSubmitController::class, 'update_proof_submit'])->name('update-proof-submit');
    Route::get('/{company}/{seo}/update-accept-pdf/{orderNumber}', [App\Http\Controllers\frontend\newsubmissions\ProofSubmitController::class, 'update_pdf_accept'])->name('update-pdf-accept');




    Route::get('/{company}/{seo}/finish-incomplete-manuscript', [\App\Http\Controllers\frontend\newsubmissions\NewSubmissionsController::class, 'finish_incomplete_manuscript'])->name('finish-incomplete-manuscript');


    Route::get('/{company}/{seo}/user-panel/waiting-for-author-approval', [\App\Http\Controllers\frontend\newsubmissions\IncompleteSubmissionsController::class, 'authors_approval'])->name('authors-approval');

});

// Route::prefix('author')->middleware(['auth', 'isauthor'])->group(function(){

//     Route::get('/{company}/{seo}/home/', [App\Http\Controllers\frontend\FrontendDashboardController::class, 'index'])->name('author-home');



// });


Route::prefix('reviewer')->middleware(['auth', 'isreviewer'])->group(function(){

    Route::get('/{company}/{seo}/reviewer', [App\Http\Controllers\frontend\Reviewer\ReviewerController::class, 'index'])->name('reviewer-home');
});


Route::middleware(['auth', 'iseditor'])->group(function(){

    Route::get('/{company}/{seo}/editor-panel', [App\Http\Controllers\frontend\Editor\EditorController::class, 'index'])->name('editor-home');
    Route::get('/{company}/{seo}/editor-home/awaiting-reviewer-selection', [App\Http\Controllers\frontend\Editor\EditorController::class, 'awaiting_reviewer_selection'])->name('awaiting-reviewer-selection');
    Route::get('/{company}/{seo}/editor-home/awaiting-reviewer-selection-details/{orderNumber}', [App\Http\Controllers\frontend\Editor\EditorController::class, 'awaiting_reviewer_selection_details'])->name('awaiting-reviewer-selection-details');


});

Route::prefix('publisher')->middleware(['auth', 'ispublisher'])->group(function(){

    Route::get('/', [App\Http\Controllers\frontend\Publisher\PublisherController::class, 'index'])->name('publisher-home');
});

Route::prefix('associateeditor')->middleware(['auth', 'isassociateeditor'])->group(function(){

    Route::get('/', [App\Http\Controllers\frontend\AssociateEditor\AssociateEditorController::class, 'index'])->name('associateeditor-home');
});

Route::middleware(['auth', 'iseditorialoffice'])->group(function(){

    Route::get('/{company}/{seo}/editorialoffice', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'index'])->name('editorial-home');


    Route::get('/{company}/{seo}/manuscripts/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'manuscripts_all'])->name('manuscripts-all');
    Route::get('/{company}/{seo}/submitted-manuscript-details/{orderNumber}', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'manuscript_details'])->name('manuscript-details');
    Route::post('/change-manuscript-status', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'change_manuscript_status'])->name('change-manuscript-status');




    Route::get('/{company}/{seo}/need-author-attentions/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'need_author_attentions_all'])->name('need-author-attentions-all');



    Route::get('/{company}/{seo}/with-associate-editor/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'with_associate_editor_all'])->name('with-associate-editor-all');


    Route::get('/{company}/{seo}/decision-in-process/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'decision_process_all'])->name('decidion_in_process');


    Route::get('/{company}/{seo}/accepted/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'accepted_all'])->name('accepted_all');


    Route::get('/{company}/{seo}/accepted-with-minor-revision/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'accepted_with_minor_revision_all'])->name('accepted_with_minor_revision_all');

    Route::get('/{company}/{seo}/withdrawn-manuscripts/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'withdrawn_manuscripts_all'])->name('withdrawn_manuscripts_all');

    Route::get('/{company}/{seo}/published-manuscripts/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'published_manuscripts_all'])->name('published_manuscripts_all');

    Route::get('/{company}/{seo}/total-manuscripts-in-progress/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'total_manuscripts_progress_all'])->name('total_manuscripts_progress_all');


    Route::get('/{company}/{seo}/initial-quality-control/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'initial_quality_control_all'])->name('initial_quality_control_all');

    Route::get('/{company}/{seo}/with-editor/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'with_editor_all'])->name('with_editor_all');


    Route::get('/{company}/{seo}/under-review/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'under_review_all'])->name('under_review_all');


    Route::get('/{company}/{seo}/revision-required/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'revision_required_all'])->name('revision_required_all');

    Route::get('/{company}/{seo}/accepted-with-major-revision/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'accepted_with_major_revision_all'])->name('accepted_with_major_revision_all');


    Route::get('/{company}/{seo}/rejected/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'rejected_all'])->name('rejected_all');

    Route::get('/{company}/{seo}/sent-to-production/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'sent_to_production_all'])->name('sent_to_production_all');

    Route::get('/{company}/{seo}/submissions-needing-authors-approval/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'submissions_needing_authors_approval_all'])->name('submissions_needing_authors_approval_all');


    Route::get('/{company}/{seo}/revisions-needing-authors-approval/all', [App\Http\Controllers\frontend\EditorialOffice\EditorialOfficeController::class, 'revisions_needing_authors_approval_all'])->name('revisions_needing_authors_approval_all');




});







