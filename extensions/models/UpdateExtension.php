<?php


namespace app\extensions\models;


use app\models\Update;

class UpdateExtension extends Update
{
    /**
     * Static method create this model
     * @param array $attributes
     * @return bool
     */
    public static function create(array $attributes): bool
    {
        $model = new self($attributes);
        return $model->save();
    }
}
