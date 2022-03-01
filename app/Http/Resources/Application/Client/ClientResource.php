<?php

namespace App\Http\Resources\Application\Client;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{

    public static $wrap = 'payload';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'entreprise' => $this->entreprise,
            'logo' => $this->logo ?? "https://www.freelogoservices.com/blog/wp-content/uploads/Beats-Logo.png",
            'ice' => $this->ice
        ];
    }
}
