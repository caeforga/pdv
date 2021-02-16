<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <h1 class="text-2xl">Editar datos de cliente</h1>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <div class="flex flex-col h-screen bg-gray-100">
                        <div class="grid place-items-center mx-2 my-5 sm:my-5">
                            <form @submit.prevent="submit">
                            <div class="grid">
                                <div class="grid grid-rows-4">
                                    <div>
                                        <label for="nombre" class="block text-xs font-bold text-gray-600 uppercase">Nombre</label>
                                        <input id="cod" type="text" placeholder="nuevo nombre de cliente" v-model="Cliente.nombre"  />
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono" class="block text-xs font-bold text-gray-600 uppercase">teléfono</label>
                                        <input type="text" class="form-control" placeholder="nuevo número" v-model="Cliente.telefono" id="descripcion" tabindex="2">
                                    </div>
                                    <button type="submit" class="w-full py-3 mt-3 bg-gray-800 rounded-sm font-medium text-white uppercase rounded focus:outline-none hover:bg-gray-700 hover:shadow-none"> Cambiar datos</button>
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
        props: ['client'],
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
        created() {
            this.Cliente = this.client
        },
        methods: {
            submit() {
                this.$inertia.put('/clientes/update', this.Cliente)
            },
        },
    }
</script>
