<?php

use app\modules\setup\models\GeneralSettingsForm;
use app\modules\setup\models\Setup;

$businessProfile = Setup::getSettings( GeneralSettingsForm::class );
$this->params['businessLogo'] = $businessProfile->logoPath;
$this->params['businessName'] = $businessProfile->name;

?>
<!-- !! content hidden in page view if not lengthy -->