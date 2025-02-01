<div class="relative overflow-x-auto">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">
          Nombre completo
        </th>
        <th scope="col" class="px-6 py-3">
          Cédula
        </th>
        <th scope="col" class="px-6 py-3">
          Lugar de nacimiento
        </th>
        <th scope="col" class="px-6 py-3">
          Fecha de nacimiento
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($students as $student)
      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          {{ $student }}
        </th>
        <td class="px-6 py-4">
          {{ $student->fullIdCard }}
        </td>
        <td class="px-6 py-4">
          {{ $student->address }}
        </td>
        <td class="px-6 py-4">
          {{ $student->birthdate->format('d/m/Y') }}
        </td>
        <td>
          <a
            class="block px-4 underline text-sm text-gray-600 hover:text-gray-900"
            href="{{ route('students.edit', $student) }}">
            {{ __('Editar') }}
          </a>
        </td>
        <td>
          <form action="{{ route('students.destroy', $student) }}" method="post">
            @csrf
            @method('delete')
            <x-button type="submit">{{ __('Eliminar') }}</x-button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      @if ($students)
      <tr>
        <td scope="row" colspan="4" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          {{ count($students) . (count($students) === 1 ? ' estudiante registrado' : ' estudiantes registrados') }},
          <a
            class="underline text-sm text-gray-600 hover:text-gray-900"
            href="{{ route('students.create') }}">
            {{ __('registrar otro') }}
          </a>
        </td>
      </tr>
      @else
      <tr>
        <td scope="row" colspan="4" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          No hay estudiantes registrados,
          <a
            class="underline text-sm text-gray-600 hover:text-gray-900"
            href="{{ route('students.create') }}">
            {{ __('registra uno') }}
          </a>
        </td>
      </tr>
      @endif
    </tfoot>
  </table>
</div>
