<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="p-6 bg-white border-b border-gray-200">

                <div class="mx-2 my-8">
                    <button href="" wire:click="updateListState" class="bg-amber-400  p-2 text-white text-lg font-bold rounded">{{ $list ? 'Criar Tópico' : 'Listar Tópicos'}}</button>
                </div>



                @if($list)
                <livewire:section.list-section />

                @else
                <livewire:section.create-section />

                @endif

            </div>
        </div>
    </div>
</div>