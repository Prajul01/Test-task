<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Jobs\SendReminderEmail;
use App\Mail\RemainderEmail;
use App\Models\User;
use App\Notifications\ItemUpdatedNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\BlogCreatedMail;
use App\Models\Blog;
use Illuminate\Support\Facades\Queue;

use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.//    {

     */
//    public function test_the_application_returns_a_successful_response(): void
//    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
//    }

    public function testPurgeOldBlogsSuccessfully()
    {

        $fakeImage = UploadedFile::fake()->image('1713903590_download.jpeg');
        $oldBlog = $this->post(route('blog.store'), [
            'title' => 'purge Blog Post',
            'description' => 'Content of the blog post',
            'status'=>1,
            'image_file' => $fakeImage,
            'created_at' => Carbon::now()->subDays(2)

        ]);
        $this->artisan('blogs:purge');


    }

    public function test_store_blog_with_image()
    {
        Storage::fake('public');
        $this->withoutExceptionHandling();
        $knownDate = \Carbon\Carbon::create(2024, 4, 22, 20, 33, 02);
        \Carbon\Carbon::setTestNow($knownDate);

        $fakeImage = UploadedFile::fake()->image('1713903590_download.jpeg');
//        dd($fakeImage);
        $response = $this->post(route('blog.store'), [
            'title' => 'New Blog Post',
            'description' => 'Content of the blog post',
            'status'=>1,
            'image_file' => $fakeImage
        ]);


        $response->assertStatus(302);

        // Resetting Carbon's test time
        \Carbon\Carbon::setTestNow();
    }

    public function test_show_method()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $fakeImage = UploadedFile::fake()->image('1713903590_download.jpeg');
        $blog = Blog::create([
            'title' => 'New Blog Post',
            'description' => 'Content of the blog post',
            'status'=>1,
            'image' => $fakeImage
        ]);
        $response = $this->get(route('blog.show', ['blog' => $blog->id]));
        $response->assertStatus(200);
        $response->assertViewIs('backend.blog.view');
        $response->assertViewHas('data', function ($viewData) use ($blog) {
            return $viewData['row']->id === $blog->id;
        });
        $this->assertDatabaseHas('blog_post_views', [
            'user_id' => $user->id,
            'blog_id' => $blog->id,
            'viewed_at' => Carbon::now()->toDateTimeString()
        ]);
    }
    public function test_update_blog_with_image()
    {
        Storage::fake('public');
        Notification::fake();
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);
        $blog = Blog::create([
            'title' => 'Original Title',
            'description' => 'Original content',
            'status' => 1,
            'image' => 'original.jpg'
        ]);
        $knownDate = \Carbon\Carbon::create(2024, 4, 22, 20, 33, 02);
        \Carbon\Carbon::setTestNow($knownDate);
        $fakeImage = UploadedFile::fake()->image('1713903590_download.jpeg');
        $response = $this->put(route('blog.update', ['blog' => $blog->id]), [
            'title' => 'Updated Blog Post',
            'description' => 'Updated content',
            'status' => 1,
            'image_file' => $fakeImage
        ]);
        $this->assertDatabaseHas('blogs', [
            'id' => $blog->id,
            'title' => 'Updated Blog Post',
            'description' => 'Updated content'
        ]);
        Notification::assertSentTo([$user], ItemUpdatedNotification::class);
        $response->assertRedirect(route('blog.index'));
        $response->assertSessionHas('success');
        \Carbon\Carbon::setTestNow();
    }

    public function test_destroy_blog_post()
    {
        $fakeImage = UploadedFile::fake()->image('1713903590_download.jpeg');
        $blog = Blog::create([
            'title' => 'New Blog Post',
            'description' => 'Content of the blog post',
            'status'=>1,
            'image' => $fakeImage
        ]);
        $response = $this->delete(route('blog.destroy', ['blog' => $blog->id]));
        $response->assertRedirect(route('blog.index'));
        $response->assertSessionHas('success', 'Data Deleted Successfully');
    }





}
