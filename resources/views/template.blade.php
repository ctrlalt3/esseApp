<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        *{
            scrollbar-width: none;
        }
        *::-webkit-scrollbar {

            display: none;
        }
    </style>
</head>
<body class="flex bg-zinc-100 text-stone-800 overflow-hidden">
    @yield('content')
</body>
</html>