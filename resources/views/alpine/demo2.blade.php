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
        
        <button @click="open=false" class="click">Hide</button>
        <button @click="open=true" class="click">Show</button>
        <button @click="open=!open" class="click">Toggle</button>
        <button @click="toggle()" class="click">Toggle using Builtin Function</button>

        <div x-show="open" x-transition style="height:200px;width:500px; background-color: blanchedalmond; padding:10px">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione consequatur neque debitis numquam optio ipsa facilis quis accusantium esse expedita!
        </div>

    </div>

    <script>
        const data = {
            open:false,
            toggle(){
                this.open = !this.open;
            }
        }
    </script>
</body>

</html>