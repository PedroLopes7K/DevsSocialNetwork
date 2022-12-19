<div wire:poll>
    @foreach ($comments as $comment)

    <div class="p-2 flex justify-between  rounded bg-slate-100 shadow-md my-4">
        <div class="flex flex-col">
            <span class="font-bold">{{ ucfirst($comment->user->username )}}</span>
            <span class="font-thin">{{ $comment->body }}</span>
            <span class="font-thin mt-2">{{ $comment->created_at->diffForHumans() }}</span>
        </div>
        <!-- <div class="my-auto mx-4 space-x-4"> -->
        <div class="flex my-auto mx-4 space-x-5">
            <div>
                <svg wire:click="addLikeToComment({{ $comment->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer  @if ($comment->userLikedComment()) text-blue-500 @endif">
                    <path stroke-linecap=" round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                </svg> {{ $comment->likes->count() }}

            </div>
            <div wire:click="openModal({{$comment->id}})"><i class='far fa-comment-dots cursor-pointer ' style='font-size:24px'></i></div>
        </div>
    </div>
    @endforeach

    @if($modalComment)
    <div class="relative  z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!--
    Background backdrop, show/hide based on modal state.

    Entering: "ease-out duration-300"
      From: "opacity-0"
      To: "opacity-100"
    Leaving: "ease-in duration-200"
      From: "opacity-100"
      To: "opacity-0"
  -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <!--
        Modal panel, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
                <div wire:poll class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">

                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Comentario:</h3>
                                <div class="mt-2 bg-gray-500 p-2 w-full rounded">
                                    <p class="text-sm text-white">{{ ucfirst($comment->user->username )}}:</p>

                                    <p class="text-sm text-white">{{$textComment}}</p>
                                </div>

                                <div class="mt-4">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Respostas:</h3>

                                    @if(count($answersComment) > 0)
                                    @foreach($answersComment as $answer)
                                    <div class="bg-slate-100 shadow-md my-4 p-2">
                                        <p class="text-sm">{{ ucfirst($answer->user->username )}}:</p>
                                        <p class=" font-thin">{{$answer->body}}</p>
                                    </div>
                                    @endforeach

                                    @endif

                                </div>


                            </div>
                        </div>
                        <!-- COLOCAR UM INPUT PARA RESPONDER O COMENTARIO
                        PEGAR O ID DO COMENTARIO ATUAL E GRAVAR EM UMA TABELA DE RESPOSTAS COM O ID DO COMENTARIO RESPONDIDO, E A RESPOSTA EM SÍ -->
                    </div>
                    <div class="bg-gray-50  px-4 py-3 sm:flex sm:flex-col sm:space-y-4 sm:px-6">
                        @if(Auth()->user())
                        <div class="flex space-x-2">
                            <input wire:model="answer" type="text" id="answer" class="bg-gray-50 w-4/6 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Responder.." required>
                            <button wire:click="sendComment" class="px-2 py-2 rounded-md w-2/6 bg-purple-500 text-white">Enviar</button>
                        </div>
                        @endif
                        <div class="">
                            <button wire:click="closeModal" type="button" class="inline-flex w-2/6 justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Fechar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif



</div>