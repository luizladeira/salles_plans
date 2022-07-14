<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                     <form action="#" method="post">    
                            <div class="col-span-6 sm:col-span-4 py-2">
                                <input type="text" name="card-hold-name" id="card-hold-name" placeholder="Digite o nome igual ao do Cartão" value="" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"/>
                            </div>

                            <div class="col-span-6 sm:col-span-4 py-2">
                                <div id="card-element" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"></div>
                            </div>
                            
                            <button type="submit">Enviar</button>
                     </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>

const stripe = Stripe("{{config('cashier.key')}}");
const elements = stripe.elements();
const cardElement = elements.create('card'); //dados do cartão
cardElement.mount('#card-element');

</script>