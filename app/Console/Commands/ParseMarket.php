<?php

namespace App\Console\Commands;

use App\Domain\Market\Services\MarketParser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class ParseMarket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grab:parse-market';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Market prices Parser';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $references = [];

        $parser = App::make(MarketParser::class);
        $parser->parse(function ($message) use (&$references) {

            //TODO: signals refactor
            switch (true) {
                case(is_array($message) && 'init_progress_bar' === $message[0] ?? null):
                    $references['bar'] = $this->output->createProgressBar($message[1] ?? 1);
                    $references['bar']->setRedrawFrequency(1);
                    $references['bar']->minSecondsBetweenRedraws(0.01);
                    $references['bar']->start();
                    break;

                case(is_array($message) && 'step_progress_bar' === $message[0] ?? null):
                    $references['bar']->advance();
                    break;

                case(is_array($message) && 'finish_progress_bar' === $message[0] ?? null):
                    $references['bar']->finish();
                    break;

                case(is_array($message) && 'log' === $message[0] ?? null):
                    $this->line($message[1] ?? 'Error, no message to print!');
                    break;

                case(is_array($message) && 'error' === $message[0] ?? null):
                    $this->error($message[1] ?? 'Error, no message to print!');
                    break;

                case(is_array($message) && 'dump' === $message[0] ?? null):
                    dump($message[1] ?? 'Error, no message to print!');
                    break;
            }
        });

        $this->line("\n");
    }
}
