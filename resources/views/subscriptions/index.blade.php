<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pagamento') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Dados do Plano:</p>
                    <p>Nome: {{$plan->name}}</p>
                    <p>Valor: {{'R$ '.$plan->price_br}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <form action="{{ route('subscriptions.store') }}" method="post" id="form">
                            @csrf

                            <div class="col-span-6 sm:col-span-4 py-2">
                                <input type="text" name="card-holder-name" id="card-holder-name" placeholder="Digite o nome igual ao do Cartão" value="" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"/>
                            </div>

                            <div class="col-span-6 sm:col-span-4 py-2">
                                <div id="card-element"></div>
                            </div>

                            <div class="col-span-6 sm:col-span-4 py-4 mt-3" style="float:right">
                             <button id="card-buttom" data-secret="{{ $intent->client_secret }}" type="submit" class="btn btn-outline-success" >Enviar</button>
                            </div>
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

//subscription payment - checkout
const form = document.getElementById('form');
const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-buttom');
const clientSecret = cardButton.dataset.secret;


form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const { setupIntent, error } = await stripe.confirmCardSetup(
        clientSecret, {
            payment_method: {
                card: cardElement,
                billing_details: {
                    name: cardHolderName.value //nome do cartao
                }
            }
        }
    );


    //trata o retorno
    if(error){
        alert("Dados Inválidos")
        console.log(error)
        return;
    }


    //criando um token do tipo input
    let token = document.createElement('input') //criando um input
    token.setAttribute('type', 'hidden') //input do tipo hidden
    token.setAttribute('name', 'token') //input com nome de token
    token.setAttribute('value', setupIntent.payment_method) //valor pegando do payment method
    form.appendChild(token) //coloco o input completo de um form
    form.submit() //enviar via submit com js


});




</script>
