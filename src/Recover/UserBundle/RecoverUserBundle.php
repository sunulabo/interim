<?php

namespace Recover\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class RecoverUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle' ;
	}
}
