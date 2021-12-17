<div>
    <x-jet-danger-button wire:click="$set('confirmingDelete', true)">Destroy</x-jet-danger-button>
    <x-jet-confirmation-modal wire:key="{{ $tenantId }}" wire:model="confirmingDelete">
        <x-slot name="title">
            {{ __('Delete Brand') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this brand?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingDelete')">
                Nevermind
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="destroy">
                Delete
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
