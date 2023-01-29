<?php

namespace Marlonbasten\OhdearCroncheckLaravel;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Marlonbasten\OhdearCroncheckLaravel\Exception\ProvidedClassIsNotACommandException;

class OhDearCron
{
    protected array $registered = [];

    /**
     * @param  class-string  $className
     * @param  string  $id
     * @return void
     *
     * @throws ProvidedClassIsNotACommandException
     */
    public function register(string $className, string $id): void
    {
        $commandClass = new $className;

        if (! $commandClass instanceof Command) {
            throw new ProvidedClassIsNotACommandException();
        }

        $this->registered[$commandClass->getName()] = [
            'id' => $id,
            'started' => null,
        ];
    }

    public function getRegisteredCommands(): array
    {
        return $this->registered;
    }

    public function getCommand(string $commandName): ?array
    {
        return $this->registered[$commandName] ?? null;
    }

    public function setStartedTime(string $commandName, Carbon $time): void
    {
        if (! $this->getCommand($commandName)) {
            return;
        }

        $this->registered[$commandName]['started'] = $time;
    }
}
