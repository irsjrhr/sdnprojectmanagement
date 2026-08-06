<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Epic extends Model {
    protected $fillable = ['project_id','name','description','status', 'start_date', 'end_date'];
    protected $casts    = ['start_date' => 'date', 'end_date' => 'date'];
    public function project() { return $this->belongsTo(Project::class); }
    public function tasks()   { return $this->hasMany(Task::class); }
}
