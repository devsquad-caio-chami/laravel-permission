<div>
    <x-icon class="w-2 h-2 cursor-pointer" wire:click="$set('confirmingDelete', true)" x-show="show" name="trash" />
    <x-jet-confirmation-modal wire:model="confirmingDelete">
        <x-slot name="title">
            {{ __('Delete Post') }}
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
