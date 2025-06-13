<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Page Not Found</title>
</head>
<body>
    <div class="h-screen w-screen bg-gray-100 flex justify-center items-center">
        <div class="flex-row justify-center">
            <img src="{{ asset('/images/404.png') }}" alt="404 Not Found" class="">
            <p class="font-bold text-2xl">ERROR 404</p>
            <p>Page Not Found</p>
        </div>
    </div>
</body>
</html>