<div>
    @error('category_id') <span class="error text-red-600 font-semibold text-xs">{{ $message }}</span> @enderror
    <select
        name="category_id"
        class="bg-slate-800 border-0 border-slate-900 w-full rounded-md text-white/60 text-xs capitalize mb-4"
    >
        <option value="">Seleccionar Categoria</option>
        @foreach($categories as $category)
            <option
                value="{{$category->id}}"
                @selected($category->id == old('category_id',$thread->category_id))
{{--                @selected($category->id == $thread->category_id || old('category_id') == $category->id)--}}
                {{--@if($thread->category_id == $category->id)
                selected
                @endif--}}
            >
                {{$category->name}}
            </option>
        @endforeach
    </select>

    @error('title') <span class="error text-red-600 font-semibold text-xs mb-4">{{ $message }}</span> @enderror
    <input
        type="text"
        name="title"
        class="bg-slate-800 border-0 border-slate-900 w-full rounded-md text-white/60 text-xs capitalize mb-4"
        placeholder="Title"
        value="{{ old('title', $thread->title) }}"
    >

    @error('body') <span class="error text-red-600 font-semibold text-xs mb-4">{{ $message }}</span> @enderror
    <textarea
        name="body"
        class="bg-slate-800 border-0 border-slate-900 w-full rounded-md text-white/60 text-xs capitalize mb-4"
        placeholder="Descripcion del problema"
        rows="10"
    >
        {{ old('body', $thread->body) }}
    </textarea>

</div>
