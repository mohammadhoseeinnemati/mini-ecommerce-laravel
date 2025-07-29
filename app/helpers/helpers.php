<?php

use Illuminate\Http\RedirectResponse;

if(!function_exists('backWithError')){
    function backWithError(string $message): RedirectResponse
    {
        return back()
            ->withErrors([
                'general' => $message
            ]);
    }
}if(!function_exists('getAuthenticatedUserFullName')){
    function getAuthenticatedUserFullName(string $guard = null): string
    {
        $user = auth($guard)->user();

        return "$user->first_name $user->last_name";
    }
}
