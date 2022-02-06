@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Broker Details</h1>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-default float-right" href="{{ route('brokers.index') }}">
                    Back
                </a>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                @include('brokers.show_fields')
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2>Trades</h2>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table" id="trades-table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Symbol</th>
                                            <th>Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($trades as $trade)
                                        <tr>
                                            <td>{{ $trade->date->format(config('app.date_format')) }}</td>
                                            <td>{{ $trade->symbol->name }}</td>
                                            <td class="{{ $trade->getUIClass() }}">{{ $trade->qty }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>Open Positions</h2>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if($positions->count() == 0)
                            <p class="text-center">No open positions.</p>
                            @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Symbol</th>
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($positions as &$position)
                                    <tr>
                                        <td>{{ $position->symbol->name }}</td>
                                        <td>{{ $position->qty }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
