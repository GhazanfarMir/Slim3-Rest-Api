<?php

namespace App\Transformers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UsersTransformer
{
    /**
     * @param User $user
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id'          => $user->id,
            'firstName'   => $user->first_name,
            'surName'     => $user->surname,
            'email'       => $user->email,
            'dateOfBirth' => $user->date_of_birth,
            'created_at'  => $user->created_at,
            'updated_at'  => $user->updated_at,
        ];
    }

    /**
     * @param Collection $users
     *
     * @return array
     */
    public function transformCollection(Collection $users)
    {
        $data = array();

        foreach ($users as $user) {
            $data[] = UsersTransformer::transform($user);
        }

        return $data;
    }
}
