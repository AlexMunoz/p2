<?php

namespace App\Providers;
use App\FbAuth;
use App\User;
use App\Role;
use Laravel\Socialite\Contracts\User as ProviderUser;
 
class FbServiceProvider
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = FbAuth::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();
 
        if ($account) {
            return $account->user;
        } else {
 
            $account = new FbAuth([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);
 
            $user = User::whereEmail($providerUser->getEmail())->first();
 
            if (!$user) {
 
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => md5(rand(1,10000)),
                ]);

                $user
                  ->roles()
                  ->attach(Role::where('name', 'READ')->first());
            }
 
            $account->user()->associate($user);
            $account->save();
 
            return $user;
        }
    }
}