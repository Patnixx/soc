<!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
    <div id="language-popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 text-center">
        <h2 class="text-xl font-bold mb-4">{{__('lang.select-lang')}}</h2>
        <div class="flex justify-center space-x-4">
            <button onclick="setLanguage('en')" class="px-4 py-2 bg-blue-500 text-white rounded"><span class="fi fi-gb"></span> {{__('lang.english')}}</button>
            <button onclick="setLanguage('sk')" class="px-4 py-2 bg-red-500 text-white rounded"><span class="fi fi-sk"></span></span> {{__('lang.slovak')}}</button>
        </div>
        <button onclick="closePopup()" class="mt-4 px-4 py-2 bg-gray-400 text-white rounded">{{__('lang.close')}}</button>
    </div>
    </div>

    <script>
    function showPopup() {
        document.getElementById('language-popup').classList.remove('hidden').classList.add('flex');
    }

    function closePopup() {
        document.getElementById('language-popup').classList.add('hidden').classList.remove('flex');
    }

    function setLanguage(lang) {
        fetch('/set-language', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ language: lang })
        }).then(() => {
            location.reload(); // Reload the page to apply the language setting
        });
    }
    </script>