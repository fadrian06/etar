@php
$stateInputId = uniqid();
$cityInputId = uniqid();
@endphp

@once
@php
function groupByInitial(App\Models\State ...$states): array {
$initials = [];

foreach ($states as $state) {
$initials[$state->initial][] = $state;
}

return $initials;
}
@endphp
@endonce

<div x-data="states">
  <div class="mb-4">
    <x-label for="{{ $stateInputId }}" :value="__('Estado')" />

    <x-select
      name="{{ $stateInputName }}"
      required
      x-model.number="selectedStateId"
      id="{{ $stateInputId }}"
      class="w-full">
      <option value="" />
      @foreach (groupByInitial(...$states) as $initial => $groupedStates)
      <optgroup label="{{ $initial }}">
        @foreach ($groupedStates as $state)
        <option
          {{ @$oldState === $state->id ? 'selected' : '' }}
          value="{{ $state->id }}">
          {{ $state->name }}
        </option>
        @endforeach
      </optgroup>
      @endforeach
    </x-select>
  </div>

  <div x-show="selectedStateId" x-transition>
    <x-label for="{{ $cityInputId }}" :value="__('Ciudad')" />

    <x-input
      name="{{ $cityInputName }}"
      required
      id="{{ $cityInputId }}"
      list="cities"
      class="w-full"
      :value="$oldCity" />
  </div>

  @once
  <datalist id="cities">
    <template x-for="state in states">
      <template x-if="state.id === selectedStateId">
        <template x-for="city in state.cities">
          <option :value="`${city.id} - ${city.name}`" />
        </template>
      </template>
    </template>
  </datalist>

  <script>
    document.addEventListener('alpine:init', () => {
      Alpine.data('states', () => ({
        selectedStateId: JSON.parse(`<?= @$oldState ?: 'null' ?>`),
        states: JSON.parse(`<?= json_encode($states) ?>`),
      }))
    })
  </script>
  @endonce
</div>
