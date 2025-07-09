<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Review Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-start justify-center min-h-screen py-10 px-4">
    <div class="bg-white w-full max-w-3xl p-8 rounded-xl shadow-lg">
        {{-- alert --}}
        @if (session('success'))
            <div
                class="flex items-start gap-3 bg-green-50 border border-green-300 text-green-700 px-4 py-3 rounded-md mb-6">
                <svg class="w-5 h-5 mt-1 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 10-1.414 1.414L9 13.414l4.707-4.707z"
                        clip-rule="evenodd" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="flex items-start gap-3 bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-md mb-6">
                <svg class="w-5 h-5 mt-1 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10A8 8 0 11.001 10 8 8 0 0118 10zM9 4a1 1 0 012 0v4a1 1 0 01-2 0V4zm1 10a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
                        clip-rule="evenodd" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div
                class="flex items-start gap-3 bg-yellow-50 border border-yellow-300 text-yellow-700 px-4 py-3 rounded-md mb-6">
                <svg class="w-5 h-5 mt-1 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M8.257 3.099c.366-.446.974-.63 1.52-.446.547.184.923.678.923 1.24v9.214c0 .562-.376 1.056-.923 1.24-.546.184-1.154 0-1.52-.446L3.243 9.447a1.5 1.5 0 010-1.894l5.014-6.454z"
                        clip-rule="evenodd" />
                </svg>
                <div>
                    <p class="font-medium">Please fix the following:</p>
                    <ul class="list-disc pl-5 mt-1 space-y-1 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif


        <nav class="border-gray-200">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-center mx-auto p-4">
                <a href="https://yogabayuap.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('assets/images/Logo-fix.png') }}" class="h-20" alt="Yoga Dev" />
                </a>
            </div>
        </nav>

        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Review</h2>

        <form action="{{ route('reviews.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Your Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Your Name<span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" placeholder="John Doe"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                    <input type="email" name="email" id="email" placeholder="your@email.com"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                     value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Subject -->
            <div>
                <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                <input type="text" name="subject" id="subject" placeholder="Feedback about product or service"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required value="{{ old('subject') }}" required>
                @error('subject')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Rating -->
            <div>
                <label for="rating" class="block text-sm font-medium text-gray-700 mb-1">Rating <span class="text-red-500">*</span></label>
                <div class="flex items-center space-x-1" x-data="{ rating: {{ old('rating', 0) }} }">
                    <template x-for="i in 5" :key="i">
                        <svg @click="rating = i" :class="i <= rating ? 'text-yellow-400' : 'text-gray-300'"
                            class="w-6 h-6 cursor-pointer transition-colors duration-150" fill="currentColor"
                            viewBox="0 0 22 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                    </template>
                    <input type="hidden" name="rating" :value="rating" required>
                </div>
                @error('rating')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Review -->
            <div>
                <label for="review" class="block text-sm font-medium text-gray-700 mb-1">Your Review<span class="text-red-500">*</span></label>
                <textarea name="review" id="review" rows="4" placeholder="Write your experience..."
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>{{ old('review') }}</textarea>
                @error('review')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror


            </div>

            <div class="text-right">
                @error('rating')
                    <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                @enderror
                <button type="submit"
                    onclick="return cekRating();"
                    class="bg-gray-900 hover:bg-gray-800 text-white font-medium px-6 py-2 rounded-lg transition duration-200">
                    Submit Review
                </button>
            </div>
        </form>
    </div>

    <div id="ratingModal" tabindex="-1" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full bg-black bg-opacity-40 flex items-center justify-center">
        <div class="relative w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        Invalid Rating
                    </h3>
                    <button type="button" onclick="closeModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="ratingModal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Rating must be between 1 and 5.
                    </p>
                </div>
                <div class="flex justify-end p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="button" onclick="closeModal()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function cekRating() {
            const rating = document.querySelector('input[name="rating"]').value;
            if (rating < 1 || rating > 5) {
                showModal();
                return false;
            }
            return true;
        }

        function showModal() {
            document.getElementById('ratingModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('ratingModal').classList.add('hidden');
        }
    </script>
</body>


</html>
