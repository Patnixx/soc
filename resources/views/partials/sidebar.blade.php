<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <!-- section -->
    <div class="flex">
        <div class="fixed top-0 left-0 h-screen w-16 m-0 flex flex-col bg-gray-900 text-white shadow-lg">
            <x-icon-div :icon="'bi bi-house'" :text="'Home'"/>
            <x-icon-div :icon="'bi bi-fire'" :text="'Fire'"/>
            <x-icon-div :icon="'bi bi-apple'" :text="'Apple'"/>
            <x-icon-div :icon="'bi bi-lightning'" :text="'Lightning'"/>
            <x-icon-div :icon="'bi- bi-android'" :text="'Android'"/>
        </div>
    </div>
    <!-- endsection -->
</body>
</html>