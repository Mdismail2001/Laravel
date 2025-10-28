<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Task Manager')</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 flex flex-col items-center ">

<x-navbar 
    title="To do App"
    :links="[
        'All Tasks'=> route('alltasks'), 
        'Create Task' => route('create-task'),
    ]"
    username="Ismail"
/>

  @yield('content')

  {{-- ✅ This stack is for modals --}}
  @stack('modals')

</body>
</html>
