<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ProjectFeature extends Model {
    protected $fillable = ['project_id','name','blueprint_code','brd_code','fsd_code','is_selected','is_gap','description'];
    protected $casts    = ['is_selected' => 'boolean', 'is_gap' => 'boolean'];
    public function project() { return $this->belongsTo(Project::class); }
    public function brdDocument() { return $this->hasOne(BrdDocument::class, 'brd_code', 'brd_code'); }
    public function fsdDocument() { return $this->hasOne(Fsd::class, 'code', 'fsd_code'); }
    public function comments() { return $this->hasMany(ProjectFeatureComment::class); }
}
