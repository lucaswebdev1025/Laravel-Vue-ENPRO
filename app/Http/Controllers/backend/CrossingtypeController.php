<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// мои сервисы
use App\Http\Services\backend\CommonFileService;
use App\Http\Services\backend\CommonCrudService;
use App\Http\Services\backend\CommonService;
use App\Http\Services\backend\ModelService;

// модель
use App\Models\Crossingtype;

// контроллер модели
class CrossingtypeController extends Controller
{
    // подключение сервисов
    public function __construct(CommonFileService $commonFileService, CommonCrudService $commonCrudService, CommonService $commonService, ModelService $modelService)
    {
        $this->commonFileService = $commonFileService;
        $this->commonCrudService = $commonCrudService;
        $this->commonService = $commonService;
        $this->modelService = $modelService;
    }

    // вывод списка
    public function index()
    {
        // // пагинация
        // $paginate = $this->commonService->getAdmminSetting('setting_paginate_admin');
        // // получение данных модели
        // $content = Crossingtype::paginate($paginate);

        // открыть вюшку
        return view('backend.crossingtype.index');
    }

    public function vueIndex(Request $request)
    {
        // переданные параметры через запрос post
        $getPage = $request['page']; // для пагинации
        $getFilterName = $request['filterName']; // поисковое выражение
        $getSortCol = $request['sortCol']; // сортировка
        $getSortDirect = $request['sortDirect']; // сортировка

        // для пагинации - кол-во записей на странице

        $rowsPerPage = $this->commonService->getAdmminSetting('setting_paginate_admin');
        // $rowsPerPage= 2;ЫЫ

        $myReturn = Crossingtype::when(isset($getFilterName), function ($query) use ($getFilterName) {
                return $query->where('name', 'like', '%' . $getFilterName . '%');
            })
            ->when(isset($getSortCol), function ($query) use ($getSortCol, $getSortDirect) {
                return $query->orderBy($getSortCol, $getSortDirect);
            })
            ->paginate($rowsPerPage);

        // возвращаемый параметр
        return $myReturn;
    }
    public function vueDelete(Request $request)
    {
        // переданные параметры через запрос post
        $selectedRows = $request['selectedRows'];
        // преобразовать строчку в массив
        $selectedRows = array_map('intval', explode(',', $selectedRows)); // выделенные строчки

        // сканировать полученный список
        if ($selectedRows and count($selectedRows) > 0) {
            foreach ($selectedRows as $item) {
                $delete = self::destroy($item);
            }
        }
    }

    // вывод одной строки
    public function edit($id = null)
    {
        // контент
        if ($id) {
            $content = Crossingtype::findOrFail($id);
        } else {
            $content = new Crossingtype;
        }

        // справочники и другие дополнительные сведения


        // открыть вьюшку
        return view('backend.crossingtype.edit', compact('content'));
    }

    // сохранение данных
    public function update($id = null, Request $request)
    {
        $bool = $this->commonCrudService->store('Crossingtype', $id, $request);
        // редирект
        return redirect(route('crossingtype.index'));
    }

    // удаление строки
    public function destroy($id)
    {
        // удаление изображений и в бд
        $bool = $this->commonCrudService->destroy('Crossingtype', $id);
        // редирект
        return redirect()->back();
    }
}