@extends('layouts.app')

@section('content')
    <div class="container m-5">
        <h2>Vulnerable Search Demo</h2>
        <form method="get" action="">
            <div class="mb-3">
                <label for="q" class="form-label">Search Query</label>
                <input type="text" name="q" id="q" class="form-control" value="{{ request('q') }}">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        @if (request('q'))
            <div class="mt-4">
                <strong>Result:</strong>
                <div class="alert alert-warning">
                    {{-- {!! $query !!} <!-- VULNERABLE: Output not escaped --> --}}
                    {{ $query }} <!-- FIXED: Output escaped -->
                </div>
            </div>
        @endif
    </div>
@endsection
