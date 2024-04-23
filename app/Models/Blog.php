<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='blogs';
    protected $fillable=['title','description','image','status','created_at'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_blog');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function views()
    {
        return $this->hasMany(BlogPostView::class, 'blog_id');
    }
}
