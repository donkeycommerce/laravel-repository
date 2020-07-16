<?php

use DonkeyCommerce\repository\RepositoryManager;

/**
 * Get a repository manager for specific resource.
 */
function repository($name)
{
    return new RepositoryManager($name);
}