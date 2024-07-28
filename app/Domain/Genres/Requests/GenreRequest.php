<?php declare(strict_types=1);

namespace App\Domain\Genres\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Genres\DTObjects\GenreDto;
use Illuminate\Support\Collection;

class GenreRequest extends FormRequest
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
        $validation = collect([
            'title' => ['bail', 'required', 'string', 'min:3', 'max:73'],
            'description' => ['bail', 'nullable', 'string', 'min:3', 'max:200'],
            'keywords' => ['bail', 'nullable', 'string', 'min:3', 'max:200'],
            'content' => ['bail', 'nullable', 'string', 'max:65535'],
            'status' => ['bail', 'required', 'string', 'in:active,inactive'],
        ]);

        $request = match ($this->method()) {
            'POST' => $validation->merge([
                'slug' => ['bail', 'nullable', 'string', 'lowercase', 'min:1', 'max:78', 'unique:genres,slug']
            ])->toArray(),
            'PUT' => $validation->merge([
                'slug' => ['bail', 'nullable', 'string', 'lowercase', 'min:1', 'max:78', 'unique:genres,slug,' . $this->genre->id]
            ])->toArray(),
            'DELETE' => ['id' => ['required', 'string', 'exists:users,id,' . $this->genre->id]],
        };

        return $request;
    }

    public function getGenreDto(): GenreDto
    {
        return GenreDto::fromArray($this->validated());
    }
}
