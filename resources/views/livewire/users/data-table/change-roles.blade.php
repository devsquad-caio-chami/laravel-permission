<div class="ml-2">
    <x-icon class="w-4 h-4 cursor-pointer" wire:click="$set('editing', true)" name="pencil" />
    <x-jet-dialog-modal wire:model="editing" maxWidth="md">
        <x-slot name="title">
            {{ __('Change User Roles') }}
        </x-slot>

        <x-slot name="content">
            <div>
                <label for="team_id" class="block text-sm font-medium text-gray-700">Location</label>
                <select multiple wire:model.defer="team_id" id="team_id" name="team_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    @foreach($tenants as $tenant)
                        <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                    @endforeach
                </select>
            </div>
        @foreach ($this->roleOptions as $role)
                <label class="flex items-center">
                    <x-jet-checkbox wire:model.defer="roleNames" :value="$role" />
                    <span class="ml-2 text-sm text-gray-600">{{ $role }}</span>
                </label>
            @endforeach
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('editing', false)">
                Cancel
            </x-jet-secondary-button>
            <x-jet-button wire:click="save">Save</x-jet-button>
        </x-slot>


    </x-jet-dialog-modal>
</div>
