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
use App\Models\TodoStage;

// контроллер модели
class TodoStageController extends Controller
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
        // пагинация
        $paginate = $this->commonService->getAdmminSetting('setting_paginate_admin');
        // получение данных модели
        $content = TodoStage::paginate($paginate);

        // открыть вюшку
        return view('backend.todostage.index', compact('content'));
    }

    // вывод одной строки
    public function edit($id = null)
    {
        // контент
        if ($id) {
            $content = TodoStage::findOrFail($id);
        } else {
            $content = new TodoStage;
        }

        // справочники и другие дополнительные сведения


        // открыть вьюшку
        return view('backend.todostage.edit', compact('content'));
    }

    // сохранение данных
    public function update($id = null, Request $request)
    {
        $model = $this->commonCrudService->store('TodoStage', $id, $request, 'img');

        // редирект
        return redirect(route('todostage.index'));
    }

    // удаление строки
    public function destroy($id)
    {
        // удаление изображений и в бд
        $bool = $this->commonCrudService->destroy('TodoStage', $id);
        // редирект
        return redirect()->back();
    }
}