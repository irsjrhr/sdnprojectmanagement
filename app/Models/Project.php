<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $fillable = ['name','key','description','owner_id','status','workflow_config','custom_field_definitions', 'start_date', 'end_date'];
    protected $casts    = ['workflow_config' => 'array', 'custom_field_definitions' => 'array', 'start_date' => 'date', 'end_date' => 'date'];

    public function owner(): BelongsTo   { return $this->belongsTo(User::class, 'owner_id'); }
    public function epics(): HasMany     { return $this->hasMany(Epic::class); }
    public function sprints(): HasMany   { return $this->hasMany(Sprint::class); }
    public function tasks(): HasMany     { return $this->hasMany(Task::class); }
    public function features(): HasMany  { return $this->hasMany(ProjectFeature::class); }
    public function blueprints(): HasMany{ return $this->hasMany(BlueprintDocument::class); }
    public function brds(): HasMany      { return $this->hasMany(BrdDocument::class); }
}
