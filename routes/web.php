<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\Front\ShutController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\MasterController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\ContactsController;

use App\Http\Controllers\Post\AdminPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;

use App\Http\Controllers\Writer\WriterPostController;

use App\Http\Controllers\WriterProfileController;
use App\Http\Controllers\BlogcategoryController;
use App\Http\Controllers\BlogCategoryPostController;

use App\Http\Controllers\User\UserPostController;
use App\Http\Controllers\UserPanel\UserPanelController;
use App\Http\Controllers\OTPController;

use App\Http\Controllers\GoogleController;

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


Route::get('/send-otp', function () {
    return view('send-otp');
});

Route::post('/send-otp', [OTPController::class, 'sendOtp'])->name('send.otp');
//user profile route

Route::post('/reply', [ReplyController::class, 'store'])->middleware('auth')->name('reply.store');


Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
Route::post('/user/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');

// admin and writer and user logout routes 
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');

// comment routte
Route::post('/comment/store', [CommentController::class, 'Commentstore'])->name('comments.store')->middleware('auth');
Route::get('/my-comments', [CommentController::class, 'myComments'])->name('comments.my')->middleware('auth');

// writer comment
Route::post('/comment/store', [CommentController::class, 'Commentstore'])->name('comments.store')->middleware('auth');
Route::get('/comment', [CommentController::class, 'Comment'])->name('comment')->middleware('auth');

// admin comment
Route::post('/comment/store', [CommentController::class, 'Commentstore'])->name('comments.store')->middleware('auth');
Route::get('/admincomment', [CommentController::class, 'AdminComment'])->name('admincomment')->middleware('auth');
// userpanel route  



Route::get('/user/dashboard', [UserPanelController::class, 'index'])->name('userpanel.dashbard');

Route::get('show/posts/detail/{slug}', [PostController::class, 'show'])->name('front.posts.show');



Route::post('/replies', [ReplyController::class, 'store'])->name('replies.store')->middleware('auth');



Route::delete('/admin/contacts/{slug}', [ContactController::class, 'destroy'])->name('admin.contacts.delete');


Route::post('/contacts', [ContactsController::class, 'store'])->name('contact.store');

Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contacts');

Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

// Admin Routes for Viewing and Deleting Contacts
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contacts');
//     Route::delete('/admin/contacts/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
// });


Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');

Route::get('/', [ShutController::class, 'index'])->name('home.index');
Route::get('/about', [AboutController::class, 'about'])->name('about.index');
Route::get('/post', [MasterController::class, 'post'])->name('front.post.index');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact.index');


Route::get('/blogcategory', [BlogCategoryPostController::class, 'index'])->name('blogcategory.index');
Route::post('/blogcategory/store', [BlogCategoryPostController::class, 'store'])->name('blogcategory.store');
    

// User and Writer Dashboards
Route::get('/user-dashboard', [HomeController::class, 'userDashboard'])->name('user.dashboard');
Route::get('/writer-dashboard', [HomeController::class, 'writerDashboard'])->name('writer.dashboard');

