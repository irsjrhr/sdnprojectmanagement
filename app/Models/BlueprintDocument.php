<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BlueprintDocument extends Model {
    protected $fillable = ['project_id','title','background','scope','out_of_scope','status','author_id','approved_by','approved_at','history','flowcharts','table_of_contents'];
    protected $casts    = ['approved_at' => 'datetime', 'history' => 'array', 'flowcharts' => 'array', 'table_of_contents' => 'array'];
    public function project()    { return $this->belongsTo(Project::class); }
    public function author()     { return $this->belongsTo(User::class, 'author_id'); }
    public function approvedBy() { return $this->belongsTo(User::class, 'approved_by'); }
}
