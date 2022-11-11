<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    
    protected $redirectTo = '/register-step2.create';

    // use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'fname' => ['required', 'string', 'max:255'],
            'mname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        redirect()->route('register-step2.create');

        return User::create([
            'name' => $input['fname'] . " " . $input['lname'],
            'usertype' => $input['usertype'],
            'suffix' => $input['suffix'],
            'fname' => $input['fname'],
            'mname' => $input['mname'],
            'lname' => $input['lname'],
            'civilStatus' => $input['civilStatus'],
            'gender' => $input['gender'],
            'birthDate' => $input['birthDate'],
            'roomToVisit' => 'n\a',
            'purposeOfVisit' => 'Resident',
            'nameToVisit' => $input['fname'] . " " . $input['lname'],
        ]);
    }
}
