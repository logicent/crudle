<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace crudle\kit\controllers;

use crudle\main\controllers\base\BaseViewController;
use crudle\main\enums\Type_Form_View;
use crudle\main\enums\Type_View;
use Yii;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class KitController extends BaseViewController
{
    /**
     * @var \crudle\kit\Module
     */
    public $module;
    /**
     * @var \crudle\kit\Generator
     */
    public $generator;

    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        Yii::$app->response->format = Response::FORMAT_HTML;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($id)
    {
        $generator = $this->loadGenerator($id);
        $params = ['generator' => $generator, 'id' => $id];

        $generateFiles = Yii::$app->request->post('generateFiles');
        $saveFiles = Yii::$app->request->post('saveFiles');
        $selectedFiles = Yii::$app->request->post('selectedFiles');

        if ($generateFiles !== null || $saveFiles !== null)
        {
            if ($generator->validate())
            {
                $generator->saveStickyAttributes();
                $files = $generator->generate();
                if ($saveFiles !== null && !empty($selectedFiles))
                {
                    $params['hasError'] = !$generator->save($files, (array) $selectedFiles, $results);
                    $params['results'] = $results;
                } else {
                    $params['files'] = $files;
                    $params['selectedFiles'] = $selectedFiles;
                }
            }
        }

        return $this->render('view', $params);
    }

    public function actionPreview($id, $file)
    {
        $generator = $this->loadGenerator($id);
        if ($generator->validate()) {
            foreach ($generator->generate() as $f) {
                if ($f->id === $file) {
                    $content = $f->preview();
                    if ($content !== false) {
                        return Html::tag('div', $content, ['class' => 'content']);
                    }
                    return <<<HTML
                        <div class="error"><?= Yii::t('app', 'Preview is not available for this file type.') ?></div>
                    HTML;
                }
            }
        }
        throw new NotFoundHttpException("Code file not found: $file");
    }

    public function actionDiff($id, $file)
    {
        $generator = $this->loadGenerator($id);
        if ($generator->validate()) {
            foreach ($generator->generate() as $f) {
                if ($f->id === $file) {
                    return $this->renderPartial('diff', [
                        'diff' => $f->diff(),
                    ]);
                }
            }
        }
        throw new NotFoundHttpException("Code file not found: $file");
    }

    /**
     * Runs an action defined in the generator.
     * Given an action named "xyz", the method "actionXyz()" in the generator will be called.
     * If the method does not exist, a 400 HTTP exception will be thrown.
     * @param string $id the ID of the generator
     * @param string $name the action name
     * @return mixed the result of the action.
     * @throws NotFoundHttpException if the action method does not exist.
     */
    public function actionAction($id, $name)
    {
        $generator = $this->loadGenerator($id);
        $method = 'action' . $name;
        if (method_exists($generator, $method)) {
            return $generator->$method();
        }
        throw new NotFoundHttpException("Unknown generator action: $name");
    }

    /**
     * Loads the generator with the specified ID.
     * @param string $id the ID of the generator to be loaded.
     * @return \crudle\kit\Generator the loaded generator
     * @throws NotFoundHttpException
     */
    protected function loadGenerator($id)
    {
        if (isset($this->module->generators[$id])) {
            $this->generator = $this->module->generators[$id];
            $this->generator->loadStickyAttributes();
            $this->generator->load(Yii::$app->request->post());

            return $this->generator;
        }
        throw new NotFoundHttpException("Code generator not found: $id");
    }

    // ViewInterface
    public function defaultViewType()
    {
        return Type_View::Workspace;
    }

    public function formViewType()
    {
        return Type_Form_View::Single;
    }

    public function showViewSidebar(): bool
    {
        // Todo: Fix clashes with crud sidebar
        return true;
    }
}
