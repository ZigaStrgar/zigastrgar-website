<?php

namespace App;

trait Attachable
{
    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachable');
    }

    public function hasAttachment()
    {
        return $this->attachment()->exists();
    }

    public function getAttachmentPathAttribute()
    {
        return collect(explode("/", $this->attachment->path))->last();
    }

    public function getAttachmentNameAttribute()
    {
        return ($this->hasAttachment()) ? $this->attachment->name : "";
    }
}
