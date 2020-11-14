@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Carga de productos externa</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{url('/external-products-load')}}" id="form">
                            @csrf
                            <button class="btn btn-primary" type="button" id="buttonSend" onclick="formSend()">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="loader" style="display: none"></span>
                                Cargar productos
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function formSend(){
            $('#loader').show();
            $('#buttonSend').prop('disabled', true);
            $('#form').submit();
        }
    </script>
    @endsection
