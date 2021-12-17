<div class="text-gray-800">
    <x-icon class="w-4 h-4 cursor-pointer text-white" wire:click="$set('confirmingDelete', true)" x-show="show"
        name="trash" />
    <x-jet-confirmation-modal wire:model="confirmingDelete">
        <x-slot name="title">
            {{ __('Delete Role') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this role?') }}
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
