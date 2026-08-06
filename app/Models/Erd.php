<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Erd extends Model {
    protected $fillable = ['code','title','description','status','content','dbml'];
    public function getTable() { return 'erds'; }
}
