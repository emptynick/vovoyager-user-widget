<div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-{{ $timestamps ? 3 : 1 }}">
    <card title="Total">
        {{ $count }}
    </card>
    @if ($timestamps)
    <card title="This month">
        {{ $this_month }}
    </card>
    <card title="This year">
        {{ $this_year }}
    </card>
    @endif
</div>