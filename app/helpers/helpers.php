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
}
