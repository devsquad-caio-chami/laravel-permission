<div>
    <x-jet-secondary-button wire:click="toggle">
        @if ($role->hasPermissionTo($permission))
            <x-icon class="w-4 h-4" name="check" />
        @else
            <x-icon class="w-4 h-4" name="ban" />
        @endif
    </x-jet-secondary-button>
</div>
