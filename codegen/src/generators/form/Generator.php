<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace crudle\kit\generators\form;

use Yii;
use yii\base\Model;
use crudle\kit\CodeFile;

/**
 * This generator will generate an action view file based on the specified model class.
 *
 * @property array $modelAttributes List of safe attributes of [[modelClass]]. This property is read-only.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Generator extends \crudle\kit\Generator
{
    public $modelClass;
    public $viewPath = '@app_main/views';
    public $viewName;
    public $scenarioName;


    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Form View';
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return 'This generates a view script file that displays a form to collect input for the specified model class.';
    }

    /**
     * {@inheritdoc}
     */
    public function generate()
    {
        $files = [];
        $files[] = new CodeFile(
            Yii::getAlias($this->viewPath) . '/' . $this->viewName . '.php',
            $this->render('form.php')
        );

        return $files;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['modelClass', 'viewName', 'scenarioName', 'viewPath'], 'filter', 'filter' => 'trim'],
            [['modelClass', 'viewName', 'viewPath'], 'required'],
            [['modelClass'], 'match', 'pattern' => '/^[\w\\\\]*$/', 'message' => 'Only word characters and backslashes are allowed.'],
            [['modelClass'], 'validateClass', 'params' => ['extends' => Model::class]],
            [['viewName'], 'match', 'pattern' => '/^\w+[\\-\\/\w]*$/', 'message' => 'Only word characters, dashes and slashes are allowed.'],
            [['viewPath'], 'match', 'pattern' => '/^@?\w+[\\-\\/\w]*$/', 'message' => 'Only word characters, dashes, slashes and @ are allowed.'],
            [['viewPath'], 'validateViewPath'],
            [['scenarioName'], 'match', 'pattern' => '/^[\w\\-]+$/', 'message' => 'Only word characters and dashes are allowed.'],
            [['enableI18N'], 'boolean'],
            [['messageCategory'], 'validateMessageCategory', 'skipOnEmpty' => false],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'modelClass' => 'Model Class',
            'viewName' => 'View Name',
            'viewPath' => 'View Path',
            'scenarioName' => 'Scenario',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function requiredTemplates()
    {
        return ['form.php', 'action.php'];
    }

    /**
     * {@inheritdoc}
     */
    public function stickyAttributes()
    {
        return array_merge(parent::stickyAttributes(), ['viewPath', 'scenarioName']);
    }

    /**
     * {@inheritdoc}
     */
    public function hints()
    {
        return array_merge(parent::hints(), [
            'modelClass' =>
                'This is a form model class for collecting the form input. It is a fully qualified class name.',
            'viewName' =>
                'A <code>main/index.php</code> view file will be generated under the view path corrensponding 
                to the view name.',
            'viewPath' =>
                'This is the root view path to store the view files when generated. Use a directory or 
                a path alias.',
            'scenarioName' => 
                'This is the scenario to be used by the model when collecting the form input. 
                If empty, the default scenario will be used.',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function successMessage()
    {
        $code = highlight_string($this->render('action.php'), true);

        return <<<EOD
<p>The form has been generated successfully.</p>
<p>You may add the following code in an appropriate controller class to invoke the view:</p>
<pre>$code</pre>
EOD;
    }

    /**
     * Validates [[viewPath]] to make sure it is a valid path or path alias and exists.
     */
    public function validateViewPath()
    {
        $path = Yii::getAlias($this->viewPath, false);
        if ($path === false || !is_dir($path)) {
            $this->addError('viewPath', 'View path does not exist.');
        }
    }

    /**
     * @return array list of safe attributes of [[modelClass]]
     */
    public function getModelAttributes()
    {
        /* @var $model Model */
        $model = new $this->modelClass();
        if (!empty($this->scenarioName)) {
            $model->setScenario($this->scenarioName);
        }

        return $model->safeAttributes();
    }
}
