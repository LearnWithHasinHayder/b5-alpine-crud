<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css">
</head>

<body>
    <h1>Advanced Javascript</h1>
    <h2>{{ $title }}</h2>

    <!-- <div x-data="{message:'Hello from Ostad Batch 4',date:'Nov 19, 2024'}"> -->
    <div x-data="data">
        <p x-text="message"></p>
        <p x-text="date"></p>
        <p x-text="date"></p>
        <p x-text="date"></p>
        <p x-text="date"></p>
        <p x-text="date"></p>
        
        <button @click="date='14th November, 2024'" class="click">Click Me</button>

        <h1 x-text="date"></h1>
    </div>

    <script>
        const data = {
            message: 'Hello from Ostad Batch 4',
            date: 'Nov 19, 2024'
        }
    </script>
</body>

</html>