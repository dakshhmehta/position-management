<div class="table-responsive">
    <table class="table" id="symbols-table">
        <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($symbols as $symbol)
            <tr>
                <td>{{ $symbol->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['symbols.destroy', $symbol->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('symbols.show', [$symbol->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('symbols.edit', [$symbol->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
