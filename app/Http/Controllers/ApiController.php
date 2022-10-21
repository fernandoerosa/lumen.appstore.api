<?php

namespace App\Http\Controllers;

use App\Models\App;
use Laravel\Lumen\Http\ResponseFactory;
use PHPUnit\Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{

    /**
     * @param Request $request
     * @return JsonResponse|Response|ResponseFactory
     */
    public function getAllApps(Request $request)
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
     * @return JsonResponse|Response
     */
    public function getApp($id)
    {
        if (App::where('id', $id)->exists()) {
            $app = App::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($app, 200);
        } else {
            return response()->json([
                "message" => "App não encontrado!"
            ], 404);
        }
    }

    /**
     * @param $packageName
     * @return JsonResponse|Response
     */
    public function getAppApk($packageName)
    {
        if (App::where('package_name', $packageName)->exists()) {
            $app = App::where('package_name', $packageName)->get('path')->toJson(JSON_PRETTY_PRINT);
            return response($app, 200);
        } else {
            return response()->json(["message" => "App não encontrado!"]);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function createApp(Request $request): JsonResponse
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
    public function updateApp(Request $request, $id): JsonResponse
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
    public function deleteApp($id): JsonResponse
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
