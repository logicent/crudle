<?php

namespace crudle\app\workflows;

interface WorkflowInterface
{
    public function workflows();

    public function hasWorkflow();

    // public function isTrackableChanges();
    // public function trackChanges();

    //  is creatable document
    // public function isCreatable();

    public function userCan( $permission, $userId = null );

    // model data can be imported
    public function allowDataImport();

    public function excludeAttributesInImport();

    // model data can be exported
    public function allowDataExport();

    public function excludeAttributesInExport();

    // data model has file attachment
    public function allowFileUpload();

    // limit file attachments to (0 or not set is unlimited)
    public function limitFileUploads();

    // public $attachedFiles = [];
    // public $sharedWith = [];
    // public $tagsList = [];

    // data model has downloadable files
    public function allowFileDownload();

    // is printable document
    // public function isPrintable();

    public function allowPrint();

    // limit print to (0 or not set is unlimited)
    public function limitPrint();

    // is mailable document
    // public function isMailable();

    // model view can be sent via mail
    public function allowSendEmail();

    // data model change requires notification
    public function sendNotificationIf( $status );

    // person (3rd-party) is associated & settings apply e.g. contact person
    public function personCanBeNotified( $personId );

    // model data can be duplicated
    public function allowDuplicate();

    // return true if succeeded or false if failed ?
    public function duplicateFrom( $model, $includeDetailModels = true );

    // return array of detail model relations
    public function duplicateDetailModels();

     // default is PK, status, comments and timestamp attributes
    public function excludeAttributesInDuplicate();

    // data model has comments
    public function allowComment();

    //  is updatable document
    // public function isUpdatable();

    // model model is in a preserve state
    public function lockUpdate();

    // require submit of document in a drafted/confirm state
    public function requireSubmit();

    // require approval of document in a submitted/pending state
    public function requireApproval();

    // is reversible document
    // public function isReversible();

    // model is in a reversible state
    public function lockCancel();

    // is amendable document
    // public function isAmendable();

    // model is in a modifiable state
    public function lockAmend();

    // model valid status enums
    public function statusEnums( $key );

    // model valid status enums colors
    public function statusEnumsColors( $key );

    // next state in workflow
    public function nextStatus();

    // require comment for some status change
    public function requireCommentIf( $status );

    // is deletable document
    // public function isDeletable();

    // model data has active links or a rule applies
    public function lockDelete();

    // only set as deleted in data store
    public function useSoftDelete();

    // user can create report(s) for source model if
    public function allowedReportSourceStatusOnCreate();
}
