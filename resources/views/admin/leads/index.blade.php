@extends('admin.layouts.main')

@push('styles')
<style>
    .kanban-board { display: flex; gap: 1rem; overflow-x: auto; padding-bottom: 1rem; }
    .kanban-column { flex: 1 1 0; min-width: 260px; background: rgba(255,255,255,.03); border-radius: .5rem; padding: .75rem; }
    .kanban-column.drag-over { background: rgba(0,172,172,.15); outline: 2px dashed #00acac; }
    .kanban-column-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: .75rem; }
    .kanban-card { background: var(--bs-body-bg, #fff); border-radius: .4rem; padding: .65rem .75rem; margin-bottom: .6rem; box-shadow: 0 1px 3px rgba(0,0,0,.15); cursor: grab; }
    .kanban-card:active { cursor: grabbing; }
    .kanban-card.dragging { opacity: .4; }
    .kanban-card-title { font-weight: 600; font-size: .9rem; margin-bottom: .15rem; display: block; }
    .kanban-card-meta { font-size: .75rem; opacity: .7; }
    .kanban-card-actions { margin-top: .5rem; display: flex; justify-content: space-between; align-items: center; }
</style>
@endpush

@section('content')
    <a href="{{ route('admin.leads.create') }}" class="float-xl-end btn btn-primary">Add Lead</a>
    <h1 class="page-header">Leads (CRM)</h1>

    <div class="kanban-board" id="kanban-board">
        @foreach ($statuses as $statusOption)
            <div class="kanban-column" data-status="{{ $statusOption }}">
                <div class="kanban-column-header">
                    <h5 class="mb-0 text-capitalize">{{ $statusOption }}</h5>
                    <span class="badge bg-secondary">{{ $leadsByStatus->get($statusOption, collect())->count() }}</span>
                </div>
                <div class="kanban-cards" data-status="{{ $statusOption }}">
                    @forelse ($leadsByStatus->get($statusOption, collect()) as $lead)
                        <div class="kanban-card" draggable="true" data-id="{{ $lead->id }}">
                            <a href="{{ route('admin.leads.show', $lead) }}" class="kanban-card-title text-reset text-decoration-none">
                                {{ $lead->name }}
                            </a>
                            <div class="kanban-card-meta">{{ $lead->msg_subject }}</div>
                            <div class="kanban-card-meta">{{ $lead->created_at->format('M d, Y') }}</div>
                            <div class="kanban-card-actions">
                                <a href="{{ route('admin.leads.show', $lead) }}" class="btn btn-xs btn-outline-primary">View</a>
                                <form method="POST" action="{{ route('admin.leads.destroy', $lead) }}"
                                    onsubmit="return confirm('Delete this lead? This cannot be undone.');">
                                    @csrf
                                    <button type="submit" class="btn btn-xs btn-outline-danger" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-body-secondary small mb-0">No leads here.</p>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const board = document.getElementById('kanban-board');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let draggedCard = null;

    board.addEventListener('dragstart', function (e) {
        if (!e.target.classList.contains('kanban-card')) return;
        draggedCard = e.target;
        e.target.classList.add('dragging');
    });

    board.addEventListener('dragend', function (e) {
        if (!e.target.classList.contains('kanban-card')) return;
        e.target.classList.remove('dragging');
        draggedCard = null;
    });

    board.querySelectorAll('.kanban-column').forEach(function (column) {
        column.addEventListener('dragover', function (e) {
            e.preventDefault();
            column.classList.add('drag-over');
        });
        column.addEventListener('dragleave', function () {
            column.classList.remove('drag-over');
        });
        column.addEventListener('drop', function (e) {
            e.preventDefault();
            column.classList.remove('drag-over');
            if (!draggedCard) return;

            const newStatus = column.dataset.status;
            const leadId = draggedCard.dataset.id;
            const cardsContainer = column.querySelector('.kanban-cards');
            cardsContainer.appendChild(draggedCard);
            updateColumnCounts();

            fetch(`/admin/leads/${leadId}/move`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ status: newStatus })
            }).catch(function () {
                alert('Could not update lead status. Please refresh and try again.');
            });
        });
    });

    function updateColumnCounts() {
        board.querySelectorAll('.kanban-column').forEach(function (column) {
            const count = column.querySelectorAll('.kanban-card').length;
            column.querySelector('.badge').textContent = count;
        });
    }
});
</script>
@endpush
