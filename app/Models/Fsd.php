<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Fsd extends Model {
    protected $fillable = ['code','title','description','status','content'];
    public function getTable() { return 'fsds'; }
}
