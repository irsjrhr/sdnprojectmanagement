<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectFeatureComment extends Model
{
    use SoftDeletes;

    protected $fillable = ['project_feature_id', 'user_id', 'body'];

    public function feature()
    {
        return $this->belongsTo(ProjectFeature::class, 'project_feature_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
