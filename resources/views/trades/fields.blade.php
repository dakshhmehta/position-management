<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control','id'=>'date']) !!}
</div>
@push('page_scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush


<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}<br/>
    {!! Form::radio('type', 'buy', null, ['id'=>'type_buy']) !!} <label for="type_buy">Buy</label>
    {!! Form::radio('type', 'sell', null, ['id'=>'type_sell']) !!} <label for="type_sell">Sell</label>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('broker_id', 'Broker:') !!}<br/>
    {!! Form::select('broker_id', $brokers->pluck('name', 'id'), null, ['class' => 'form-control', 'id'=>'broker_id']) !!} 
</div>

<div class="form-group col-sm-6">
    {!! Form::label('symbol_id', 'Symbol:') !!}<br/>
    {!! Form::select('symbol_id', $symbols->pluck('name', 'id'), null, ['class' => 'form-control', 'id'=>'symbol_id']) !!} 
</div>

<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qty', 'Qty:') !!}
    {!! Form::number('qty', null, ['class' => 'form-control', 'step' => 1]) !!}
</div>