<?php


namespace Xervice\Web\Business\Plugin;


class PluginCollection implements \Iterator, \Countable
{
    /**
     * @var \Xervice\Web\Business\Plugin\WebProviderPluginInterface[]
     */
    private $collection;

    /**
     * @var int
     */
    private $position;

    /**
     * Collection constructor.
     *
     * @param \Xervice\Web\Business\Plugin\WebProviderPluginInterface[] $collection
     */
    public function __construct(array $collection)
    {
        foreach ($collection as $validator) {
            $this->add($validator);
        }
    }

    /**
     * @param \Xervice\Web\Business\Plugin\WebProviderPluginInterface $validator
     */
    public function add(WebProviderPluginInterface $validator): void
    {
        $this->collection[] = $validator;
    }

    /**
     * @return \Xervice\Web\Business\Plugin\WebProviderPluginInterface
     */
    public function current(): WebProviderPluginInterface
    {
        return $this->collection[$this->position];
    }

    public function next(): void
    {
        $this->position++;
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->collection[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return \count($this->collection);
    }
}