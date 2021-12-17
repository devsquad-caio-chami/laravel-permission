<div>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Roles And Permissions') }}
            </h2>
            <livewire:roles-and-permissions.roles.create />
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="w-full">
                                <div class="shadow overflow-hidden rounded border-b border-gray-200">
                                    <table class="min-w-full bg-white">
                                        <thead class="bg-gray-800 text-white">
                                            <tr>
                                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm"></th>
                                                @foreach ($roles as $role)
                                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">
                                                        <div class="flex space-x-2" x-data="{show: false}"
                                                            @mouseenter="show = true" @mouseleave="show = false">
                                                            <span>{{ $role->name }}</span>
                                                            <livewire:roles-and-permissions.roles.delete x-show="show"
                                                                :role="$role" wire:key="{{ $role->id }}" />
                                                        </div>
                                                    </th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-700">
                                            @foreach ($permissions as $permission)
                                                @php
                                                    $permissionsLoop = $loop;
                                                @endphp
                                                <tr>
                                                    <td class="text-left py-3 px-4 @if ($permissionsLoop->even) bg-gray-200 @endif">
                                                        {{ $permission->name }}
                                                    </td>

                                                    @foreach ($roles as $role)
                                                        <td class="text-left py-3 px-4 @if ($permissionsLoop->even) bg-gray-200 @endif">
                                                            <livewire:roles-and-permissions.toggle :role="$role"
                                                                :permission="$permission"
                                                                wire:key="{{ $permission->id }}" />
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
