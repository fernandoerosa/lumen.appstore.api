<?php

namespace App\Http\Controllers;

use App\Models\App;
use PHPUnit\Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ApiController extends Controller
{

    /**
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function getAll(Request $request)
    {
        try {
            $apps = App::get()->toJson(JSON_PRETTY_PRINT);
            return response($apps, 200);
        } catch (Exception $e) {
            return response()->json(['message', 'Erro ao buscar Apps!']);
        }
    }

    /**
     * @param $id
     * @return JsonResponse|BinaryFileResponse
     */
    public function get($id)
    {
        if (App::where('id', $id)->exists()) {
            $app = App::where('id', $id);
            $apkPath = $app->value('path');
            $fileName = $app->value('package_name').".apk";
            return response()->download($apkPath, $fileName);
        } else {
            return response()->json([
                "message" => "App não encontrado!"
            ], 404);
        }
    }

    /**
     * @param $id
     * @return JsonResponse|Response
     */
    public function getAppApk($id)
    {
        if (App::where('id', $id)->exists()) {
            $app = App::where('id', $id)->get('path')->toJson(JSON_PRETTY_PRINT);
            return response($app, 200);
        } else {
            return response()->json(["message" => "App não encontrado!"]);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        try {
            App::create($request->all());
            return response()->json(['message' => 'App criado'], 201);
        } catch (Exception $e) {
            return response()->json(['message' => $e], 201);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        if (App::with('id', $id)->exists()) {
            $app = App::find($id);
            $app->update($request->all());
            return response()->json(['message' => 'App atualizado']);
        } else {
            return response()->json(['message' => 'App não encontrado'], 404);
        }
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function delete($id): JsonResponse
    {
        if (App::where('id', $id)->exists()) {
            $app = App::find($id);
            $app->delete();
            return response()->json(['message' => 'App excluido']);
        } else {
            return response()->json(['message' => 'App não existe']);
        }
    }
}
