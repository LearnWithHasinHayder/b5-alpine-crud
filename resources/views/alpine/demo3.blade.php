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
    <div x-data="person">
        <p x-text="name"></p>
        <p x-text="age"></p>
        <p x-text="email"></p>
        <button @click="age=57" class="click">Update</button>
        <hr>
        <input type="text" x-model="name"><br>
        <input type="text" x-model="age"><br>
        <input type="text" x-model="email"><br>
    </div>

    <script>
        const person = {
            name: 'John Doe',
            age: 30,
            email: 'john@doe.com'
        }
    </script>
</body>

</html>