<?php declare(strict_types=1);

namespace App\Domain\Genre\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Genre\DTObjects\DeleteDto;

class DeleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['required', 'string', 'exists:users,id,' . $this->id]
        ];
    }

    public function toDto(): DeleteDto
    {
        return new DeleteDto(
            id: $this->string(id: 'title')->trim()->value
        );
    }
}
