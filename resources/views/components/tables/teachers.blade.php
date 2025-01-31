<div class="relative overflow-x-auto">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">
          Nombre
        </th>
        <th scope="col" class="px-6 py-3">
          Correo
        </th>
        <th scope="col" class="px-6 py-3">
          Registrado el
        </th>
        <th scope="col" class="px-6 py-3">
          Actualizado el
        </th>
      </tr>
    </thead>
    <tbody>
      @forelse ($teachers as $teacher)
      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          {{ $teacher->name }}
        </th>
        <td class="px-6 py-4">
          {{ $teacher->email }}
        </td>
        <td class="px-6 py-4">
          {{ $teacher->created_at->ago() }}
        </td>
        <td class="px-6 py-4">
          {{ $teacher->updated_at->ago() }}
        </td>
        <td>
          <form action="{{ route('teachers.destroy', $teacher) }}" method="post">
            @csrf
            @method('delete')
            <x-button type="submit">{{  __('Eliminar') }}</x-button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td scope="row" colspan="4" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          No hay profesores registrados,
          <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('teachers.create') }}">
              {{ __('registra uno') }}
          </a>
        </td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
