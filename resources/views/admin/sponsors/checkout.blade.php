@extends('layouts.admin')
@section('content')
<section id="paymentForm" class="d-flex justify-content-center align-items-center">

    <div class="left d-flex justify-content-center align-items-center">
        <form id="payment-form" action="{{ route('admin.paypage')}}" method="GET">
            @csrf
            <div id="dropin-container"></div>
            <input type="hidden" value="{{ $apartment->id }}" name="apartment_id" id="apartemnt_id">
            <input type="hidden" value="{{ $sponsor->id }}" name="sponsor_id" id="sponsor_id">
            <input id="payBtn" class="payBtn btn btn-outline-success mx-auto d-block my-3" type="submit" value="Procedi al pagamento"/>
            <input type="hidden" id="nonce" name="payment_method_nonce" />
        </form>
    </div>

    <div class="right d-flex flex-column justify-content-around h-100 p-5">

        <h1>Riepilogo acquisto</h1>

        <div>
            <div id="previewApp" class="selectedApp my-5 d-flex justify-content-center">
                <div class="infos w-100 d-flex flex-column justify-content-between">
                    <h2 id="selTitle" class="fw-bold">{{ $apartment->title }}</h2>
                    <div class="d-flex justify-content-between mb-3">
                        <div class="address">
                            <i class="fa-solid fa-location-dot me-3"></i> <span id="selAddress" class="fs-5 fw-bold">{{ $apartment->address }}</span>
                        </div>
                        <div class="category">
                            <span id="selIcon" class="me-3">{!! $apartment->category->img !!}</span> <span id="selCategory" class="fs-5 fw-bold">{{ $apartment->category->name }}</span>
                        </div>
                    </div>
                    <div>
                        <h6>- Sponsorizzazioni attive:</h6>
                        <div class="sponsors row" id="selSponsor">
                            @foreach ($apartment->sponsors as $sponsor)
                                <div class="mb-2"><span class="{{ $sponsor->name }}"></span><span>{{ $sponsor->name }}</span></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sponsorToAdd d-flex mb-4">
            <div class="leftAdd">
                <div class="medal mx-auto {{ $sponsor->name }}">

                </div>
            </div>
            <div class="rightAdd">
                <div class="d-flex align-items-center justify-content-around">
                    <h2 class="mb-0">{{ $sponsor->name }}</h2>
                    <h2 class="">€ {{ $sponsor->price }}</h2>
                </div>
            </div>
        </div>
        <div class="text-center">
            <p>- Il seguente abbonamento ha durata : <span class="text-success">{{ $sponsor->time }} ore</span> -</p>
        </div>
    </div>

</section>

    <script type="text/javascript">
        const form = document.getElementById('payment-form');
        const payBtnHTML = document.getElementById('payBtn');

        braintree.dropin.create({
            authorization: 'sandbox_8hmq8yn9_j9pykhw8fynn6t4g',
            container: '#dropin-container'
        }, (error, dropinInstance) => {
            if (error) console.error(error);

            const cardHeaderHTML = document.querySelector('.braintree-sheet__text');
            const labelsHTML = document.querySelectorAll('.braintree-form__label');
            const errorsHTML = document.querySelectorAll('.braintree-form__field-error');
            cardHeaderHTML.innerHTML = 'Inserisci Carta';
            cardHeaderHTML.style.fontSize = '.8rem';

            for(let i = 0; i < labelsHTML.length; i++){
                if(i == 0){
                    labelsHTML[i].innerHTML = 'Numero Carta'
                }
                else if(i == 1){
                    labelsHTML[i].innerHTML = `Data Scadenza <small class="text-secondary">(mm/yy)</small>`
                }
                else if(i == 2){
                    labelsHTML[i].innerHTML = 'Salva Carta'
                }
            }

            form.addEventListener('submit', event => {
                event.preventDefault();


                dropinInstance.requestPaymentMethod((error, payload) => {
                    if (error) console.error(error);

                    document.getElementById('nonce').value = payload.nonce;
                    payBtnHTML.value = 'Attendi un momento...'
                    console.log(payload);
                    form.submit();
                });
            });
        });
    </script>

@endsection
