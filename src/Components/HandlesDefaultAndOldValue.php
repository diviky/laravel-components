<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

trait HandlesDefaultAndOldValue
{
    use HandlesBoundValues;

    /**
     * Undocumented function.
     *
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  string  $language
     */
    private function setValue(
        string $name,
        $bind = null,
        $default = null,
        $language = null
    ): void {
        if ($this->isWired()) {
            return;
        }

        $inputName = static::convertBracketsToDots($name);

        if (! $language) {
            $boundValue = $this->getBoundValue($bind, $inputName);

            $default = is_null($boundValue) ? $default : $boundValue;

            $this->value = old($inputName, $default);

            return;
        }

        if ($bind !== false) {
            $bind = $bind ?: $this->getBoundTarget();
        }

        if ($bind) {
            $default = $bind->getTranslation($name, $language, false) ?: $default;
        }

        $this->value = old("{$inputName}.{$language}", $default);
    }
}
