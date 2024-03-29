<?php

/*
 * This file is part of the Klipper package.
 *
 * (c) François Pluchino <francois.pluchino@klipper.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Klipper\Component\Content\Uploader\Namer;

/**
 * @author François Pluchino <francois.pluchino@klipper.dev>
 */
class NamerManager implements NamerManagerInterface
{
    /**
     * @var NamerInterface[]
     */
    private array $namers = [];

    /**
     * @param NamerInterface[] $namers The namers
     */
    public function __construct(array $namers)
    {
        foreach ($namers as $namer) {
            $this->add($namer);
        }
    }

    public function has(?string $name): bool
    {
        return isset($this->namers[$name]);
    }

    public function get(?string $name): ?NamerInterface
    {
        return $this->namers[$name] ?? null;
    }

    public function add(NamerInterface $namer): void
    {
        $this->namers[$namer->getName()] = $namer;
    }
}
