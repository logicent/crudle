<?php

namespace crudle\app\workflow\components;

class Involvement
{
    // Participation by Invitation or Selection i.e. Co-opted
    const ByInvitation = 'Invitation';
    const BySelection = 'Selection';

    private $_participants;
    private $_invitations, $_invitees;
    private $_selections, $_selectees;
}