<div>
    <x-jet-button wire:click="$set('open', true)">{{ __('Create New Brand') }}</x-jet-button>

    <x-jet-dialog-modal wire:model="open" maxWidth="md">
        <x-slot name="title">
            {{ __('Create New Brand') }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4 mb-4">
                <x-jet-label for="name" value="{{ __('Brand Name') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="brand.name" autofocus />
                <x-jet-input-error for="brand.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="organization_id" value="{{ __('Organization') }}" />
                <x-select wire:model.defer="brand.organization_id" :options="$this->organizationOptions->all()" />
                <x-jet-input-error for="brand.organization_id" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">Cancel</x-jet-secondary-button>
            <x-jet-button wire:click="save">Save</x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
