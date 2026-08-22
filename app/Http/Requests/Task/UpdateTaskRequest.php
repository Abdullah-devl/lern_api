<?php

namespace App\Http\Requests\Task;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'title'=>'sometimes|string|max:40',
            'description'=>'sometimes|nullable|string',
            'is_completed'=>'sometimes|nullable',
        ];
    }

    /**
     * تخصيص رسائل الخطأ لكل حقل وقاعدة.
     */

    public function messages(): array
    {
        return [
            'title.required' => 'حقل عنوان المهمة مطلوب عند التعديل، لا يمكنك إرساله فارغاً.',
            'title.string' => 'يجب أن يكون عنوان المهمة نصاً عادياً.',
            'title.max' => 'عنوان المهمة أطول من اللازم، يجب ألا يتجاوز 255 حرفاً.',
            
            'description.string' => 'يجب أن يكون وصف المهمة نصاً.',
            
            'is_completed.boolean' => 'حالة المهمة يجب أن تكون قيمة منطقية (true أو false).'
        ];
    }
}
