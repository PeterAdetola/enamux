<?php

use App\AppHelpers;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HeroController;
use App\Http\Controllers\Home\TestimonialController;
use App\Http\Controllers\Home\ClientController;
use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\Service\ServicesController;
use App\Http\Controllers\Team\TeamController;
//use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Contact\SocialMediaController;
use App\Http\Controllers\Contact\EnquiryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
})->name('home');

Route::get('/brand-guidelines', function () {
    return view('frontend.brand-guidelines');
})->name('brand-guidelines');


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --------------| Hero Routes |----------------------------------------
Route::controller(HeroController::class)->group(function ()
{
    // Route::get('/', 'Intropage')->name('intro');

    // Route::get('/edit/slide/{id}', 'EditSlide')->name('edit.slide');
    Route::post('/delete/slide/{id}', 'DeleteSlide')->name('delete.slide');
    Route::get('/view/slides', 'ViewSlides')->name('view.slides');
    Route::post('/sort/slide', 'SortSlide')->name('sort.slide');
    Route::post('/update/slider', 'UpdateSlide')->name('update.slide');
    Route::post('/store/slide', 'SaveSlide')->name('save.slide');
});

// --------------| About Routes |----------------------------------------
Route::controller(AboutController::class)->group(function ()
{
    Route::post('/update/about_summary', 'UpdateAboutSummary')->name('update.about_summary');
// --------------| About non-admin Routes |----------------------------------------
    Route::get('/aboutus', 'AboutusPage')->name('aboutus.page');
});

// --------------| Services Routes |----------------------------------------
Route::controller(ServicesController::class)->group(function ()
{
    Route::get('/view/services', 'ViewServices')->name('view.services');
    Route::get('/create/service', 'CreateService')->name('create.service');
    Route::post('/store/service', 'SaveService')->name('save.service');
    Route::post('/store/service_img', 'SaveServiceImg')->name('save.service_img');
    Route::post('/sort/service', 'SortService')->name('sort.service');
    Route::post('/sort/service_imgs', 'SortServiceImgs')->name('sort.service_imgs');
    Route::post('/update/service', 'UpdateService')->name('update.service');
    Route::post('/update/service_imgs/{id}', 'UpdateServiceImages')->name('update.service_imgs');
    Route::get('/edit/service/{id}', 'EditService')->name('edit.service');
    Route::get('/edit/service_imgs/{id}', 'EditServiceImages')->name('edit.service_imgs');
    Route::post('/delete/service/{id}', 'DeleteService')->name('delete.service');
    Route::get('/delete/service_img/{id}', 'DeleteServiceImg')->name('delete.service_img');
// --------------| Service non-admin Routes |----------------------------------------
    Route::get('/services', 'ServicePage')->name('services.page');
    Route::get('/service/detailed/{id}', 'ServiceDetailedPage')->name('service_detailed.page');
});

// --------------| Team Routes |----------------------------------------
Route::controller(TeamController::class)->group(function ()
{
    Route::get('/view/members', 'ViewMembers')->name('view.members');
    Route::post('/store/member', 'SaveMember')->name('save.member');
    Route::post('/sort/member', 'SortMember')->name('sort.member');
    Route::post('/sort/project_imgs', 'SortProjectImgs')->name('sort.project_imgs');
    Route::post('/update/member', 'UpdateMember')->name('update.member');
    Route::get('/edit/member/{id}', 'EditMember')->name('edit.member');
    Route::post('/delete/member/{id}', 'DeleteMember')->name('delete.member');
});

