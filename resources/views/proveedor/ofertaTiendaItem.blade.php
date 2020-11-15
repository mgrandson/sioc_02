@extends('layouts.template')

@section('content')

    <!-- Page Heading -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-dark">
                Oferta: {{$oferta->code}}. Zapato {{ $item->style }} Para {{ $item->gender }} {{ $item->size }}.
            </h6>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group text-center table-responsive" style="height: 250px;">
                    @foreach ($item->photos()->get() as $photo)
                        <img src="{{ asset($photo->path) }}"  id="myImg" class="mh-100 img-fluid img-thumbnail" alt="...">
                    @endforeach
                </div>
            </div>
        </div>


        <div class="card-body">
            <div class="col-lg-12">
                <div class="p-2">
                    <form method="POST">
                        @csrf
                        <input type="hidden" name="offer_id" value="{{ $oferta->id }}" readonly>

                        <div class="form-group row">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection
