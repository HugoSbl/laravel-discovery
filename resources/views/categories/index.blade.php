<x-app-layout>
   <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
       <!-- Input pour ajouter une nouvelle catégorie -->
       <form method="POST" action="{{ route('categories.store') }}" class="flex items-center mb-4">
           @csrf
           <input
               type="text"
               name="name"
               placeholder="Ajouter une catégorie"
               class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full p-2"
               required
           />
           <button type="submit" class="ml-2 bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded">
               Ajouter
           </button>
       </form>

       <!-- Affichage des catégories sous forme de tags -->
       <div class="flex flex-wrap gap-2">
           @foreach ($categories as $category)
               <div class="flex items-center bg-gray-200 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold">
                   {{ $category->name }}
                   <button
                       class="ml-2 text-gray-500 hover:text-red-500"
                       onclick="event.preventDefault(); document.getElementById('delete-category-{{ $category->id }}').submit();"
                   >
                       &times;
                   </button>
                   <form id="delete-category-{{ $category->id }}" method="POST" action="{{ route('categories.destroy', $category) }}" style="display: none;">
                       @csrf
                       @method('DELETE')
                   </form>
               </div>
           @endforeach
       </div>
   </div>
</x-app-layout>
