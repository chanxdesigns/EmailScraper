<?php

namespace App\Config;


class Resolver {
    /**
     * The Resolver class for Dependency Injection
     *
     * @param $class
     * @throws \ReflectionException
     * @return mixed
     */
    public function resolve ($class) {

        try {
            // Instantiate the Reflection Class with the class parameter
            $reflector = new \ReflectionClass($class);

            // Check If Class is Instantiable
            // If not, then throw a ReflectionException error
            if ($reflector->isInstantiable()) {
                // Get the constructor of the Reflection Object
                $constructor = $reflector->getConstructor();

                if (is_null($constructor)) {
                    return new $class;
                }

                // Get the Parameters passed to the Reflection Object constructor
                $parameters = $constructor->getParameters();

                // Resolve parameters dependencies
                $dependencies = $this->resolveDeps($parameters);

                // Instantiate with the dependencies and
                // Return the Reflection Object
                return $reflector->newInstanceArgs($dependencies);
            }
            else {
                throw new \ReflectionException($class. " not instantiable");
            }

        }
        catch (\ReflectionException $err) {
            // Return the ReflectionException error
            return $err->getMessage();
        }

    }

    /**
     * Resolve dependencies
     *
     * @param $parameters
     * @return array
     */
    private function resolveDeps ($parameters) {
        // Empty dependencies array
        $dependencies = array();

        foreach ($parameters as $parameter) {

            $classDep = $parameter->getClass();
            if (is_null($classDep)) {
                $dependencies[] = $this->resolveNonClass($parameter);
            }
            else {
                $dependencies[] = $this->resolve($classDep->name);
            }

        }

        return $dependencies;

    }

    /**
     * Resolve Non Class Dependencies
     *
     * @param $parameter
     * @return mixed
     * @throws \ReflectionException
     */
    private function resolveNonClass ($parameter) {
        if ($parameter->isDefaultValueAvailable()){
            return $parameter->getDefaultValue();
        }
        throw new \ReflectionException("Can't load an unknown parameter type");
    }
}