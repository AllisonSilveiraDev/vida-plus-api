<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Defina seus middlewares aqui
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Forçar o retorno de JSON para todas as exceções
        $exceptions->render(function (Throwable $e, $request) {
            return response()->json([
                'message' => $e->getMessage(),
                'error' => get_class($e),
            ], $e->getCode() ?: 500);
        });

        // Exceção de validação
        $exceptions->render(function (ValidationException $e, $request) {
            return response()->json([
                'message' => 'Erro de validação.',
                'errors' => $e->errors(),
            ], 422);
        });

        // Rota não encontrada
        $exceptions->render(function (NotFoundHttpException $e, $request) {
            return response()->json([
                'message' => 'Rota não encontrada.',
            ], 404);
        });

        // Método HTTP não permitido
        $exceptions->render(function (MethodNotAllowedHttpException $e, $request) {
            return response()->json([
                'message' => 'Método HTTP não permitido.',
            ], 405);
        });

        // Exceção genérica
        $exceptions->render(function (Throwable $e, $request) {
            return response()->json([
                'message' => 'Erro interno no servidor.',
                'error' => $e->getMessage(),
            ], 500);
        });
    })
    ->create();
