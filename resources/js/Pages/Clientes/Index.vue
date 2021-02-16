<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">
                <h1 class="text-2xl">Clientes <i class="fas fa-users"></i></h1>
                <inertia-link :href="$route('clientes.create')"><button class="relative bg-green-500 text-white p-1 rounded font-bold">Agregar</button></inertia-link>
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
                                        <th class="text-gray-300">Nombre</th>
                                        <th class="text-gray-300">Teléfono</th>
                                        <th class="text-gray-300">Editar</th>
                                        <th class="text-gray-300">Eliminar</th>
                                    </tr>
                                </thead>
                                <tr class="bg-white border-4 border-gray-200" v-for="client of clients" :key="client.id">
                                    <td class="text-center ml-2 font-semibold">{{ client.nombre }}</td>
                                    <td class="text-center ml-2 font-semibold">{{ client.telefono }}</td></td>
                                    <td>
                                        <inertia-link :href="$route('clientes.edit', {cliente: client})"><button class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                                        <i class="far fa-edit"></i>
                                        </button></inertia-link>
                                    </td>
                                    <td>
                                        <inertia-link :href="$route('clientes.destroy', {cliente: client})" method="delete"><button class="bg-red-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black "> <i class="fas fa-trash-alt"></i>
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
        props: ['clients'],
        components: {
            AppLayout,
        },
    }
</script>
