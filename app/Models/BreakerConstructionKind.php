<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use App\Models\BaseModel as BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Czim\NestedModelUpdater\Traits\NestedUpdatable;



/**
 * Class BreakerConstructionKind
 * @package App\Models
 * @version April 28, 2021, 3:41 am UTC
 *
 * @property integer $id
 * @property string $value
 * @property string $description
 * @property string $ru_value
 * @property string $enpro_code

 */
class BreakerConstructionKind extends BaseModel
{
    // использование мягкого удаления
    use SoftDeletes;
    use NestedUpdatable;


    // управляемая таблица
    public $table = 'breaker_construction_kind';

    const title1 = "Принцип гашения дуги";
    const title2 = "Принципы гашения дуги";

    // список полей, разрешенных на редактирование
    public $fillable = [
      'value',
      'description',
      'ru_value',
      'enpro_code',

    ];

    // список полей запрещенных на редактирование
    protected $guarded = [];
    // скрытые поля
    protected $hidden = ['deleted_at', 'updated_at', 'created_at'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'value' => 'string',
        'description' => 'string',
        'ru_value' => 'string',
        'enpro_code' => 'string',

    ];



    public function getBreakerConstructionKind() : BreakerConstructionKind
    {
        return $this;
    }
}
