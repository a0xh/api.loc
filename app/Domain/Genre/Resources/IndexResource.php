<?php declare(strict_types=1);

namespace App\Domain\Genre\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Request;

final class AllResource extends ResourceCollection
{
    public $preserveKeys = true;

	public function toArray(Request $request): array
    {
        return $this->collection->map(
            callback: function (array $data) {
                return [
                    'id' => $data['id'],
                    'status' => $data['status'],
                    'is_deleted' => $data['is_deleted'],
                    'attributes' => [
                        'title' => $data['title'],
                        'slug' => $data['slug'],
                        'description' => $data['description'],
                        'keywords' => $data['keywords'],
                        'content' => $data['content'],
                        'keywords' => $data['keywords']
                    ],
                    'datetime' => [
                        'created_at' => $data['created_at'],
                        'updated_at' => $data['updated_at'],
                        'deleted_at' => $data['deleted_at']
                    ],
                    'relationships' => [
                        'user' => [
                            'data' => [
                                'id' => $data['user']['id'],
                                'status' => $data['user']['status'],
                                'is_deleted' => $data['user']['is_deleted'],
                                'attributes' => [
                                    'login' => $data['user']['login'],
                                    'email' => $data['user']['email'],
                                    'email_verified_at' => $data['user']['email_verified_at'],
                                    'datetime' => [
                                        'created_at' => $data['user']['created_at'],
                                        'updated_at' => $data['user']['updated_at'],
                                        'deleted_at' => $data['user']['deleted_at']
                                    ]
                                ]
                            ]
                        ]
                    ]
                ];
            }
        )->toArray();
    }
}
