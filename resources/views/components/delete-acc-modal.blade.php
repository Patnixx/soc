<!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
<div id="delete-account-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg p-6 text-center">
        <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">{{ __('profile.delete-question') }}</h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('profile.delete-undone') }}</p>
        
        <form method="POST" action="{{route('profile.delete.account')}}">
            @csrf
            @method('delete')

            <div class="mt-4 flex justify-center">
                <input type="password" name="password" placeholder="{{ __('profile.delete-account-password') }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 rounded-md shadow-sm mt-1 block w-3/4 pl-2" required>
            </div>

            <div class="mt-4 flex justify-center space-x-4">
                <!-- Close Button -->
                <button onclick="closeModal()" class="mt-4 px-4 py-2 bg-gray-400 text-white hover:bg-gray-500 rounded transition-all ease-linear duration-300">
                    {{__('lang.close')}}
                </button>
                <button type="submit" class="mt-4 px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500 transition-all ease-linear duration-300 ml-3">
                    {{ __('profile.delete-account-btn') }}
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function showModal() {
        document.getElementById('delete-account-modal').classList.remove('hidden').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('delete-account-modal').classList.add('hidden').classList.remove('flex');
    }
</script>