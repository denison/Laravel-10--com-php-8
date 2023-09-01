<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Validation\ValidationException;

/**
 * Undocumented trait
 */
trait ObserverAutomaticValidationTrait
{
    /**
     * 
     * @throws \ValidationException
     */
    public function saving(Model $model) 
    {
        if (!isset($model::$rules)) return;
        $validator = Validator::make(request()->all(), $model::$rules);
        if ($validator->fails()) throw ValidationException::withMessages($validator->getMessageBag()->toArray());
    }

    // protected static function bootModelHasValidatiorTrait(): void
    // {
    //     static::creating();

    //     static::saving(function (Model $model) {
    //     });
    // }

}