<?php

namespace App\Traits;

trait RecordSignature
{
    protected static function bootRecordSignature()
    {
        // CREATING
        static::creating(function ($model) {
            if (auth()->check()) {
                $model->created_by = auth()->id();
                $model->updated_by = auth()->id();
            }
        });

        // UPDATING
        static::updating(function ($model) {
            if (auth()->check()) {
                $model->updated_by = auth()->id();
            }
        });

        // DELETING
        static::deleting(function ($model) {
            if (auth()->check() && $model->usesSoftDeletes()) {
                $model->deleted_by = auth()->id();

                if (array_key_exists('is_active', $model->getAttributes())) {
                    $model->is_active = false;
                }
            }
        });
    }

    /**
     * Verificar si el modelo usa SoftDeletes
     */
    protected function usesSoftDeletes(): bool
    {
        return in_array(\Illuminate\Database\Eloquent\SoftDeletes::class, class_uses_recursive($this));
    }
}