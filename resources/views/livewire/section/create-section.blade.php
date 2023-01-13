<div>
    <h1>CRIAR SESSÃO</h1>

    <form wire:submit.prevent="store" class="grid gap-3">
        <input type="text" wire:model="name" class="border rounded-md p-6 focus:outline-none px-4 w-full" placeholder="Nome da Seção..." id="">

        <div>
            <button class="px-6 py-4 rounded-md bg-purple-500 text-white">Criar Sessão</button>
        </div>
    </form>
</div>