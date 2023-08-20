<?php

declare(strict_types=1);

namespace spouts\deviantart;

use spouts\Parameter;

/**
 * Spout for fetching an rss feed
 *
 * @copyright  Copyright (c) Tobias Zeising (http://www.aditu.de)
 * @license    GPLv3 (https://www.gnu.org/licenses/gpl-3.0.html)
 * @author     Tobias Zeising <tobias.zeising@aditu.de>
 */
class user extends \spouts\rss\images {
    public string $name = 'DeviantArt: user deviations';

    public string $description = 'Get deviations of a DeviantArt user.';

    public array $params = [
        'username' => [
            'title' => 'Username',
            'type' => Parameter::TYPE_TEXT,
            'default' => '',
            'required' => true,
            'validation' => [Parameter::VALIDATION_NONEMPTY],
        ],
    ];

    public function load(array $params): void {
        parent::load(['url' => $this->getXmlUrl($params)]);
    }

    public function getXmlUrl(array $params): string {
        return 'https://backend.deviantart.com/rss.xml?q=sort%3Atime%20by%3A' . urlencode($params['username']) . '&type=deviation';
    }
}