// --------------| Project Routes |----------------------------------------
Route::controller(ProjectController::class)->group(function ()
{
    Route::get('/view/projects', 'ViewProjects')->name('view.projects');
    Route::get('/create/project', 'CreateProject')->name('create.project');
    Route::post('/store/project', 'SaveProject')->name('save.project');
    Route::post('/store/project_img', 'SaveProjectImg')->name('save.project_img');
    Route::post('/sort/project', 'SortProject')->name('sort.project');
    Route::post('/sort/project_imgs', 'SortProjectImgs')->name('sort.project_imgs');
    Route::post('/update/project', 'UpdateProject')->name('update.project');
    Route::post('/update/project_imgs/{id}', 'UpdateProjectImages')->name('update.project_imgs');
    Route::get('/edit/project/{id}', 'EditProject')->name('edit.project');
    Route::get('/edit/project_imgs/{id}', 'EditProjectImages')->name('edit.project_imgs');
    Route::post('/delete/project/{id}', 'DeleteProject')->name('delete.project');
    Route::get('/delete/project_img/{id}', 'DeleteProjectImg')->name('delete.project_img');

// --------------| Project non-admin Routes |----------------------------------------
//    Route::get('/projects', 'ProjectPage')->name('projects.page');
//    Route::get('/project/detailed/{id}', 'ProjectDetailedPage')->name('project_detailed.page');
    // Projects routes
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.page');
    Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');
});

// --------------| Testimonial Routes |----------------------------------------
Route::controller(TestimonialController::class)->group(function ()
{
    Route::get('/view/testimonials', 'ViewTestimonials')->name('view.testimonials');
    Route::post('/store/testimonial', 'SaveTestimonial')->name('save.testimonial');
    Route::post('/sort/testimonial', 'SortTestimonial')->name('sort.testimonial');
    Route::post('/update/testimonial', 'UpdateTestimonial')->name('update.testimonial');
    Route::get('/edit/testimonial/{id}', 'EditTestimonial')->name('edit.testimonial');
    Route::post('/delete/testimonial/{id}', 'DeleteTestimonial')->name('delete.testimonial');
    Route::post('/delete/testimonial_img/{id}', 'DeleteTestimonialImg')->name('delete.testimonial_img');
    Route::post('/add/testimonial_img/{id}', 'AddTestimonialImg')->name('add.testimonial_img');
});

// --------------| Client Routes |----------------------------------------
Route::controller(ClientController::class)->group(function ()
{
    Route::get('/view/clients', 'ViewClients')->name('view.clients');
    Route::post('/store/client', 'SaveClient')->name('save.client');
    Route::post('/sort/client', 'SortClient')->name('sort.client');
    Route::post('/update/client', 'UpdateClient')->name('update.client');
    Route::get('/edit/client/{id}', 'EditClient')->name('edit.client');
    Route::post('/delete/client/{id}', 'DeleteClient')->name('delete.client');
});

// --------------| Contact Routes |----------------------------------------
Route::controller(ContactController::class)->group(function ()
{
    Route::post('/store/contact', 'SaveContact')->name('save.contact');
    Route::post('/update/contact', 'UpdateContact')->name('update.contact');
    Route::get('/edit/contact/{id}', 'EditContact')->name('edit.contact');
    Route::get('/delete/contact/{id}', 'DeleteContact')->name('delete.contact');
// --------------| Contact non-admin Routes |----------------------------------------
    Route::get('/contact', 'ContactPage')->name('contact.page');
});

// --------------| Contact Routes |----------------------------------------
Route::controller(EnquiryController::class)->group(function ()
{
    Route::post('/send/enquiry', 'SendEnquiry')->name('send.enquiry');
    // Route::post('/email/feedback', 'EmailFeedback')->name('email.feedback');
});


// --------------| Contact Routes |----------------------------------------
Route::controller(SocialMediaController::class)->group(function ()
{
    Route::post('/store/social_media', 'SaveSocialMedia')->name('save.social_media');
    Route::post('/sort/social_media', 'SortSocialMedia')->name('sort.social_media');
    Route::post('/update/social_media', 'UpdateSocialMedia')->name('update.social_media');
    Route::get('/edit/social_media/{id}', 'EditSocialMedia')->name('edit.social_media');
    Route::get('/delete/social_media/{id}', 'DeleteSocialMedia')->name('delete.social_media');
});





require __DIR__.'/auth.php';
