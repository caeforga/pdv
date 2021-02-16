<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <h1 class="text-2xl">Editar producto</h1>
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
                                        <label for="codigo_barras" class="block text-xs font-bold text-gray-600 uppercase">codigo de barras</label>
                                        <input id="cod" type="text" placeholder="digite codigo de barras" v-model="Producto.codigo_barras"  />
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion" class="block text-xs font-bold text-gray-600 uppercase">descripcion</label>
                                        <input type="text" class="form-control" placeholder="digite descripcion" v-model="Producto.descripcion" id="descripcion" tabindex="2">
                                    </div>
                                    <div class="form-group">
                                        <label for="precio_compra" class="block text-xs font-bold text-gray-600 uppercase">precio de compra</label>
                                        <input type="text" class="form-control" placeholder="digite precio de compra" v-model="Producto.precio_compra" id="compra" tabindex="3">
                                    </div>
                                    <div class="form-group">
                                        <label for="precio_venta" class="block text-xs font-bold text-gray-600 uppercase">precio de venta</label>
                                        <input type="text" class="form-control" placeholder="digite precio de venta" v-model="Producto.precio_venta" id="venta" tabindex="4">
                                    </div>
                                    <div class="form-group">
                                        <label for="existencia" class="block text-xs font-bold text-gray-600 uppercase">cantidad</label>
                                        <input type="text" class="form-control" placeholder="digite cantidad" v-model="Producto.existencia" id="existencia" tabindex="5">
                                    </div>
                                    <button type="submit" class="w-full py-3 mt-3 bg-gray-800 rounded-sm font-medium text-white uppercase rounded focus:outline-none hover:bg-gray-700 hover:shadow-none"> Cambiar</button>
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
        props: ['product'],
        components: {
            AppLayout,
        },
        data() {
            return {
                Producto: {
                    codigo_barras: "",
                    descripcion: "",
                    precio_compra:"",
                    precio_venta:"",
                    existencia:""
                },
            }
        },
        created() {
            this.Producto = this.product
        },
        methods: {
            submit() {
                this.$inertia.put('/productos/update', this.Producto)
            },
        },
    }
</script>
