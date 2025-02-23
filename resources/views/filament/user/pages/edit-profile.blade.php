<x-filament-panels::page>
    <form wire:submit="updateProfile">
        {{ $this->form }}

        <button type="submit">
            Submit
        </button>
    </form>
</x-filament-panels::page>
