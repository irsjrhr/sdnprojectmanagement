<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Sprint extends Model {
    protected $fillable = ['project_id','name','start_date','end_date','goal','status'];
    protected $casts    = ['start_date' => 'datetime', 'end_date' => 'datetime'];
    public function project() { return $this->belongsTo(Project::class); }
    public function tasks()   { return $this->hasMany(Task::class); }
}
