@php
    $title = __('在庫管理');
@endphp
@extends('layouts/mk_frame')

@section('content')
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('名前') }}</th>
                    <th>{{ __('総在庫数') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stockList as $stock)
                    <tr>
                    	<a href="{{ url('stock/'.$stock->id) }}">
                        <td>{{ $stock->product_id }}</a></td>
                        <td>{{ $stock->name }}</td>
                        <td>{{ $stock->total_stock }}</td>
                        </a>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection