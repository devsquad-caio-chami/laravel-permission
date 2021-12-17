<div class="mb-5">
    <div class="border-b border-gray-200">
        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
            <a
                href="{{ route('users.index') }}"
                @class([
                    'group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm',
                    'border-indigo-500 text-indigo-600' => Route::is('users.index'),
                    'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' => !Route::is('users.index')
                ])
            >
                <svg
                    @class([
                        '-ml-0.5 mr-2 h-5 w-5',
                        'text-indigo-500' => Route::is('users.index'),
                        'text-gray-400 group-hover:text-gray-500' => !Route::is('users.index')
                    ])
                    class="text-indigo-500 "
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true"
                >
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
                <span>Users</span>
            </a>

            <a
                href="{{ route('roles-and-permissions.index') }}"
                @class([
                    'group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm',
                    'border-indigo-500 text-indigo-600' => Route::is('roles-and-permissions.index'),
                    'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' => !Route::is('roles-and-permissions.index')
                ])
            >
                <svg
                    @class([
                        '-ml-0.5 mr-2 h-5 w-5',
                        'text-indigo-500' => Route::is('roles-and-permissions.index'),
                        'text-gray-400 group-hover:text-gray-500' => !Route::is('roles-and-permissions.index')
                    ])
                    class="text-indigo-500 "
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true"
                >
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                </svg>
                <span>Roles</span>
            </a>

            <a
                href="#"
                @class([
                    'group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm',
                    'border-indigo-500 text-indigo-600' => Route::is('brands.index'),
                    'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' => !Route::is('brands.index')
                ])
            >
                <svg
                    @class([
                        '-ml-0.5 mr-2 h-5 w-5',
                        'text-indigo-500' => Route::is('brands.index'),
                        'text-gray-400 group-hover:text-gray-500' => !Route::is('brands.index')
                    ])
                    class="text-indigo-500 "
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true"
                >
                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                </svg>
                <span>Brands</span>
            </a>
        </nav>
    </div>
</div>
