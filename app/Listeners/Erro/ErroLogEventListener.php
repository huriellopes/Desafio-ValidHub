<?php

namespace App\Listeners\Erro;

use App\Events\Erro\ErroEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class ErroLogEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ErroEvent $event
     * @return void
     */
    public function handle(ErroEvent $event)
    {
        if ($event->getMensagem()) {
            Log::channel('erros')->warning($event->getMensagem().'; Ação do usuário: '.request()->usuario->id.';');
        }
    }
}
