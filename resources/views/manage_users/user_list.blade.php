@extends('template.main_template')

@section('content')

    <div class="row">
        <table class="table">
            <thead class="thead-default">
            <tr>
                <th>#</th>
                <th>Support Agent</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <?php $n = 0;?>
            @foreach($users as $user)
                <tr>
                    <th>{{ ++$n }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop
