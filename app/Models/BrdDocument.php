<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BrdDocument extends Model {
    protected $fillable = ['brd_code','title','project_id','task_id','pic_id','status','content'];
    public function project() { return $this->belongsTo(Project::class); }
    public function task()    { return $this->belongsTo(Task::class); }
    public function pic()     { return $this->belongsTo(User::class, 'pic_id'); }
}