// Authentication routes for users
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes
Route::prefix('admin')->group(function () {
    // Admin registration and login (public routes)
    Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'register']);
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Protected admin routes (require admin authentication)
    Route::middleware('auth:admin')->group(function () {
       
        route::get('/dashboard',[AdminController::class ,'dashboard'])->name('admin.dashboard');

        route::get('/show/post',[PostController::class ,'index'])->name('post.index');

       
        // Add more admin-specific routes here
        Route::get('/post/create', [PostController::class, 'create'])->name('post.create');

Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

Route::get('/admin/posts', [PostController::class, 'index'])->name('posts.index');







Route::get('/admin/writers/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/writer/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/writer/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/writer/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit'); // ✅ Fix this line
Route::put('/writer/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/writer/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
// admin route  post
Route::get('/admin/posts',[AdminPostController::class, 'admin_post'])->name('admin.posts');
Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
Route::post('/admin/posts', [AdminPostController::class, 'store'])->name('admin.posts.store');
Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit'); // ✅ Fix this line
Route::put('/admin/posts/{post}', [AdminPostController::class, 'update'])->name('admin.posts.update');
Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');
Route::get('/writers', [UserController::class, 'Writerindex'])->name('writers.index');

Route::get('/writers/create', [UserController::class, 'create'])->name('writers.create'); // Show create form
Route::post('/writers', [UserController::class, 'store'])->name('writers.store'); // Store new writer
Route::get('/writers/{writer}', [UserController::class, 'show'])->name('writers.show'); // Show a single writer
Route::get('/writers/{writer}/edit', [UserController::class, 'edit'])->name('writers.edit'); // Show edit form
Route::put('/writers/{writer}', [UserController::class, 'update'])->name('writers.update'); // Update writer
Route::delete('/writers/{writer}', [UserController::class, 'destroy'])->name('writers.destroy'); // Delete writer
// Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'usercreate'])->name('users.create');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/writers', [UserController::class, 'Writerindex'])->name('writers.index');



// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/users', [UserController::class, 'index'])->name('users.index');
// });



});


    });
});
Route::prefix('writer')->name('writer.')->middleware('auth')->group(function () {
    Route::get('/posts', [WriterPostController::class, 'index'])->name('posts.index'); // Display all writer posts
    Route::get('/posts/create', [WriterPostController::class, 'create'])->name('posts.create'); // Show create form
    Route::post('/posts/store', [WriterPostController::class, 'store'])->name('posts.store'); // Store a new post
    Route::get('/posts/{id}/edit', [WriterPostController::class, 'edit'])->name('posts.edit'); // Show edit form
    Route::put('/posts/{post}', [WriterPostController::class, 'update'])->name('posts.update'); // Update the post
    Route::delete('/posts/{post}', [WriterPostController::class, 'destroy'])->name ('posts.destroy');// Delete the post
    Route::get('/posts/{id}', [WriterPostController::class, 'show'])->name('posts.show'); // View a single post
});



Route::middleware(['auth'])->group(function () {
    Route::get('/writer/profile', [WriterProfileController::class, 'index'])->name('writer.profile.index');
    Route::put('/writer/profile/update', [WriterProfileController::class, 'update'])->name('writer.profile.update');
});








Route::get('/blogcategories', [BlogcategoryController::class, 'index'])->name('blogcategories.index');

// Store a new category
Route::post('/blogcategories', [BlogcategoryController::class, 'store'])->name('blogcategories.store');

// Update a category
Route::put('/blogcategories/{id}', [BlogcategoryController::class, 'update'])->name('blogcategories.update');

// Delete a category
Route::delete('/blogcategories/{id}', [BlogcategoryController::class, 'destroy'])->name('blogcategories.destroy');

Route::get('/blogcategories/create', [BlogCategoryController::class, 'create'])->name('blogcategories.create');
Route::get('/blogcategories/{id}/edit', [BlogCategoryController::class, 'edit'])->name('blogcategories.edit');




// // Group under auth middleware and 'user' prefix
// Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {

//     // Show all posts of the authenticated user
//     Route::get('/posts', [UserPostController::class, 'index'])->name('posts.index');

//     // Show the form to create a new post
//     Route::get('/posts/create', [UserPostController::class, 'create'])->name('posts.create');

//     // Store a new post
//     Route::post('/posts', [UserPostController::class, 'store'])->name('posts.store');

//     // Show the form to edit a post
//     Route::get('/posts/{post}/edit', [UserPostController::class, 'edit'])->name('posts.edit');

//     // Update an existing post
//     Route::put('/posts/{post}', [UserPostController::class, 'update'])->name('posts.update');

//     // Delete a post
//     Route::delete('/posts/{post}', [UserPostController::class, 'destroy'])->name('posts.destroy');
// });

// Public route to show a single post (e.g., for front-end blog view)
Route::get('/post/{id}', [UserPostController::class, 'show'])->name('front.post.show');



Route::get('/category/{name}/posts', [PostController::class, 'postsByCategory'])->name('posts.byCategory');


