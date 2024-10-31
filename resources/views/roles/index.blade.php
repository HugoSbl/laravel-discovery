<x-app-layout>
   <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
       <!-- Input pour ajouter une nouvelle catégorie -->
       <form method="POST" action="{{ route('role.store') }}" class="flex items-center mb-4">
           @csrf
           <input
               type="text"
               name="name"
               placeholder="Ajouter un role"
               class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full p-2"
               required
           />
           <button type="submit" class="ml-2 bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded">
               Ajouter
           </button>
       </form>

       <!-- Affichage des catégories sous forme de tags -->
      <table class="min-w-full bg-white border border-gray-200">
        <thead>
          <tr>
            <th class="py-2 px-4 border-b">Nom d'utilisateur</th>
            <th class="py-2 px-4 border-b">Email</th>
            <th class="py-2 px-4 border-b">Rôle</th>
            <th class="py-2 px-4 border-b">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td class="py-2 px-4 border-b">{{ $user->name }}</td>
              <td class="py-2 px-4 border-b">{{ $user->email }}</td>
              <td class="py-2 px-4 border-b">
                <form method="POST" action="{{ route('user.updateRole', $user->id) }}">
                  @csrf
                  @method('PUT')
                  <select name="role" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    @foreach ($roles as $role)
                      <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                      </option>
                    @endforeach
                  </select>
              </td>
              <td class="py-2 px-4 border-b">
                  <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-red font-bold py-1 px-3 rounded">
                    Attribuer
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
   </div>
</x-app-layout>
