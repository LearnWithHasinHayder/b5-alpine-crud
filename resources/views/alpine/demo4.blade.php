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
        <ul>
            <template x-for="person,index in persons" :key="index">
                <!-- <li x-text="`${index} - ${person.name}`"></li> -->
                 <li>
                    <input type="text" x-model="person.name">
                 </li>
            </template>
        </ul>
        <button @click="console.log(persons)" class="click"> Update </button>
    </div>

    <script>
        const data = {
            persons: [
                { name: 'John Doe', age: 30, email: 'john@example.com' },
                { name: 'Jane Doe', age: 25, email: 'jane@example.com' },
                { name: 'Jim Doe', age: 35, email: 'jim@example.com' }
            ]
        }
    </script>
</body>

</html>