<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <h1>Inicio</h1>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="mt-5">
                <h3 class="text-gray-600 text-2xl font-medium text-center">Bienvenido</h3>
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://www.timejust.es/wp-content/uploads/2021/01/embalaje1.jpg')">
                        <inertia-link :href="route('productos.index')">
                            <button class="p-1 rounded-full bg-blue-600 text-white mx-5 -mb-5 hover:bg-blue-500 focus:outline-none focus:bg-blue-500"><i class="fas fa-3x fa-arrow-circle-right"></i>
                            </button>
                        </inertia-link>
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">Productos</h3>
                            <span class="text-gray-500 mt-2">ir</span>
                        </div>
                    </div>
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://cdn.ticbeat.com/src/uploads/2018/05/venta.jpg')">
                            <inertia-link :href="route('vender.index')">
                            <button class="p-1 rounded-full bg-blue-600 text-white mx-5 -mb-5 hover:bg-blue-500 focus:outline-none focus:bg-blue-500"><i class="fas fa-3x fa-arrow-circle-right"></i>
                            </button>
                        </inertia-link>
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">Vender</h3>
                            <span class="text-gray-500 mt-2">ir</span>
                        </div>
                    </div>
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://www.elg-asesores.com/images/joomlart/categories/asesoria-com-ventas_002.jpg')">
                            <inertia-link :href="route('ventas.index')">
                            <button class="p-1 rounded-full bg-blue-600 text-white mx-5 -mb-5 hover:bg-blue-500 focus:outline-none focus:bg-blue-500"><i class="fas fa-3x fa-arrow-circle-right"></i>
                            </button>
                        </inertia-link>
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">Ventas</h3>
                            <span class="text-gray-500 mt-2">ir</span>
                        </div>
                    </div>
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://www.questionpro.com/blog/wp-content/uploads/2017/02/0184-768x512.jpg')">
                            <inertia-link :href="route('clientes.index')">
                            <button class="p-1 rounded-full bg-blue-600 text-white mx-5 -mb-5 hover:bg-blue-500 focus:outline-none focus:bg-blue-500"><i class="fas fa-3x fa-arrow-circle-right"></i>
                            </button>
                        </inertia-link>
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">Clientes</h3>
                            <span class="text-gray-500 mt-2">ir</span>
                        </div>
                    </div>
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpp8BZ9aoMgMrkwvxBaU2s4mp_Bwxn3MgdSA&usqp=CAU')">
                            <inertia-link :href="route('ventas.index')">
                            <button class="p-1 rounded-full bg-blue-600 text-white mx-5 -mb-5 hover:bg-blue-500 focus:outline-none focus:bg-blue-500"><i class="fas fa-3x fa-arrow-circle-right"></i>
                            </button>
                        </inertia-link>
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">Acerca de</h3>
                            <span class="text-gray-500 mt-2">ir</span>
                        </div>
                    </div>
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
        components: {
            AppLayout,
        },
    }
</script>
