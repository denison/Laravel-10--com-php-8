{!! Form::open(['route' => ['companies.destroy', $id], 'method' => 'delete']) !!}
    <div style="display: flex;align-items: center; justify-content: center;">
        <div class='btn-group'>
            {{-- <a href="{{ route('companies.show', $id) }}" class='btn btn-default btn-xs'>
                <i class="glyphicon glyphicon-eye-open"></i>
            </a> --}}
            <a href="{{ route('companies.edit', $id) }}" class='btn btn-default btn-xs'>
                <i class="fas fa-edit"></i>
            </a>
            {!! Form::button('<i class="fas fa-trash-alt"></i>', [
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'onclick' => "return confirm('OK?')"
            ]) !!}
        </div>

    </div>
{!! Form::close() !!}