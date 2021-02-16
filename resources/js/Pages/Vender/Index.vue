<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <h1>Nueva venta <i class="fas fa-shopping-cart"></i></h1>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-col md:flex-row pb-4 mb-4">
            <div class="w-64 font-bold h-6 mx-2 mt-3 text-gray-800">Cliente
                <div class="text-xs font-normal leading-none text-gray-500">Aquí aparecerán los productos de la venta
Escanea el código de barras o escribe y presiona Enter</div>
            </div>
            <div class="flex-1">
                <div class="flex flex-col md:flex-row">
                    <div>
                        <form @submit.prevent="terminarOCancelarVentas()">
                        
                            <select v-model="selected" class="mx-2 flex-1 h-10 mt-2 form-select w-full">
                                <option v-for="client in clients" :key="client.id" v-bind:value="client.nombre">
                                    {{ client.nombre }} 
                                </option>
                            </select>

                            <div v-if="$page.props.session.productos !== null">
                                <div>
                                    <button @click="terminarOCancelarVenta('terminar')" name="accion" value="terminar" class="bg-green-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black "> Terminar venta
                                    </button>
                                    <button @click="terminarOCancelarVenta('cancelar')" name="accion" value="cancelar" class="bg-red-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black "> Cancelar venta
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                    
                    <div>
                        <form @submit.prevent="submitAddProducto">
                            <div>
                                <label for="codigo"></label>
                                <input type="text" v-model="form.codigo" placeholder="codigo de barras" class="mx-4 flex-1 h-10 mt-2 form-select w-full">
                            </div>
                        </form>
                    </div>
                </div>
                <div v-if="$page.props.session.productos !== null">
                        <h2>Total: {{this.total}}</h2>
                        <div class="col-md-12">
                            <table class="min-w-full table-auto">
                                <thead class="justify-between">
                                    <tr class="bg-gray-800">
                                        <th class="text-gray-300">Código de barras</th>
                                        <th class="text-gray-300">Descripción</th>
                                        <th class="text-gray-300">Precio de venta</th>
                                        <th class="text-gray-300">Cantidad</th>
                                        <th class="text-gray-300">Quitar</th>
                                    </tr>
                                </thead>
                                <tr class="bg-white border-4 border-gray-200" v-for="producto of $page.props.session.productos" :key="producto.id">
                                    <td class="text-center ml-2 font-semibold">{{ producto.codigo_barras }}</td>
                                    <td class="text-center ml-2 font-semibold">{{ producto.descripcion }}</td>
                                    <td class="text-center ml-2 font-semibold">{{ producto.precio_venta }}</td>
                                    <td class="text-center ml-2 font-semibold">{{ producto.cantidad }}</td>
                                    <td>
                                        <form @submit.prevent="destroy(producto.id)">
                                            <button class="bg-red-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black "> <i class="fas fa-trash-alt"></i>
                                        </button>
                                        </form>
                                        <!-- <button @click="destroy()" class="bg-red-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black "><i class="fas fa-trash-alt"></i></button> -->
                                        <!-- <inertia-link :href="$route('vender/quitarProductoDeVenta')" method="delete"><button class="bg-red-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black "> <i class="fas fa-trash-alt"></i>
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
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        props: ['total', 'clients'],
        components: {
            AppLayout,
        },
        data() {
            return {
                form : {
                    codigo : '',
                },
                formD : {
                    prod : '',
                },
                formToC : {
                    accion : '',
                    cliente : ''
                },
                selected : '',
                productos : this.$page.props.session,
            }
        },
        
        methods: {
            submitAddProducto() {
                this.$inertia.post('/vender/add', this.form);
            },
            destroy(id) {
                this.formD.prod=id;
                this.$inertia.delete(route('quitarProductoVenta', this.formD));
            },
            terminarOCancelarVenta(accion) {
                this.formToC.accion=accion;
                this.formToC.cliente=this.selected;
                console.log(this.formToC);
                this.$inertia.post(route('terminarOCancelarVenta', this.formToC))
            },
            terminarOCancelarVentas(){}
        },
    }
</script>
