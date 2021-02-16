<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ventas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                        <div class="py-8">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="min-w-full table-auto">
                                                <thead class="justify-between">
                                                    <tr class="bg-gray-800">
                                                        <th class="text-gray-300">Fecha</th>
                                                        <th class="text-gray-300">Cliente</th>
                                                        <th class="text-gray-300">Total</th>
                                                        <th class="text-gray-300">Mostrar</th>
                                                    </tr>
                                                </thead>
                                                <tr class="bg-white border-4 border-gray-200" v-for="venta of ventas" :key="venta.id">
                                                    <td class="text-center ml-2 font-semibold">{{ venta.created_at.slice(0, -17) }}</td>
                                                    <td class="text-center ml-2 font-semibold">{{ venta.id_cliente }}</td>
                                                    <td class="text-center ml-2 font-semibold">{{ venta.total.slice(0, -2) }}</td>
                                                    <td>
                                                        <button @click="show(venta.id)" class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black"><i class="fas fa-eye"></i></button>
                                                        <!-- <inertia-link :href="$route('ventas.show', {Venta: venta})"><button class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black">
                                                        <i class="fas fa-eye"></i>
                                                        </button></inertia-link> -->
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
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
import Ejcomponent from '../../components/ejcomponent.vue'

    export default {
        props : ['ventas'],
        components: {
            AppLayout,
            Ejcomponent,
        },
        data() {
            return {
                form: {
                    idv: '',
                }
            }
        },
        methods: {
            show(id) {
                this.form.idv = id;
                this.$inertia.get(route('ventas.show'), this.form);
            }
        },
    }
</script>
