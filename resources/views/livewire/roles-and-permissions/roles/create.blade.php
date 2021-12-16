<div>
    <x-jet-button wire:click="$set('open', true)">{{ __('Create New Role') }}</x-jet-button>

    <x-jet-dialog-modal wire:model="open" maxWidth="md">
        <x-slot name="title">
            {{ __('Create New Role') }}
        </x-slot>

        <x-slot name="content">
            <x-jet-label for="name" value="{{ __('Role Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autofocus />
            <x-jet-input-error for="name" class="mt-2" />
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancel
            </x-jet-secondary-button>
            <x-jet-button wire:click="save">Save</x-jet-button>
        </x-slot>


    </x-jet-dialog-modal>
</div>
