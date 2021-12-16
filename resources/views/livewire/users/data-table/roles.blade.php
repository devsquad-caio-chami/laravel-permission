<span class=" px-4 py-2 text-xs rounded-xl text-blue-500 flex space-x-2 items-center">
    {{ $value }}
    <livewire:users.data-table.change-roles :roles="$value ?? ''" :userId="$row->id" wire:key="{{ $row->id }}">
</span>
