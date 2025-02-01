<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Registrar estudiante') }}
    </h2>
  </x-slot>

  <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
      </a>
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('students.store') }}">
      @csrf

      <div>
        <x-label for="first_name" :value="__('Primer nombre')" />

        <x-input
          id="first_name"
          class="block mt-1 w-full"
          name="first_name"
          :value="old('first_name')"
          required />
      </div>

      <div class="mt-4">
        <x-label for="second_name" :value="__('Segundo nombre')" />

        <x-input
          id="second_name"
          class="block mt-1 w-full"
          name="second_name"
          :value="old('second_name')" />
      </div>

      <div class="mt-4">
        <x-label for="first_last_name" :value="__('Primer apellido')" />

        <x-input
          id="first_last_name"
          class="block mt-1 w-full"
          name="first_last_name"
          :value="old('first_last_name')"
          required />
      </div>

      <div class="mt-4">
        <x-label for="second_last_name" :value="__('Segundo apellido')" />

        <x-input
          id="second_last_name"
          class="block mt-1 w-full"
          name="second_last_name"
          :value="old('second_last_name')" />
      </div>

      <div class="mt-4">
        <x-label for="nationality" :value="__('Nacionalidad')" />

        <x-select
          id="nationality"
          class="block mt-1 w-full"
          name="nationality"
          required>
          <option @selected(old('nationality') === 'V') value="V">
            Venezolano
            </option>
          <option @selected(old('nationality') === 'E') value="E">
            Extranjero
            </option>
        </x-select>
      </div>

      <div class="mt-4">
        <x-label for="id_card" :value="__('Cédula')" />

        <x-input
          id="id_card"
          class="block mt-1 w-full"
          name="id_card"
          required
          :value="old('nationality')" />
      </div>

      <hr />

      <fieldset class="mt-4">
        <legend>Lugar de nacimiento</legend>
        <x-inputs.address
          state-input-name="birthplace_state_id"
          city-input-name="birthplace_city_id"
          :states="$states"
          :old-state="old('birthplace_state_id')"
          :old-city="old('birthplace_city_id')" />
      </fieldset>

      <hr />

      <div class="mt-4">
        <x-label for="birthdate" :value="__('Fecha de nacimiento')" />

        <x-input
          type="date"
          name="birthdate"
          required
          id="birthdate"
          class="block mt-1 w-full"
          max="{{ date('Y-m-d') }}" />
      </div>

      <div class="flex items-center justify-end mt-4">
        <x-button class="ml-4">
          {{ __('Registrar estudiante') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-app-layout>
