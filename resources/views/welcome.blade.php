
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="app">
                    <router-view name="companiesIndex"></router-view>
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
@endsection
