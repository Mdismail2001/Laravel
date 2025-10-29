<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Task Manager')</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="w-full bg-white flex flex-col items-center ">

<x-navbar 
    title="To do App"
    :links="[
        'All Tasks'=> route('alltasks'), 
        'Progress chart'=> route('progress')
    ]"
    username="Ismail"
/>

  @yield('content')

  {{-- ✅ This stack is for modals --}}
  @stack('modals')

</body>
</html>
