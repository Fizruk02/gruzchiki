{{-- table-view.table-view

Base layout to render all the UI componentes related to the table view, this is the main file for this view,
the rest of the files are included from here

You can customize all the html and css classes but YOU MUST KEEP THE BLADE AND LIVEWIERE DIRECTIVES

UI components used:
  - table-view.filters
  - components.alert
  - components.table
  - components.paginator
@dump($model)
--}}
@php
    $cabinet = \App\Models\Cabinet::where('id', $cabinet_id)->first();
@endphp
<x-lv-layout>
  <div class="pt-3 px-3 text-xl">{{$cabinet->users->name}}</div>

  {{-- Search input and filters --}}
  <div class="py-0 px-3 pb-0">
    @include('laravel-views::components.toolbar.toolbar')
  </div>

  <div>
  @if (count($items))
    {{-- Content table --}}
    <div class="overflow-x-scroll lg:overflow-x-visible">
      @include('laravel-views::components.table')
    </div>
    @php
        $summ = 0;
        foreach ($items as $item)
            $summ += $item->debt;
    @endphp

    {{-- Paginator, loading indicator and totals --}}
    <div class="p-4">
        {{ $items->links() }}
    </div>
  @else
    {{-- Empty data message --}}
    <div class="flex justify-center items-center p-4">
      <h3>{{ __('Данные не найдены') }}</h3>
    </div>
  @endif
  </div>

</x-lv-layout>