<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

/**
 * Class Task
 * @package App\Models
 * @property string $status
 */
class Task extends Model
{
    use HasFactory;

    const NEW = false;

    protected $fillable = ['name', 'status'];
    /**
     * @var mixed
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statusCompleted()
    {
        return $this->status = self::NEW;
    }

    public function up()
    {

    }

    public function first()
    {

    }
}
