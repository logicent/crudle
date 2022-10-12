<?php

use crudle\app\setup\models\GeneralSettingsForm;
use crudle\app\setup\models\Setup;

$businessProfile = Setup::getSettings( GeneralSettingsForm::class );
$this->params['businessLogo'] = $businessProfile->logoPath;
$this->params['businessName'] = $businessProfile->name;

// !! content hidden in page view if not lengthy