<?php

use crudle\setup\models\GeneralSettingsForm;
use crudle\setup\models\Setup;

$businessProfile = Setup::getSettings( GeneralSettingsForm::class );
$this->params['businessLogo'] = $businessProfile->logoPath;
$this->params['businessName'] = $businessProfile->name;

?>
<!-- !! content hidden in page view if not lengthy -->