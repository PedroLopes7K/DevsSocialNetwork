<div>
    <h1>Criar Tópico</h1>

    <form wire:submit.prevent="store" class="grid gap-3">
        <input type="text" wire:model="name" class="border rounded-md p-6 focus:outline-none px-4 w-full" placeholder="Nome do Tópico..." id="">

        <div>
            <button class="px-6 py-4 rounded-md bg-amber-400 text-white">Adicionar Tópico</button>
        </div>
    </form>
</div>