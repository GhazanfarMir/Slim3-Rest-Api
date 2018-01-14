<?php

namespace App\Models;

use Slim\Http\Request;

class User extends BaseModel
{
    /**
     * @var array
     */
    public $fillable = [
        'first_name',
        'surname',
        'email',
        'date_of_birth',
    ];

    /**
     * @param Request $request
     *
     * @return bool|\Illuminate\Database\Eloquent\Model
     */
    public function addUser(Request $request)
    {
        $user = new User();

        $inputs = $request->getParams();

        foreach ($inputs as $col => $val) {

            // continue if the provided field isn't recognisable

            if (!in_array($col, $user->fillable)) {
                continue;
            }

            // set field as null if empty

            $user->$col = !empty($val) ? $val : null;
        }

        if ($user->save()) {
            return User::find($user->id);
        } // refetch full user model

        return false;
    }

    /**
     * @param Request $request
     * @param array   $args
     *
     * @return bool|\Illuminate\Database\Eloquent\Model
     */
    public function updateUser(Request $request, $args)
    {
        $inputs = $request->getParams();

        $user = User::find($args['id']);

        foreach ($inputs as $col => $val) {

            // continue if the provided field isn't recognisable

            if (!in_array($col, $user->fillable)) {
                continue;
            }

            // set field as null if empty

            $user->$col = !empty($val) ? $val : null;
        }

        if ($user->save()) {
            return User::find($user->id);
        } // refetch full user model

        return false;
    }
}
