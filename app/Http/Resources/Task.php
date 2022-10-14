<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Task extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'body'=>$this->body,
            'header'=>$this->header,
            'summary'=>$this->summary,
            'format'=>$this->format,
            'pages'=>$this->pages,
            'paperType' => $this-> paperType,
            'level' => $this-> level,
            'studentprice'=>$this->studentprice,
            'tutorprice'=>$this->tutorprice,
            'studentId'=>$this->studentId,
            'questionId'=>$this->rand(99999, 999999),
            'deadline'=>$this->deadline,
            'created_at'=>$this->created_at
        ];
    }
}