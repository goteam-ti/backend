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

    // after validated, convert all attributes to snake_case
    protected function prepareForValidation(): void
    {
        $this->merge([
            'due_date' => $this->dueDate,
        ]);
    }
}
