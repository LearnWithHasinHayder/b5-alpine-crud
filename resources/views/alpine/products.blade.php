<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products CRUD</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100" x-data="data">

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Products Dashboard</h1>

        <!-- Create Form -->
        <form @submit.prevent="saveProduct()" id="createProductForm" class="mb-4 bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold mb-2">Add New Product</h2>
            <div class="grid grid-cols-3 gap-4">
                <input type="text" x-model="name" id="name" placeholder="Name" class="border p-2 rounded" required>
                <input type="text" x-model="description" id="description" placeholder="Description" class="border p-2 rounded" required>
                <input type="number" x-model="price" id="price" placeholder="Price" class="border p-2 rounded" required>
            </div>
            <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add Product</button>
        </form>

        <!-- Products List -->
        <table class="w-full bg-white rounded shadow">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2 text-left">Name</th>
                    <th class="p-2 text-left">Description</th>
                    <th class="p-2 text-left">Price</th>
                    <th class="p-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody id="productsList">
                <!-- Products will be dynamically inserted here -->
                <template x-for="product in products" :key="product.id">
                    <tr>
                        <td class="p-2" x-text="product.name"></td>
                        <td class="p-2" x-text="product.description"></td>
                        <td class="p-2" x-text="product.price"></td>
                        <td class="p-2 flex gap-2">
                            <button @click="edit(product)" class="edit-btn px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600" data-id="1">Edit</button>
                            <button @click="deleteProduct(product)" class="delete-btn px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600" data-id="1">Delete</button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>

        <!-- Edit Product Modal -->
        <div x-show="open" id="editProductModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center" style="display: none;">
            <div class="bg-white p-4 rounded shadow w-1/3">
                <h2 class="text-lg font-semibold mb-2">Edit Product</h2>
                <form @submit.prevent id="editProductForm">
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Name</label>
                        <input x-model="editProduct.name" type="text" id="editName" class="border p-2 rounded w-full" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Description</label>
                        <input x-model="editProduct.description" type="text" id="editDescription" class="border p-2 rounded w-full" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Price</label>
                        <input x-model="editProduct.price" type="number" id="editPrice" class="border p-2 rounded w-full" required>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button @click="open=false" type="button" id="cancelEdit" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
                        <button @click="updateProduct()" type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const data = {
            products: @json($products),
            name: '',
            description: '',
            price: '',
            editProduct:{
                id: '',
                name: '',
                description: '',
                price: ''
            },
            open:false,
            saveProduct() {
                // console.log(this.name, this.description, this.price);
                axios.post('/products', {
                    name: this.name,
                    description: this.description,
                    price: this.price
                }).then(response => {
                    alert(response.data.message)
                    // this.products.push(response.data.product)
                    this.fetchProducts()
                })
            },
            fetchProducts(){
                axios.get('/products').then(response => {
                    this.products = response.data
                })
            },
            deleteProduct(product){
                if(confirm("Are you sure?")){
                    axios.delete(`/products/${product.id}`).then(response => {
                        alert(response.data.message)
                        // this.products = this.products.filter(item => item.id !== product.id)
                        this.fetchProducts()
                    })
                }
            },
            edit(product){
                this.editProduct = {...product}
                this.open=true
            },
            updateProduct(){
                axios.put(`/products/${this.editProduct.id}`, this.editProduct).then(response => {
                    alert(response.data.message)
                    this.open=false
                    this.fetchProducts()
                })
            }


        }
    </script>

</body>

</html>