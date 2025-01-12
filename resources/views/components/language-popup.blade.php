<!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
@if (session('show_language_popup'))
    <div id="language-popup" 
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 {{ session('show_language_popup') ? '' : 'hidden' }}">
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <h2 class="text-xl font-bold mb-4">Select Your Language</h2>
            <div class="flex justify-center space-x-4">
                <button onclick="setLanguage('en')" class="px-4 py-2 bg-blue-500 text-white rounded">🇬🇧 English</button>
                <button onclick="setLanguage('sk')" class="px-4 py-2 bg-red-500 text-white rounded">🇸🇰 Slovak</button>
            </div>
        </div>
    </div>

    <script>
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
@endif