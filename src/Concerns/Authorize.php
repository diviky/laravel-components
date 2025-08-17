<?php

namespace Diviky\LaravelComponents\Concerns;

use Illuminate\Support\Facades\Auth;

trait Authorize
{
    protected array $allowedAction = [
        'show' => 'read-only',
        'view' => 'read-only',
        'create' => 'create-only',
        'update' => 'update-only',
        'import' => 'update-only',
        'delete' => 'delete-only',
        'export' => 'read-only',
        'download' => 'read-only',
    ];

    private function isAuthorized(): bool
    {
        if (empty($this->action)) {
            return true;
        }

        $user = Auth::user();

        if (! $user) {
            return true;
        }

        if (! isset($this->allowedAction[$this->action])) {
            return true;
        }

        return ! $user->isAuthorizationRevoked([$this->allowedAction[$this->action]]);
    }

    private function isCan(): bool
    {
        if (empty($this->can)) {
            return true;
        }

        $user = Auth::user();

        if (! $user) {
            return true;
        }

        return $user->can($this->can);
    }

    private function hasRole(): bool
    {
        if (empty($this->role)) {
            return true;
        }

        $user = Auth::user();

        if (! $user) {
            return true;
        }

        return $user->hasAnyRole($this->role);
    }
}
