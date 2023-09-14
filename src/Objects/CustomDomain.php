<?php

namespace Storipress\Webflow\Objects;

/**
 * @phpstan-type DomainData array{
 *     id: string,
 *     url: string,
 * }
 */
class CustomDomain extends WebflowObject
{
    public string $id;

    public string $url;

	/**
	 * @param  DomainData  $data
	 * @return self
	 */
	public function from(array $data): self
	{
		return $this->setRaw($data)->map($data);
	}
}
