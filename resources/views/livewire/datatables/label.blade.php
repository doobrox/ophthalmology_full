<div style="padding-left: 1.25rem;
    padding-right: 1.25rem;
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
    font-weight: 400;" class="table-cell border-b dark:border-dark-5 whitespace-nowrap font-normal @if($column['align'] === 'right') text-right @elseif($column['align'] === 'center') text-center @else text-left @endif {{ $this->cellClasses($row, $column) }}">
    {!! $column['content'] ?? '' !!}
</div>
