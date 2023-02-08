@extends('layouts.admin')
@section('content')
<section>
    <div class="container px-4 mndv">
        <div class="row  g-3">

            <div class="col-lg-4 col-md-6 col-sm-12 cardb cardb1">
                <h1 class="text-center">Settimanale</h1>

                <div class="pric">
                    <span class="nowp text-center">
                        <i class="fa-solid fa-euro-sign"></i>5.99</span>
                    {{-- <span class="befp"></span> --}}
                </div>
                
                <div class="butto">
                    <a class="text-center" href="#">
                        abbonati ora
                    </a>
                </div>

                <ul class="text-center list-unstyled">
                    <li><i class="fa-solid fa-check"></i>motivo generico dove spiegi cose</li>
                    <li><i class="fa-solid fa-xmark"></i>motivo generico</li>
                    <li><i class="fa-solid fa-xmark"></i>motivo generico dove spiegi cose</li>
                    <li><i class="fa-solid fa-check"></i>motivo generico</li>
                    <li><i class="fa-solid fa-xmark"></i>motivo generico</li>
                    <li><i class="fa-solid fa-xmark"></i>motivo generico dove spiegi cose</li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 cardb cardb2">
                <h1 class="text-center">Mensile</h1>

                <div class="pric">
                    <span class="nowp text-center">
                        <i class="fa-solid fa-euro-sign"></i>19.99</span>
                    <span class="befp">23.99</span>
                </div>
                
                <div class="butto">
                    <a class="text-center" href="#">
                        abbonati ora
                    </a>
                </div>

                <ul class="text-center list-unstyled">
                    <li><i class="fa-solid fa-check"></i>motivo generico</li>
                    <li><i class="fa-solid fa-check"></i>motivo generico dove spiegi cose</li>
                    <li><i class="fa-solid fa-xmark"></i>motivo generico dove spiegi cose</li>
                    <li><i class="fa-solid fa-check"></i>motivo generico</li>
                    <li><i class="fa-solid fa-check"></i>motivo generico dove spiegi cose</li>
                    <li><i class="fa-solid fa-xmark"></i>motivo generico</li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 cardb cardb3">
                <h1 class="text-center">Annuale</h1>

                <div class="pric">
                    <span class="nowp text-center">
                        <i class="fa-solid fa-euro-sign"></i>199.99</span>
                    <span class="befp">287.99</span>
                </div>
                
                <div class="butto">
                    <a class="text-center" href="#">
                        abbonati ora
                    </a>
                </div>

                <ul class="text-center list-unstyled">
                    <li><i class="fa-solid fa-check"></i>motivo generico dove spiegi cose</li>
                    <li><i class="fa-solid fa-check"></i>motivo generico dove spiegi cose</li>
                    <li><i class="fa-solid fa-check"></i>motivo generico</li>
                    <li><i class="fa-solid fa-check"></i>motivo generico dove spiegi cose</li>
                    <li><i class="fa-solid fa-check"></i>motivo generico</li>
                    <li><i class="fa-solid fa-check"></i>motivo generico dove spiegi cose</li>
                </ul>
            </div>

        </div>
    </div>
</section>
@include('partials.admin.modal-delete')
@endsection