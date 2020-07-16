<?php

namespace DonkeyCommerce\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

/**
 * Command for create a new repository class.
 *
 * @author Daniele Tulone <danieletulone.work@gmail.com>
 */
class RepositoryMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var string
     */
    protected $description = 'Create a new repository.';

    /**
     * Get stub file.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/repository.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Repositories';
    }

    /**
     * Qualify input name.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * @return string
     */
    public function getNameInput()
    {
        return Str::endsWith($this->argument('name'), ['Repository'])
                            ? trim($this->argument('name'))
                            : trim($this->argument('name')) . "Repository";
    }
}
