<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerarSaldoMensual extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generar-saldo-mensual';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $clientes = Cliente::with('servicio')->get();
    $mes = now()->format('Y-m');

    foreach ($clientes as $cliente) {
        $existe = Saldo::where('cliente_id', $cliente->id)
                       ->where('mes', $mes)
                       ->exists();

        if (!$existe) {
            Saldo::create([
                'cliente_id' => $cliente->id,
                'monto' => $cliente->servicio->precio,
                'mes' => $mes,
            ]);
        }
    }

    $this->info("Saldos generados para el mes $mes");
    }
}
