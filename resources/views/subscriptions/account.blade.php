<style>
    .blue-color {
        color:blue;
    }
     
    .green-color {
        color:green;
    }
     
    .teal-color {
        color:teal;
    }
     
    .yellow-color {
    color:yellow;
    }
    
    .red-color {
        color:red;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Minha Assinatura') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(Auth::user()->subscription('default'))
                        @if(Auth::user()->subscription('default')->onGracePeriod())
                            <a href="{{route('subscriptions.reactivateSubscription')}}"  class="btn btn-outline-success" type="button">
                                <i class="bi bi-check2-square"></i> Reativar Assinatura
                            </a>
                        @else
                            <a href="{{route('subscriptions.unsubscribe')}}"  class="btn btn-outline-danger" type="button">
                                 <i class="bi bi-x-octagon-fill"></i> Cancelar Assinatura
                            </a>
                        @endif
                    @else
                         <h4>Olá, {{ Auth::user()->name }}!</h4>
                         <p>
                                Você ainda não possui nenhuma assinatura conosco.
                            <br/>
                                Veja os nossos planos e  <a href="#" title="clique aqui" alt="clique aqui"> assine já! </a>
                         </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    @if(Auth::user()->subscription('default'))
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Preço</th>
                            <th>Download</th>
                        
                        </tr>
                    </thead>
                    <tbody>                    
                        @foreach($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                            <td>{{ $invoice->total() }}</td>
                            <td>
                                <a href="{{ route('subscriptions.invoice.download', $invoice->id) }}" title="Download da Fatura" alt="Clique aqui para fazer o download de sua fatura"><i class="bi bi-file-earmark-pdf-fill green-color"></i></a>
                            </td>
                        </tr>
                        @endforeach                   
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>

