@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dollar') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('euro.store') }}">
                            @csrf
                            @if($errors->any())
                                <div class="row justify-content-center">
                                    <div class="col-md-11">
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                            {{$errors->first()}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(session('history'))
                                <div class="row-justify-content-center">
                                    <div class="col-md-11">
                                        <div class="alert alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">x</span>
                                            </button>
                                            {{session()->get('history')}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="sum"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Sum') }}</label>
                                <div class="col-md-6">
                                    <input id="sum" type="sum"
                                           class="form-control @error('sum') is-invalid @enderror" name="sum"
                                           value="{{ old('sum') }}" required autocomplete="sum">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dollar"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Kurs Euro') }}</label>
                                <div class="col-md-6">
                                    <input id="dollar" type="dollar"
                                           class="form-control @error('dollar') is-invalid @enderror" name="dollar"
                                           value="{{$course}}" required autocomplete="dollar"
                                           disabled>
                                </div>
                            </div>
                            <div class="form-group row mb-0 ">
                                <div class="card-body">
                                    <a href="{{route('home')}}">
                                        <button type="button" class="btn btn-danger">Назад</button>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <button type="submit" class="btn btn-warning"> Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



