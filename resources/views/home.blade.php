@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @foreach ($users as $item)
                        @php
                            $first_name = $item->first_name;
                            $last_name = $item->last_name;
                        @endphp
                    @endforeach

                    {{ __('Welcome') }} {{$first_name}} {{$last_name}}, last login was {{ date('jS F, g:iA ',strtotime(Session::get('last_login'))) }}.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
