<div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-{{ $timestamps ? 3 : 1 }}">
    <card title="Total">
        {{ $count }}
    </card>
    @if ($timestamps)
    <card title="This month">
        <div slot="actions">
            @if ($this_month > $last_month)
            <icon icon="trending-up" class="text-green-500" />
            @elseif ($this_month < $last_month)
            <icon icon="trending-down" class="text-red-500" />
            @endif
        </div>
        {{ $this_month }}
    </card>
    <card title="This year">
        <div slot="actions">
            @if ($this_year > $last_year)
            <icon icon="trending-up" class="text-green-500" />
            @elseif ($this_year < $last_year)
            <icon icon="trending-down" class="text-red-500" />
            @endif
        </div>
        {{ $this_year }}
    </card>
    @endif
</div>