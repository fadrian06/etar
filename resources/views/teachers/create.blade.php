<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Registrar profesor') }}
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

    <form method="POST" action="{{ route('teachers.store') }}" x-data="{ email: '' }">
      @csrf

      <!-- Name -->
      <div>
        <x-label for="name" :value="__('Nombre')" />

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
      </div>

      <!-- Email Address -->
      <div class="mt-4">
        <x-label for="email" :value="__('Correo electrónico')" />

        <x-input
          id="email"
          class="block mt-1 w-full"
          type="email"
          name="email"
          :value="old('email')"
          required
          x-model="email" />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-label for="password" :value="__('Contraseña')" />

        <x-input id="password" class="block mt-1 w-full"
          name="password"
          required
          x-bind:value="email"
          readonly />
      </div>

      <div class="flex items-center justify-end mt-4">
        <x-button class="ml-4">
          {{ __('Registrar profesor') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-app-layout>
