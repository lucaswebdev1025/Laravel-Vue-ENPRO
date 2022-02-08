<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use App\Models\BaseModel as BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;



/**
 * Class wireinsulationkind
 * @package App\Models
 * @version April 28, 2021, 3:41 am UTC
 *
 * @property integer $id
 * @property string $value
 * @property string $ru_value
 * @property string $description
 * @property string $enpro_code

 */
class WireInsulationKind extends BaseModel
{
    // использование мягкого удаления
    use SoftDeletes;



    // управляемая таблица
    public $table = 'wire_insulation_kind';

    // список полей, разрешенных на редактирование
    public $fillable = [
      'value',
      'ru_value',
      'description',
      'enpro_code',

    ];

    // список полей запрещенных на редактирование
    protected $guarded = [];
    // скрытые поля
    protected $hidden = ['deleted_at', 'updated_at', 'created_at'];

    // мои атрибуты модели
    const title1 = "Вид изоляции провода";
    const title2 = "Виды изоляций провода";
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'value' => 'string',
        'ru_value' => 'string',
        'description' => 'string',
        'enpro_code' => 'string',

    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function (WireInsulationKind $model) {



        });

    }


    public function getWireInsulationKind() : WireInsulationKind
    {
        return $this;
    }
}
