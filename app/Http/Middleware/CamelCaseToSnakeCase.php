<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class CamelCaseToSnakeCase
{
    public function handle($request, Closure $next): JsonResponse
    {
        $input = $request->all();

        // Recursively transform the input data
        $transformedInput = $this->transformKeys($input);

        // Replace the input data with the transformed data
        $request->replace($transformedInput);

        return $next($request);
    }

    private function transformKeys($data): array
    {
        $result = [];

        foreach ($data as $key => $value) {
            if (is_string($key)) {
                // Convert the key from camelCase to snake_case
                $snakeKey = Str::snake($key);

                if (is_array($value)) {
                    // If the value is an array, recursively transform its keys
                    $value = $this->transformKeys($value);
                }

                $result[$snakeKey] = $value;
            } else {
                // Handle non-string keys gracefully
                $result[$key] = $value;
            }
        }

        return $result;
    }
}
