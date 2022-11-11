<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'fname' => ['required', 'string', 'max:255'],
            'mname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'civilStatus' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'birthDate' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'province' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'barangay' => ['required', 'string', 'max:255'],
            'unit' => ['required', 'string', 'max:255'],
            'floor' => ['required', 'string', 'max:255'],
            'buildingName' => ['required', 'string', 'max:255'],
            'houseNo' => ['required', 'string', 'max:255'],
            'streetName' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'vaccinedose' => ['required', 'string', 'max:255'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'fname' => $input['fname'],
                'mname' => $input['mname'],
                'lname' => $input['lname'],
                'civilStatus' => $input['civilStatus'],
                'gender' => $input['gender'],
                'birthDate' => $input['birthDate'],
                'email' => $input['email'],
                'province' => $input['province'],
                'city' => $input['city'],
                'barangay' => $input['barangay'],
                'unit' => $input['unit'],
                'floor' => $input['floor'],
                'buildingName' => $input['buildingName'],
                'houseNo' => $input['houseNo'],
                'streetName' => $input['streetName'],
                'district' => $input['district'],
                'vaccinedose' => $input['vaccinedose'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'fname' => $input['fname'],
            'mname' => $input['mname'],
            'lname' => $input['lname'],
            'civilStatus' => $input['civilStatus'],
            'gender' => $input['gender'],
            'birthDate' => $input['birthDate'],
            'email' => $input['email'],
            'email_verified_at' => null,
            'province' => $input['province'],
            'city' => $input['city'],
            'barangay' => $input['barangay'],
            'unit' => $input['unit'],
            'floor' => $input['floor'],
            'buildingName' => $input['buildingName'],
            'houseNo' => $input['houseNo'],
            'streetName' => $input['streetName'],
            'district' => $input['district'],
            'vaccinedose' => $input['vaccinedose'],
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
