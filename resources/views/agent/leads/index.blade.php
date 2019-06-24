@extends('layouts.agent')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1 class=" text-center text-secondary mb-4">My Leads</h1>
            @if ($leads->isEmpty())
            <p>You don't have any leads yet.</p>
            @else
            <div class="card shadow-sm">
                <div class="card-header text-uppercase" style="letter-spacing:0.1em;">{{ $leads->count() == 1 ? $leads->count() . ' Lead' : $leads->count() . ' Leads' }}</div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Last Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leads as $lead)
                            <tr>
                                <td>{{ $lead->id }}</td>
                                <th scope="row">
                                    <a href="{{ route('agent.leads.show', ['user' => $lead]) }}">
                                        {{ $lead->name }}
                                    </a>
                                </th>
                                <td>{{ $lead->phone }}</td>
                                <td>{{ $lead->email }}</td>
                                <td><span class="badge badge-secondary">New</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
