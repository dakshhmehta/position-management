<!-- Date Field -->
<div class="col-sm-12">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $trade->date }}</p>
</div>

<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $trade->type }}</p>
</div>

<!-- Qty Field -->
<div class="col-sm-12">
    {!! Form::label('qty', 'Qty:') !!}
    <p>{{ $trade->qty }}</p>
</div>

<!-- Broker Id Field -->
<div class="col-sm-12">
    {!! Form::label('broker_id', 'Broker Id:') !!}
    <p>{{ $trade->broker_id }}</p>
</div>

<!-- Symbol Id Field -->
<div class="col-sm-12">
    {!! Form::label('symbol_id', 'Symbol Id:') !!}
    <p>{{ $trade->symbol_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $trade->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $trade->updated_at }}</p>
</div>

