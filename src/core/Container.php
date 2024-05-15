<?php

namespace core;

class Container
{

    private array $objects = [];

    public function has(string $id): bool
    {
        return isset($this->objects[$id]) || class_exists($id);
    }

    public function get(string $id): mixed
    {
        return
            isset($this->objects[$id])
                ? $this->objects[$id]()
                : $this->prepareObject($id);
    }

    /**
     * @throws \ReflectionException
     */
    private function prepareObject(string $class): object
    {

        $classReflector = new \ReflectionClass($class);

        $constructReflection = $classReflector->getConstructor();
        if (empty($constructReflection)) {
            return new $class;
        }

        $constructArguments = $constructReflection->getParameters();
        if (empty($constructArguments)) {
            return new $class;
        }

        $args = [];
        foreach ($constructArguments as $argument) {
            $argumentType = $argument->getType()->getName();
            $args[$argument->getName()] = $this->get($argumentType);
        }

        return new $class(...$args);

    }

}