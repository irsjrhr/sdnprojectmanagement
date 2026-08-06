<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Task extends Model {
    protected $fillable = ['project_id','epic_id','sprint_id','parent_id','reporter_id','assignee_id','type','priority','title','description','status','story_points','estimated_hours','custom_fields','brd_document_id', 'start_date', 'due_date'];
    protected $casts    = ['custom_fields' => 'array', 'start_date' => 'date', 'due_date' => 'date'];
    public function project()  { return $this->belongsTo(Project::class); }
    public function epic()     { return $this->belongsTo(Epic::class); }
    public function sprint()   { return $this->belongsTo(Sprint::class); }
    public function reporter() { return $this->belongsTo(User::class, 'reporter_id'); }
    public function assignee() { return $this->belongsTo(User::class, 'assignee_id'); }
    public function parent()   { return $this->belongsTo(Task::class, 'parent_id'); }
    public function children() { return $this->hasMany(Task::class, 'parent_id'); }
    public function brdDocument() { return $this->belongsTo(BrdDocument::class, 'brd_document_id'); }
    public function comments()    { return $this->hasMany(TaskComment::class)->orderBy('created_at', 'asc'); }
}
