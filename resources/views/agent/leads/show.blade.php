@extends('layouts.agent')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <a href="{{ url()->previous() }}" class="text-decoration-none">
                <svg style="height:2em" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="arrow-circle-left" class="svg-inline--fa fa-arrow-circle-left fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256s111 248 248 248 248-111 248-248zM256 472c-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216 118.7 0 216 96.1 216 216 0 118.7-96.1 216-216 216zm-12.5-92.5l-115.1-115c-4.7-4.7-4.7-12.3 0-17l115.1-115c4.7-4.7 12.3-4.7 17 0l6.9 6.9c4.7 4.7 4.7 12.5-.2 17.1L181.7 239H372c6.6 0 12 5.4 12 12v10c0 6.6-5.4 12-12 12H181.7l85.6 82.5c4.8 4.7 4.9 12.4.2 17.1l-6.9 6.9c-4.8 4.7-12.4 4.7-17.1 0z"></path></svg>
                <span class="d-inline-block ml-2" style="line-height:2em;vertical-align: middle;">Back to leads</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col py-3">
            <div class="card mb-4 shadow-sm">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <img src="https://www.gravatar.com/avatar/{{ md5( strtolower( trim( $lead->email ) ) ) }}?s=400" class="card-img" alt="{{ $lead->name }}">
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <table class="table table-borderless mb-0" style="max-width:300px">
                                <tbody>
                                    <tr>
                                        <th class="p-2" scope="row" colspan="2">
                                            <h5 class="card-title mb-0">{{ $lead->name }}</h5>
                                            <small class="text-muted">Assigned Agent: {{ $lead->agent->name }}</small>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="p-2" scope="row">Phone</th>
                                        <td class="p-2">{{ $lead->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th class="p-2" scope="row">Email</th>
                                        <td class="p-2">{{ $lead->email }}</td>
                                    </tr>
                                    @if (!empty($lead->created_at))
                                    <tr>
                                        <th class="p-2" scope="row">
                                            <small>Registered</small>
                                        </th>
                                        <td class="p-2">
                                            <small>{{ date_format($lead->created_at, 'M dS, Y \a\t g:i A') }}</small>
                                        </td>
                                    </tr>
                                    @endif
                                    @if (!empty($lead->updated_at))
                                    <tr>
                                        <th class="p-2" scope="row">
                                            <small>Updated</small>
                                        </th>
                                        <td class="p-2">
                                            <small>{{ date_format($lead->updated_at, 'M dS, Y \a\t g:i A') }}</small>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- Most Viewed FSBOs --}}
                    <div class="col-md-5">
                        <div class="card-body">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h5 class="card-title mb-0">Most Viewed FSBOs</h5>
                                        </td>
                                    </tr>
                                    @if ($topViews->isEmpty())
                                    <tr>
                                        <td>
                                            This person hasn't viewed any FSBOs.
                                        </td>
                                    </tr>
                                    @else

                                    @endif
                                    @foreach ($topViews as $view)
                                    <tr>
                                        <td>
                                            <span class="badge badge-primary">{{ $view->user_views }} Views</span>
                                            {{ $view->viewable->street_address }}, {{ $view->viewable->city->name }}, {{ $view->viewable->state }}
                                        </td>
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
    <div class="row">
        <div class="col py-3">
            <div class="card">
                <div class="card-header text-uppercase" style="letter-spacing:0.1em">Private Notes</div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="type a new note..." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Add Note</button>
                            </div>
                        </div>
                    </form>
                    <article class="note p-3 shadow-sm rounded-sm mb-3">
                        <small class="text-muted d-block mb-2">({{ date_format(new DateTime('2019-06-19 15:20:11'), 'M dS, Y \a\t g:i A') }}) Dustin added:</small>
                        <p class="border-left pl-3 mb-0">Natus et provident. Sed vel dolorem aliquid ut. Vel rerum vel ab molestiae facilis quia neque quae. Iure est eum ipsum at rerum autem rerum et nihil. Nobis animi et cum est commodi dolores. Aut amet fugiat rerum voluptas quod.
Eaque aut perferendis et nulla aliquid qui maxime commodi. Aliquid quia incidunt rem consequatur earum.
Cum sequi ea et eius quis officiis.</p>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
