<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category_id' => $this->category_id,
            'is_completed' => $this->is_completed,
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'assigned_user' => AssignedUserResource::make($this->whenLoaded('assignedUser')),
            'assigned_to' => $this->assigned_to,
            'estimated_minutes' => $this->estimated_minutes,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
