<?php

namespace App\Filament\Components;

use Filament\Forms\Components\TextInput;

class TranslatableInput extends TextInput
{
    protected string $activeLocale;

    public function activeLocale(string $locale): static
    {
        $this->activeLocale = $locale;

        return $this;
    }

    public function setState(mixed $state): static
    {
        $currentState = parent::getState() ?? [];
        $currentState[$this->getActiveLocale()] = $state;

        parent::setState($currentState);

        return $this;
    }

    public function getState(): mixed
    {
        $state = parent::getState();

        // Ensure the state is an array (for JSON fields)
        if (is_array($state)) {
            return $state[$this->getActiveLocale()] ?? '';
        }

        return '';
    }

    public function getActiveLocale(): string
    {
        return $this->activeLocale ?? app()->getLocale();
    }
}
