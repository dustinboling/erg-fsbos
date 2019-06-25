@extends('layouts.agent')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <a href="{{ route('agent.leads.index') }}" class="text-decoration-none">
                <svg style="height:2em" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="arrow-circle-left" class="svg-inline--fa fa-arrow-circle-left fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256s111 248 248 248 248-111 248-248zM256 472c-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216 118.7 0 216 96.1 216 216 0 118.7-96.1 216-216 216zm-12.5-92.5l-115.1-115c-4.7-4.7-4.7-12.3 0-17l115.1-115c4.7-4.7 12.3-4.7 17 0l6.9 6.9c4.7 4.7 4.7 12.5-.2 17.1L181.7 239H372c6.6 0 12 5.4 12 12v10c0 6.6-5.4 12-12 12H181.7l85.6 82.5c4.8 4.7 4.9 12.4.2 17.1l-6.9 6.9c-4.8 4.7-12.4 4.7-17.1 0z"></path></svg>
                <span class="d-inline-block ml-2" style="line-height:2em;vertical-align: middle;">Back to leads</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 py-3">
                <div class="card mb-4 shadow-sm">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <img src="https://www.gravatar.com/avatar/{{ md5( strtolower( trim( $lead->email ) ) ) }}?s=400" class="card-img" alt="{{ $lead->name }}">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <th class="p-2" scope="row" colspan="2">
                                                    <h5 class="card-title mb-0">{{ $lead->name }}</h5>
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
                        </div>
                    </div>
        </div>
        <div class="col-md-6 py-3">
            {{-- Most Viewed FSBOs --}}
            <div class="card mb-4 shadow-sm">
                <div class="card-header text-uppercase" style="letter-spacing:0.1em">Most Viewed</div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <tbody>
                            @if ($topViews->isEmpty())
                            <tr>
                                <td colspan="2">
                                    This person hasn't viewed any FSBOs.
                                </td>
                            </tr>
                            @else

                            @endif
                            @foreach ($topViews as $view)
                            <tr>
                                <td>
                                    {{ $view->viewable->street_address }}, {{ $view->viewable->city->name }}, {{ $view->viewable->state }}
                                </td>
                                <th scope="col" class="text-center"><span class="badge badge-primary">{{ $view->user_views }} Views</span></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col py-3">
            <div class="card">
                <div class="card-header text-uppercase" style="letter-spacing:0.1em">Private Comments</div>
                <div class="card-body">
                    <form action="{{ route('agent.comments.store', $lead) }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input name="content" type="text" class="form-control" placeholder="type a new comment..." aria-label="Comment on lead" aria-describedby="button-addon-comment">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon-comment">Add Comment</button>
                            </div>
                        </div>
                    </form>
                    @foreach ($lead->comments->sortByDesc('created_at') as $comment)
                        <article class="note p-3 mb-3">
                            <div class="d-flex justify-content-between text-muted m-2">
                                <small>{{ $comment->agent->name }} wrote:</small>
                                <small>{{ date_format($comment->created_at, 'M dS, Y \a\t g:i A') }}</small>
                            </div>

                            <p class="border-left pl-3 mb-0">{!! $comment->content !!}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
