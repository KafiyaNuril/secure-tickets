{{-- ============================================ --}}
{{-- VIEW: tickets/index.blade.php --}}
{{-- Menampilkan daftar semua tiket --}}
{{-- ============================================ --}}

@extends('layouts.app')

@section('title', 'Daftar Tiket')

@section('content')

{{-- ============================================ --}}
{{-- STATISTIK RINGKAS --}}
{{-- ============================================ --}}
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border border-secondary-subtle">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="icon-box bg-warning-subtle text-warning me-2">
                        <i class="bi bi-hourglass"></i>
                    </div>
                    <h5 class="card-title fw-bolder mt-2">Open</h5>
                </div>
                <h2 class="fw-semibold display-6 text-center">
                    {{ \App\Models\Ticket::where('status', 'open')->count() }}
                </h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border border-secondary-subtle">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="icon-box bg-info-subtle text-info me-2">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                    <h5 class="card-title fw-bolder mt-2">In Progress</h5>
                </div>

                <h2 class="fw-semibold display-6 text-center">
                    {{ \App\Models\Ticket::where('status', 'in_progress')->count() }}
                </h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border border-secondary-subtle">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="icon-box bg-success-subtle text-success me-2">
                        <i class="bi bi-hourglass-bottom"></i>
                    </div>
                    <h5 class="card-title fw-bolder mt-2">Closed</h5>
                </div>
                <h2 class="fw-semibold display-6 text-center">
                    {{ \App\Models\Ticket::where('status', 'closed')->count() }}
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h2 fw-bold mb-0"> Daftar Tiket
        </h1>
        <p class="text-muted mb-0">Kelola semua tiket support</p>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <span class="text-muted me-3">
            Total Tiket: <strong>{{ $tickets->total() }}</strong>
        </span>
        <a href="{{ route('tickets.create') }}" class="btn btn-dark">
            + Buat Tiket
        </a>
    </div>
</div>

{{-- ============================================ --}}
{{-- TABEL TIKET --}}
{{-- ============================================ --}}
<div class="card">
    <div class="card-body p-0">
        @forelse($tickets as $ticket)
            <div class="ticket-item px-4 py-3 border-bottom {{ $loop->last ? 'border-0' : '' }}">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="mb-1">
                            <a href="{{ route('tickets.show', $ticket) }}"
                               class="text-decoration-none text-dark">
                                {{ $ticket->title }}
                            </a>
                        </h6>

                        <p class="text-muted small mb-2">
                            {{ Str::limit($ticket->description, 120) }}
                        </p>

                        <div class="small text-muted">
                            <i class="bi bi-person"></i> {{ $ticket->user->name ?? 'Unknown' }}
                            &nbsp;•&nbsp;
                            <i class="bi bi-clock"></i> {{ $ticket->created_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="text-end">
                        <div class="d-flex justify-content-between">
                            <span class="badge {{ $ticket->status_badge }} me-2 mt-1">
                                {{ ucfirst(str_replace('_',' ', $ticket->status)) }}
                            </span>
                            <br>
                            <span class="badge {{ $ticket->priority_badge }} mt-1">
                                {{ ucfirst($ticket->priority) }}
                            </span>
                        </div>

                        <div class="mt-2">
                            <a href="{{ route('tickets.show', $ticket) }}"
                               class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('tickets.edit', $ticket) }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('tickets.destroy', $ticket) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin hapus tiket?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                <i class="bi bi-inbox display-4 text-muted"></i>
                <p class="text-muted mt-2">Belum ada tiket</p>
            </div>
        @endforelse
    </div>
</div>

{{-- Pagination --}}
@if($tickets->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $tickets->links() }}
    </div>
@endif

@endsection
