<div>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Brands') }}
            </h2>
            <livewire:tenants.create />
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-users-menu/>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <livewire:tenants.data-table />
            </div>
        </div>
    </div>
</div>
