<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeVue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:vue {name} {--type=page}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Vue file in the specified directory (pages or components)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $type = $this->option('type');

        // Decide base path
        $basePath = $type === 'component'
            ? 'js/Components'
            : 'js/Pages';

        $path = resource_path("{$basePath}/{$name}.vue");

        // Create directory if not exists
        $directory = dirname($path);
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        // Prevent overwrite
        if (file_exists($path)) {
            $this->error('File already exists!');
            return;
        }

        // Clean stub
        $stub = <<<EOT
            <script setup>
            </script>

            <template>
            <div>
                <h1>{$name}</h1>
            </div>
            </template>
            EOT;

        file_put_contents($path, $stub);

        $this->info("Vue file created: {$path}");
    }
}
