<?php

namespace Interim\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class InterimUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
