<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Tasks;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => [
                'sometimes',
                'required',
                'string',
                'min:2',
                'max:255',
            ],
            'description' => [
                'sometimes',
                'required',
                'string',
                'min:2',
                'max:255',
            ],
            'dueDate' => [
                'sometimes',
                'required',
                'date',
                'date_format:Y-m-d',
            ],
            'status' => [
                'sometimes',
                'nullable',
                Rule::enum(
                    type: Status::class,
                ),
            ],
        ];
    }

    /**
     * Our front-end uses camelCase, but our database uses snake_case,
     * so we need to map the camelCase to snake_case in all our requests.
    */
    public function attributes(): array
    {
        return [
            'dueDate' => 'due_date',
        ];
    }
}
