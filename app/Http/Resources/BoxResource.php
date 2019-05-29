<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class BoxResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'ammount' => $this->ammount,
            'ammount_before' => $this->ammount_before,
            'porcentage' => $this->porcentage,
            'gastos' => $this->accounts
        ];
    }
}
