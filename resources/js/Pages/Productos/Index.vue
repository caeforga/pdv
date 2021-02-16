<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">
                <h1 class="text-2xl">Productos <i class="fas fa-box"></i></h1>
                <inertia-link :href="$route('productos.create')"><button class="relative bg-green-500 text-white p-1 rounded font-bold">Agregar</button></inertia-link>
            </h2>
        </template>

        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="min-w-full table-auto">
                                <thead class="justify-between">
                                    <tr class="bg-gray-800">
                                        <th class="text-gray-300">Código de barras</th>
                                        <th class="text-gray-300">Descripción</th>
                                        <th class="text-gray-300">Precio de compra</th>
                                        <th class="text-gray-300">Precio de venta</th>
                                        <th class="text-gray-300">Utilidad</th>
                                        <th class="text-gray-300">Existencia</th>
                                        <th class="text-gray-300">Editar</th>
                                        <th class="text-gray-300">Eliminar</th>
                                    </tr>
                                </thead>
                                <tr class="bg-white border-4 border-gray-200" v-for="product of products" :key="product.id">
                                    <td class="text-center ml-2 font-semibold">{{ product.codigo_barras }}</td>
                                    <td class="text-center ml-2 font-semibold">{{ product.descripcion }}</td>
                                    <td class="text-center ml-2 font-semibold">{{ product.precio_compra }}</td>
                                    <td class="text-center ml-2 font-semibold">{{ product.precio_venta }}</td>
                                    <td class="text-center ml-2 font-semibold">{{ product.precio_venta - product.precio_compra }}</td>
                                    <td class="text-center ml-2 font-semibold">{{ product.existencia }}</td>
                                    <td>
                                        <inertia-link :href="$route('productos.edit', {producto: product})"><button class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                                        <i class="far fa-edit"></i>
                                        </button></inertia-link>
                                    </td>
                                    <td>
                                        <inertia-link :href="$route('productos.destroy', {producto: product})" method="delete"><button class="bg-red-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black "> <i class="fas fa-trash-alt"></i>
                                        </button></inertia-link>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        props: ['products'],
        components: {
            AppLayout,
        },
    }
</script>
