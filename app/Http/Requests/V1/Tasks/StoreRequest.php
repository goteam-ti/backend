<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Tasks;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:2',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
                'min:2',
                'max:255',
            ],
            'due_date' => [
                'required',
                'date',
                'date_format:Y-m-d',
            ],
            'status' => [
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
     *
     * we can basically extract to trait and use it in all our requests,
     * but for the sake of simplicity, we will just use it in this request.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'due_date' => $this->dueDate,
        ]);
    }
}
