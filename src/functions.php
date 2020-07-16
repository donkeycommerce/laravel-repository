<?php

use DonkeyCommerce\Repository\RepositoryManager;

/**
 * Get a repository manager for specific resource.
 */
function repository($name)
{
    return new RepositoryManager($name);
}