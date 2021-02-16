<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <h1 class="text-2xl">Nuevo cliente</h1>
            </h2>
        </template>

        <div class="py-1">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <div class="flex flex-col h-screen bg-gray-100">
                        <div class="grid place-items-center mx-2 my-5 sm:my-5">
                            <form @submit.prevent="submit">
                            <div class="grid">
                                <div class="grid grid-rows-4">
                                    <div>
                                        <label for="codigo_barras" class="block text-xs font-bold text-gray-600 uppercase">Nombre</label>
                                        <input id="cod" type="text" placeholder="digite nombre" v-model="Cliente.nombre"  />
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono" class="block text-xs font-bold text-gray-600 uppercase">telefono</label>
                                        <input type="text" class="form-control" placeholder="digite telefono" v-model="Cliente.telefono" id="telefono" tabindex="2">
                                    </div>
                                    <button type="submit" class="w-full py-3 mt-3 bg-gray-800 rounded-sm font-medium text-white uppercase rounded focus:outline-none hover:bg-gray-700 hover:shadow-none"> Crear</button>
                                </div>
                            </div>
                        </form>
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
        data() {
            return {
                Cliente: {
                    nombre: "",
                    telefono: "",
                },
            }
        },
        methods: {
            submit() {
                this.$inertia.post('/clientes/store', this.Cliente)
            },
            /* async handleSubmit() {
                let response = await this.$inertia.post("/productos/store", this.Producto);
            } */
        },
    }
</script>
