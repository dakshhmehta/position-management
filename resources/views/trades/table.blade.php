<div class="table-responsive">
    <table class="table" id="trades-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Broker</th>
                <th>Symbol</th>
                <th>Qty</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trades as $trade)
            <tr>
                <td>{{ $trade->date->format(config('app.date_format')) }}</td>
                <td>{{ $trade->broker->name }}</td>
                <td>{{ $trade->symbol->name }}</td>
                <td class="{{ $trade->getUIClass() }}">{{ $trade->qty }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['trades.destroy', $trade->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('trades.show', [$trade->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('trades.edit', [$trade->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn
                        btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
