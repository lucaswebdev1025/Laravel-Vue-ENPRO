<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// трайты
use App\Traits\CommonTrait;

// модели

// модель
class Bbscrosssectionkind extends Model
{
    // подключение трайтов
    use CommonTrait;
    // использование мягкого удаления
    use SoftDeletes;

    // управляемая таблица
    protected $table = "bbscrosssectionkind";

    // список полей, разрешенных на редактирование
    protected $fillable = [];
    // список полей запрещенных на редактирование
    protected $guarded = [];
    // скрытые поля
    protected $hidden = ['deleted_at', 'updated_at', 'created_at'];

    // мои атрибуты модели
    const title1 = "";
    const title2 = "";

    // возвращает папку хранения изображения
    public function folderPath()
    {
        return 'uploads/models/bbscrosssectionkind/' . $this->id;
    }

    // связи
}
