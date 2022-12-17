<?php

namespace crudle\ext\reporting\enums;

use Yii;

class Report_Status
{
    // const NotApplicable = 'Not Applicable'; // Default if Report is not applicable
    const NotRequired = 'Not Required'; // Default if Report is not required
    const NotDrafted  = 'Not Drafted'; // Default if Report is required
    const Drafted     = 'Drafted'; // i.e. Prepared - TODO: Identify trigger to set as (Not Submitted)
    const Submitted   = 'Submitted'; // + Request Approval or + Closed
    const NotApproved = 'Not Approved'; // Reviewed? - If Approval required (Pending Approval)
    const Approved    = 'Approved'; // + Closed if Approved
    const Rejected    = 'Rejected'; // + Drafted with Comments

    const NotRequiredColor  = 'grey';
    const NotDraftedColor  = 'brown';
    const DraftedColor= 'red';
    const SubmittedColor   = 'blue';
    const NotApprovedColor= 'yellow';
    const ApprovedColor = 'green';
    const RejectedColor = 'red';

    public static function enums()
    {
        return [
            self::NotRequired   =>  Yii::t('app', self::NotRequired),
            self::NotDrafted    =>  Yii::t('app', self::NotDrafted),
            self::Drafted       =>  Yii::t('app', self::Drafted), // 'Draft',
            self::Submitted     =>  Yii::t('app', self::Submitted),
            self::NotApproved   =>  Yii::t('app', self::NotApproved),
            self::Approved      =>  Yii::t('app', self::Approved),
            self::Rejected      =>  Yii::t('app', self::Rejected),
        ];
    }

    public static function enumsColor()
    {
        return [
            self::NotRequired   =>  Yii::t('app', self::NotRequiredColor),
            self::NotDrafted    =>  Yii::t('app', self::NotDraftedColor),
            self::Drafted       =>  Yii::t('app', self::DraftedColor),
            self::Submitted     =>  Yii::t('app', self::SubmittedColor),
            self::NotApproved   =>  Yii::t('app', self::NotApprovedColor),
            self::Approved      =>  Yii::t('app', self::ApprovedColor),
            self::Rejected      =>  Yii::t('app', self::RejectedColor),
        ];
    }
}
