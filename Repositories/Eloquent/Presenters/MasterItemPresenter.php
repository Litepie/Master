<?php

namespace Litepie\Master\Repositories\Eloquent\Presenters;

use Litepie\Repository\Presenter\Presenter;

class MasterItemPresenter extends Presenter
{

    public function itemLink()
    {
        return guard_url('master/master') . '/' . $this->getRouteKey();
    }

    public function title()
    {
        if ($this->title != '') {
            return $this->title;
        }

        if ($this->name != '') {
            return $this->name;
        }

        return 'None';
    }

    public function toArray()
    {
        return [
            'id' => $this->getRouteKey(),
            'title' => $this->title(),
            'parent_id' => $this->parent_id,
            'type' => $this->type,
            'name' => $this->name,
            'code' => $this->code,
            'amount' => $this->amount,
            'abbr' => $this->abbr,
            'description' => $this->description,
            'icon' => $this->icon,
            'image' => $this->image,
            'images' => $this->images,
            'file' => $this->file,
            'order' => $this->order,
            'status' => $this->status,
            'extras' => $this->extras,
            'slug' => $this->slug,
            'created_at' => !is_null($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : null,
            'updated_at' => !is_null($this->updated_at) ? $this->updated_at->format('Y-m-d H:i:s') : null,
            'meta' => [
                'exists' => $this->exists(),
                'link' => $this->itemLink(),
                'upload_url' => $this->getUploadURL(''),
            ],
        ];
    }
}
